<?php
class User {
 
	private $name;
	private $age;
 
	function __construct(string $name , int $age ) {
		$this->name = $name;
		$this->age = $age;
	}
 
	function getName():string {
		return $this->name;
	}
 
	function isAdult():bool {
		return $this->age >= 18 ? true : false;
	}
 
}
?>