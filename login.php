<?php
    include('config.php');
    $username = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = test_input($_POST['jmeno']);
        $password = test_input($_POST['heslo']);
    }

    $sql = "SELECT * FROM user WHERE jmeno = '$username' AND heslo = '$password'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        header('Location: admin.php');
    } else {
        echo "<h1 style='text-align:center;'> Přihlášení selhalo! Nesprávné heslo nebo jméno.</h1>";
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>