<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1> Nástěnka </h1>

    <a href="pridat.html">Přidat úkol/test</a>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nastenka";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Připojení selhalo: " . $conn->connect_error);
    }
    $sql = "SELECT datum_zad, text_zad, datum_ode FROM info";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Datum zadání: " . $row["datum_zad"] . "<br>";
            echo "Text zadání: " . $row["text_zad"] . "<br>";
            echo "Datum odevzdání: " . $row["datum_ode"] . "<br>";
        }
    } else {
        echo "0 výsledků";
    }
    $conn->close();
    ?>

</html>