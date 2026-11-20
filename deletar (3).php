<?php
    include "config.php";

    // VER SE EXISTE ID NA URL
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

try {
    // PREPARO COMANDO PARA EXCLUIR
    $excluir="DELETE FROM produtos WHERE id=$id";
    $env=$pdo->prepare($excluir);
    $env->execute();

    header("Location: index.php");
    exit();
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
}










?>