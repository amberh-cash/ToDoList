<?php /*
	Mengyuan Huang 
	cse154 AJ
	#HW5
	this is the target where start.php submits its login form data to log the user in.
	*/
	session_start();
	$name = $_POST["name"];
	$password = $_POST["password"];
	$lines = file("users.txt");
	/* this function will check whether the username is already registered. If the 
		username is registered, return the arry of user's information, else return a null array. */
	function checkName($name, $lines){
		$userInfo = null;
		foreach($lines as $line){
			$userArray = explode(":", $line);
			if($name == $userArray[0]){
				$userInfo = $userArray;
			} 
		}
		return $userInfo;
	}
	
	$userArray = checkName($name, $lines);/* get user's information array. */

	if(empty($userArray)){/* check whether username and password are valid then register the new user.*/
		if(preg_match("/^([a-z])[a-z0-9]{3,8}/", $name) && preg_match("/^[0-9].{4,10}[^a-zA-Z0-9]$/", $password)){
			$newUser = $name.":".$password."\n";
			file_put_contents("users.txt", $newUser, FILE_APPEND);
		}
			header("Location: start.php");
			die();
	} else{ /* if password is correct direct the user to the todolist.php, else redirect to start.php*/
		if(trim($userArray[1]) == $password){
			$_SESSION["currentUser"]=$name;
			$date = date("D y M d, g:i:s a");
			setcookie("date", $date, time() + 60*60*24*7);
			header("Location: todolist.php");
			die();
		} else{
			header("Location: start.php");
			die();
		}
	}
	?>