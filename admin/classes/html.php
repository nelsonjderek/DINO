<?php
	class HTML
	{
		function Abutton($link,$text,$class,$id,$java)
		{
			$button = '<a href="'.$link.'" class="'.$class.'" id="'.$id.'" '.$java.'>'.$text.'</a>';
			return $button;
		}




	}

?>