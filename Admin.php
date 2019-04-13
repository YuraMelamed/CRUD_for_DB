<?php
	require_once('Person.php');

	class Admin extends Person
	{
		public function __construct($id, $name, $email, $phone, $workingDay)
		{
			parent::__construct($id, $name, $email, $phone);
			$this->workingDay = $workingDay;
		}
		public function showInfo()
		{
			return parent::showInfo() . 'Working Day: ' . $this->workingDay;
		} 
	}
