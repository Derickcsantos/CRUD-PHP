<?php 
require 'config/db.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $preco = floatval($_POST['preco']);
    $quantidade = intval($_POST['quantidade']);

    if ($nome && $preco >= 0 && $quantidade >= 0) {
        $stmt = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco, quantidade) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $descricao, $preco, $quantidade]);
        header("Location: index.php");
        exit;
    } else {
        echo "<p style='color:red'>Preencha os campos corretamente.</p>";
    }
}
?>

<h2>Cadastrar Produto</h2>
<form method="post">
    <label>Nome: <input type="text" name="nome" required></label><br><br>
    <label>Descrição: <textarea name="descricao"></textarea></label><br><br>
    <label>Preço: <input type="number" step="0.01" name="preco" required></label><br><br>
    <label>Quantidade: <input type="number" name="quantidade" required></label><br><br>
    <button type="submit" class="btn">Salvar</button>
</form>

<?php include 'includes/footer.php'; ?>