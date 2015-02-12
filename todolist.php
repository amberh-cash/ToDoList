<?php
	/*
	Mengyuan Huang
	cse154 AJ
	#HW5
	this page will shows the user's to-do list and let them add/delete items from the list.
	*/
	session_start(); /* for the site to remember user's information */
	if(!isset($_SESSION["currentUser"])){ /*if user open todolist page but isn't logged in, it will redirect to start.php*/
		header("Location: start.php");
		die();
	}	
	$name = $_SESSION["currentUser"];
	include("common.php");/* use code from common.php for the top */
?>

		<div id="main">
			<h2><?= $name?>'s To-Do List</h2>

			<ul id="todolist">
				<?php  /* print out the items stored in the user's .txt file if the .txt file exists */
				if(file_exists("todo_$name.txt")){
					$lines = file("todo_$name.txt");
					$count = 0;
				foreach($lines as $line){?>
				<li>
					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="delete" />
						<input type="hidden" name="index" value="<?= $count?>" />
						<input type="submit" value="Delete" />
					</form>
					<?=htmlspecialchars($line) ?>
				</li>	
				<?php	
					$count++;
					} 
				 } ?>
				<li>
					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="add" />
						<input name="item" type="text" size="25" autofocus="autofocus" />
						<input type="submit" value="Add" />
					</form>
				</li>
			</ul>

			<div>
				<a href="logout.php"><strong>Log Out</strong></a>
				<?php if(isset($_COOKIE["date"])){ /* show the time when user logged in */?>
					<em>(logged in since <?=$_COOKIE["date"] ?>)</em>
				<?php }?>

			</div>
		</div>

<?php bottom(); /* use code from common.php for bottom of the page */ ?>