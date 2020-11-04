<?php
include('config.php');
$username = $_POST['jmeno'];
$password = $_POST['heslo'];

//to prevent from mysqli injection  
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$sql = "select *from user where jmeno = '$username' and heslo = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
    header('Location: admin.php');;
} else {
    echo "<h1> Login failed. Invalid username or password.</h1>";
}
