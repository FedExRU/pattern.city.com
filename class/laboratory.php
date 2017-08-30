<?php

/**
*
* @var builder
*
*/

/**
* Basic product
*/
class Technology
{
	private $researchMethod;
	private $researchDirection;
	private $researchTime;
	/*
	* Full stack of all avaliable technologies
	*/
	private $techStack;
	/*
	* Technology data
	*/
	private $name;
	private $image;
	private $wiki;

	function __construct(){
		$this->techStack = array(
			'War' 	=> array(
				'0' => array(
					'name' =>'Missilery',
					'image' => 'missilery.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Missile'
				),
				'1' => array(
					'name' =>'Battle Interaction',
					'image' => 'battleInteraction.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Military_tactics'
				),
				'2' => array(
					'name' =>'Radar',
					'image' => 'radar.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Radar'
				),
				'3' => array(
					'name' =>'Ballistics',
					'image' => 'ballistics.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Ballistics'
				),
				'4' => array(
					'name' =>'Aircraft',
					'image' => 'aircraft.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Aircraft'
				),
				'5' => array(
					'name' =>'Dynamite',
					'image' => 'dynamite.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Dynamite'
				),
				'6' => array(
					'name' =>'Mobile Army',
					'image' => 'mobileArmy.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Military_logistics'
				),
				'7' => array(
					'name' =>'Stealth',
					'image' => 'stealth.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Stealth_technology'
				)
			),
			'Social' => array(
				'0' => array(
					'name' => 'Banking',
					'image' => 'banking.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Bank'
				),
				'1' => array(
					'name' => 'State Service',
					'image' => 'stateService.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Public_service'
				),
				'2' => array(
					'name' => 'Industrialization',
					'image' => 'industrialization.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Industrialisation'
				),
				'3' => array(
					'name' => 'Standardization',
					'image' => 'standardization.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Standardization'
				),
				'4' => array(
					'name' => 'Fertilizers',
					'image' => 'fertilizers.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Fertilizer'
				),
				'5' => array(
					'name' => 'Education',
					'image' => 'education.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Education'
				),
				'6' => array(
					'name' => 'Philosophy',
					'image' => 'philosophy.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Philosophy'
				),
				'7' => array(
					'name' => 'Culturology',
					'image' => 'сulturology.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Culturology'
				)
			),
			'Medicine' 	=> array(
				'0' => array(
					'name' => 'Biology',
					'image' => 'biology.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Biology'
				),
				'1' => array(
					'name' => 'Freezing',
					'image' => 'freezing.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Freezing'
				),
				'2' => array(
					'name' => 'Plastics',
					'image' => 'plastics.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Plastic'
				),
				'3' => array(
					'name' => 'Penicillin',
					'image' => 'penicillin.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Penicillin'
				),
				'4' => array(
					'name' => 'Nuclear Physics',
					'image' => 'nuclearPhysics.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Nuclear_physics'
				),
				'5' => array(
					'name' => 'Ecology',
					'image' => 'ecology.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Ecology'
				),
				'6' => array(
					'name' => 'Nuclear Fusion',
					'image' => 'nuclearFusion.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Nuclear_fusion'
				),
				'7' => array(
					'name' => 'Nanotechnology',
					'image' => 'nanotechnology.png',
					'wiki' => 'https://en.wikipedia.org/wiki/Nanotechnology'
				)
			),
		);
	}

	public function setResearchMethod($sampleMethod){
		$this->researchMethod = $sampleMethod;
	}

	public function setResearchDirection($sampleDirection){
		$this->researchDirection = $sampleDirection;
	}

	public function setResearchTime($sampleTime){
		$this->researchTime = $sampleTime;
	}

	public function setSampleTech(){
		$sampleTech  = $this->techStack[$this->researchDirection][rand(0, 7)];
		$this->name  = $sampleTech['name'];
		$this->image = $sampleTech['image'];
		$this->wiki = $sampleTech['wiki'];
	}

	public function getName(){
		return $this->name;
	}

	public function getImage(){
		return $this->image;
	}

	public function getWiki(){
		return $this->wiki;
	}
}

/**
* Abstract builder / researcher
*/

abstract class Researcher
{
	protected $technology;
	protected $method;
	protected $time;
	protected $direction;
	private   $additionalParams;

	function __construct($sampleDirection){
		$this->additionalParams = array(
			'War' => array(
				'time' 		=> 'Two years',
				'method' 	=> 'Modeling'
			),
			'Social' => array(
				'time' 		=> 'One year',
				'method' 	=> 'Abstraction'
			),
			'Medicine' => array(
				'time' 		=> 'Laboratory Experience',
				'method' 	=> 'Five years'
			)
		);
		
		$this->setParams(
			$sampleDirection,
			$this->additionalParams[$sampleDirection]['method'],
			$this->additionalParams[$sampleDirection]['time']
		);
	}

	public function setParams($newDirection, $newMethod, $newTime){
		$this->method 		= $newMethod;
		$this->time 		= $newTime;
		$this->direction 	= $newDirection;
	}
	
	public function newTech(){
		$this->technology = new Technology();
	}

	public function chooseTech(){
		return $this->technology->setSampleTech();
	}

	public function publish(){
		return $this->technology;
	}

	abstract public function chooseResearchMethod();
	abstract public function chooseResearchDirection();
	abstract public function chooseResearchTime();
}

/**
* Conserne builder 1
*/
class WarResearcher extends Researcher
{	
	function __construct(){
		parent::__construct('War');
	}

	public function chooseResearchMethod(){
		$this->technology->setResearchMethod($this->method);
	}

	public function chooseResearchDirection(){
		$this->technology->setResearchDirection($this->direction);
	}

	public function chooseResearchTime(){
		$this->technology->setResearchTime($this->time);
	}
}

/**
* Conserne builder 2
*/

class MedicineResearcher extends Researcher
{
	function __construct(){
		parent::__construct('Medicine');
	}

	public function chooseResearchMethod(){
		$this->technology->setResearchMethod($this->method);
	}

	public function chooseResearchDirection(){
		$this->technology->setResearchDirection($this->direction);
	}

	public function chooseResearchTime(){
		$this->technology->setResearchTime($this->time);
	}
}

/**
* Conserne builder 3
*/

class SocialResearcher extends Researcher
{
	function __construct(){
		parent::__construct('Social');
	}

	public function chooseResearchMethod(){
		$this->technology->setResearchMethod($this->method);
	}

	public function chooseResearchDirection(){
		$this->technology->setResearchDirection($this->direction);
	}

	public function chooseResearchTime(){
		$this->technology->setResearchTime($this->time);
	}
}

/**
* Director
*/

class Laboratory
{
	private $researcher;

	public function provideEquipmentTo(Researcher $sampleResearcher){
		$this->researcher = $sampleResearcher;
	}

	public function searchTechnology(){
		$this->researcher->newTech();
		$this->researcher->chooseResearchMethod();
		$this->researcher->chooseResearchDirection();
		$this->researcher->chooseResearchTime();
		$this->researcher->chooseTech();
	}

	public function getTechnology(){
		return $this->researcher->publish();
	}
}

?>