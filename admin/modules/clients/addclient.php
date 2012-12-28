<?php
		

		include('classes/clientspage.php');
		


		
	

		$home = new Page();
		$html = new HTML();
		$form = new BuildForm();

		
if (isset($_POST['addclient'])) {
            

		 $messenger->set('Client Added');

		 $cfields = array(
		 	'f_name' => $_POST['fname'],
		 	'l_name' =>	$_POST['lname'],
		 	'b_name' =>	$_POST['bname'],
		 	'address' => $_POST['address'],
		 	'city' => $_POST['city'],
		 	'zip' => $_POST['zip'],
		 	'p_phone' => $_POST['p_phone'],
		 	'm_phone' => $_POST['m_phone'],
		 	'e_phone' => $_POST['e_phone'],
		 	'email' => $_POST['email'],    
		 	);

		 
	
				 $M_database->insert('LA_clients',$cfields,$buffered);
				 
				 $lfields = array(
			'id' => $M_database->get_insert_id(),	 	
		 	'user' => $_POST['user'],
		 	'pass' =>	$_POST['pass'],
		 	'domain' =>	$_POST['domain'],    
		 	);
				 $M_database->insert('LC_login',$lfields,$buffered);
	
		 unset($_POST);


        }
		
		$home->SetContent('<h1>Add Client</h1>'); 
		$home->SetContent('<h3>Basic Info</h3>');

		$home->Display();
		$form->esf($method = 'post',$action = 'index.php?p=clients/addclient.php',$name = 'addclient',$class,$id);
		$form->etf('First Name','fname',$_POST['fname'],$class);
		$form->etf('Last Name','lname',$value,$class);
		$form->etf('Business Name','bname',$value,$class);	
		$form->etf('Phone','phone',$value,$class);
		$form->etf('Address','address',$value,$class);
		$form->etf('City','city',$value,$class);
		$form->etf('Zip','zip',$value,$class);
		echo '<div class="clear"></div><h3>Login Information</h3>';
		$form->etf('Username','user',$value,$class);
		$form->etf('Password','pass',$value,$class);
		$form->etf('domain','domain',$value,$class);
		echo '<div class="clear"></div>';
		echo '<div class="clear"></div><h3>Website Information</h3>';
		$form->etf('Domain Name','d_name',$row['domain_name'],$class);
			$form->etf('Domain Provider','d_provider',$row['domain_provider'],$class);
			$form->etf('Provider Site','p_site',$row['provider_site'],$class);
			$form->etf('Provider User','p_user',$row['provider_user'],$class);
			$form->etf('Provider Pass','p_pass',$row['provider_pass'],$class);
			$form->etf('FTP Host','ftp_host',$row['ftp_host'],$class);
			$form->etf('FTP User','ftp_user',$row['ftp_user'],$class);
			$form->etf('FTP Pass','ftp_pass',$row['ftp_pass'],$class);
			$form->eta('Notes','notes',$row['notes'],$class);
			echo '<div class="clear"></div>';
		$form->ehidden('addclient','yes',$class);
		$form->ebutton('addclient','submit','Add Client','addclient',$class);



		$form->eef();




		

		

?>