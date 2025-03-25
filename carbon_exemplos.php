<?php

require_once('vendor/autoload.php');
date_default_timezone_set('America/Sao_Paulo');

use Carbon\Carbon;

// Agora
echo Carbon::now(). "<br>";

// Adiciona um dia
echo Carbon::now()->addDay() . '<br>';

// Subtrair uma semana
echo Carbon::now()->subWeek() . '<br>';

// Adiciona quatro anos
echo 'Próximas olimpíadas: ' . Carbon::createFromDate(2024)->addYears(4)->year . '<br>';

// Idade de alguém
echo "Sua idade é: " . Carbon::createFromDate(2007, 8, 7)->age . '<br>';

if(Carbon::now()->isWeekend()){
    echo 'Festa!';
}else{
    echo ' Aula';
}

echo '<br>';

// Calcular diferença entre datas
$nascimento = Carbon::CreateFromDate(2007, 8, 7);
echo 'Diferença de data: ' . Carbon::now()->diff($nascimento);

?>