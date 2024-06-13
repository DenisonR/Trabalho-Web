<?php
require_once 'classes/Usuarios.php';

// Instancia a classe Usuarios
$usuarios = new Usuarios();

// Conecta ao banco de dados
$usuarios->conectar("projeto_login", "localhost", "root", "");

// Obtém os usuários do banco de dados
$lista_usuarios = $usuarios->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Lista de Usuários</h2>

<table>
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
    </tr>
    <?php
    // Verifica se a lista de usuários está vazia ou se ocorreu algum erro ao buscar os usuários
    if (!$lista_usuarios) {
        echo "<tr><td colspan='3'>Erro ao buscar os usuários: " . $usuarios->msgERRO . "</td></tr>";
    } else {
        // Verifica se há usuários na lista
        if (count($lista_usuarios) > 0) {
            // Loop através dos usuários e exibe cada um em uma linha da tabela
            foreach ($lista_usuarios as $usuario) {
                echo "<tr>";
                echo "<td>" . $usuario['nome'] . "</td>";
                echo "<td>" . $usuario['telefone'] . "</td>";
                echo "<td>" . $usuario['email'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum usuário encontrado.</td></tr>";
        }
    }
    ?>
</table>

<div id="cortes">
    <a href="sair.php">Sair</a>
</div>

<div id="cortes">
    <a href="areaPrivada.php">Area Privada</a>
</div>

</body>
</html>
