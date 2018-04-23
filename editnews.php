<?php include 'check_login.php'; ?>
<?php
	if (empty($_GET['id'])) {
		header("location:mynews.php?error=6");
	}else{
		include 'connection.php';

		$sql = "SELECT * FROM tb_news WHERE id = ?";
		$stmt = $DB->prepare($sql);
		$stmt->bindParam(1,$_GET['id']);
		$result = $stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($stmt->rowCount() == 1) {
			$title = $result['title'];
			$description = $result['description'];
		}else{
			header("location:mynews.php?error=7");
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
					echo '<h3 class="alert alert-danger">Esta notícia não existe</h3>';
					break;
				case 5:
					echo '<h3 class="alert alert-danger">Houve um erro na modificação da notícia</h3>';
					break;
				case 6:
					echo '<h3 class="alert alert-danger">Deu algo muito errado na modificação da notícia</h3>';
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

		<form id="post_form" name="post_form" method="post" action="perform_editnews.php">
			<input type="number" name="id" style="display: none" value="<?php echo $_GET['id']; ?>">
			<p>
				<label for="title">Título: </label>
				<input type="text" name="title" maxlength="50" value="<?php echo $title; ?>">
			</p>
			<p>
				<label for="description">Descrição</label>
				<textarea name="description" maxlength="500" form="post_form"><?php echo $description; ?></textarea>
			</p>
			<button type="submit" name="edit_post">Salvar</button>
		</form>
	</div>
</body>
</html>