<?php
require_once 'auth.php'; // O auth.php já inicia a sessão e protege a página!
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Protegida</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Página Protegida</h2>
    <p>Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</p>

    <!-- Corrigido o link de logout removendo o espaço extra -->
    <p><a href="logout.php">Sair</a></p>
</body>
</html>