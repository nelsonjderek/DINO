<html>
<head>
	<title><?php echo $title ?></title>

<link href='http://fonts.googleapis.com/css?family=Nothing+You+Could+Do' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

<link href="<?php echo $base_url; ?>assets/styles/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url; ?>assets/styles/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url; ?>assets/styles/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js" type="text/javascript"></script>
<script src="http://bitstorm.org/jquery/color-animation/jquery.animate-colors.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.js" type="text/javascript"></script>
<?php /*<script>
var image1=new Image()
image1.src="Images/Ads/cloudblue.jpg"
var image2=new Image()
image2.src="Images/Ads/cms.jpg"
var image3=new Image()
image3.src="Images/Ads/facebook.jpg"
$(document).ready(function() {
               

function animatecolor2(object,color,int) {

    $(object).stop();
    $(object).animate({backgroundColor: color, opacity: int});           
  
                  
  
};


  
$("#main-nav").live("mouseenter", function() {
        animatecolor2(this,"#FFF",1);
                           });
$("#main-nav").live("mouseleave", function() {
        animatecolor2(this,"transparent",0.3);
                           });
                           
                           

               
               
               
               


 });

</script>*/ ?>
<script>
 $(document).ready(function() { 

 spectrum();  
  
 function spectrum(){  
    var hue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';  
    $('#logo').animate( { backgroundColor: hue }, 5000);  
    $('.banner-image img').animate( { borderColor: hue }, 5000); 

    $('.border-change-right').animate( { borderColor: hue }, 5000);  

    $('.border-change-left').animate( { borderColor: hue }, 5000);  

    $('.border-change-top').animate( { borderColor: hue }, 5000);  

    $('.border-change-bottom').animate( { borderColor: hue }, 5000);  
    spectrum();  
 }  



});  
</script>


</head>
<body>
	

  <div id="main-nav">
    <ul>
      <a href="<?php echo $base_url; ?>home"><li id="logo"><img src="<?php echo $base_url; ?>assets/images/dino/images/logo.png" /></li></a>
      
    </ul>


  </div>

	<div id="main">
    <div class="clear"></div>
    <div id="main-container">
     <div id="main-top-nav" class="">
      <ul>
 `     <a href="<?php echo $base_url; ?>development"><li>Development</li></a>
      <a href="<?php echo $base_url; ?>work"><li>Briefcase</li></a>
      <a href="<?php echo $base_url; ?>about"><li>History</li></a>
      <a href="<?php echo $base_url; ?>contact"><li>Telegram</li></a>
      <a href="<?php echo $base_url; ?>dinodevelop/CI/ci_client/"><li id="login" ><img src="<?php echo $base_url; ?>assets/images/dino/images/l.png" /></li></a>
    </ul>
    <div class="clear"></div>
</div>
	