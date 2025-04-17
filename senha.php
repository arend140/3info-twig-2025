<?php

require_once('twig_carregar.php');
require('inc/banco.php');
require_once('verifica_session.php');

$login = $_SESSION["login"];
$atual = $_POST["atual"] ?? null;
$nova = $_POST["nova"] ?? null;
$confirmar = $_POST["confirmar"] ?? null;

if($atual && $nova && $confirmar){
    $query = $pdo->prepare('SELECT * FROM usuarios WHERE login=:login');

    $query->execute([":login"=>$login]);

    $usuario = $query->fetchAll(PDO::FETCH_ASSOC);

    if(password_verify($atual, $usuario[0]['senha']) && $nova == $confirmar){
        
        $query = $pdo->prepare('UPDATE usuarios SET senha=:senha WHERE login=:login');

        $query->execute([":login"=>$login, ":senha"=>password_hash($nova, PASSWORD_DEFAULT)]);

        header("location: index.php");


    }else{
        echo $twig->render('senha.html', [
            'titulo' => 'Alteração de senha',
            'usuario' => $_SESSION["login"]
        ]);
    }
}else{
    echo $twig->render('senha.html', [
        'titulo' => 'Alteração de senha',
        'usuario' => $_SESSION["login"]
    ]);
}