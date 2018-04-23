<?php include 'check_login.php'; ?>
<?php 
	function message() {
		if (!empty($_GET['error'])) {
			switch ($_GET['error']) {
				case 1:
					echo '<h3 class="alert alert-info">Você já está logado com o usuário <b>'.$_SESSION['user'].'</b></h3>';
					break;
				case 2:
					echo '<h3 class="alert alert-warning">Preencha o formulário.</h3>';
					break;
				case 3:
					echo '<h3 class="alert alert-warning">Favor preencher todos os campos.</h3>';
					break;
				case 4:
					echo '<h3 class="alert alert-warning">Favor preencher todos os campos corretamente.</h3>';
					break;
				case 5:
					echo '<h3 class="alert alert-danger">Houve um erro no cadastro da notícia.</h3>';
					break;
				case 6:
					echo '<h3 class="alert alert-warning">ID não especificado.</h3>';
					break;
				case 7:
					echo '<h3 class="alert alert-danger">ID '.$_GET['id'].' não existe.</h3>';
					break;
				case 8:
					echo '<h3 class="alert alert-danger">Não foi possível deletar o ID '.$_GET['id'].'.</h3>';
					break;
			}
		}
		if (!empty($_GET['ok'])) {
			echo '<h3 class="alert alert-success">ID '.$_GET['id'].' cadastrado com sucesso</h3>';
		}
		if (!empty($_GET['edit'])) {
			echo '<h3 class="alert alert-success">ID '.$_GET['id'].' editado com sucesso</h3>';
		}
		if (!empty($_GET['deleted'])) {
			echo '<h3 class="alert alert-success">ID '.$_GET['id'].' deletado com sucesso</h3>';
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
		<?php include 'mynews_list.php'; ?>

		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	 	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

	 	<script src="bootstrap/js/bootstrap.min.js"></script>

		<form id="post_form" name="post_form" method="post" action="perform_addnews.php">
			<p>
				<label for="title">Título: </label>
				<input type="text" maxlength="50" name="title">
			</p>
			<p>
				<label for="description">Descrição</label>
				<textarea name="description" maxlength="500" form="post_form"></textarea>
			</p>
			<button type="submit" name="add_post" class="btn btn-default">Adicionar</button>
		</form>
	</div>
</body>
</html>