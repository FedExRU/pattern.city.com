<?php

	/**
	 * @var $_POST['cause'] example:
	 *
	 * 1. fire
	 * 2. bandit
	 * 3. illness
	 * 
	 */

	include('emergency.php');

	$emergency = new Emegrency($_POST['cause']);

	return $emergency->call();

?>