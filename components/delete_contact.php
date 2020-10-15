<?php

include '../database.php';

$contact_id = $_GET['contact_id'];

$sql = "DELETE FROM Contact WHERE `id` = $contact_id";
$res = $mysqli->query($sql);


header("Location:/");