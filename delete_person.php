<?php

if (!isset($_POST['id'])){
	throw new Exception('ID not passed');
	die;
}
require_once('db_connect.php');
try {

	$sql = 'DELETE from members where id = :id';
	$s = $pdo->prepare($sql);
	$s->bindValue(':id', (int) $_POST['id']);
	$s->execute();

	header('Location: index.php');
}catch (Exception $e) {
	echo 'Unable to delete';
	die;
}