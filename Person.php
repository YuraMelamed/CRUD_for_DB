<?php

	class Person
	{
	    public $id;
		public $name;
		public $email;
		public $phone;

		public function __construct($id, $name, $email, $phone)
		{
		    $this->id = $id;
			$this->name = $name;
			$this->email = $email;
			$this->phone = $phone;
		}
		public function showInfo()
		{
			$result = '';

			$result .= 'Name: ' . $this->name . '<br>';
			$result .= 'E-mail: ' . $this->email . '<br>';
			$result .= 'Phone: ' . $this->phone . '<br>';

			return $result;
		}
	}
?>