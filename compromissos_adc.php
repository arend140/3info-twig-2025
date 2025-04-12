<?php
require_once('twig_carregar.php');
require('inc/banco.php');
date_default_timezone_set('America/Sao_Paulo');
require_once('verifica_session.php');

use Carbon\Carbon;

$titulo = $_POST['titulo'] ?? null;
$data = $_POST['data'] ?? null;

if($titulo && $data){
    $final_semana;
    if(Carbon::parse($data)->isWeekend()){
        $final_semana = "Final de Semana";
    }else{
        $final_semana = "";
    }
    
    $query = $pdo->prepare('INSERT INTO compromissos (titulo, data, final_semana) VALUES (:titulo, :data, :final_semana)');

    $query->execute([':titulo'=> $titulo, ':data'=>$data, ':final_semana'=>$final_semana]);

}

header('location: compromissos.php');