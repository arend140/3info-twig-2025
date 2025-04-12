<?php
require_once('twig_carregar.php');
require('inc/banco.php');

$login = $_POST['login'] ?? null;
$senha = $_POST['senha'] ?? null;

if($login && $senha){
    $query = $pdo->prepare('SELECT * FROM usuarios WHERE login=:login');

    $query->execute([":login"=>$login]);

    $usuario = $query->fetchAll(PDO::FETCH_ASSOC);

    if(password_verify($senha, $usuario[0]['senha'])){

        session_start();
        $_SESSION['login']=$login;
        
        header("location: compras.php");

    }else{
        echo $twig->render('login.html', [
            'titulo' => 'Login'
        ]);
    }

}else{
    echo $twig->render('login.html', [
        'titulo' => 'Login'
    ]);
}

