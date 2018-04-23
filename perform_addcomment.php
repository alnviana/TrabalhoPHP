<?php include 'check_login.php'; ?>
<?php 
	include 'connection.php';
	
	if (isset($_POST['add_comment'])) {
		$post_id = $_POST['post_id'];
		$comment = $_POST['comment'];
		$created_at = New Datetime();
		$created_at = $created_at->format('Y-m-d H:i:s');

		if (!empty($post_id) &&
			!empty($comment)
			) {
			if (strlen($post_id) > 0 &&
				strlen($comment) <= 100
				) {

				$sql = "INSERT INTO tb_comments (user_id, news_id, comment, created_at) VALUES (?, ?, ?, ?)";
				$stmt = $DB->prepare($sql);
				$stmt->bindParam(1,$_SESSION['id']);
				$stmt->bindParam(2,$post_id);
				$stmt->bindParam(3,$comment);
				$stmt->bindParam(4,$created_at);
				$result = $stmt->execute();

				if ($stmt->rowCount() == 1) {
					header("location:index.php?ok=1&id=".$DB->lastInsertId());
				}else{
					header("location:index.php?error=4");
				}
			}else{
				header("location:index.php?error=3");
			}
		}else{
			header("location:index.php?error=2");
		}
	}else{
		header("location:index.php?error=1");
	}
?>