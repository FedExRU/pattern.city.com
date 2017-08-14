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
	private static $inaugurationDate;
	/**
     * @return self
     */
	public static function getMayor($newFirstName, $newLastName, $newInaugurationDate = NULL ){
		if (!(self::$instance instanceof self)){
			self::$instance = new self();
			self::setFirstName($newFirstName);
			self::setLastName($newLastName);
			empty(self::$newInaugurationDate) ? self::$inaugurationDate = date("F j, Y, g:i a") : self::$inaugurationDate = $newInaugurationDate;
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

	public static function introduceYourself(){
		return "Greetings! My name is ".self::$firstName." ".self::$lastName.". I'm a Mayor of Pattern city from ".self::$inaugurationDate.". I'm sorry. I've got a lot of work to do, so I should go. Maybe we will talk later? It was a pleaure to meet you my friend.";
	}

	private function __construct(){}
	private function __sleep(){}
	private function __clone(){}
}

?>