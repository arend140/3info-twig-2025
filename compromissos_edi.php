<?php
require('inc/banco.php');

require_once('twig_carregar.php');
date_default_timezone_set('America/Sao_Paulo');

use Carbon\Carbon;

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Get = Visualizar o formulário
        $id = $_GET['id'] ?? null;
    
        if ($id) {
            $item = $pdo->prepare('SELECT * FROM compromissos WHERE id = :id');
            $item->execute([':id' => $id]);
            $dados = $item->fetch();
    
            echo $twig->render('compromissos_edi.html', [
                'titulo' => 'Compromissos',
                'dados' => $dados,
            ]);
        }
    }else{
    //POST = Gravar os dados
        $final_semana;
        if(Carbon::parse($_POST['data'])->isWeekend()){
            $final_semana = "Final de Semana";
        }else{
            $final_semana = "";
        }
        $edit = $pdo->prepare('UPDATE compromissos SET titulo = :titulo, data = :data, final_semana = :final_semana WHERE id = :id');
        $edit->execute([
            ':titulo' => $_POST['titulo'],
            ':data' => $_POST['data'],
            ':final_semana' => $final_semana,
            ':id' => $_POST['id'],
        ]);

        header('location: compromissos.php');

}