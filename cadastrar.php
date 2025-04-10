<?php
require('inc/banco.php');

$login = $_POST['login'] ?? null;
$senha = $_POST['senha'] ?? null;


if($login){
    $query = $pdo->prepare('INSERT INTO usuarios (login, senha) VALUES (:login, :senha)');

    $query->execute([':login'=>$login, ':senha'=>password_hash($senha, PASSWORD_DEFAULT)]);

    session_start();
    $_SESSION['login']=$login;

    header('location: compras.php');

}else{
    header('location: cadastro.php');

}