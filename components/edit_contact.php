<?php

/**
 * Edit contact in database
 */

include '../class/Contact_class.php';

session_start();

$contact_id = $_GET['id'];

$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$number = trim($_POST['number']);
$email = trim($_POST['email']);
$note = trim($_POST['note']);


if(is_numeric($contact_id) && !empty($name) && !empty($surname)) {

	
	$contact = new ContactManager();
	$uri = preg_replace('/\s+/', '-', $name . " " . $surname);

	$result = $contact->edit($name, $surname, $number, $email, $note, $uri, $contact_id);

	if($result) {
		$_SESSION["message"] = "Editing was successful.";
	}else{
		$_SESSION["message"] = "Contact cant be edited.";
	}


}

header("Location:/");