    <?php
    // Configurações de conexão ao banco de dados
    $host = 'localhost';
    $dbname = 'projeto_login';
    $username = 'root';
    $password = '';

    try {
        // Conectando ao banco de dados usando PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];

            // Preparando a consulta
            $sql = $pdo->prepare("SELECT nome, matricula FROM alunos WHERE id_aluno = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                $nome = $result['nome'];
                $matricula = $result['matricula'];
                echo "<div id='resultado'>";
                echo "<p>Nome: " . htmlentities($nome) . "</p>";
                echo "<p>Número de Matrícula: " . htmlentities($matricula) . "</p>";
                echo "</div>";
            } else {
                echo "<div id='resultado'><p>Usuário não encontrado.</p></div>";
            }
        }

    } catch (PDOException $e) {
        echo '<div id="erro"><p>Erro: ' . $e->getMessage() . '</p></div>';
    }
    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Usuário</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="shortcut icon" href="imagens/icon/faicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div id="corpo-form">
        <h1>Consultar Aluno</h1>
        <form action="" method="POST">
            <label for="id">ID do Aluno:</label>
            <input type="number" name="id" id="id" required>
            <input type="submit" value="Consultar">
        </form>
    </div>

    <div id="cortes">
        <a href="sair.php">Sair</a>
    </div>
    <div id="cortes">
        <a href="areaPrivada.php">Área Privada</a>
    </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
