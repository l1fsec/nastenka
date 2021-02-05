<?php
header('Location: index.php');
include('config.php');
$mysqli = new mysqli($host, $user, $password, $db_name);
$datum_zad = $_POST["datum_zad"];
$text_zad = $_POST["text_zad"];
$datum_ode = $_POST["datum_ode"];
$sql = "INSERT INTO info (datum_zad, text_zad, datum_ode ) VALUES ('$datum_zad', '$text_zad', '$datum_ode');";
$mysqli->query($sql);


// Sanitize user inputs to DB


// $dat_zad = $_POST["datum_zad"]
// $text_zad = $_POST["text_zad"] <---- This could work, perfect it
// $dat_od = $_POST["datum_ode"]