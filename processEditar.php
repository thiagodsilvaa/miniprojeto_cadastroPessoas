<?php

require_once "conn.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "UPDATE pessoas
      SET
        nome_completo = ' ".$data["completeName"]."',
        data_nascimento = ' ".$data["birthDate"]."',
        senha= ' ".$data["password"]."',
        modified=CURRENT_TIMESTAMP
    WHERE id =:id";

    $res = $conn ->prepare($sql);
    $res ->bindValue(":id", $data["id"]);
    $res ->execute();
    if($res) {header ("Location: index.php");}
}