<?php

/**
 * Save new contact to database
 */

include '../class/Contact_class.php';

session_start();

$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$number = trim($_POST['number']);
$email = trim($_POST['email']);
$note = trim($_POST['note']);

if(!empty($name) && !empty($surname)) {

	$uri = preg_replace('/\s+/', '-', $name . " " . $surname);

	$contact = new ContactManager();
	$result = $contact->saveToDatabase($name, $surname, $number, $email, $note, $uri);

	if($result) {
		$_SESSION["message"] = "Saving was successful.";
	}else{
		$_SESSION["message"] = "Cannot save contact.";
	}

}

header("Location:/");