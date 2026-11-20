<?php
//DEFINIR VARIAVEIS DO SERVIDOR
$host="localhost";
$dbname="mercado1";
$user="root";
$pass="senai";

try{

    //TESTAR A CONEXÃO
    $pdo=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);

    //TRATAMENTO DE ERRO
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // echo "Conexão OK";
}catch(PDOException $e){
    die("Erro: ".$e->getMessage());
}



?>