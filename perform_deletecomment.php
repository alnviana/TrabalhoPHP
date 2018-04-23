<?php include 'check_login.php'; ?>
<?php 
	 include 'connection.php';

	 if (!empty($_GET['id'])) {
	 	$sql = "SELECT user_id FROM tb_comments WHERE id = ?";
		$stmt = $DB->prepare($sql);
		$stmt->bindParam(1,$_GET['id']);		
		$result = $stmt->execute();

		if ($stmt->rowCount() <= 0) {
			header("location:index.php?error=7&id=".$_GET['id']);
		}else{
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rows = $stmt->fetchAll();

			if ($rows[0]["user_id"] == $_SESSION['id']) {
		 		$sql = "DELETE FROM tb_comments WHERE id = ?";
				$stmt = $DB->prepare($sql);
				$stmt->bindParam(1,$_GET['id']);		
				$result = $stmt->execute();

				if ($stmt->rowCount() > 0) {
					header("location:index.php?deleted=1&id=".$_GET['id']);
				}else{
					header("location:index.php?error=7&id=".$_GET['id']);
				}
		 	}else{
		 		header("location:index.php?error=6");
		 	}
		}
	 }else{
	 	header("location:index.php?error=5");
	 }
 ?>