<?php

require_once('twig_carregar.php');
require_once('verifica_session.php');

echo $twig->render("index.html", [
    'fruta' => 'Abacaxi',
]);