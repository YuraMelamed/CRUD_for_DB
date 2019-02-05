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
	throw new Exception('ID param missed');
	die;
}		


?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<form action="update.php" method="post">
			<div class="form-group">

				<label for="fullName">Full name</label>
				<input class="form-control" type="text" name="fullName" value="<?=$man->fullName?>">

				<label for="email">E-mail</label>
				<input class="form-control" type="text" name="email" value="<?=$man->email?>">

				<label for="phone">Phone</label>
				<input class="form-control" type="text" name="phone" value="<?=$man->phone?>">

				<label for="role">Role</label>
				<input class="form-control" type="text" name="role" value="<?=$man->role?>">

				<label for="subject">Subject</label>
				<input class="form-control" type="text" name="subject" value="<?=$man->subject?>">

				<label for="averageMark">Average mark</label>
				<input class="form-control" type="text" name="averageMark" value="<?=$man->averageMark?>">

				<label for="workingDay">Working day</label>
				<input class="form-control" type="text" name="workingDay" value="<?=$man->workingDay?>">

				<input type="hidden" name="id" value="<?=$man->id?>">
				<br>

				<button type="Submit" class="btn btn-primary">Edit candidate</button>
			</div>	
		</form>
	</div>	
</body>
</html>