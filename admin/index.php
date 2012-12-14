<?php @include('config.php'); ?>
<?php include_once('functions.php'); ?>
<?php
	get_includes();
	if ($_GET['f'] == 'logout'){
		unset($_SESSION['master']);
	}
	if ($_GET['p']){
		$_SESSION['master']['page'] = $_GET['p'];
	}
	

	if (!isset($_SESSION['master']['username'])) {
		
		$_SESSION['master']['page'] = 'login/index.php'; 

		if (isset($_POST['login1'])) {

		$logincheck = new Database($SYSM_HOST,$SYSM_USER,$SYSM_PASS,$SYSM_DATABASE);	
			

				if ($_POST['username'] && $_POST['password']) {
					$username = $_POST['username'];
					$password = $_POST['password'];
					
					$sql = "SELECT user, pass FROM LA_user WHERE user= '$username' && pass= '$password' ";
					$result = $logincheck->runquery($sql);

					$get = mysql_fetch_assoc($result);
					
					if ($get) {
					$_SESSION['master']['username'] = $username;
					$_SESSION['master']['page'] = 'home/index.php';
					
					}else{

					$_SESSION['master']['message'] = 'Incorrect Username or Password';
					}
				} elseif (!$_POST['username']) {
					$_SESSION['master']['message'] = 'Please Enter Username';
				} elseif (!$_POST['password']) {
					$_SESSION['master']['message'] = 'Please Enter Password';
				}
				
				
				
			
			
			}

	}


	


 $messenger = new messenger();

?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Logan Master</title>
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

<?php if ($_SESSION['master']['page'] != 'login/index.php') { ?>
<? include("header.php"); ?>

<div id="main">
	<?php  echo $messenger->output(); ?>
    <?php include_once('modules/'.$_SESSION['master']['page']); ?>



		



</div>

<?php include("footer.php"); ?>
<?php }else { 

include_once('modules/'.$_SESSION['master']['page']);

}
?>


</div>



</body>

</html>