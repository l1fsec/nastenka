<?php
include('config.php');
$idecko = $_POST["idecko"];
$sql = "DELETE FROM info WHERE id='$idecko'";
$conn->query($sql);

header('Location: admin.php');

exit();
