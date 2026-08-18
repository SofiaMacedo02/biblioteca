<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha) && !empty($nome)) {
        
        try {
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nome_usuario, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senhaHash);

            if($stmt->execute()) {
                echo "Cadastro realizado com sucesso! <a href='login.php'>Clique aqui para fazer login</a>";
            }
        }catch (PDOException $e) {
            echo "Erro ao cadastrar usuário ";
        }
    }else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body_degrade">
    <main class="main_cadastro">
        <div class="form_cadastro">
            <h1>Cadastro</h1>
            <form method="POST" action="">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
        
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <input type="submit" value="Cadastrar" id="btn_form">

                <p>Já possui uma conta? <a href="login.php">Faça login</a></p>
            </form>
        </div>
    </main>

</body>
</html>