<?php

require_once('twig_carregar.php');
require('inc/banco.php');
date_default_timezone_set('America/Sao_Paulo');

use Carbon\Carbon;

$dados = $pdo->query('SELECT * FROM compromissos');

$comp = $dados->fetchAll(PDO::FETCH_ASSOC);

$final_semana;

if(Carbon::parse($comp[0]['data'])->isWeekend()){
    $final_semana = "Final de Semana";
}else{
    $final_semana = "";
}


echo $twig->render('compromissos.html', [
    'titulo' => 'Compromissos',
    'compromissos' => $comp,
    'final_semana' => $final_semana
]);