<?php

require_once "conn.php";
if($_SERVER["REQUEST_METHOD"] == "GET"){
    $id = filter_input(INPUT_GET,  "id", FILTER_SANITIZE_NUMBER_INT);
}

$sql = "SELECT nome_completo, data_nascimento, senha, created, modified FROM pessoas WHERE id =:id";
$res = $conn->prepare($sql);
$res ->bindValue(":id", $id, PDO::PARAM_INT);
$res->execute();
$row = $res->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Editar cadastro</title>
</head>
<body>

<div class="card" style="width: 50rem; margin: 50px auto; padding: 40px">
    <h1>Editar cadastro</h1>
    <form action="processEditar.php" id="formulario" method="post" style="margin-top: 20px">
        <div style="display: flex; gap: 10px; flex-direction: column">
            <input type="text" class="form-control" id="completeName" name="completeName" value="<?=$row["nome_completo"];?>" placeholder="Insira seu nome completo">
            <input type="date" class="form-control" id="birthDate" name="birthDate" value="<?=$row["data_nascimento"];?>" placeholder="Insira sua data de Nascimento">
            <input type="password" class="form-control" id="password" name="password" value="<?=$row["senha"];?>" placeholder="Insira sua senha">
            <input type="hidden" name="id" value="<?=$id?>">
        </div>
        <div style="display: flex; gap: 10px">
            <button type="submit" class="btn btn-primary" style="margin-top: 30px">Editar</button>
            <div><a class="btn btn-warning" href="index.php" style="margin-top: 30px">Voltar</a></div>
        </div>
    </form>


    <div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
                integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
                crossorigin="anonymous"></script>
    </div>
</body>
</html>