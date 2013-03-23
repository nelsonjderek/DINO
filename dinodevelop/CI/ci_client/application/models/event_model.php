<?php
class Event_model extends CI_Model {

	
	public function logevent($event) {

		$query = $this->db->query('INSERT INTO LA_events (event,user) VALUES ("'.$event.'","'.$this->session->userdata('userid').'")');
		

	}

	public function get_user_events ($user) {

		$query = $this->db->query('INSERT INTO LA_events (event,user) VALUES ("'.$event.'","'.$this->session->userdata('userid').'")');
		

	}

	public function get_users($group) {

		$return = array();
		$query = $this->db->query('SELECT * FROM LA_user WHERE group_id = "'.$group.'"');
		foreach ($query->result() as $row)
			{
				$id = $row->id;
				$return[$id]['f_name'] = $row->f_name;
				$return[$id]['user'] = $row->user;

				$query2 = $this->db->query('SELECT * FROM LA_events WHERE user = "'.$id.'" ORDER BY timestamp DESC');
			   		foreach ($query2->result() as $row2)
						{
						
						   $return[$id]['events'][$row2->event_id] = array($row2->event,$row2->timestamp);
						   
						}
			   
			}

			return $return;
		

	}

	
		
		




	
	
	
	


}


?>