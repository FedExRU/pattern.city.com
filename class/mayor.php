<?php 

final class Mayor
{
	/**
	 *
	 * @var singleton 
	 *
     * @var self
     */
	private static $instance;
	/**
     * @var mixed private variables
     */
	private static $firstName;
	private static $lastName;
	private static $birthday;
	private static $inaugurationDate;
	/**
     * @return self
     */
	public static function getMayor($newFirstName, $newLastName, $newInaugurationDate = NULL ){
		if (!(self::$instance instanceof self)){
			self::$instance = new self();
			self::setFirstName($newFirstName);
			self::setLastName($newLastName);
			empty(self::$newInaugurationDate) ? $inaugurationDate = date("F j, Y, g:i a") : $inaugurationDate = $newInaugurationDate;
		}
		return self::$instance;
	}

	public static function getName(){
		return (self::$firstName." ".self::$lastName);
	}

	public static function setFirstName($newFirstName){
		self::$firstName = $newFirstName;
	}

	public static function setLastName($newLastName){
		self::$lastName = $newLastName;
	}

	private function __construct(){}
	private function __sleep(){}
	private function __clone(){}
}

?>