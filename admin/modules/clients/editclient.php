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
		    <h3 style="border-bottom:solid;">'.$row['b_name'].'</h3>
		    <p><h3>Contact Info:</h3><br /><div class="clear"></div>';
		   	$form->esf($method = 'post',$action = 'index.php?p=clients/addclient.php',$name = 'editclient',$class,$id);
			$form->etf('First Name','fname',$row['f_name'],$class);
			$form->etf('Last Name','lname',$row['l_name'],$class);
			$form->etf('Business Name','bname',$row['b_name'],$class);	
			$form->etf('Phone','phone',$value,$class);
			$form->etf('Email','email',$row['email'],$class);
			$form->etf('Address','address',$row['address'],$class);
			$form->etf('City','city',$row['city'],$class);
			$form->etf('Zip','zip',$row['zip'],$class);
			echo '<div class="clear"></div><h3>Login Information</h3>';
			$form->etf('Username','user',$value,$class);
			$form->etf('Password','pass',$value,$class);
			$form->etf('domain','domain',$value,$class);
			
			
			
			



		
		   	
		   
		}

		mysql_free_result($result);


		

		$query = 'SELECT * FROM LA_website WHERE client_id ='.$_GET['clid'];
		

		$result = $M_database->runquery($query);
		echo '<div class="clear"></div><h3>Website Information</h3>';
		while ($row = mysql_fetch_assoc($result)) {
		    $form->etf('Domain Name','d_name',$row['domain_name'],$class);
			$form->etf('Domain Provider','d_provider',$row['domain_provider'],$class);
			$form->etf('Provider Site','p_site',$row['provider_site'],$class);
			$form->etf('Provider User','p_user',$row['provider_user'],$class);
			$form->etf('Provider Pass','p_pass',$row['provider_pass'],$class);
			$form->etf('FTP Host','ftp_host',$row['ftp_host'],$class);
			$form->etf('FTP User','ftp_user',$row['ftp_user'],$class);
			$form->etf('FTP Pass','ftp_pass',$row['ftp_pass'],$class);
			$form->eta('Notes','notes',$row['notes'],$class);
		   
		}
		
		echo '<div class="clear"></div>';
			
			$form->ehidden('editclient','yes',$class);
			$form->ebutton('editclient','submit','Update Client','editclient',$class);
			$form->eef();


		mysql_free_result($result);

		

		

?>