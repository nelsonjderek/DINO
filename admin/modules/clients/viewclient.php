<?php
		

		include('classes/clientspage.php');
		


		$M_database = new Database($SYSM_HOST,$SYSM_USER,$SYSM_PASS,$SYSM_DATABASE);
	

		$home = new Page();
		$html = new HTML();
		$form = new BuildForm();

		
		

		$M_database->connect($SYSM_HOST,$SYSM_USER,$SYSM_PASS,$SYSM_DATABASE);

		$query = 'SELECT * FROM LA_clients WHERE client_id ='.$_GET['clid'];
		

		$result = $M_database->runquery($query);
		
		while ($row = mysql_fetch_assoc($result)) {
		    echo '<div>
		    <a href="?p=clients/editclient.php&clid='.$row['client_id'].'"><h3 style="border-bottom:solid;">'.$row['b_name'].'</h3></a>
		    <p><h3>Contact Info:</h3><br />
		    <b>First Name:</b> '.$row['f_name'].'<b>Last Name:</b> '.$row['l_name'].'<b>First Name:</b> '.$row['email'].'<b>Phone</b> '.$row['p_phone'].'-'.$row['m_phone'].'-'.$row['e_phone'].'<br /><br />
		    <b>Address:</b> '.$row['address'].'<b>City:</b> '.$row['city'].'<b>Zip</b> '.$row['zip'];

		    echo '</div>';
		   
		}

		mysql_free_result($result);


		$home->SetContent('<br /><h3>Website Info</h3>');
		$home->Display();

		$query = 'SELECT * FROM LA_website WHERE client_id ='.$_GET['clid'];
		

		$result = $M_database->runquery($query);

		while ($row = mysql_fetch_assoc($result)) {
		    echo '<div>
		    <h3 style="border-bottom:solid;">'.$row['domain_name'].'</h3>
		    <p><h3>Site Info:</h3><br />
		    <b>Domain Provider</b> '.$row['domain_provider'].'<b>Provider Site</b> '.$row['provider_site'].'<b>Provider Username</b> '.$row['provider_user'].'<b>Provider Password</b> '.$row['provider_pass'].'<br /><br />
		    <b>FTP Host</b> '.$row['ftp_host'].'<b>FTP Username</b> '.$row['ftp_user'].'<b>FTP Password</b> '.$row['ftp_pass'].'<b>Notes</b> '.$row['notes'];

		    echo '</div>';
		   
		}
		

		mysql_free_result($result);

		

		

?>