<?php
require_once 'auth.php';   // Proteção de acesso
require_once 'config.php'; // Conexão com $pdo

// Busca todos os livros no banco de dados
$stmt = $pdo->query("SELECT * FROM livros");

echo "<table>";
echo "<tr>
        <th>ID</th>
        <th>Título</th>
        <th>Ano</th>
        <th>Quantidade</th>
        <th>Ações</th>
      </tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['id_livro'] . "</td>";
    echo "<td>" . $row['titulo'] . "</td>"; 
    echo "<td>" . $row['ano_publicacao'] . "</td>";
    echo "<td>" . $row['quantidade'] . "</td>";
    echo "<td>
            <!-- 3. Chave id_livro corrigida nos links -->
            <a href='editar.php?id=" . $row['id_livro'] . "'>Editar</a> | 
            <a href='excluir.php?id=" . $row['id_livro'] . "'>Excluir</a>
        </td>";
    echo "</tr>";
}
echo "</table>";
?>