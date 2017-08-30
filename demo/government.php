<?php 
	
	include('government.php');

	$personalData = $_POST['personalData'];
	$governmentPerson = Government::getGovernmentPerson($personalData);

	$returnData['governmentName'] = $governmentPerson::getFirstName($personalData['position'])." ".$governmentPerson::getLastName($personalData['position']);
	$returnData['governmentImage'] = $governmentPerson::getImage($personalData['position']);
	$returnData['governmentGreetings'] = $governmentPerson::getIntroduceText($personalData['position']);

	return $returnData;

?>