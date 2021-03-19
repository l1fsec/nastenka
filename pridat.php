<?php
header('Location: index.php');
include('config.php');

$datum_zad = $_POST["datum_zad"];
$text_zad = xssochrana($_POST["text_zad"]);
$datum_ode = $_POST["datum_ode"];
$predmet = $_POST["predmet"];
$skupina = $_POST["skupina"];
$sql = "INSERT INTO info (datum_zad, text_zad, datum_ode, predmet, skupina) VALUES ('$datum_zad', '$text_zad', '$datum_ode', '$predmet' ,'$skupina')";
$conn->query($sql);

function xssochrana($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>