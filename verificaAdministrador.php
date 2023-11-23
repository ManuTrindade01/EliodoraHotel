<?php
if(!isset($_SESSION)) {
    session_start();
} 

if($_SESSION['cargo'] !== '1') {
    $mensagem = "Apenas administradores podem cadastrar, editar ou excluir funcionários.";
    header("location: principal.php?mensagem={$mensagem}");
    exit(); // Encerra o script após redirecionar
}


?>