<?php
	require_once('Person.php');

	class Student extends Person
	{
		public function __construct($id, $name, $email, $phone, $averageMark)
		{
			parent::__construct($id, $name, $email, $phone);
			$this->averageMark = $averageMark;
		}
		public function showInfo()
		{
			return parent::showInfo() . 'Average Mark: ' . $this->averageMark;
		} 
	}
