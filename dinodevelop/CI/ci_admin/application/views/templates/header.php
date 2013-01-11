<html>
<head>
	<title><?php echo $title ?> - CodeIgniter 2 Tutorial</title>

<link href="http://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet" type="text/css">
<link href="assets/styles/main.css" rel="stylesheet" type="text/css" />
<link href="assets/styles/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="assets/styles/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="assets/javascript/bootstrap.js"></script>


</head>
<body>
	<div id="header">

<div id="header_nav">
			<div style="margin:0 30px 0 30px;">
				<a href="page/home" class="pull-left">Dino Developemnent Admin</a>

				<a class="btn pull-right" href="login/logout">Log Out</a>
			</div>	

</div>
</div>
<div id="side-main-nav">

<div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Dashboard
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse">
      <div class="accordion-inner">
       <ul>
			<li><a href="home">Home</a></li>
			<li>Site Statistics</li>
			<li>Contact Requests</li>
		</ul>
      </div>
    </div>
  </div>


  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse4">
        Clients
      </a>
    </div>
    <div id="collapse4" class="accordion-body collapse">
      <div class="accordion-inner">
       <ul>
			<li><a href="clients">View Clients</a></li>
			<li><a href="clients/add">Add Client</a></li>
		</ul>
      </div>
    </div>
  </div>

  


<div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Invoice 
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
       <ul>
			<li><a href="home">View Invoices</a></li>
			<li>Create Invoice</li>
			<li>Invoice History</li>
		</ul>
      </div>
    </div>
  </div>

<div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse5">
        Proposals
      </a>
    </div>
    <div id="collapse5" class="accordion-body collapse">
      <div class="accordion-inner">
       <ul>
			<li><a href="home">View Proposals</a></li>
			<li>New Proposal</li>
		</ul>
      </div>
    </div>
  </div>


  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
        Tickets
      </a>
    </div>
    <div id="collapseThree" class="accordion-body collapse">
      <div class="accordion-inner">
       <ul>
			<li><a href="home">View Tickets</a></li>
			<li>Create Ticket</li>
		</ul>
      </div>
    </div>
  </div>

   

  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse7">
        Rewards
      </a>
    </div>
    <div id="collapse7" class="accordion-body collapse">
      <div class="accordion-inner">
       <ul>
			<li><a href="home">Create Reward</a></li>
			
		</ul>
      </div>
    </div>
  </div>


</div>





<?php /*<ul class="nav nav-tabs nav-stacked" >

	<li><a href="#">Home</a>
		<ul>
			<li>Sub List</li>
			<li>sub2</li>
		</ul>

	
		
	</li>
	<li><a href="about">Clients</a></li>
	<li><a href="?p=tickets/index.php">Tickets</a></li>
	<li><a href="?p=billing/index.php">Projects</a></li>
	<li><a href="?p=billing/index.php">Contact</a></li>
	<li style="float:right;"><a href="login/logout" >Log Out</a></li>
</ul>*/ ?>
	</div> 
	<div id="main">
	