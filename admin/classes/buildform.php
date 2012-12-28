<?php
	class BuildForm
	{

		var $fields;
		var $content;
		var $displayval = 1;



		function CreateForm($method,$action,$name,$class,$id)
		{
			$this->content = '<form method="'.$method.'" action="'.$action.'" name="'.$name.'" class="'.$class.'" id="'.$id.'" >';
			$this->content .= $this->fields;
			$this->content .= '</form>';
			return $this->content;

		}

		function esf($method,$action,$name,$class,$id)
		{
			echo '<form method="'.$method.'" action="'.$action.'" name="'.$name.'" class="'.$class.'" id="'.$id.'" >';

		}
		function eef()
		{
			echo '</form>';
			

		}

		function display($value) {

			if ($this->display = 1) {
				$this->content .= $value;

			} else if ($this->display = 2) {

				return $value;

			}else {
				echo $value;
			}
		}

		function CreateTextField($label,$name,$value,$class)
		{
			$field = '<div style="float:left;margin:10px;" ><label>'.$label.'</label><input type="text" name="'.$name.'" value="'.$value.'" class="'.$class.'" /></div>';
			
			$this->fields .= $field;
		


		}

		//echo textfield
		function etf($label,$name,$value,$class)
		{
			$field = '<div style="float:left;margin:10px;" ><label>'.$label.'</label><input type="text" name="'.$name.'" value="'.$value.'" class="'.$class.'" /></div>';
			
			echo $field;
		}

	// echo hidden field
		function ehidden($name,$value,$class)
		{
			$field = '<input type="hidden" name="'.$name.'" value="'.$value.'" class="'.$class.'" />';
			echo $field;

		}
		// echo  button
		function ebutton($name,$type,$text,$value,$class)
		{
			$field = '<button type="'.$type.'" value="'.$value.'" class="'.$class.'">'.$text.'</button>';

			echo $field;

		}

		function CreateHidden($name,$value,$class)
		{
			$field = '<input type="hidden" name="'.$name.'" value="'.$value.'" class="'.$class.'" />';
			$this->fields .= $field;

		}

		function CreateTextArea($name,$value,$class)
		{
			$field = '<textarea type="text" name="" class="" value="" ></textarea>';

			return $field;

		}
		// echo textarea
		function eta($label,$name,$value,$class)
		{
			$field = '<div style="float:left;margin:10px;" ><label>'.$label.'</label><textarea type="text" name="" class="" value="" ></textarea></div>';

			echo $field;

		}

		

		function CreateButton($name,$type,$text,$value,$class)
		{
			$field = '<button type="'.$type.'" value="'.$value.'" class="'.$class.'">'.$text.'</button>';

			$this->fields .= $field;

		}
		function addHTML($html)
		{

			$this->fields .= $html;

		}




	}


?>