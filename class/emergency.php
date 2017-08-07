<?php 

/**
*
* @var strategy 
*
*/

interface ResqueStrategy{
	public function callHelp($cause);
}

class PoliceDepartment implements ResqueStrategy{
	public function callHelp($cause){
		echo "Police are on their way for ".$cause;
	}
} 

class FireDepartment implements ResqueStrategy{
	public function callHelp($cause){
		echo "Firefighters are on their way for ".$cause;
	}
} 

class Abmulance implements ResqueStrategy{
	public function callHelp($cause){
		echo "Abmulance are on their way for ".$cause;
	}
}

class Emegrency{
	public $danger;

	function __construct($cause = "ok"){
		$this->danger = $cause;
	}

	public function call(){
		$resqueSquat = NULL;
		switch ($this->danger) {
			case 'fire':
				$resqueSquat = new FireDepartment();
				break;

			case 'illness':
				$resqueSquat = new Abmulance();
				break;

			case 'bandit':
				$resqueSquat = new PoliceDepartment();
				break;

			default:
				echo "Emegrency found no danger. Please, call to us when you see the danger. Our number is 911";
				die();
		}
		$resqueSquat->callHelp($this->danger);
	}
}

?>