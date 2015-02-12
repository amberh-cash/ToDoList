<?php /*
	Mengyuan Huang 
	cse154 AJ
	#HW5
	this page is for user login or register.
	*/
	 include("common.php"); /* use code from common.php for top of the page. */?>
		<div id="main">
			<p>
				The best way to manage your tasks. <br />
				Never forget the cow (or anything else) again!
			</p>

			<p>
				Log in now to manage your to-do list. <br />
				If you do not have an account, one will be created for you.
			</p>

			<form id="loginform" action="login.php" method="post">
				<div><input name="name" type="text" size="8" autofocus="autofocus" /> <strong>User Name</strong></div>
				<div><input name="password" type="password" size="8" /> <strong>Password</strong></div>
				<div><input type="submit" value="Log in" /></div>
			</form>

			<p>
				<?php if(isset($_COOKIE["date"])){  /* record the last login time */?>
					<em>(last login from this computer was <?=$_COOKIE["date"] ?>)</em>
				<?php }?>
			</p>
		</div>
<?php bottom(); /* use code from common.php for bottom of the page*/?>
