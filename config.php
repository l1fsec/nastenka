<?php
$host = "localhost";
$user = "root";
$password = '';
$db_name = "nastenka";

$conn = new mysqli($host, $user, $password, $db_name);
if ($conn -> connect_error) {
    die ("<h1 style='text-align:center'>Nelze se připojit k databázi MySQL:</h1> " . $conn -> connect_error);
    exit();
}
?>
