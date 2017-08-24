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

	$report['date'] = date("d.m.Y");

	switch ($output['buildType']) {
		case 'house':
			$structure = new House();
			$report ['animation'] = 'https://media.giphy.com/media/9He7MYoAaKXe0/giphy.gif';
			$report ['completeStructureImage'] = 'houseComplete.png';
			$report ['structureType'] = 'House';
			break;
		case 'hospital':
			$structure = new Hospital();
			$report ['animation'] = 'https://cdn.dribbble.com/users/174036/screenshots/1473571/22-travel-agency.gif';
			$report ['completeStructureImage'] = 'hospitalComplete.png';
			$report ['structureType'] = 'Hospital';
			break;
		case 'supermarket':
			$structure = new Supermarket();
			$report ['animation'] = 'http://www.targetweb.ro/wp-content/uploads/2016/03/localseo.gif';
			$report ['completeStructureImage'] = 'supermarketComplete.png';
			$report ['structureType'] = 'Supermarket';
			break;
	}

	if(!empty($structure)){
		$report['reportRoof'] 	= $structure->buildRoof(
			$output['roofType'],
			"metal tile"
		);
		$report['reportWalls'] 	= $structure->buildWalls(
			"block","stone" , 
			$output['wallsHeight'], 
			rand(4, 20)
		);
		$report['reportWindows'] 	= $structure->buildWindows(
			"two-doore", 
			$output['windowsMaterial'], 
			rand(5, 30)
		);
		$report['reportDoors'] 	= $structure->buildDoors(
			"swing",
			"wood", 
			$output['doorsCount']
		);
	}

	echo json_encode($report);
}

if($_POST['action'] == 'emergency'){

	include("../class/emergency.php");

	$emergency = new Emegrency($_POST['cause']);

	echo json_encode($emergency->call());

}

?>