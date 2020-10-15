<?php

include '../database.php';

$contact_id = $_GET['id'];

$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$number = trim($_POST['number']);
$email = trim($_POST['email']);
$note = trim($_POST['note']);


if(is_numeric($contact_id) && !empty($name) && !empty($surname)) {

	$stmt = $mysqli->prepare("UPDATE Contact SET name = ?, surname = ?, `number` = ?, email = ?, note = ? WHERE id = ?");

	$stmt->bind_param("sssssi", $name, $surname, $number, $email, $note, $contact_id);

	$stmt->execute();

	$stmt->close();



}

header("Location:/");