<?php session_start();
	
	if (!empty($_SESSION['user'])) {
		$_SESSION['user'] = "";
		unset($_SESSION['user']);
		session_destroy();
		header("location:login.php?logout=1");
	}else{
		header("location:login.php");
	}

 ?>