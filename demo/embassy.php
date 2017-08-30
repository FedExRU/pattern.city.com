<?php

	include('embassy.php');

	$ambassador = Embassy::arrangeMeetingWith($_POST['countryAmbassador']);

	$returnData = [
		'answer'	=> $ambassador->getAnswer(),
		'article'	=> $ambassador->getArticle(),
		'image' 	=> $ambassador->getImage(),
		'name'  	=> $ambassador->getName(),
		'position' 	=> $ambassador->getPosition(),
		'text'  	=> $ambassador->sayHello(),
	];

	return $returnData;

?>