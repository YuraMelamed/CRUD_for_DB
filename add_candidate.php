<?php

if (isset($_POST['fullName'])){

	require_once('db_connect.php');

	try {
		$sql = 'INSERT INTO members set
			fullName = :fullName,
			phone = :phone,
			email = :email,
			role = :role,
			averageMark = :averageMark,
			subject = :subject,
			workingDay = :workingDay;
		';

		$s = $pdo->prepare($sql);

		$s->bindValue(':fullName', $_POST['fullName']);
		$s->bindValue(':phone', $_POST['phone']);
		$s->bindValue(':email', $_POST['email']);
		$s->bindValue(':role', $_POST['role']);
		$s->bindValue(':averageMark', $_POST['averageMark']);
		$s->bindValue(':subject', $_POST['subject']);
		$s->bindValue(':workingDay', $_POST['workingDay']);

		$s->execute();

	} catch (PDOException $e) {
		echo 'Cannot insert record';
	}
	header('Location: index.php');
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
    <h1 align="center"> Add candidate </h1>
	<div class="container">
		<form method="post">
			<div class="form-group">

				<label for="fullName">Full name</label>
				<input class="form-control" type="text" name="fullName">

				<label for="mail">E-mail</label>
				<input class="form-control" type="text" name="email">

				<label for="phone">Phone</label>
				<input class="form-control" type="text" name="phone">

				<label for="role">Role</label>
				<input class="form-control" type="text" name="role">

				<label for="subject">Subject</label>
				<input class="form-control" type="text" name="subject">

				<label for="averageMark">Average mark</label>
				<input class="form-control" type="text" name="averageMark">

				<label for="workingDay">Working day</label>
				<input class="form-control" type="text" name="workingDay">
				<br>

				<button type="Submit" class="btn btn-primary">Create candidate</button>
			</div>	
		</form>
	</div>	
</body>
</html>