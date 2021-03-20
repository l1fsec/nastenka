<?php
    include('config.php');
    session_start();

    if(isset($_POST['removeId'])) {
        header('Location: index.php');
        $removeId = $_POST['removeId'];

        $sql = "DELETE FROM info WHERE id = '$removeId'";
        $conn->query($sql);
    }
    else {
        if(isset($_POST['editId'])) {
            $_SESSION['editId'] = $_POST['editId'];
        }
    }
?>

<!DOCTYPE html>
<html lang="cs">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/style.css" />
    <title>Upravit úkol</title>
  </head>
  
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Zpět</a>
      </nav>

      <div class="container text-center mt-5">
        <h1>Upravit úkol</h1>
        <form method="POST">
          <div class="row">
            <div class="col">
              <label for="zadani">Datum zadání</label>
              <input class="form-control" type="date" name="datum_zad" />
            </div>
            <div class="col">
              <label for="odevzdani">Odevzdání</label>
              <input class="form-control" type="date" name="datum_ode" />
            </div>
          </div>
          
          <div class="form-group mt-5">
            <label for="text">Text zadání</label>
            <textarea class="form-control" rows="3" name="text_zad"></textarea>
          </div>

          <div class="form-group">
            <label for="predmet">Předmět</label>
            <select class="form-control" name="predmet">
              <option value="ALG">ALG</option>
              <option value="APS">APS</option>
              <option value="CJL">CJL</option>
              <option value="DAT">DAT</option>
              <option value="DAS">DAS</option>
              <option value="ELT">ELT</option>
              <option value="FYZ">FYZ</option>
              <option value="MAT">MAT</option>
              <option value="OBN">OBN</option>
              <option value="PVA">PVA</option>
              <option value="TEV">TEV</option>
              <option value="WEA">WEA</option>
              <option value="ZPV">ZPV</option>
            </select>
          </div>
          <div class="text-center mt-5">
          <p>Pro koho je úkol?</p>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="skupina" id="S1" value="S1">
            <label class="form-check-label" for="S1">S1</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="skupina" id="S2" value="S2">
            <label class="form-check-label" for="S2">S2</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="skupina" id="Vsichni" value="Pro všechny">
            <label class="form-check-label" for="Vsichni">Pro všechny</label>
          </div>
        </div>

          <input type="submit" class="btn btn-primary float-right" name="submit" value="Upravit">
        </form>
      </div>
        
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"
      ></script>

      <script>
          $.ajax({
            method: "POST",
            url: "getEditData.php",
            data: { id: <?php echo $_SESSION['editId']; ?> }
            })
            .done(function( msg ) {
                msg = JSON.parse(msg);
                console.log(msg);
                $("[name='datum_zad']").val(msg.datum_zad);
                $("[name='datum_ode']").val(msg.datum_ode);
                $("[name='text_zad']").val(msg.text_zad);
                $("[name='predmet']").val(msg.predmet);
            });
        </script>
    </body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        $editId = $_SESSION['editId'];
        $datum_zad = $_POST["datum_zad"];
        $text_zad = xssochrana($_POST["text_zad"]);
        $datum_ode = $_POST["datum_ode"];
        $predmet = $_POST["predmet"];

        if(!isset($_POST['skupina'])) {
            $skupina = "";
        }
        else {
            $skupina = $_POST['skupina'];
        }

        $sql = "SELECT datum_zad, text_zad, datum_ode, predmet, id, skupina FROM info WHERE id = '$editId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($datum_zad == "") {
                    $datum_zad = $row['datum_zad'];
                }
                if($text_zad == "") {
                    $text_zad = $row['text_zad'];
                }
                if($datum_ode == "") {
                    $datum_ode = $row['datum_ode'];
                }
                if($predmet == "") {
                    $predmet = $row['predmet'];
                }
                if($skupina == "") {
                    $skupina = $row['skupina'];
                }
            }
        }

        $sql = "UPDATE info SET datum_zad='$datum_zad',text_zad='$text_zad',datum_ode='$datum_ode',predmet='$predmet',skupina='$skupina' WHERE id = '$editId'";
        $conn->query($sql);
    ?>
        <script type="text/javascript"> 
            window.location.href= './index.php';
        </script>
    <?php
    } 

    function xssochrana($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
