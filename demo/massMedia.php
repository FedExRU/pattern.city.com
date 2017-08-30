<?php 
	
	include('massMedia.php');

	$pc24 = new TelevisionMassMedia();
	$pcb = new InternetMassMedia();

	Event::getInstance()->setEvent($_POST['partyName']);
	
	$returnData = [
		'tv' => [
			'text' => $pc24->getNotifyText(),
			'image'=> $pc24->getImage(),
			'time' => $pc24->getTime()
		],
		'site' => [
			'text' => $pcb->getNotifyText(),
			'image' => $pcb->getImage(),
			'time' =>  $pcb->getTime()
		],
		'date' => date("l, F, j, Y"),
		'name' => $_POST['partyName']
	];

	return $returnData;

?>