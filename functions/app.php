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

$_POST['action'] = "building";

if($_POST['action'] == "building"){

	include("../class/building.php");

	parse_str($_POST['structureData'], $output);
 
	foreach ($output as $key => $data){
		(!empty($data)) ?: die("Empty value for ".$key." field!");
	}

	$structure 	= null;
	$order 		= [];

	switch ($output['buildType']) {
		case 'house':
			$structure = new House();
			$order ['image'] = 'https://media.giphy.com/media/9He7MYoAaKXe0/giphy.gif';
			break;
		case 'hospital':
			$structure = new Hospital();
			$order ['image'] = 'https://cdn.dribbble.com/users/174036/screenshots/1473571/22-travel-agency.gif';
			break;
		case 'supermarket':
			$structure = new Supermarket();
			$order ['image'] = 'http://www.targetweb.ro/wp-content/uploads/2016/03/localseo.gif';
			break;
	}

	if(!empty($structure)){
		$order['orderRoof'] 	= $structure->buildRoof(
			$output['roofType'],
			"metal tile"
		);
		$order['orderWalls'] 	= $structure->buildWalls(
			"block","stone" , 
			$output['wallsHeight'], 
			rand(4, 20)
		);
		$order['orderWindows'] 	= $structure->buildWindows(
			"two-doore", 
			$output['windowsMaterial'], 
			rand(5, 30)
		);
		$order['orderDoors'] 	= $structure->buildDoors(
			"swing",
			"wood", 
			$output['doorsCount']
		);
	}

	echo json_encode($order);
}

?>