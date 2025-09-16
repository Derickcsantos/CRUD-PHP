<?php 
require 'config/db.php';

if (!isset($_GET['id'])) {
    die("ID não fornecido");
}

$id = intval($_GET['id']);

$stmt = $pdo->prepare("DELETE FROM produtos WHERE id = $");
$stmt->execute([$id]);

header("Location: index.php");
exit;