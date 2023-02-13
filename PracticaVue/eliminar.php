<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    $conn = new mysqli("localhost", "root", "1234", "dbproducto");

    $id = $_GET['id'];

    $conn->query("DELETE FROM producto WHERE id=$id");

    $conn->close();
?>