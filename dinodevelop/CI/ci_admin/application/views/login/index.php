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
	<div id="header">


</div>





<div id="container">
				
					
			
<div style="width:400px !important;margin: 100px auto 0 auto;text-align:center; color:#bf0000;"><strong><?php echo validation_errors(); ?></strong></div>
<div class="form-signin" style="width:400px !important;" id="login_form" name="login">
<h2 class="form-signin-heading">Logan - Your Friend</h2>
<?php echo form_open('') ?>



        
        <input type="text" class="input-block-level" name="username" placeholder="Username">
        <input type="password" name="password" class="input-block-level" placeholder="Password">
        <input type="hidden" name="login1" value="yes" />
        <button class="btn btn-large btn-primary" id="login_submit" type="submit">Sign in</button>
      </form> </div></div>

     
</body>
</html>
