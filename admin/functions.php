<?php

        function get_module($mod) {
            echo 'modules/'.$mod.'/index.php';
            include_once('modules/'.$mod.'/index.php');
            
        }

        function get_includes() {
            include_once('classes/html.php');
            include_once('classes/buildform.php');
        	include_once('classes/messenger.php');
            include_once('classes/database.php');
            
        }
        function redirect()
        {
        header('Location: index.php'); exit();
        }

        



?>