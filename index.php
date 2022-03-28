<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Pessoas cadastradas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="card" style="width: 90vw; margin: 50px auto; padding: 40px"">
<div class="row" style="display: flex; justify-content: space-between">
    <div><h1>Pessoas cadastradas</h1></div>
    <div><a class="btn btn-primary" href="cadastrar.html">Cadastrar pessoas</a></div>

</div>

    <table class="table table-striped" style="margin-top: 20px">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome completo</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Senha</th>
            <th scope="col">Data de criação</th>
            <th scope="col">Data de modificação</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php

        require_once "conn.php";
        $sql = "SELECT id, nome_completo, data_nascimento, senha, created, modified FROM pessoas";
        $res = $conn->prepare($sql);
        $res->execute();
        $row = $res->fetchAll(PDO::FETCH_ASSOC);

        foreach ($row as $item):
            ?>
            <tr>
                <td scope="row"><?= $item["id"]; ?></td>
                <td><?= $item["nome_completo"]; ?></td>
                <td><?= $item["data_nascimento"]; ?></td>
                <td><?= $item["senha"]; ?></td>
                <td><?= $item["created"]; ?></td>
                <td><?= $item["modified"]; ?></td>
                <td style="display: flex; gap: 40px">
                    <a href="editar.php?id=<?= $item["id"]; ?>" title="Editar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                    </a>
                    <a href="deletar.php?id=<?= $item["id"]; ?>" title="Deletar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a>
                </td>
            </tr>

        <?php
        endforeach;
        ?>
        </tbody>
    </table>
</div>

<!--Scrips Bootstrap-->
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



