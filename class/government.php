<?php 

class Government
{	/**
	 *
	 * @var multione 
	 *
     * @var self
     */
	private static $instances 	= array();

	private static $personData 	= array();

	public static function getGovernmentPerson($position, array $data){
		if(!isset($instances[$position]) && !(self::$instances[$position] instanceof self)){
			self::$instances[$position] = new self($position);
			self::parseGovernmentData($position, $data);
		}

		return self::$instances[$position];
	}

	private static function parseGovernmentData($position, $sampleData){
		if(!isset($sampleData['firstName'], $sampleData['lastName'], $sampleData['hireDate'])){
			throw new Exception("First name, last name or hire date was not specified for ".$position,1);	
		}
		self::setFirstName($position, $sampleData['firstName']);
		self::setLastName($position, $sampleData['lastName']);
		self::setHireDate($position, $sampleData['hireDate']);
	}

	public static function setFirstName($position, $newFirstName){
		return !empty(self::$personData[$position]['firstName'] = $newFirstName);
	}

	public static function setLastName($position, $newLastName){
		return !empty(self::$personData[$position]['lastName'] = $newLastName);
	}

	public static function setHireDate($position, $newHireDate){
		return !empty(self::$personData[$position]['hireDate'] = $newHireDate);
	}

	public static function getFirstName($position){
		return self::$personData[$position]['firstName'];
	}

	public static function getLastName($position){
		return self::$personData[$position]['lastName'];
	}

	public static function getHireDate($position){
		return self::$personData[$position]['hireDate'];
	}

	public static function sayHello($position){
		echo "Hello, my name is ".self::getFirstName($position)." ".self::getLastName($position)."! I'm at your services from ".self::getHireDate($position);
	}

	private function __construct(){}
	private function __clone(){}
    private function __sleep(){}
}

?>
