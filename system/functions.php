<?php

        function get_module($mod) {
           include_once('modules/'.$mod.'.php');

 
        }

        function get_includes() {
        	include_once('classes/messenger.php');


        }
        function redirect()
		{
		header('Location: index.php'); exit();
		}



?>