<?php
require_once 'auth.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Pagina protegida </h2>
    <p>Olá <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?> </p>
    <p><a href = 'logout.php ' > Sair </a></p>
</body>
</html>