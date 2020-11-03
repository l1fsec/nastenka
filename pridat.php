<?php
header('Location: index.php');
$mysqli = new mysqli("localhost", "root", "", "nastenka");
$datum_zad = $_POST["datum_zad"];
$text_zad = $_POST["text_zad"];
$datum_ode = $_POST["datum_ode"];
$sql = "INSERT INTO info (datum_zad, text_zad, datum_ode ) VALUES ('$datum_zad', '$text_zad', '$datum_ode');";
$mysqli->query($sql);
