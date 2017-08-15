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

	public static function getGovernmentPerson(array $data){
		if(!isset($instances[$data['position']]) && !(self::$instances[$data['position']] instanceof self)){
			self::$instances[$data['position']] = new self($data['position']);
			self::parseGovernmentData($data);
		}

		return self::$instances[$data['position']];
	}

	private static function parseGovernmentData($sampleData){
		if(!isset($sampleData['firstName'], $sampleData['lastName'], $sampleData['hireDate'])){
			throw new Exception("First name, last name or hire date was not specified for ".$sampleData['position'],1);	
		}
		self::setFirstName($sampleData['position'], $sampleData['firstName']);
		self::setLastName($sampleData['position'], $sampleData['lastName']);
		self::setHireDate($sampleData['position'], $sampleData['hireDate']);

		switch ($sampleData['position']) {
			case 'Chief Doctor':
				self::setImage($sampleData['position'],"chiefDoctor.png");
				break;

			case 'Police Captain':
				self::setImage($sampleData['position'],"policeCaptain.png");
				break;

			case 'City Judge':
				self::setImage($sampleData['position'],"judge.png");
				break;
		}
	}

	public static function setFirstName($position, $newFirstName){
		self::$personData[$position]['firstName'] = $newFirstName;
	}

	public static function setLastName($position, $newLastName){
		self::$personData[$position]['lastName'] = $newLastName;
	}

	public static function setHireDate($position, $newHireDate){
		self::$personData[$position]['hireDate'] = $newHireDate;
	}

	public static function setImage($position, $newImage){
		self::$personData[$position]['image'] = $newImage;
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

	public static function getImage($position){
		return self::$personData[$position]['image'];
	}

	public static function getIntroduceText($position){
		return "Hello, my name is ".self::getFirstName($position)." ".self::getLastName($position)."! I'm at your services from ".self::getHireDate($position)." as the ".$position." in this city.";
	}

	private function __construct(){}
	private function __clone(){}
    private function __sleep(){}
}

?>
