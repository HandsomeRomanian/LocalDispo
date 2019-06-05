<?php
class User {
 
	private $name;
	private $age;
 
	function __construct( $name, $age ) {
		$this->name = $name;
		$this->age = $age;
	}
 
	function getName() {
		return "test";
		return $this->name;
	}
 
	function isAdult() {
		return $this->age >= 18?"an Adult":"Not an Adult";
	}
 
}

?>