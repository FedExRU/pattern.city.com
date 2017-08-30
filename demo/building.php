<?php

	/**
	 * @var $_POST['structureData'] example:
	 *
	 * $structureData = [
	 *		'buildType' => 'house',
	 *		'roofType' => 'Sideing',
	 *		'wallsHeight' => '5',
	 *		'windowsMaterial' => 'wood',
	 *		'doorsCount' => '3',
	 * ]
	 */

	include('building.php');

	parse_str($_POST['structureData'], $output);
 
	foreach ($output as $key => $data){
		(!empty($data)) ?: die("Empty value for ".$key." field!");
	}

	$structure = null;

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
		$returnData['reportRoof'] = $structure->buildRoof(
			$output['roofType'],
			"metal tile"
		);
		$returnData['reportWalls'] 	= $structure->buildWalls(
			"block","stone" , 
			$output['wallsHeight'], 
			rand(4, 20)
		);
		$returnData['reportWindows'] = $structure->buildWindows(
			"two-doore", 
			$output['windowsMaterial'], 
			rand(5, 30)
		);
		$returnData['reportDoors'] = $structure->buildDoors(
			"swing",
			"wood", 
			$output['doorsCount']
		);
		$returnData ['animation'] = $structure->getStructureAnimation();
		$returnData ['image'] = $structure->getStructureImage();
		$returnData ['structureType'] = $structure->getStructureType();
		$returnData ['date'] = date('d.m.Y');
	}

	return $returnData;

?>