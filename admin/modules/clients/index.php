<?php
		

		include('classes/clientspage.php');
		


		$M_database = new Database($SYSM_HOST,$SYSM_USER,$SYSM_PASS,$SYSM_DATABASE);
	

		$home = new Page();
		$html = new HTML();

		
		$home->SetContent('<h1>Clients</h1>'); 
		echo $html->Abutton('?p=clients/addclient.php','Add Client');

		$home->Display();

		$M_database->connect($SYSM_HOST,$SYSM_USER,$SYSM_PASS,$SYSM_DATABASE);

		$query = 'SELECT * FROM LA_clients';
		

		$result = $M_database->runquery($query);
		
		while ($row = mysql_fetch_assoc($result)) {
		    echo '<div>
		    <h3 >'.$row['b_name'].'</h3>';
	
		    echo $html->Abutton('?p=clients/viewclient.php&clid='.$row['client_id'].'','View Client');

		    echo '</div>';
		   
		}

		mysql_free_result($result);



		

		

?>