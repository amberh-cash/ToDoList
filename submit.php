<?php 
	/*
	Mengyuan Huang
	cse154 AJ
	#HW5
	this page is the target where todolist.php submits requests to add/delete items from the list.
	*/
	session_start();
	$name = $_SESSION["currentUser"];
	
	/* this function will check whether the index passed is a number and inside the bound */
	function checkParameter($index){
		return isset($index) && is_numeric($index) && $index >= 0 && count(file("todo_$name.txt") > $index);
	}

	/* add a new item to the txt file that stores user's items. */
	if($_POST["action"] == "add" && isset($_POST["item"])){
		$item = $_POST["item"]."\n";
		file_put_contents("todo_$name.txt", $item, FILE_APPEND);	
	} elseif($_POST["action"] == "delete" && checkParameter($_POST["index"])){ /* delete 0-based index of the item in the txt file.*/
		$lines = file("todo_$name.txt");
		$lines[$_POST["index"]] = "";
		file_put_contents("todo_$name.txt", "");
		foreach($lines as $line){
			file_put_contents("todo_$name.txt", $line, FILE_APPEND);
		} 
	}else { /* if any request to submit.php is missing a required parameter, emit a short error message and exit.*/
		header("Location: todolist.php");
		die("short error");
	}
	header("Location: todolist.php");/* redirect user back to todolist.php */
	die();
?>