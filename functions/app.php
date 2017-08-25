<?php 

$data = [];

if($_POST['action'] == "mayor"){

	include("../class/mayor.php");

	$mayor = Mayor::getMayor("Jonathan", "Burnside");
	$data['mayorName']		= $mayor::getName();
	$data['mayorGreetings'] = $mayor::introduceYourself();

	echo json_encode($data);

}

if($_POST['action'] == "government"){

	include("../class/government.php");

	$personalData = $_POST['personalData'];
	$governmentPerson = Government::getGovernmentPerson($personalData);

	$introduceData = [];

	$introduceData['governmentName'] 		= $governmentPerson::getFirstName($personalData['position'])." ".$governmentPerson::getLastName($personalData['position']);
	$introduceData['governmentImage'] 		= $governmentPerson::getImage($personalData['position']);
	$introduceData['governmentGreetings']  	= $governmentPerson::getIntroduceText($personalData['position']);


	echo json_encode($introduceData);
}

if($_POST['action'] == "building"){

	include("../class/building.php");

	parse_str($_POST['structureData'], $output);
 
	foreach ($output as $key => $data){
		(!empty($data)) ?: die("Empty value for ".$key." field!");
	}

	$structure 		= null;
	$report 		= [];

	switch ($output['buildType']) {
		case 'house':
			$structure = new House();
			break;
		case 'hospital':
			$structure = new Hospital();
			break;
		case 'supermarket':
			$structure = new Supermarket();
			break;
	}

	if(!empty($structure)){
		$report['reportRoof'] 				= $structure->buildRoof(
			$output['roofType'],
			"metal tile"
		);
		$report['reportWalls'] 				= $structure->buildWalls(
			"block","stone" , 
			$output['wallsHeight'], 
			rand(4, 20)
		);
		$report['reportWindows'] 			= $structure->buildWindows(
			"two-doore", 
			$output['windowsMaterial'], 
			rand(5, 30)
		);
		$report['reportDoors'] 				= $structure->buildDoors(
			"swing",
			"wood", 
			$output['doorsCount']
		);
		$report ['animation'] 				= $structure->getStructureAnimation();
		$report ['completeStructureImage'] 	= $structure->getStructureImage();
		$report ['structureType'] 			= $structure->getStructureType();
		$report['date'] 					= date('d.m.Y');
	}

	echo json_encode($report);
}

if($_POST['action'] == 'emergency'){

	include("../class/emergency.php");

	$emergency = new Emegrency($_POST['cause']);

	echo json_encode($emergency->call());

}

if($_POST['action'] == 'massMedia'){

	include("../class/massMedia.php");

	$pc24 	= new TelevisionMassMedia();
	$pcb 	= new InternetMassMedia();

	Event::getInstance()->setEvent($_POST['partyName']);
	
	$data = [
		'tv' => [
			'text' 	=> $pc24->getNotifyText(),
			'image' => $pc24->getImage(),
			'time' => date("g:i a", time()-3*60)
		],
		'site' => [
			'text' 	=> $pcb->getNotifyText(),
			'image' => $pcb->getImage(),
			'time' =>  date("g:i a")
		],
		'date' => date("l, F, j, Y"),
		'name' => $_POST['partyName']
	];

	echo json_encode($data);
}

?>