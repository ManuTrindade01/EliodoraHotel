<?php
if(isset($_POST['entrar'])):
//1. Pega os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

//2. Preparar a SQL
$sql = "select *
    from funcionario
    where email = '{$email}'
    and senha = '{$senha}'";
//3. Executa SQL

//$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
require_once("conexao.php");

$resultado = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($resultado); //Retorna a qtd de registros da consul

//4. Verfifica se o usuário existe no BD e concede PERMISSÃO OU VOLTA AO LOGIN
if ($registros > 0){
    $funcionario = mysqli_fetch_array($resultado);
    //Cria sessão para a página principal
    session_start();
    //Criado três variáveis de sessão(id, nome e email do usuário)
    $_SESSION['id']  =$funcionario['id'];
    $_SESSION['nome']  =$funcionario['nome'];
    $_SESSION['email']  =$funcionario['email'];

    //Redireciona para a página principal
    header("location: principal.php");
} else {
    //Redireciona para a página de login
    $mensagem = "Funcionário/Senha inválidos.";
    header("location: index.php?mensagem=$mensagem");
}
endif;