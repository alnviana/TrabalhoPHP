<?php
	function message() {
		if (!empty($_GET['error'])) {
			switch ($_GET['error']) {
				case 1:
					echo '<h3 class="alert alert-warning">Favor preencher todos os campos obrigatórios</h3>';
					break;
				case 2:
					echo '<h3 class="alert alert-warning">Algum dos campos possuí valor inválido</h3>';
					break;
				case 3:
					echo '<h3 class="alert alert-danger">O usuário já está cadastrado</h3>';
					break;
				case 4:
					echo '<h3 class="alert alert-danger">Ocorreu um erro ao tentar cadastrar o usuário</h3>';
					break;
			}
		}
		if (!empty($_GET['ok']) && !empty($_GET['user'])) {
			echo '<h3 class="alert alert-success">Usuário <b>'.$_GET['user'].'</b> criado com sucesso</h3>';
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Registration</title>
	<meta charset="utf-8">

	<?php include 'header.php'; ?>
</head>
<body>
	<div class="principal">
		<?php include 'menu.php'; ?>
		<?php message(); ?>

		<form name="registration" method="post" action="perform_registration.php" class="register-form">
			<p>
				<label for="user">Usuário: </label>
				<input type="text" name="user" maxlength="50" class="form-control" required value="teste">
			</p>
			<p>
				<label for="pass">Senha: </label>
				<input type="password" name="pass" maxlength="50" class="form-control" required value="teste">
			</p>
			<p>
				<label for="first_name">Nome: </label>
				<input type="text" name="first_name" maxlength="50" class="form-control" required value="teste">
			</p>
			<p>
				<label for="last_name">Sobrenome: </label>
				<input type="text" name="last_name" maxlength="50" class="form-control" required value="teste">
			</p>
			<!--<p>
				<label for="avatar">Avatar: </label>
				<input type="url" name="avatar">
			</p>-->
			<button name="register" type="submit" class="btn btn-default">Registrar-se</button>
		</form>
	</div>
</body>
</html>