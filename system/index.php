<?php @include('config.php'); ?>
<?php include_once('functions.php'); ?>
<?php
	
	if ($_GET['f'] == 'logout'){
		unset($_SESSION['admin']);
	}
	if ($_GET['p']){
		$_SESSION['admin']['page'] = $_GET['p'];
	}
	

	if (!isset($_SESSION['admin']['username'])) {
		
		$_SESSION['admin']['page'] = 'login'; 
		if (isset($_POST['login1'])) {
			
				

				if ($_POST['username'] && $_POST['password']) {
					$username = $_POST['username'];
					$password = $_POST['password'];
					$sql = mysql_query("SELECT username, password, log_number, site_domain FROM user_log_in WHERE username= '$username' && password= '$password' ");
					$get = mysql_fetch_assoc($sql);
					
					if ($get) {
					$_SESSION['admin']['username'] = $username;
					$_SESSION['admin']['page'] = 'home';
					header('Location: index.php');
					
					}else{

					$_SESSION['admin']['message'] = 'Incorrect Username or Password';
					}
				} elseif (!$_POST['username']) {
					$_SESSION['admin']['message'] = 'Please Enter Username';
				} elseif (!$_POST['password']) {
					$_SESSION['admin']['message'] = 'Please Enter Password';
				}
				
				
				
			
			
			}

	}

get_includes();
	


 $messenger = new messenger();

?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Home</title>
<?php echo $SYS_HEAD; ?>
<script>

$(document).ready(function() {
						   

$("#login_submit").live("click", function() {
					$("#login_form").submit();
												 });


	
$('#messenger').delay(3000).fadeOut(600);
																	   


 });

</script>
<style type="text/css">
	

<!--
#login_box {
	background-color: rgba(255,255,255,1);
	height: 180px;
	width: 580px;
	margin-top: 200px;
	margin-right: auto;
	margin-left: auto;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	padding: 10px;
	border: solid 15px rgba(0,0,0,1);
	-moz-box-shadow: 0px 5px 10px rgba(0,0,0,0.3);
	-webkit-box-shadow: 0px 5px 10px rgba(0,0,0,0.3);
}
.login_text {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 16px;
	margin-left: 25px;
}
.login_bttn {
	background-color:#333333;
	color:rgb(255,255,255);
}
-->
</style>

</head>

<body>
	

<div id="container">

<?php if ($_SESSION['admin']['page'] != 'login') { ?>
<? include("header.php"); ?>

<div id="main">
	<?php  echo $messenger->output(); ?>
    <?php include_once('modules/'.$_SESSION['admin']['page'].'.php');?>



		



</div>

<?php include("footer.php"); ?>
<?php }else { 

include_once('modules/'.$_SESSION['admin']['page'].'.php');

}
?>


</div>



</body>

</html>