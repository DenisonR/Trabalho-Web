<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="style/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        function showAlert(message) {
            alert(message);
        }
    </script>
</head>
<body>

<?php
if (isset($_GET['status']) && $_GET['status'] == 'enviado') {
    echo "<script>showAlert('Email enviado com sucesso! Verifique sua caixa de entrada.');</script>";
}
?>

<div id="corpo-form">
    <h1>Recuperar Senha</h1>
    <form method="POST" action="processa_recuperacao.php">
        <input type="email" name="email" placeholder="Digite aqui seu E-mail" required/>
        <input type="submit" value="RECUPERAR SENHA"/>
    </form>
</div>

<div id="cortes">
    <a href="sair.php">Sair</a>
</div>

</body>
</html>
