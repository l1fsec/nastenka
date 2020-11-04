<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guestbook";
$idecko = $_POST["idecko"];
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn){
	die("Conn nefunguje:");
}

$sql = "DELETE FROM gbook WHERE id='$idecko'";
$conn->query($sql);

header('Location: admin.php');

exit();
