<?php
class User {
 
	var $name;
	var $age;
 
	function __construct(string $name,int $age ) {
		$this->name = $name;
		$this->age = $age;
	}
 
	function getName() {
		return $this->name;
	}
 
	function isAdult() {
		return $this->age >= 18?"an Adult":"Not an Adult";
	}
 
}

?>