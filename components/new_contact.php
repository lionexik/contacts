<?php

include '../database.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$number = $_POST['number'];
$email = $_POST['email'];
$note = $_POST['note'];

if(isset($name) && isset($surname) && isset($email)) {

	$uri = preg_replace('/\s+/', '-', $name . " " . $surname);

	$stmt = $mysqli->prepare("INSERT INTO Contact (`name`, `surname`, `number`, `email`, `note`, `url`) VALUES (?, ?, ?, ?, ?, ?)");

	$stmt->bind_param("ssssss", $name, $surname, $number, $email, $note, $uri);

	$stmt->execute();

	$stmt->close();
}

header("Location:/");