<?php
    include "../../configs/db.php";
    // Существует ли гет запрос
    if (isset($_GET["id"])) {
        $sql = "DELETE FROM ads WHERE ads.id =" . $_GET["id"];
        if (mysqli_query($connect, $sql)) {
            header("location: ../privateoffice.php"); //подключаем страницу со списком объявлений
        } else {
            echo "<h2>ERROR</h2>";
        }
    }

?>