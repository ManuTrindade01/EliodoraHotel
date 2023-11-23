<?php
if (isset($_POST['entrar'])) {
    // Pega os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar a SQL
    $sql = "SELECT * FROM funcionario WHERE email = '{$email}' AND senha = '{$senha}'";

    // Executa SQL
    require_once("conexao.php");

    $resultado = mysqli_query($conexao, $sql);
    $registros = mysqli_num_rows($resultado);

    if ($registros > 0) {
        $funcionario = mysqli_fetch_array($resultado);

        // Verifica se o funcionário está ativo
        if ($funcionario['status'] == '2') { // Verifica se o status é inativo
            $mensagem = "Sua conta está desativada. Entre em contato com o administrador.";
            header("location: index.php?mensagem=$mensagem");
            exit(); // Encerra o script
        }

        // Cria a sessão para a página principal
        session_start();
        $_SESSION['id'] = $funcionario['id'];
        $_SESSION['nome'] = $funcionario['nome'];
        $_SESSION['email'] = $funcionario['email'];
        $_SESSION['cargo'] = $funcionario['cargo'];

        // Redireciona para a página principal
        header("location: principal.php");
        exit(); // Encerra o script após redirecionar
    } else {
        // Redireciona para a página de login com mensagem de erro
        $mensagem = "Funcionário/Senha inválidos.";
        header("location: index.php?mensagem=$mensagem");
        exit(); // Encerra o script após redirecionar
    }
}
?>
