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

	$introduceData['governmentName'] = $governmentPerson::getFirstName($personalData['position'])." ".$governmentPerson::getLastName($personalData['position']);
	$introduceData['governmentImage'] = $governmentPerson::getImage($personalData['position']);
	$introduceData['governmentGreetings']  = $governmentPerson::getIntroduceText($personalData['position']);


	echo json_encode($introduceData);
}

//echo json_encode($_POST['param']);


?>