<?php
require('inc/banco.php');

$id = $_POST['id'] ?? null;
$item = $_POST["item"] ?? null;

if($id){
    $query = $pdo->prepare('UPDATE compras SET item=:item WHERE id=:id');

    $query->execute([':id'=>$id, ':item'=>$item]);
}

header('location: compras.php');
