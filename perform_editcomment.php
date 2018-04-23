<?php 
	include 'connection.php';
	include 'check_login.php';

	if (!empty($_POST['id'])) {
	 	$sql = "SELECT user_id FROM tb_comments WHERE id = ?";
		$stmt = $DB->prepare($sql);
		$stmt->bindParam(1,$_POST['id']);		
		$result = $stmt->execute();

		if ($stmt->rowCount() <= 0) {
			header("location:index.php?error=7&id=".$_GET['id']);
		}else{
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rows = $stmt->fetchAll();

			if ($rows[0]["user_id"] == $_SESSION['id']) {
				if (isset($_POST['edit_comment'])) {
					$id = $_POST['id'];
					$comment = $_POST['comment'];
					$edited_at = New Datetime();
					$edited_at = $edited_at->format('Y-m-d H:i:s');

					if (!empty($comment) &&
						!empty($id)
						) {
							if (strlen($comment) <= 100
								) {
									$sql = "SELECT * FROM tb_comments WHERE id = ?";
									$stmt = $DB->prepare($sql);
									$stmt->bindParam(1,$id);
									$result = $stmt->execute();

									if ($stmt->rowCount() == 1) {
										$sql = "UPDATE tb_comments SET comment = ?, edited_at = ? WHERE id = ?";
										$stmt = $DB->prepare($sql);
										$stmt->bindParam(1,$comment);
										$stmt->bindParam(2,$edited_at);
										$stmt->bindParam(3,$id);
										$result = $stmt->execute();

										if ($stmt->rowCount() == 1) {
											header("location:index.php?edit=1&id=".$id);
										}elseif ($stmt->rowCount() == 0) {
											header("location:index.php?error=4");
										}else {
											header("location:index.php?error=4");
										}
									}else{
										header("location:index.php?error=8&id=".$id);
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
			}else{
				header("location:index.php?error=6");
			}
		}
	}else{
		header("location:index.php?error=5");
	}
?>