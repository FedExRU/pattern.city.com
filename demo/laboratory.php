<?php

	include('laboratory.php');

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

	return $returnData;

?>