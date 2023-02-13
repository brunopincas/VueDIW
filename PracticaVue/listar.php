<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Content-Type: application/json; charset=UTF-8");

$database = new mysqli("localhost", "root", "1234", "dbproducto");

$query = "SELECT * FROM producto";
$result = $database->query($query);

$productos = array();

while ($row = $result->fetch_assoc()) {
  array_push($productos, $row);
}

http_response_code(200);
echo json_encode($productos);

$database->close();
?>