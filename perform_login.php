<?php session_start();
	include 'connection.php';

	if (isset($_POST['login'])) {
		if (!empty($_POST['user']) && !empty($_POST['pass'])) {
			$sql = "SELECT * FROM tb_users WHERE username = ? AND BINARY password = ?";
			$stmt = $DB->prepare($sql);
			$stmt->bindParam(1,$_POST['user']);
			$stmt->bindParam(2,$_POST['pass']);
			$result = $stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() == 1) {
				$_SESSION['user'] = $_POST['user'];
				$_SESSION['id'] = $result['id'];
				$_SESSION['first_name'] = $result['first_name'];
				$_SESSION['last_name'] = $result['last_name'];
				header("location:mynews.php");
			}else{
				header("location:login.php?error=2");
			}
		}else{
			header("location:login.php?error=1");
		}
	}
?>