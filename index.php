<!DOCTYPE html>
<html lang="cs">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <style>
        .box {
            padding: 60px;
            margin: 60px 0;
        }
    </style>

    <script type="text/javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '/' + mm + '/' + dd;
        document.write(today);
    </script>

    <title>Hello, world!</title>
</head>

<body class="box">
    <div class="text-center">
        <h1>Nástěnka</h1>
        <p>
            Vítej v nástěnce! Zde budou úkoly pro 1ITB! Pokud máš pocit, že tu nějaký úkol chybí, tak ho můžeš klidně <a href="pridat.html">přidat!</a>
        </p>
    </div>
    <table class='table table-bordered'>
        <thead class='thead-dark'>
            <tr>
                <th class='text-warning'>Datum zadání</th>
                <th class='text-primary'>Text zadání</th>
                <th class='text-danger'>Datum odevzdání</th>
        </thead>
        </tr>
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
                echo "<tbody>";
                echo "<tr>";
                echo "<td>" . $row["datum_zad"] . "</td>";
                echo "<td>" . $row["text_zad"] . "</td>" . "<br>";
                echo "<td>" . $row["datum_ode"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 výsledků";
        }
        $conn->close();
        ?>
        </tbody>
    </table>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>