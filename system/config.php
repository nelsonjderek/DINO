<?php
session_start();
	/* website state */


//$link = mysql_connect('sonaarrcom.ipagemysql.com', 'user_1_318', 'ross_318');
$link = mysql_connect('localhost', 'root', 'root') or die(mysql_error());
mysql_select_db('logan',$link) or die(mysql_error());


/*$link = mysql_connect('sonaarrcom.ipagemysql.com', 'user_1_318', 'ross_318'); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 

mysql_select_db(utlia_portal318); 
*/




//Shop Info

$paypal_link = 'https://www.paypal.com/cgi-bin/webscr';
$paypal_biz = 'tmp@sonaarr.com';
$checkout_bttn_name = '';



	
$SYS_HEAD = '
<link href="http://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet" type="text/css">
<link href="styles/main.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="codefiles/jquery.color.js"></script>';	
	









?>