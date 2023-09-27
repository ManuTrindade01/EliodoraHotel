<?php
/* Verifica se o usuário está logado, para dar acesso ao sistema administrativo*/

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])){
    $mensagem = "Sessão expirada. Faça o login novamente.";
    header("location: index.php?mensagem={$mensagem}");
}