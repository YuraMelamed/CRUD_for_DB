<?php

require_once('db_connect.php');
require_once('list.php');

	try {
		$sql = 'CREATE TABLE members (
			id int not null auto_increment,
			fullName varchar(255),
			phone varchar(255),
			email varchar(255),
			role varchar(255),
			averageMark float,
			subject varchar(255),
			workingDay varchar(255),
			primary key (id)
		);';

		$pdo->exec($sql);

		$sql = 'INSERT INTO members set
			fullName = :fullName,
			phone = :phone,
			email = :email,
			role = :role,
			averageMark = :averageMark,
			subject = :subject,
			workingDay = :workingDay;
		';
		foreach ($list as $data) {

			$x = $pdo->prepare($sql);

			$x->bindValue(':fullName', $data['fullName']);
			$x->bindValue(':phone', $data['phone']);
			$x->bindValue(':email', $data['email']);
			$x->bindValue(':role', $data['role']);
			$x->bindValue(':averageMark', $data['averageMark']);
			$x->bindValue(':subject', $data['subject']);
			$x->bindValue(':workingDay', $data['workingDay']);

			$x->execute();
		}
		
	}catch(Exception $e){
		echo'Cannot insert record';
	die;
	}



