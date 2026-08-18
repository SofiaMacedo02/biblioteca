<?php
require_once 'config.php';
     
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_livro     = trim($_POST['nome_livro']);
    $ano_publicacao = trim($_POST['ano_publicacao']);
    $quantidade     = trim($_POST['quantidade']);
    $id_autor       = $_POST['id_autor'];
    $id_categoria   = $_POST['id_categoria'];

    if (!empty($nome_livro) && !empty($ano_publicacao) && !empty($quantidade)) {
        try {
            $sql = "INSERT INTO livros (nome_livro, ano_publicacao, quantidade, id_autor, id_categoria) 
                    VALUES (:nome_livro, :ano_publicacao, :quantidade, :id_autor, :id_categoria)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome_livro', $nome_livro);
            $stmt->bindParam(':ano_publicacao', $ano_publicacao);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':id_autor', $id_autor);
            $stmt->bindParam(':id_categoria', $id_categoria);

            if ($stmt->execute()) {
                echo "Livro cadastrado com sucesso!";
            }
        } catch (PDOException $e) {
            echo "Erro ao cadastrar livro: " . $e->getMessage();
        }
    } else {
        echo "Preencha todos os campos do livro.";
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
            <h1>Cadastrar Livro</h1>
            <form method="POST" action="">
                
                <label for="nome_livro">Nome / Título do Livro:</label>
                <input type="text" id="nome_livro" name="nome_livro" required>

                <label for="ano_publicacao">Ano de Publicação:</label>
                <input type="number" id="ano_publicacao" name="ano_publicacao" placeholder="Ex: 2023" required>

                <label for="quantidade">Quantidade de Exemplares:</label>
                <input type="number" id="quantidade" name="quantidade" min="1" required>

                <input type="submit" value="Salvar Livro" id="btn_form">

                <p><a href="index.php">← Voltar para o Painel</a></p>
            </form>
        </div>
    </main>

</body>
</html>