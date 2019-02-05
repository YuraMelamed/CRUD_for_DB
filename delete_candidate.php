<?php
if (isset($_GET['id'])) {
	require_once('db_connect.php');

	try {
		$sql = 'SELECT * from members where id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', (int) $_GET['id']);
		$s->execute();

		$man = $s->fetchObject();
	}catch (Exception $e) {
		echo 'Unable to select';
	}
} else {
	header('Location: index.php');
	die;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
</head>
<body>
	<h1>Are you sure to delite person <?=$man->fullName?>?</h1>
	<form action="delete_person.php" method="post">
		<input type="hidden" name="id" value="<?=$man->id?>">
		<button type="submit">Yes</button>
		<a href="index.php">No</a>
	</form>
</body>
</html>