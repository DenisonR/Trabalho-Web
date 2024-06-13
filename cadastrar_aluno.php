<?php

require_once 'classes/Alunos.php';
$u = new Alunos();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema de Login</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="shortcut icon" href="imagens/icon/faicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        function showAlert(message) {
            alert(message);
        }

        function redirectToHome() {
            alert("Cadastrado com Sucesso!");
            window.location.href = "areaPrivada.php"; // Redireciona para a página principal
        }
    </script>
</head>

<body>

<div id="corpo-form-cad">
    <h1>Cadastrar Aluno</h1>

    <form method="POST">
        <!-- Campo de Cadastro, para o usuário colocar suas informações -->
        <input type="text" name="nome" placeholder="Nome Completo" maxlength="30"/>
        <input type="text" name="telefone" placeholder="Telefone" maxlength="30"/>
        <input type="text" name="matricula" placeholder="Número de Matrícula" maxlength="40"/>
        <input type="text" name="cpf" placeholder="CPF" maxlength="11"/>
        <input type="text" name="email" placeholder="E-mail" maxlength="50"/>
        <input type="password" name="senha" placeholder="Senha" maxlength="15"/>
        <input type="password" name="conf_senha" placeholder="Confirmar Senha"/>
        <input type="submit" value="CADASTRAR" maxlength="15" onclick="return true;"/>
        </select>

    </form>
</div>

<?php

if (isset($_POST['nome'])) {

    $nome = addslashes($_POST['nome']);
    $numeroMatricula = addslashes($_POST['matricula']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $cpf = addslashes($_POST['cpf']);
    $senha = addslashes($_POST['senha']);
    $conf_senha = addslashes($_POST['conf_senha']);

    if (!empty($nome) && !empty($telefone) && !empty($numeroMatricula) && !empty($email) && !empty($senha) && !empty($conf_senha) && !empty($cpf)) {
    }
    
        $u->conectar("projeto_login", "localhost", "root", "");

        if ($u->msgERRO == "") {

            if ($senha == $conf_senha) {

                if ($u->cadastrar($nome, $telefone, $numeroMatricula, $email, $senha, $cpf))  {
                    echo "<script>redirectToHome();</script>";
                } else {
                    echo "<script>showAlert('Matricula ou CPF já cadastrado!');</script>";
                }

            } else {
                echo "<script>showAlert('Senha e Confirmar Senha não correspondem!');</script>";
            }

        } else {
            echo "<script>showAlert('Erro: {$u->msgERRO}');</script>";
        }   

    } else {
        echo "<script>showAlert('Preencha Todos os Campos!');</script>";
    }

?>

<div id="cortes">
    <a href="sair.php">Sair</a>
</div>

<div id="cortes">
    <a href="areaPrivada.php">Area Privada</a>
</div>


<footer>
    <p>&copy; Todos os direitos reservados</p>
</footer>

</body>
</html>
