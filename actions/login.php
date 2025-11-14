<?php

include_once '../config/conexao.php';

if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$email = $_POST['email'];
$senha = $_POST['senha'];

try{
    $sql = "SELECT * FROM usuario WHERE login = :email AND senha = :senha";
    $stmt = $conn ->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);
    $stmt->execute();

    $usuario =$stmt->fetch();

    if(empty($usuario)) {
        header('Location:../index.php?erro=credenciais');
        exit;
    }else{
        $_SESSION['idusuario'] = $usuario['idusuario'];
        $_SESSION['email'] = $usuario['email'];
        
        header('Location:../veiculos.php');
        exit;
    }
} catch  (PDOException $e) {
    echo "Erro ao Logar: ".$e -> getMessage();
}