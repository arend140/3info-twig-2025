<?php

require_once('twig_carregar.php');
require('inc/banco.php');
require_once('verifica_session.php');

if(isset($_POST['ordenar']) && $_POST['ordenar']=='maior'){
    $dados = $pdo->query('SELECT * FROM compromissos ORDER BY data DESC');
}else{
    $dados = $pdo->query('SELECT * FROM compromissos ORDER BY data ASC');
}

$comp = $dados->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('compromissos.html', [
    'titulo' => 'Compromissos',
    'compromissos' => $comp
]);