<?php 
#para login e verificacao do usuario:
session_start();
require 'conexao_sql.php';

if (isset($_POST['senha']) && isset($_POST['usuario']) ){
    $senha = $_POST['senha'];
    $usuario = $_POST['usuario'];
    $stmt = mysqli_prepare($conexao, 'SELECT * 
    FROM TBL_PESSOA
    WHERE BINARY user_login = ? 
    AND BINARY user_senha = ?');
    mysqli_stmt_bind_param($stmt, 'ss', $usuario, $senha);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $usuario = mysqli_fetch_assoc($resultado);
    if (mysqli_num_rows($resultado) == 0){
        $_SESSION['autenticar'] = false;
    }
    else $_SESSION['autenticar'] = true;
    mysqli_stmt_close($stmt);
}
if (!isset($_SESSION['autenticar'])){
    session_destroy();
    header('Location:login.php?sessao=invalido');
}
else if (!$_SESSION['autenticar']){
    session_destroy();
    header('Location:login.php?login=invalido');
}
?>