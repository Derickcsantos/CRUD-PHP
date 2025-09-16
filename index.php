<?php
require 'config/db.php';
include 'includes/header.php';

$stmt = $pdo->query("SELECT * FROM produtos ORDER BY criado_em DESC");
$produtos = $stmt->fetchAll();

?>

<h2>Lista de Produtos</h2>

<?php if (count($produtos) > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= htmlspecialchars($produto['id'])?></td>
                <td><?= htmlspecialchars($produto['nome'])?></td>
                <td><?= htmlspecialchars($produto['descricao'])?></td>
                <td><?= number_format($produto['preco'], 2, ',', '.')?></td>
                <td><?= htmlspecialchars($produto['quantidade'])?></td>
                <td>
                    <a class="btn" href="update.php?id=<?= $produto['id'] ?>">Editar</a>
                    <a class="btn" href="delete.php?id=<?= $produto['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>
    <?php else: ?>
        <p>Nenhum produto cadastrado</p>
    <?php endif; ?>

    <?php include 'includes/footer.php'; ?>
