<?php 
session_start();
if (!isset($_SESSION['autenticar'])){
    session_destroy();
    header('Location:login.php?sessao=invalido');
}
else if (!$_SESSION['autenticar']){
    session_destroy();
    header('Location:login.php?login=invalido');
}?>