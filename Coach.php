<?php
	require_once('Person.php');

	class Coach extends Person
	{
		public function __construct($id, $name, $email, $phone, $subject)
		{
			parent::__construct($id, $name, $email, $phone);
			$this->subject = $subject;
		}
		public function showInfo()
		{
			return parent::showInfo() . 'Subject: ' . $this->subject;
		} 
	}
?>