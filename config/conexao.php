<?php

$host = 'localhost';
$port = '3306';
$dbname = 'saep_db_simulado1';
$usuario = 'root';
$senha = 'mysql';

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $usuario,$senha);
} catch (PDOException $e) {
   die("Erro na conexão: ". $e ->getMessage());
}