<?php 

/**
 * @var Constant CLASS_PATH
 */

define(CLASS_PATH,"../class/");

/**
 * @var Returning data to layouts
 */

$returnData = array();

/**
 * @var Checking actions cases
 */

if($_POST['action'] == "mayor"){

	include(CLASS_PATH."mayor.php");

	$mayor = Mayor::getMayor("Jonathan", "Burnside");
	$returnData['mayorName']		= $mayor::getName();
	$returnData['mayorGreetings'] = $mayor::introduceYourself();

	echo json_encode($returnData);

}

if($_POST['action'] == "government"){

	include(CLASS_PATH."government.php");

	$personalData = $_POST['personalData'];
	$governmentPerson = Government::getGovernmentPerson($personalData);

	$returnData['governmentName'] 		= $governmentPerson::getFirstName($personalData['position'])." ".$governmentPerson::getLastName($personalData['position']);
	$returnData['governmentImage'] 		= $governmentPerson::getImage($personalData['position']);
	$returnData['governmentGreetings']  	= $governmentPerson::getIntroduceText($personalData['position']);


	echo json_encode($returnData);
}

if($_POST['action'] == "building"){

	include(CLASS_PATH."building.php");

	parse_str($_POST['structureData'], $output);
 
	foreach ($output as $key => $data){
		(!empty($data)) ?: die("Empty value for ".$key." field!");
	}

	$structure 		= null;

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
		$returnData['reportRoof'] 				= $structure->buildRoof(
			$output['roofType'],
			"metal tile"
		);
		$returnData['reportWalls'] 				= $structure->buildWalls(
			"block","stone" , 
			$output['wallsHeight'], 
			rand(4, 20)
		);
		$returnData['reportWindows'] 			= $structure->buildWindows(
			"two-doore", 
			$output['windowsMaterial'], 
			rand(5, 30)
		);
		$returnData['reportDoors'] 				= $structure->buildDoors(
			"swing",
			"wood", 
			$output['doorsCount']
		);
		$returnData ['animation'] 				= $structure->getStructureAnimation();
		$returnData ['image'] 					= $structure->getStructureImage();
		$returnData ['structureType'] 			= $structure->getStructureType();
		$returnData ['date'] 					= date('d.m.Y');
	}

	echo json_encode($returnData);
}

if($_POST['action'] == 'emergency'){

	include(CLASS_PATH."emergency.php");

	$emergency = new Emegrency($_POST['cause']);

	echo json_encode($emergency->call());

}

if($_POST['action'] == 'massMedia'){

	include(CLASS_PATH."massMedia.php");

	$pc24 	= new TelevisionMassMedia();
	$pcb 	= new InternetMassMedia();

	Event::getInstance()->setEvent($_POST['partyName']);
	
	$returnData = [
		'tv' => [
			'text' 	=> $pc24->getNotifyText(),
			'image' => $pc24->getImage(),
			'time'  => $pc24->getTime()
		],
		'site' => [
			'text' 	=> $pcb->getNotifyText(),
			'image' => $pcb->getImage(),
			'time' =>  $pcb->getTime()
		],
		'date' => date("l, F, j, Y"),
		'name' => $_POST['partyName']
	];

	echo json_encode($returnData);
}

if($_POST['action'] == 'embassy'){

	include(CLASS_PATH."embassy.php");

	$ambassador = Embassy::arrangeMeetingWith($_POST['countryAmbassador']);

	$returnData = [
		'answer'	=> $ambassador->getAnswer(),
		'article'	=> $ambassador->getArticle(),
		'image' 	=> $ambassador->getImage(),
		'name'  	=> $ambassador->getName(),
		'position' 	=> $ambassador->getPosition(),
		'text'  	=> $ambassador->sayHello(),
	];

	echo json_encode($returnData);
}

// $_POST['action'] = 'laboratory';
// $_POST['direction'] = "War";

if($_POST['action'] == 'laboratory'){

	include(CLASS_PATH."laboratory.php");

	$laboratory = new Laboratory();
	$researcher = null;

	switch ($_POST['direction']) {
		case 'War':
			$researcher = new WarResearcher();
			break;
		case 'Medicine':
			$researcher = new MedicineResearcher();
			break;
		case 'Social':
			$researcher = new SocialResearcher();
			break;
	}

	if(!empty($researcher)){
		$laboratory->provideEquipmentTo($researcher);
		$laboratory->searchTechnology();

		

		$newTechnology = $laboratory->getTechnology();

		$returnData = [
			'name' => $newTechnology->getName(),
			'image' => $newTechnology->getImage(),
			'wiki' => $newTechnology->getWiki()
		];
	}

	echo json_encode($returnData);

}

?>