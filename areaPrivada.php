<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("location: index.php");
    exit;
}

// Verifica se o usuário é um administrador
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Área Restrita</title>
    <link rel="stylesheet" href="style/area_privada.css">
    <link rel="shortcut icon" href="imagens/icon/paz.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div id="user-info">
    <br>
    <h1>Suas Informações de Cadastro</h1>
    <br>
    <a href="alterar_informacao.php"> * Alterar Informações</a>
    <a href="info.php"> * Área Restrita</a>
    <a href="excluirUsuario.php">* Exclusão de Usuários</a>
    <a href="excluirAluno.php">* Exclusão de Aluno</a>
    <a href="cadastrar_aluno.php">* Cadastro de Aluno</a>
    <a href="consulta_aluno.php">* Consultar Aluno</a>
</div>

<br>
<br>
<br>
<h1>Bem-Vindo ao Área Privada</h1>
<h2 class="texto-centralizado">Ao seu lado superior direito, você terá acesso a todos os campos referente a aluno e usuário</h2>

<div id="cortes">
    <a href="sair.php">Sair</a>
</div>



<footer>
    <p>&copy; Todos os direitos reservados</p>
</footer>

</body>
</html>
