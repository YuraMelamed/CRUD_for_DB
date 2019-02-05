<?php
require_once('db_connect.php');
require_once('Student.php');
require_once('Coach.php');
require_once('Admin.php');

try{
	$members = $pdo->query('select * from members');
	$membersArray = $members->fetchAll();
}catch(Exception $e){
	echo 'Cannot select members';
	die;
	}

	$candidate = [];

	foreach ($membersArray as $people) {
		switch ($people['role']){
			case 'coach':
				$candidate[] = new Coach ($people['id'], $people['fullName'], $people['email'], $people['phone'], $people['subject']);
				break;
			case 'student':
				$candidate[] = new Student ($people['id'], $people['fullName'], $people['email'], $people['phone'], $people['averageMark']);
				break;
			case 'admin':
				$candidate[] = new Admin ($people['id'], $people['fullName'], $people['email'], $people['phone'], $people['workingDay']);
				break;
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Candidate</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<a href="add_candidate.php"><h1 align="center">Add candidate</h1></a>
		<?php foreach ($candidate as $person) : ?>
			<table class="table table-striped">
				<tr>
					<td>
						<?= $person->showInfo() ?>
					</td>
					<td align="right">
						<br>
						<a href="edit_candidate.php?id=<?=$person->id?>">Edit candidate</a> <br>
						<a href="delete_candidate.php?id=<?=$person->id?>">Delete candidate</a> <br>
					</td>
				</tr>
			</table>
		<?php endforeach ?>
	</div>		
</body>
</html>
