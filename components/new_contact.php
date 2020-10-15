<?php

include 'database.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$number = $_POST['number'];
$email = $_POST['email'];
$note = $_POST['note'];

if(isset($name) && isset($surname) && isset($email)) {

	$stmt = $mysqli->prepare("INSERT INTO Contact (`name`, `surname`, `number`, `email`, `note`) VALUES (?, ?, ?, ?, ?)");

	$stmt->bind_param("sssss", $name, $surname, $number, $email, $note);

	$stmt->execute();

	$stmt->close();
}

header("Location:/");