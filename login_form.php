<?php session_start();
	if (!isset($_SESSION['user'])) {
?>
<form name="login" method="post" action="perform_login.php" class="login-form">
	<h2 class="form-signin-heading">Entrar</h2>
	<input type="text" name="user" maxlength="50" class="form-control" required>
	<input type="password" name="pass" maxlength="50" class="form-control" required>
	<button name="login" type="submit" class="btn btn-default">Login</button>
	<a href="registration.php" class="btn btn-default">Registrar-se</a>
</form>
<?php
	}
?>