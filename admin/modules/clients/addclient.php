<?php
		

		include('classes/clientspage.php');
		


		$M_database = new Database($SYSM_HOST,$SYSM_USER,$SYSM_PASS,$SYSM_DATABASE);
	

		$home = new Page();
		$html = new HTML();
		$form = new BuildForm();

		
		$home->SetContent('<h1>Add Client</h1>'); 
		$home->SetContent('<h3>Basic Info</h3>');

		$home->Display();

		$form->CreateTextField();	



		echo $form->CreateForm();




		

		

?>