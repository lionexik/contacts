<?php

/**
 * Remove contact from database
 */

include '../class/Contact_class.php';

session_start();

$contact_id = $_GET['id'];

if(is_numeric($contact_id)) {
	$contact = new ContactManager();
	$result = $contact->delete($contact_id);

	if($result) {
		$_SESSION["message"] = "Deleting was successful.";
	}else{
		$_SESSION["message"] = "Cannt delete contact.";
	}

}

header("Location:/");