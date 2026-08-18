<?php 
require_once 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$erro = ""; // Armazena a mensagem de erro para o HTML

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha)) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stml = $pdo->prepare($sql);
        $stml->bindParam(":email", $email);

        $stml->execute();
        
        $usuarioBanco = $stml->fetch(PDO::FETCH_ASSOC);
    
        if ($usuarioBanco && password_verify($senha, $usuarioBanco["senha"])) {
            // Salva na sessão e envia para o index.php
            $_SESSION['usuario_id'] = $usuarioBanco['id_usuario'];
            $_SESSION['usuario_nome'] = $usuarioBanco['email'];
            
            header("Location: index.php");
            exit;
        } else {
            // Em vez de 'echo', grava na variável para exibir no HTML
            $erro = "Usuário ou senha incorreitos.";
        }
    } else {
        $erro = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <main class="main_cadastro">
        <div class="form_cadastro">
            <h1>Login</h1>
            <form method="POST" action="">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
        
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <input type="submit" value="Entrar" id="btn_form">


                <p>Já possui uma conta? <a href="login.php">Faça login</a></p>
            </form>
        </div>
    </main>
</body>
</html>