<?php

require_once "conn.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    var_dump($data);

    $sql = "INSERT INTO pessoas (`nome_completo`, `data_nascimento`, `senha`) VALUES (:nome_completo, :data_nascimento, :senha)";
    $res = $conn ->prepare($sql);
    $res ->bindValue(":nome_completo", $data["completeName"]);
    $res ->bindValue(":data_nascimento", $data["birthDate"]);
    $res ->bindValue(":senha", $data["password"]);
    $res ->execute();
}

