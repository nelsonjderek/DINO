<?php
session_start();
if (!isset($_SESSION['master']['username'])) { 

	header('Location: login');
};



//Global Database Variables 







//Shop Info

$paypal_link = 'https://www.paypal.com/cgi-bin/webscr';
$paypal_biz = 'tmp@sonaarr.com';
$checkout_bttn_name = '';



	
$SYS_HEAD = '
';	
	









?>