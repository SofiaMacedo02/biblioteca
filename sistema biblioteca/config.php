<?php
$host = 'localhost';  // servidor local
$username = 'root';  // user padão 
$password = '';     // senha padão do XAMPP
$database = 'biblioteca'; // nome do banco de dados 

try{
    $pdo = new PDO("mysql:host=$host", $username, $password); // conexão com o banco de dados
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $database"); // cria o banco de dados se não existir
    $pdo->exec("USE $database"); // seleciona o banco de dados

    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
            id_usuario INT AUTO_INCREMENT PRIMARY KEY,
            nome_usuario VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            senha VARCHAR(64) NOT NULL
    )";
    $pdo->exec($sql); // cria a tabela de usuários se não existir
    
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>