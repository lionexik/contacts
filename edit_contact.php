<?php

include 'database.php';

$contact_id = $_GET['contact_id'];

$name = $_POST['name'];
$surname = $_POST['surname'];
$number = $_POST['number'];
$email = $_POST['email'];
$note = $_POST['note'];

if(isset($contact_id) $$ isset($name) && isset($surname) && isset($email)) {

	$stmt = $mysqli->prepare("UPDATE Contact SET name = ?, surname = ?, `number` = ?, email = ?, note = ? WHERE id = ?");

	$stmt->bind_param("sssssi", $name, $surname, $number, $email, $note, $contact_id);

	$stmt->execute();

	$stmt->close();

}

header("Location:/");