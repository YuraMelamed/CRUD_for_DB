<?php

if (!isset($_POST['id'])){
	throw new Exception('ID not passed');
	die;
}
require_once('db_connect.php');
try {

	$sql = 'UPDATE members 
		set
			fullName = :fullName,
			phone = :phone,
			email = :email,
			role = :role,
			averageMark = :averageMark,
			subject = :subject,
			workingDay = :workingDay
		where 
			id = :id;
	';

	$s = $pdo->prepare($sql);

	$s->bindValue(':fullName', $_POST['fullName']);
	$s->bindValue(':phone', $_POST['phone']);
	$s->bindValue(':email', $_POST['email']);
	$s->bindValue(':role', $_POST['role']);
	$s->bindValue(':averageMark', $_POST['averageMark']);
	$s->bindValue(':subject', $_POST['subject']);
	$s->bindValue(':workingDay', $_POST['workingDay']);
	$s->bindValue(':id', $_POST['id']); 

	$s->execute();

	header('Location: index.php');
}catch (Exception $e) {
	throw new Exception('ID not passed');
	die;
}
