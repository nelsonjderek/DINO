<?php
class messenger
	{
		/* constructor */
		function messenger() {  }
		
		/* set the message */
		function set($message)
		{
			$_SESSION['messenger']['message'] = $message;
		}
		
		/* get the message */
		function get()
		{
			return $_SESSION['messenger']['message'];
		}
		
		/* print the message */
		function output()
		{
			if($_SESSION['messenger']['message'])
			{
				$mess = $_SESSION['messenger']['message'];
				$this->clear();
				echo '<script> 
						$("#messenger").html("'.$mess.'");
					</script>';
				
			}
		}
		
		/* clear the events */
		function clear()
		{
			unset($_SESSION['messenger']['message']);
		}
		
	}

	
?>