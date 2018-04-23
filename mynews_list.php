<?php 
	include 'connection.php';
	include 'check_login.php';

	$sql = "SELECT id, title, description, created_at, edited_at FROM tb_news WHERE user_id = ?";
	$stmt = $DB->prepare($sql);
	$stmt->bindParam(1,$_SESSION['id']);
	$result = $stmt->execute();

	if (!$result){
	    echo '<h3 class="alert alert-danger">Ocorreu algum erro</h3>';
	}else if ($stmt->rowCount() <= 0) {
		echo '<h3 class="alert alert-info">Nenhum registro encontrado</h3>';
	}else{
		echo '<h3 class="alert alert-success">'.$stmt->rowCount()." registros encontrados</h3>";
		echo '<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Título</th>
					<th>Descrição</th>
					<th>Criado em</th>
					<th>Editado em</th>
				</tr>';

		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		foreach ($rows as $row) {
			echo '<tr>';
			foreach ($row as $key => $value) {
				if (empty($value)) {
					echo '<td>-</td>';
				}else{
					echo '<td>'.$value.'</td>';
				}
			}
			$id = $row['id'];
			echo '<td><a href="perform_deletenews.php?id='.$id.'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>';
			echo '<td><a href="editnews.php?id='.$id.'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>';
			echo '</tr>';
		}

		echo '</table>';
	}
?>