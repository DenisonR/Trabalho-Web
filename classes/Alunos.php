<?php

class Alunos {
    private $pdo;
    public  $msgERRO = "";

    public function conectar($nome, $host, $usuario, $senha) {
        try {
            $this->pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
        } catch (PDOException $e) {
            $this->msgERRO = $e->getMessage();
        }
    }

    public function cadastrar($nome, $telefone, $numeroMatricula, $email, $senha, $cpf) {
        $sql = $this->pdo->prepare("SELECT id_aluno FROM alunos WHERE email = :e OR cpf = :c");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":c", $cpf);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return false; 
        } else {
            $sql = $this->pdo->prepare("INSERT INTO alunos (nome, telefone, matricula, email, senha, cpf) VALUES (:n, :t, :m, :e, :s, :c)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":m", $numeroMatricula);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha)); 
            $sql->bindValue(":c", $cpf);
            $sql->execute();
            return true;
        }
    }

    public function logar($email, $senha) {
        $sql = $this->pdo->prepare("SELECT id_aluno FROM alunos WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha)); 
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_aluno'] = $dado['id_aluno'];
            $_SESSION['email_aluno'] = $email; 
            $_SESSION['is_admin'] = $this->eAdmin($email); 
            return true; 
        } else {
            return false; 
        }
    }

    public function atualizarInformacoes($alunoAtual, $novoNome, $novoTelefone, $novoNumeroMatricula, $novoEmail, $novaSenha) {
        $sql = $this->pdo->prepare("UPDATE alunos SET nome = :nn, telefone = :nt, numero_matricula = :nm, email = :ne, senha = :ns WHERE nome = :n");
        $sql->bindValue(":nn", $novoNome);
        $sql->bindValue(":nt", $novoTelefone);
        $sql->bindValue(":nm", $novoNumeroMatricula);
        $sql->bindValue(":ne", $novoEmail);
        $sql->bindValue(":ns", md5($novaSenha)); 
        $sql->bindValue(":n", $alunoAtual);
        return $sql->execute(); 
    }

    public function buscarInformacoes($alunoAtual) {
        $sql = $this->pdo->prepare("SELECT * FROM alunos WHERE nome = :n");
        $sql->bindValue(":n", $alunoAtual);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            return false;
        }
    }
}
?>
