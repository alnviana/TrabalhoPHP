<?php include 'check_login.php'; ?>
<?php
	if (empty($_GET['id'])) {
		header("location:index.php?error=5");
	}else{
		include 'connection.php';

		$sql = "SELECT * FROM tb_comments WHERE id = ?";
		$stmt = $DB->prepare($sql);
		$stmt->bindParam(1,$_GET['id']);
		$result = $stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() == 1) {
			if ($result["user_id"] == $_SESSION['id']) {
				$comment = $result['comment'];
			}else{
				header("location:index.php?error=6");
			}
		}else{
			header("location:index.php?error=8");
		}
	}

	function message() {
		if (!empty($_GET['error'])) {
			switch ($_GET['error']) {
				case 1:
					echo '<h3 class="alert alert-warning">Preencha o formulário</h3>';
					break;
				case 2:
					echo '<h3 class="alert alert-warning">Favor preencher todos os campos</h3>';
					break;
				case 3:
					echo '<h3 class="alert alert-warning">Favor preencher todos os campos corretamente</h3>';
					break;
				case 4:
					echo '<h3 class="alert alert-danger">Este comentário não existe</h3>';
					break;
				case 5:
					echo '<h3 class="alert alert-danger">Houve um erro na modificação do comentário</h3>';
					break;
				case 6:
					echo '<h3 class="alert alert-danger">Deu algo muito errado na modificação do comentário</h3>';
					break;
			}
		}
		if (!empty($_GET['ok'])) {
			echo '<h3 class="alert alert-success">ID '.$_GET['id'].' modificado com sucesso</h3>';
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>My News</title>
	<meta charset="utf-8">

	<?php include 'header.php'; ?>
</head>
<body>
	<div class="principal">
		<?php include 'menu.php'; ?>
		<?php message(); ?>

		<form id="comment_form" name="comment_form" method="post" action="perform_editcomment.php">
			<input type="number" name="id" style="display: none" value="<?php echo $_GET['id']; ?>">
			<p>
				<label for="comment">Comentário</label>
				<textarea name="comment" maxlength="100" form="comment_form"><?php echo $comment; ?></textarea>
			</p>
			<button type="submit" name="edit_comment">Salvar</button>
		</form>
	</div>
</body>
</html>