<?php
	try {
		$DB = new PDO("mysql:host=127.0.0.1;dbname=db_news", "root", base64_decode('UHVkaW1AMDAyNw=='));
    	$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$DB->exec("set names utf8mb4");
	} catch (Exception $e) {
		echo $e;
		exit;
	}
?>