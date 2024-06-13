<?php
    require_once 'classes/Usuarios.php';
    $usuario = new Usuarios();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Acesso ao Área Privada</title>
    <!-- Acionando o link css -->
    <link rel="stylesheet" href="style/main.css">
    <link rel="shortcut icon" href="imagens/icon/faicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div id="corpo-form">
    <h1>Esse é o Acesso a Área Privada da Instituição</h1>
    <h2>Inicialize sua Sessão</h2>
    <form method="POST">
        <!-- Campo responsável pela tela de Login -->
        <input type="email" name="email" placeholder="Usuário"/>
        <input type="password" name="senha" placeholder="Senha"/>
        <input type="submit" value="ACESSAR" name=""/>
        
        <!-- Link para a página de cadastro -->
        <a href="cadastrar.php">Ainda não é inscrito? <strong>Inscreva-se!</strong></a>
        
        <!-- Link para a página de recuperação de senha -->
        <a href="esqueci_senha.php">Esqueci minha senha</a>
    </form>
</div>

<?php

if (isset($_POST['email'])):
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if (!empty($email) && !empty($senha)):
        $usuario->conectar("projeto_login", "localhost", "root", "");

        if ($usuario->msgERRO == ""):
            if ($usuario->logar($email, $senha)):
                header("location: areaPrivada.php");
            else:
                ?>
                <script type="text/javascript">
                    alert("E-mail e/ou Senha Incorretos!");
                </script>
                <?php
            endif;
        else:
            ?>
            <script type="text/javascript">
                alert("Erro: <?php echo $usuario->msgERRO; ?>");
            </script>
        <?php
        endif;
    else:
        ?>
        <script type="text/javascript">
            alert("Preencha Todos os Campos!");
        </script>
    <?php
    endif;
endif;

?>

        <script type="text/javascript">
            alert("Preencha Todos os Campos!");
        </script>

    <?php
    

?>

<footer>
    <p>&copy; Todos os direitos reservados</p>
</footer>
</body>
</html>
