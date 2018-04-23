<?php 
	include 'connection.php';
	include 'check_login.php';

	if (isset($_POST['edit_post'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$edited_at = New Datetime();
		$edited_at = $edited_at->format('Y-m-d H:i:s');

		if (!empty($title) &&
			!empty($description) &&
			!empty($id)
			) {
				if (strlen($title) <= 50 &&
					strlen($description) <= 500
					) {
						$sql = "SELECT * FROM tb_news WHERE id = ?";
						$stmt = $DB->prepare($sql);
						$stmt->bindParam(1,$id);
						$result = $stmt->execute();

						if ($stmt->rowCount() == 1) {
							$sql = "UPDATE tb_news SET title = ?, description = ?, edited_at = ? WHERE id = ?";
							$stmt = $DB->prepare($sql);
							$stmt->bindParam(1,$title);
							$stmt->bindParam(2,$description);
							$stmt->bindParam(3,$edited_at);
							$stmt->bindParam(4,$id);
							$result = $stmt->execute();

							if ($stmt->rowCount() == 1) {
								header("location:mynews.php?edit=1&id=".$id);
							}elseif ($stmt->rowCount() == 0) {
								header("location:mynews.php?error=5");
							}else {
								header("location:mynews.php?error=5");
							}
						}else{
							header("location:mynews.php?error=7&id=".$id);
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