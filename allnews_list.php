<?php include 'check_login.php'; ?>
<?php
	include 'connection.php';

	$sql = "SELECT id, user_id, title, description, created_at, edited_at FROM tb_news ORDER BY created_at DESC limit 0,10";
	$stmt = $DB->prepare($sql);
	$stmt->bindParam(1,$_SESSION['id']);
	$result = $stmt->execute();

	if (!$result){
	    echo '<h3 class="alert alert-danger">Ocorreu algum erro</h3>';
	}else if ($stmt->rowCount() <= 0) {
		echo '<h3 class="alert alert-info">Nenhum registro encontrado</h3>';
	}else{
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();

		$number = 1;
		foreach ($rows as $row) {
?>
	
			<div class="post">
				<div class="post-header">
					<b>Título: </b><?php echo $row['title']; ?> - <b>Criado em: </b><?php echo $row['created_at']; ?> - <b>Por: </b><?php echo getUser($row['user_id']); ?>
				</div>
				<div class="post-content">
					<?php echo $row['description']; ?>
				</div>
				<div class="post-comments">
					<?php echo getComments($row['id']); ?>
					<div class="post-add-comment" id=<?php echo '"post-comment-'.$row['id'].'"'; ?>>
						<div class="add-comment">
							<div class="add-comment-text">
								<a onclick="addcomment(this.id)" id=<?php echo '"comment-'.$row['id'].'"'; ?>>Adicionar comentário <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
							</div>
							<form id=<?php echo '"comment-form-'.$row['id'].'"'; ?> name=<?php echo '"comment-form-'.$row['id'].'"'; ?> method="post" action="perform_addcomment.php" style="display: none;">
								<input type="number" name="post_id" style="display:none;" value=<?php echo '"'.$row['id'].'"'; ?>>
								<textarea name="comment" maxlength="100" form=<?php echo '"comment-form-'.$row['id'].'"'; ?>></textarea>
								<button type="submit" name="add_comment">Enviar</button>
							</form>
						</div>
					</div>
				</div>
			</div>

<?php
		$number++;
		}
	}

	function getUser($id){
		global $DB;
		$sql2 = "SELECT first_name, last_name, username FROM tb_users WHERE id = ?";
		$stmt2 = $DB->prepare($sql2);
		$stmt2->bindParam(1,$id);
		$result2 = $stmt2->execute();

		if (!$result2){
		    return "ERRO - ID ".$id;
		}else if ($stmt2->rowCount() <= 0) {
			return "ERRO - ID ".$id;
		}else{
			$stmt2->setFetchMode(PDO::FETCH_ASSOC);
			$rows2 = $stmt2->fetchAll();

			return $rows2[0]['first_name']." ".$rows2[0]['last_name']." (".$rows2[0]['username'].")";
		}
	}
	function getComments($id){
		global $DB;
		$sql2 = "SELECT * FROM tb_comments WHERE news_id = ?";
		$stmt2 = $DB->prepare($sql2);
		$stmt2->bindParam(1,$id);
		$result2 = $stmt2->execute();
		$comments = "";

		if (!$result2){
		    return "ERRO NO CARREGAMENTO DOS COMENTÁRIOS - Post ".$id;
		}else if ($stmt2->rowCount() <= 0) {
			$comments = $comments.'
					<div class="post-comment">
						Ainda não há comentários.
					</div>
				';
			return $comments;
		}else{
			$stmt2->setFetchMode(PDO::FETCH_ASSOC);
			$rows2 = $stmt2->fetchAll();

			foreach ($rows2 as $row2) {
				$comments = $comments.'
					<div class="post-comment">
						<div>
							<b>'.getUser($row2['user_id']).'</b> - '.$row2['created_at'].' - <b>Comentou: </b>
						</div>
						<div>
							'.$row2['comment'].'
						</div>';
				if ($row2['user_id'] == $_SESSION['id']) {
					$comments = $comments.'
						<div class="post-comment-buttons">
							<a href="editcomment.php?id='.$row2['id'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a href="perform_deletecomment.php?id='.$row2['id'].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
						</div>
					';
				}
				$comments = $comments.'
					</div>
				';
			}
			return $comments;
		}
	}
?>