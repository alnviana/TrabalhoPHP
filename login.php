<?php session_start();
	if (isset($_SESSION['user'])) {
		header("location:mynews.php?error=1");
	}
	function message() {
		if (!empty($_GET['error'])) {
			switch ($_GET['error']) {
				case 1:
					echo '<h3 class="alert alert-warning">Preencher o login e senha</h3>';
					break;
				case 2:
					echo '<h3 class="alert alert-danger">Usuário ou senha incorretos</h3>';
					break;
				case 3:
					echo '<h3 class="alert alert-danger">Você precisa estar logado para acessar esta página</h3>';
					break;
			}
		}

		if (!empty($_GET['logout'])) {
			echo '<h3 class="alert alert-success">Efetuado logout com sucesso</h3>';
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Login</title>
	<meta charset="utf-8">

	<?php include 'header.php'; ?>
</head>
<body>
	<div class="principal">
		<?php include 'menu.php'; ?>
		<?php message(); ?>
		<?php include 'login_form.php'; ?>
		<?php include 'news.php'; ?>
	</div>
</body>
</html>