<html>
<head>
	<title><?php echo $title ?> - Dino Development</title>

<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<link href="assets/styles/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="assets/styles/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="assets/styles/main.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="assets/javascript/bootstrap.js"></script>


</head>
<body>
	<div id="header">

<div id="header_nav">
			<div style="margin:0 30px 0 30px;">
				<a href="home" class="pull-left">Dino Development</a>

				<a class="btn btn-inverse btn-primary pull-right" style="color:#ffffff !important;" href="login/logout"><strong>Log Out</strong></a><span class="pull-right"> Hello <?php echo $this->session->userdata('usernamename'); ?>!&nbsp;&nbsp;&nbsp;&nbsp;</span>
			</div>	

</div>
</div>


	<div id="main">
    <div id="content">
	