<?php
require('inc/banco.php');
require_once('verifica_session.php');

$id = $_GET['id'] ?? null;


if($id){
    $query = $pdo->prepare('DELETE FROM compras WHERE id=:id');

    $query->execute([':id'=>$id]);
}

header('location: compras.php');