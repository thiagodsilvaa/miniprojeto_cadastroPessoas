<?php

require_once "conn.php";
if($_SERVER["REQUEST_METHOD"] == "GET"){
    $id = filter_input(INPUT_GET,  "id", FILTER_SANITIZE_NUMBER_INT);
    var_dump($id);
}

$sql = "DELETE FROM pessoas
WHERE id =:id";
$res = $conn->prepare($sql);
$res ->bindValue(":id", $id, PDO::PARAM_INT);
$res->execute();

if($id) {header ("Location: index.php");}
