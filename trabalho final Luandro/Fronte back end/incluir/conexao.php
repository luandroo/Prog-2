<?php


$hostDB = "localhost";
$databaseDB = "id9305608_hotel";
$userDB = 'usuario';
$senhaDB = 'senha';

//$usuario = "administrador";
//$senha = "admin";

$conexao = mysqli_connect($hostDB, $userDB, $senhaDB, $databaseDB) or die("Houve um erro de conexao ao banco de dados");
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, "SET character_set_connection=utf8");
mysqli_query($conexao, "SET character_set_client=utf8");
mysqli_query($conexao, "SET character_set_results=utf8");

?>