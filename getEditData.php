<?php
    include('config.php');
    $editId = $_POST['id'];

    $sql = "SELECT datum_zad, text_zad, datum_ode, predmet, id, skupina FROM info WHERE id = '$editId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }

    echo json_encode($row);
?>