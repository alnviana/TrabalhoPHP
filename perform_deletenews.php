<?php include 'check_login.php'; ?>
<?php 
	 include 'connection.php';

	 if (!empty($_GET['id'])) {
	 	$sql = "DELETE FROM tb_news WHERE id = ?";
		$stmt = $DB->prepare($sql);
		$stmt->bindParam(1,$_GET['id']);		
		$result = $stmt->execute();

		if ($stmt->rowCount() > 0) {
			header("location:mynews.php?deleted=1&id=".$_GET['id']);
		}else{
			header("location:mynews.php?error=8&id=".$_GET['id']);
		}
	 }else{
	 	header("location:mynews.php?error=6");
	 }
 ?>