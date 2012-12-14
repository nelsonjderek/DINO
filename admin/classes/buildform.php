<?php
	class BuildForm
	{

		function CreateForm($fields,$method,$action,$name,$class,$id)
		{
			$content = '<form method="" action="" name="" class="" id="" >';

			$content .= $fields;

			$content .= '</form>';

			return $content;

		}


		function CreateTextField($name,$value,$class)
		{
			$field = '<input type="text" name="" value="" class="" />';

			return $field;

		}

		function CreateTextArea($name,$value,$class)
		{
			$field = '<textarea type="text" name="" class="" value="" ></textarea>';

			return $field;

		}



	}


?>