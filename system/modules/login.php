<?php 


echo '<div id="container">
					<div id="login_box" class="roundedtopbttm3px shadow1">
					<div style="color: #E00; font-size:14px; text-align:center; height: 20px; margin-top:-15px;">'.$_SESSION['admin']['message'].'</div>
					
					<form action="" method="post" id="login_form" name="login">
					<div style="text-align:center; margin-top:10px;">
					<input type="text" name="username" placeholder="Enter Username" class="login_text" />
					<input type="password" name="password" placeholder="Enter Password" class="login_text"/>
					<input type="hidden" name="login1" value="yes" />
					</div>
					<div style=" margin-left:430px; margin-top:25px;"> <div id="login_submit"class="button_standard shadow1 login_bttn">Login </div> </div>
					
					</form>
					</div>
					
					</div>';

					?>