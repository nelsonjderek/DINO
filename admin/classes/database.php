<?php

	class Database

	{
	
		/* important variables */
		var $connection;							//the database link to use
		var $saves;									//saves something
		var $cache;									//saves results in a cache?
		var $queries_results;					//collecting queries - what fun!
		var $last_query;							//last query must be outside the $queries_results also
		var $raw_start;
		var $raw_end;
		var $errors;

		
		/* constructor */
		function database($host,$user,$pass,$database)
		{

			$this->connect($host,$user,$pass,$database);
			$this->num_queries = '';
			$this->raw_start = '<<[asdf';
			$this->raw_end = 'ggj]>>';
		}
		
		/* connect */
		function connect($host,$user,$pass,$database)
		{
			$this->connection = mysql_connect($host,$user,$pass,true) or $this->handle_error('cannot connect to database');
			mysql_select_db($database,$this->connection) or $this->handle_error('cannot find requested database');
		}

		function runquery($query) {
			$sql = mysql_query($query);
			return $sql;

		}
		
		/* disconnect */
		function disconnect()
		{
			mysql_close($this->connection);
		}
		
		/* handles all errors */
		function handle_error($message)
		{
			global $WEBSITE_IS_LIVE;
			if(!$WEBSITE_IS_LIVE)
			{
				die($message);
			}
			else
			{
				$handle = fopen('db.log','a+');
				fwrite($handle,'['.date('n/j/Y G:i:s').']['.$_SERVER['REQUEST_URI'].']['.$message.']'.($_POST ? '['.serialize($_POST).']' : '')."\n");
				fclose($handle);
			}
		}
		
		/* returns an id */
		function get_id($table,$id_field)
		{
			return $_GET['id'] ? $_GET['id'] : $this->get_insert_id($this->i($table,array($id_field=>'')));
		}
		
		/* prepares a table */
		function prep_table($array,$excludes = array())
		{
			$excludes = $this->rsplat($excludes);
            
			array_push($excludes,'submit_x','submit_y','submit');
			$return = array();
			foreach($array as $key=>$value)
			{
				if(!in_array($key,$excludes))
				{
					$return[$key] = $value;
				}
			}
			return $return;
		}
		
		
		/* do a raw, unhelped query */
		function query($query,$cache,$buffered)
		{
			if($query)
			{
				if($buffered)
				{
					if(!is_resource($this->queries_results[$query]) || !$cache)
					{
						$this->queries_results[$query] = mysql_query($query,$this->connection) or $this->handle_error('cannot complete query :: '.$query.' :: Error # '.mysql_errno().' - '.mysql_error());
					}
					else
					{
						//echo '[Coming from the cache] ';
					}
					$this->last_query = $query;
				}
				else
				{
					mysql_unbuffered_query($query) or $this->handle_error('cannot complete unbuffered query :: '.$query);
				}
			}
		}
		
		/* returns a result, either from a query or a the last result */
		function get_result($query = '')
		{
			$this->q($query);
			return $this->queries_results[$this->last_query];
		}
		
		/* returns the number of affected rows in the last query */
		function get_num_affected($query = '')
		{
			$this->q($query);
			return @mysql_affected_rows();
		}
		
		/* returns the last insert id */
		function get_insert_id($query = '')
		{
			$this->q($query);
			return @mysql_insert_id();
		}
		
		/* returns the number of rows in a query */
		function get_num_rows($query_or_resource = '')
		{
			return @mysql_num_rows(is_resource($query_or_resource) ? $query_or_resource : $this->get_result($query));
		}
		
		/* cleans an input string */
		function clean_field($input)
		{
			return @mysql_escape_string(stripslashes($input));
		}
		
		/* experimental :: allows us to save key=>values */
		function save($key,$value)
		{
			$this->saves[$key] = $value;
		}
		
		/* gets any var we have */
		function get($var)
		{
			return $this->$var;
		}
		
		/* sets any var we have */
		function set($var,$value)
		{
			$this->$var = $value;
		}
		
		/* clears the query cache */
		function clear_cache()
		{
			$this->queries_results = array();
		}
		
		/** THESE ARE FOR ACTUAL QUERIES STATEMENT **/
		
		/* runs an update function */
		function update($table,$fields,$where,$limit,$buffered)
		{
			$query = 'UPDATE '.$table.' SET ';
			foreach($fields as $column=>$value)
			{
				$query.= $column.' = '.$this->parse_value($value).',';
			}
			$query = substr($query,0,-1).($where ? ' WHERE '.$this->splat_where($where) : '');
			if((int)$limit)
			{
				$query.= ' LIMIT '.$limit;
			}
			$this->q($query,0,$buffered);
		}
		
		/* runs an insert function */
		function insert($table,$fields,$buffered)
		{
			foreach($fields as $column=>$value)
			{
				$columns[] = $column;
				$values[] = $this->parse_value($value);
			}
			$query = 'INSERT INTO '.$table.'('.implode(',',$columns).') VALUES ('.implode(',',$values).')';
			
			$this->q($query,0,$buffered);
		}
		
		/* deletes rows from a db */
		function delete($table,$where,$limit,$buffered)
		{
			$query = 'DELETE FROM '.$table.' WHERE '.$this->splat_where($where).($limit ? ' LIMIT '.$limit : '');
			$this->q($query,0,$buffered);
		}
		
		/* select rows from a db */
		function select($fields,$from,$where,$order,$limit,$cache,$buffered)
		{
			$query = 'SELECT '.$this->splat($fields).' FROM '.$from.($where ? ' WHERE '.$this->splat_where($where) : '').($order ? ' ORDER BY '.$order : '').($limit ? ' LIMIT '.$limit : '');
			$this->q($query, $cache, $buffered);
		}
		
		/* gets one specific row from the db */
		function get_row($table,$where)
		{
			$query = 'SELECT * FROM '.$table.' WHERE '.$this->splat_where($where).' LIMIT 1';
			$this->q($query,1,1);
			return $this->queries_results[$query];
		}
		
		/* optimizes all tables in the DB */
		function optimize()
		{
			while($row = mysql_fetch_row($this->get_result('SHOW TABLES')))
			{
				$this->q('OPTIMIZE TABLE '.$row[0].'');
			}
		}
		
		/* parses a given value -- decides how to format it */
		function parse_value($value)
		{
			if(substr($value,0,strlen($this->raw_start)) == $this->raw_start && substr($value,strlen($value)-strlen($this->raw_end),strlen($this->raw_start)) == $this->raw_end)
			{
				return substr($value,strlen($this->raw_start),-strlen($this->raw_end));
			}
			else
			{
				return '\''.$this->c($value).'\'';
			}
		}
		
		/* if it's not an array, we make it one and comma separate it */
		function splat($value,$sep = ',')
		{
			return (is_array($value) ? implode($sep.' ',$value) : $value);
		}
		
		/* parses the hell that is the WHERE clause */
		function splat_where($value,$sep = ' AND ',$nested=0)
		{
			if(!is_array($value))
			{
				$return = ltrim(ltrim($value,'WHERE'),'where');
			}
			else
			{
				$counter = 0;
				foreach($value as $key=>$val)
				{
					if(!is_array($val))
					{
						$return.= $key.' = '.$this->parse_value($val).$sep;
					}
					else
					{
						$return.= $this->splat_where($val,$sep,1);
					}
					$counter++;
				}
				if($counter == count($value) && !$nested) { $return = rtrim($return,$sep); }
			}
			return $return;
		}
		
		/* lets the parse_value field know NOT to put quotes on it */
		function raw($value)
		{
			return $this->raw_start.$value.$this->raw_end;
		}
		/* if it's not an array, we make it one and comma separate it */
		function rsplat($value,$sep = ',')
		{
			return (is_array($value) ? $value : array($value));
		}
		
		
		/** SHORTCUTS FOR ABOVE FUNCTIONS **/
		
		/* shortcut for query() */
		function q($query = '',$cache=1,$buffered = 1)
		{
			if($query)
			{
				$this->query($query,(int)$cache,(int)$buffered);
			}
		}
		
		/* shortcut for clean_field() */
		function c($input='')
		{
			if($input)
			{
				return $this->clean_field($input);
			}
		}
		
		/* shortcut for update() */
		function u($table,$fields,$where,$limit = '',$buffered = 1)
		{
			$this->update($table,$fields,$where,$limit,$buffered);
		}
		
		/* shortcut for insert() */
		function i($table,$fields,$buffered = 1)
		{
			$this->insert($table,$fields,$buffered);
		}
		
		/* shortcut for delete() */
		function d($table,$where,$limit = '',$buffered = 1)
		{
			$this->delete($table,$where,$limit,$buffered);
		}
		
		/* shortcut for select() */
		function s($fields,$from,$where = '',$order = '',$limit = '',$cache = 1, $buffered = 1)
		{
			$this->select($fields,$from,$where,$order,$limit,$cache,$buffered);
		}
		
		/* does bulk queries */
		function b($queries)
		{
			$qs = is_array($queries) ? $queries : array($queries);
			foreach($qs as $q)
			{
				$this->q($q);
			}
		}
		
		
		
		
		/** the ugly **/
		/* dump out the columns and values */
		function dump($result = '',$query = '')
		{
			if(!is_resource($result)) { $result = $this->get_result(); }
			
			//echo out the stylesheet first
			$return = '<style type="text/css">
						.db-dump-h2		 { font-family:tahoma; font-size:14px; font-weight:bold; }
						.db-dump-table	 { width:90%; }
						.db-dump-table th, .db-dump-table td	{ font-family:tahoma,arial,courier; padding:5px; text-align:left; }
						.db-dump-table th	{ background:#eee; font-size:14px; font-weight:bold; border-bottom:1px solid #999; }
						.db-dump-table td	{ font-size:12px; border-bottom:1px solid #ccc; }
						.db-dump-table tr:hover { background:lightblue; }
					</style>';
			
			$return.= ($query ? '<h2 class="db-dump-h2">'.$query.'</h2>' : '').'<table class="db-dump-table" cellpadding="0" cellspacing="0">';
			if($this->get_num_rows($result))
			{
				$counter = 0;
				while($row = mysql_fetch_assoc($result))
				{
					$counter++;
					foreach($row as $key=>$value) 
					{ 
						$keys[] = $key; 
					}
					$values[] = $row;
				}
				
				$keys = array_unique($keys);
				
				$return.= '<tr>';
				$return.= '<th>#</th>';
				foreach($keys as $key) 
				{
					$return.= '<th align="left">'.$key.'</th>';
				}
				$return.= '</tr>';
				$counter = 0;
				foreach($values as $value)
				{
					$return.= '<tr>';
					$return.= '<td>'.($counter++ + 1).'</td>';
					foreach($value as $valux)
					{
						$return.= '<td>'.$valux.'</td>';
					}
					$return.= '</tr>';
				}
			}
			else
			{
				$return.= '<tr><td>No rows were returned</td></tr>';
			}
			$return.= '</table>';
			return $return;
		}
		
		/* backup the db OR just a table */
		function backup_tables($tables = '*',$where)
		{
			//get all of the tables
			if($tables == '*')
			{
				$tables = array();
				$resultx = $this->get_result($this->q('SHOW TABLES'));
				while($row = mysql_fetch_row($resultx))
				{
					$tables[] = $row[0];
				}
			}
			else
			{
				$tables = is_array($tables) ? $tables : explode(',',$tables);
			}
			
			//cycle through
			foreach($tables as $table)
			{
				$num_fields = mysql_num_fields($this->get_result($this->s('*',$table)));
				for ($i = 0; $i < $this->get_num_rows(); $i++) 
				{
					$result1 = $this->get_result();
					$result.= 'DROP TABLE '.$table.';';
					
					$row2 = mysql_fetch_row($this->get_result($this->q('SHOW CREATE TABLE '.$table)));
					$result.= "\n\n".$row2[1].";\n\n";
					
					while($row = mysql_fetch_row($result1))
					{
						$result.= 'INSERT INTO '.$table.' VALUES(';
						for($j=0; $j<$num_fields; $j++) 
						{
							$row[$j] = addslashes($row[$j]);
							$row[$j] = ereg_replace("\n","\\n",$row[$j]);
							if (isset($row[$j])) { $result.= "\"$row[$j]\"" ; } else { $result.= "\"\""; }
							if ($j<($num_fields-1)) { $result.= ','; }
						}
						$result.= ");\n";
					}
				}
				$result.="\n\n\n";
			}
			
			//save file
			$handle = fopen($where.'db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+') or $this->handle_error('cannot create backup file');
			fwrite($handle,$result);
			fclose($handle);
		}
		

		//end of class

	}



?>