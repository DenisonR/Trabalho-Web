<?php
    require_once 'classes/Usuarios.php';
    $usuario = new Usuarios();
?>

<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/main.css">
    <link rel="shortcut icon" href="imagens/icon/faicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        #nav-links {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        #nav-links a {
            margin-left: 10px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }
        #nav-links a:hover {
            text-decoration: underline;
        }
        #corpo-form {
            margin-top: 50px; /* Ajustar o formulário para baixo, evitando sobreposição com os links */
        }
    </style>
</head>
<body>

<div id="nav-links">
    <a href="areaPrivada.php">Área Privada</a>
    <a href="sair.php">Sair</a>
</div>

<div id="corpo-form">
    <h1>Alterar Informações de Login de Usuário</h1>
    <form method="POST">
        <input type="text" name="usuario_atual" placeholder="Usuário Atual" required>
        <input type="email" name="email_atual" placeholder="E-mail Atual">
        <input type="password" name="senha_atual" placeholder="Senha Atual">
        <input type="text" name="telefone_atual" placeholder="Telefone Atual">
        
        <input type="text" name="nome" placeholder="Novo Nome">
        <input type="email" name="email" placeholder="Novo E-mail">
        <input type="password" name="senha" placeholder="Nova Senha">
        <input type="text" name="telefone" placeholder="Novo Telefone">
        <input type="submit" value="ALTERAR LOGIN" name="alterar">
    </form>
</div>

<?php
if (isset($_POST['alterar'])) {
    $usuarioAtual = addslashes($_POST['usuario_atual']);
    $emailAtual = addslashes($_POST['email_atual']);
    $senhaAtual = addslashes($_POST['senha_atual']);
    $telefoneAtual = addslashes($_POST['telefone_atual']);
    
    $novoNome = addslashes($_POST['nome']);
    $novoEmail = addslashes($_POST['email']);
    $novaSenha = addslashes($_POST['senha']);
    $novoTelefone = addslashes($_POST['telefone']);

    if (!empty($usuarioAtual) && !empty($emailAtual) && !empty($senhaAtual) && !empty($telefoneAtual)) {
        $usuario->conectar("projeto_login", "localhost", "root", "");
        if ($usuario->msgERRO == "") {
            // Verificar se o usuário atual existe
            $infoAtual = $usuario->buscarInformacoes($usuarioAtual, $emailAtual, $senhaAtual, $telefoneAtual);
            if ($infoAtual) {
                // Lógica para atualizar as informações no banco de dados
                $atualizar = $usuario->atualizarInformacoes($usuarioAtual, $novoNome, $novoEmail, $novaSenha, $novoTelefone);
                if ($atualizar) {
                    echo "<script>alert('Informações atualizadas com sucesso!');</script>";
                } else {
                    echo "<script>alert('Erro ao atualizar informações. Por favor, tente novamente.');</script>";
                }
            } else {
                echo "<script>alert('Informações atuais não conferem ou não existem.');</script>";
            }
        } else {
            echo "<script>alert('Erro: " . $usuario->msgERRO . "');</script>";
        }
    } else {
        echo "<script>alert('Preencha todos os campos para atualizar suas informações!');</script>";
    }
}
?>

</body>
</html>
