<?php 

$data = [];

if($_POST['action'] == "mayor"){

	include("../class/mayor.php");

	$mayor = Mayor::getMayor("Jonathan", "Burnside");
	$data['mayorName']		= $mayor::getName();
	$data['mayorGreetings'] = $mayor::introduceYourself();

	echo json_encode($data);

}

//echo json_encode($_POST['param']);


?>