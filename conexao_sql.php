<?php 
$host = 'localhost';
$usuario = 'root';
$senha = '123';
$banco_de_dados = 'BIBLIOTECA';

$conexao = mysqli_connect($host, $usuario, $senha, $banco_de_dados);

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

if (!$conexao){
    die("falha na conexão: ". mysqli_connect_error());
} else
#echo 'conectado com sucesso!'
?>