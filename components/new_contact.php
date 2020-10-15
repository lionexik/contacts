<?php

include '../database.php';

$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$number = trim($_POST['number']);
$email = trim($_POST['email']);
$note = trim($_POST['note']);

if(!empty($name) && !empty($surname)) {

	$uri = preg_replace('/\s+/', '-', $name . " " . $surname);

	$stmt = $mysqli->prepare("INSERT INTO Contact (`name`, `surname`, `number`, `email`, `note`, `url`) VALUES (?, ?, ?, ?, ?, ?)");

	$stmt->bind_param("ssssss", $name, $surname, $number, $email, $note, $uri);

	$stmt->execute();

	$stmt->close();
}

header("Location:/");