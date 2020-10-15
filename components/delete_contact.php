<?php

include '../database.php';

$contact_id = $_GET['id'];

if(is_numeric($contact_id)) {

	$stmt = $mysqli->prepare("DELETE FROM `Contact` WHERE `id` = ?");
	$stmt->bind_param('i', $contact_id);

	$stmt->execute();
	$stmt->close();

}

header("Location:/");