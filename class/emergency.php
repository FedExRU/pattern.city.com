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
		$data ['message'] = "Police are on their way for a ".$cause."!";
		$data ['image'] = "assets/img/emergency/police.png";

		return $data;
	}
} 

class FireDepartment implements ResqueStrategy{
	public function callHelp($cause){
		$data ['message'] = "Firefighters are on their way for a ".$cause."!";
		$data ['image'] = "assets/img/emergency/firefighters.png";

		return $data;
	}
} 

class Abmulance implements ResqueStrategy{
	public function callHelp($cause){
		$data ['message'] = "Abmulance are on their way for an ".$cause."!";
		$data ['image'] = "assets/img/emergency/ambulance.png";

		return $data;
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
		return $resqueSquat->callHelp($this->danger);
	}
}

?>