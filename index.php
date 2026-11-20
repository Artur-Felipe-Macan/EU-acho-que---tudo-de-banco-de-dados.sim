<?php
//DEFINIR VARIAVEIS DO SERVIDOR
$host="localhost";
$dbname="mercado";
$user="root";
$pass="senai";

try{

    //TESTAR A CONEXÃO
    $pdo=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);

    //TRATAMENTO DE ERRO
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    echo "Conexão OK";
}catch(PDOException $e){
    die("Erro: ".$e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema do Mercado</title>
</head>
<body>
    <h1>Sisteminha do Mercadinho do Zé</h1>
    
</body>
</html>