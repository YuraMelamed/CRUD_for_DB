<?php
try {
	$pdo = new PDO(
		'mysql:host=localhost;dbname=people',
		'melamed_user',
		'123456'
	);
} catch	(Exception $e){
	echo'Cannot create conection';
	die;
}
?>