<?php
header('Location: index.php');
include('config.php');

$text_zad = "";

$datum_zad = $_POST["datum_zad"];
$text_zad = xssochrana($_POST["text_zad"]);
$datum_ode = $_POST["datum_ode"];

$sql = "INSERT INTO info (datum_zad, text_zad, datum_ode ) VALUES ('$datum_zad', '$text_zad', '$datum_ode')";
$conn->query($sql);

function xssochrana($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>