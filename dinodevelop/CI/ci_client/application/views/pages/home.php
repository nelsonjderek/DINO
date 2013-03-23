
<div class="row-fluid lilmar ">
<div class="span6 color-babyb hi300"><div class="wrap"><h1>Welcome</h1><p><strong>We invite you to join our new journey in the weeks and months to come as we transition our business model and implement our newly developed systems which will have much to offer you and your business.</strong>

All exsisting clients will have their websites upgraded to Wordpress CMS systems as a generous gift from us while we close access to our in house Utila systems. All new and exsisting clients as 2013 will be set up to manage their account with us on our new system Logan which you are currently logged in to. As new features become stable and are added to the system we will inform you on their features and use to you.</p></div></div>
<div class="span6 hi300" style="background:#fff;">
	<div class="wrap">
	<h1>Designs</h1>
	<small><em>Click a page to view the design.</em></small><br />
	<div style="margin:0 0 0 10px;">
	<a href="homepage" >Homepage</a><br />
	<a href="statement" >Statement/Sign up</a><br />
	<a href="regpage" >Regular Page</a><br />
</div>




</div></div>
</div>
<div class="clear"><br /><br /></div>

<div class="row-fluid lilmar ">
	<?php //echo $navigation; ?>

	<?php 
			if ($this->session->userdata('permission') == 2) {
				echo '<div class="span12" style="background:#fff;">
					<h3>&nbsp;&nbsp;User Activity</h3>';
				echo $events;
				echo '</div>';

			}
		?>
	
</div>





<?php $sex =1;/*<ul class="nav nav-tabs nav-stacked" >

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

