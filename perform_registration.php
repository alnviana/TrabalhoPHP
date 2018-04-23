<?php
	include 'connection.php';

	if (isset($_POST['register'])) {
		if (!empty($_POST['user']) &&
			!empty($_POST['pass']) &&
			!empty($_POST['first_name']) &&
			!empty($_POST['last_name'])
			) {
				if (strlen($_POST['user']) <= 50 &&
					strlen($_POST['pass']) <= 50 &&
					strlen($_POST['first_name']) <= 50 &&
					strlen($_POST['last_name']) <= 50 &&
					strlen($_POST['avatar']) <= 100
					) {
						$sql = "SELECT * FROM tb_users WHERE username = ?";
						$stmt = $DB->prepare($sql);
						$stmt->bindParam(1,$_POST['user']);
						$result = $stmt->execute();

						if ($stmt->rowCount() == 0) {
							$sql = "INSERT INTO tb_users (first_name, last_name, username, password, avatar) VALUES (?, ?, ?, ?, ?)";
							$stmt = $DB->prepare($sql);
							$stmt->bindParam(1,$_POST['first_name']);
							$stmt->bindParam(2,$_POST['last_name']);
							$stmt->bindParam(3,$_POST['user']);
							$stmt->bindParam(4,$_POST['pass']);
							$stmt->bindParam(5,$_POST['avatar']);
							$result = $stmt->execute();

							if ($stmt->rowCount() == 1) {
								header("location:registration.php?ok=1&user=".$_POST['user']);
							}else{
								header("location:registration.php?error=4");
							}
						}elseif ($stmt->rowCount() < 0) {
							header("location:registration.php?error=4");
						}else{
							header("location:registration.php?error=3");
						}
				}else{
					header("location:registration.php?error=2");
				}
			
		}else{
			header("location:registration.php?error=1");
		}
	}
?>