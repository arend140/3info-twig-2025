<?php

require('twig_carregar.php');
require_once('verifica_session.php');
date_default_timezone_set('America/Sao_Paulo');


use Carbon\Carbon;

/* Montar uma página no Twig chamada "Horário"
Será possível acessar pelo menu
Deverá mostrar a data de hoje e a data de amanhã
*/

echo $twig->render("horario.html", [
    'titulo' => "Horário",
    'hoje_dia' => Carbon::now()->day,
    'hoje_mes' => Carbon::now()->month,
    'hoje_ano' => Carbon::now()->year,
    'amanha_dia' => Carbon::now()->addDay()->day,
    'amanha_mes' => Carbon::now()->addDay()->month,
    'amanha_ano' => Carbon::now()->addDay()->year
]);

?>