<?php

// $host = "localhost";
// $dbname = "controle_produtos";
// $username = "root";
// $password = "";
$host = "sql5.freesqldatabase.com";
$dbname = "sql5798780";
$username = "sql5798780";
$password = "HdMZVXrSd3";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}