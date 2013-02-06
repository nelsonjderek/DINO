<html>
<head>
	<title><?php echo $title ?> - CodeIgniter 2 Tutorial</title>

<link href="http://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet" type="text/css">
<link href="assets/styles/main.css" rel="stylesheet" type="text/css" />
<link href="assets/styles/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="assets/styles/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


</head>
<body>
	




<div id="container" class="login-container">
<a href="http://localhost:8888/DINO/home"><div id="login-logo"><img src="http://localhost:8888/DINO/assets/images/dino/images/logo.png" /></div></a>
				<div>&nbsp;</div>
					
	
<div style="width:400px !important;margin:0 auto 0 auto;text-align:center; color:#bf0000;"><strong><?php echo validation_errors(); ?></strong></div>
<div class="login-box well" >
<h2 class="login-box-heading">Logan - Your Friend</h2>
<?php echo form_open('') ?>



        
        <input type="text" class="input-block-level" name="username" placeholder="Username">
        <input type="password" name="password" class="input-block-level" placeholder="Password">
        <input type="hidden" name="login1" value="yes" />
        <button class="btn btn-large btn-inverse btn-primary pull-right" style="margin:10px 0 0 0;" id="login_submit" type="submit">Sign in</button>
        <div class="clear"></div>
      </form> 


  </div>





  </div>

     
</body>
</html>
