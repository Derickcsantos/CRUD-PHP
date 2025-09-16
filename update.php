<?php
require 'config/db.php';
include 'includes/header.php';

if (!isset($_GET['id'])) {
    die("ID não fornecido");
}

$id = intval($_GET['id']);

$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$produto = $stmt->fetch();

if (!produto) {
    die("Produto não encontrado.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $preco = floatval($_POST['preco']);
    $quantidade = intval($_POST['quantidade']);

    if ($nome && $preco >= 0 && $quantidade >= 0) {
        $stmt = $pdo->prepare("UPDATE produtos SET nome=?, descricao=?, preco=?, quantidade=? WHERE id=?");
        $stmt->execute([$nome, $descricao, $preco, $quantidade, $id]);
        header("Location: index.php");
        exit;
    } else {
        echo "<p style='color:red'>Preencha os campos corretamente.</p>";
    }
}
?>

<h2>Editar produto</h2>
<form method="POST">
    <label>Nome: <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required></label><br><br>
    <label>Descrição: <textarea name="descricao"><?= htmlspecialchars($produto['descricao']) ?></textarea></label><br><br>
    <label>Preço: <input type="number" step="0.01" name="preco" value="<?= htmlspecialchars($produto['preco']) ?>" required></label><br><br>
    <label>Quantidade: <input type="number" name="quantidade" value="<?= htmlspecialchars($produto['quantidade']) ?>" required></label><br><br>
    <button type="submit" class="btn">Atualizar</button>
</form>

<?php include 'includes/footer.php'; ?>