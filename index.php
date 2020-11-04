<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <style>
        .box {
            padding: 60px;
            margin: 60px 0;
        }
    </style>

    <title>Nástěnka</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Nástěnka</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="pridat.html">Přidat úkol</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.html">Přihlásit se</a>
            </li>
        </ul>
    </div>
</nav>
<div class="box">

    <body>
        <div class="text-center">
            <h1>Nástěnka</h1>
            <p>
                Vítej v nástěnce! Zde budou úkoly pro 1ITB! Pokud máš pocit, že tu nějaký úkol chybí, tak ho můžeš klidně <a href="pridat.html">přidat!</a>
            </p>
            <p id="datum"></p>
            <script>
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var yyyy = today.getFullYear();

                today = yyyy + '/' + mm + '/' + dd;

                document.getElementById('datum').innerHTML = today;
            </script>
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




        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    </body>
</div>

</html>