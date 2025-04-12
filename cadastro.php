<?php

require_once('twig_carregar.php');

echo $twig->render('cadastro.html', [
    'titulo' => 'Cadastro'
]);