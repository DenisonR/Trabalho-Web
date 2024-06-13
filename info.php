<?php

// Conecta ao banco de dados
$pdo = new PDO("mysql:host=localhost;dbname=projeto_login", "root", "");

// Consulta para selecionar todos os registros da tabela usuarios
$stmt = $pdo->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Dados de Cadastro dos Usuários</title>
</head>
<body>

<div>
    <h1>Dados de Cadastro dos Usuários</h1>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <link rel="stylesheet" href="style/info.css">
    <link rel="shortcut icon" href="imagens/icon/faicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>CPF</th>
        </tr>
        <?php
        foreach($usuarios as $usuario) {
            echo "<tr>";
            echo "<td>".$usuario['id_usuario']."</td>";
            echo "<td>".$usuario['nome']."</td>";
            echo "<td>".$usuario['telefone']."</td>";
            echo "<td>".$usuario['email']."</td>";
            echo "<td>".$usuario['cpf']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div id="cortes">
    <a href="sair.php">Sair</a>
</div>

<div id="cortes">
    <a href="areaPrivada.php">Area Privada</a>
</div>

</body>
</html>
