<?php

include_once('Api_communicator.php');

if(isset($_POST['clef'])){

	$json = $_POST['clef'];

	$Api_communicator = new Api_communicator($json)	;

	
}

