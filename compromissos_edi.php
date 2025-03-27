<?php
require('inc/banco.php');

require_once('twig_carregar.php');
require('inc/banco.php');

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
        $edit = $pdo->prepare('UPDATE compromissos SET titulo = :titulo, data = :data WHERE id = :id');
        $edit->execute([
            ':titulo' => $_POST['titulo'],
            ':data' => $_POST['data'],
            ':id' => $_POST['id'],
        ]);

        header('location: compromissos.php');

}