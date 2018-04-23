<?php 
	function message(){
		if (!empty($_GET['error'])) {
			switch ($_GET['error']) {
				case 1:
					echo '<h3 class="alert alert-warning">Favor utilizar o campo de comentários</h3>';
					break;
				case 2:
					echo '<h3 class="alert alert-warning">O comentário não pode ser vazio</h3>';
					break;
				case 3:
					echo '<h3 class="alert alert-warning">Comentário excede o limite de caracteres</h3>';
					break;
				case 4:
					echo '<h3 class="alert alert-danger">Erro ao salvar comentário</h3>';
					break;
				case 5:
					echo '<h3 class="alert alert-warning">Favor informar o ID</h3>';
					break;
				case 6:
					echo '<h3 class="alert alert-danger">Você não pode deletar ou editar comentários de outros usuários</h3>';
					break;
				case 7:
					echo '<h3 class="alert alert-danger">Erro ao tentar deletar o comentário '.$_GET['id'].'</h3>';
					break;
				case 8:
					echo '<h3 class="alert alert-warning">ID '.$_GET['id'].' não existe</h3>';
					break;
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Página Principal</title>
	<meta charset="utf-8">

	<?php include 'header.php'; ?>
</head>
<body>
	<div class="principal">
		<?php include 'menu.php'; ?>
		<?php include 'login_form.php'; ?>

		<?php message(); ?>
		<?php 
			if (!empty($_SESSION['user'])) {
				include 'allnews_list.php';
			}
		?>

		<script type="text/javascript">
			function addcomment(id)
			{
			    var element = document.getElementById("post-"+id);
			    var form = element.getElementsByTagName('form')[0];
			    if (form.getAttribute("style")==null) {
			    	form.style = "display:none";
			    }else{
			    	form.style = "";
			    }			    
			}
		</script>
		
	</div>
</body>
</html>