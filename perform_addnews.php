<?php 
	include 'connection.php';
	include 'check_login.php';

	if (isset($_POST['add_post'])) {
		$title = $_POST['title'];
		$description = $_POST['description'];
		$created_at = New Datetime();
		$created_at = $created_at->format('Y-m-d H:i:s');

		if (!empty($title) &&
			!empty($description)
			) {
				if (strlen($title) <= 50 &&
					strlen($description) <= 500
					) {
						$sql = "INSERT INTO tb_news (user_id, title, description, created_at) VALUES (?, ?, ?, ?)";
						$stmt = $DB->prepare($sql);
						$stmt->bindParam(1,$_SESSION['id']);
						$stmt->bindParam(2,$title);
						$stmt->bindParam(3,$description);
						$stmt->bindParam(4,$created_at);
						$result = $stmt->execute();

						if ($stmt->rowCount() == 1) {
							header("location:mynews.php?ok=1&id=".$DB->lastInsertId());
						}else{
							header("location:mynews.php?error=5");
						}
				}else{
					header("location:mynews.php?error=4");
				}
		}else{
			header("location:mynews.php?error=3");
		}
	}else{
		header("location:mynews.php?error=2");
	}
?>