<?php
	
	include('mayor.php');

	$mayor = Mayor::getMayor('Jonathan', 'Burnside');
	$returnData ['mayorName'] = $mayor::getName();
	$returnData ['mayorGreetings'] = $mayor::introduceYourself();

	return $returnData; 
?>
