<?php 

/**
* Базовый объект исследования
*/
class Technology
{
	private $researchMethod;
	private $researchDirection;
	private $researchTime;
	/*
	* Стек всех возможных технологий для исследования
	*/
	private $techStack;
	/*
	* Имя исследованной технологии
	*/
	private  $name;

	function __construct(){
		$this->techStack = array(
			'War' 		=> array(
							'0' => 'Missilery',
							'1' => 'Battle Interaction',
							'2' => 'Radar',
							'3' => 'Ballistics',
							'4' => 'Aircraft',
							'5' => 'Dynamite',
							'6' => 'Mobile Army',
							'7' => 'Stealth', 
						),
			'Social' 	=> array(
							'0' => 'Banking',
							'1' => 'State Service',
							'2' => 'Industrialization',
							'3' => 'Standardization',
							'4' => 'Fertilizers',
							'5' => 'Education',
							'6' => 'Philosophy',
							'7' => 'Culture',
						),
			'Medicine' 	=> array(
							'0' => 'Biology',
							'1' => 'Freezing',
							'2' => 'Plastics',
							'3' => 'Penicillin',
							'4' => 'Nuclear Physics',
							'5' => 'Ecology',
							'6' => 'Nuclear Fusion',
							'7' => 'Nanotechnology',
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
		$this->name = $this->techStack[$this->researchDirection][rand(0, 7)];
	}

	public function getName(){
		return $this->name;
	}
}


/**
* Абстрактный исследователь
*/

abstract class Researcher
{
	protected $technology;
	
	public function search(){
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
* Конкретный исследователь Военных технологий
*/
class WarResearcher extends Researcher
{	
	public function chooseResearchMethod(){
		$this->technology->setResearchMethod('Modeling');
	}

	public function chooseResearchDirection(){
		$this->technology->setResearchDirection('War');
	}

	public function chooseResearchTime(){
		$this->technology->setResearchTime('Two years');
	}
}

/**
* Конкретный исследователь Медицинских технологий
*/
class MedicineResearcher extends Researcher
{
	public function chooseResearchMethod(){
		$this->technology->setResearchMethod('Laboratory Experience');
	}

	public function chooseResearchDirection(){
		$this->technology->setResearchDirection('Medicine');
	}

	public function chooseResearchTime(){
		$this->technology->setResearchTime('Five years');
	}
}

/**
* Конкретный исследователь Социальных технологий
*/
class SocialResearcher extends Researcher
{
	public function chooseResearchMethod(){
		$this->technology->setResearchMethod('Abstraction');
	}

	public function chooseResearchDirection(){
		$this->technology->setResearchDirection('Social');
	}

	public function chooseResearchTime(){
		$this->technology->setResearchTime('One year');
	}
}


/**
* Лаборатория, отвечающая за исследование технологий исследователями
*/
class Laboratory
{
	private $researcher;

	public function provideEquipmentTo(Researcher $sampleResearcher){
		$this->researcher = $sampleResearcher;
	}

	public function searchTechnology(){
		$this->researcher->search();
		$this->researcher->chooseResearchMethod();
		$this->researcher->chooseResearchDirection();
		$this->researcher->chooseResearchTime();
		$this->researcher->chooseTech();
	}

	public function getTechnology(){
		return $this->researcher->publish();
	}
}

// $lab = new Laboratory();

// $warResearcher = new WarResearcher();
// $medResearcher = new MedicineResearcher();
// $socResearcher = new SocialResearcher();

// $lab->provideEquipmentTo($medResearcher);

// $lab->searchTechnology();

// $newTechnology = $lab->getTechnology();

// echo '<pre>';
// var_dump($newTechnology->getName());

?>