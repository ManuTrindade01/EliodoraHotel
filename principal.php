<?php
    session_start();
    require_once("verificaAutenticacao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="barbara.ico" type="image/x-icon">
    <title>Principal</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b78968e6be.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital@1&family=Sorts+Mill+Goudy&family=Unna:ital@1&display=swap"
        rel="stylesheet">

    <script src="https://kit.fontawesome.com/b78968e6be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
        integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Principal.css" type="text/css">

</head>
<?php require_once("cabecalho.php");?>
<body>
    <div class="welcome">
    <center>
        <h2 class="mt-3">
            <?php
            $nome = $_SESSION['nome'];
            ?>
             Seja bem vindo(a),
            <?= $nome?>.</h2>
            </center>
    </div>
    
    <div class="container">
    <?php if (isset($_GET['mensagem'])) { ?>
        <div class="d-flex justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 col-12">
                <div class="alert alert-warning mb-3" role="alert">
                    <?= $_GET['mensagem'] ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
    <div class="container1">
        
        <div class="box">
            <div class="boxContent">
                <i class="fa fa-user icon"></i>
                <h1 class="title">Cadastrar Hóspede</h1>
            </div>
            <a href="cadastrarHospede.php"></a>
        </div>
        <div class="box">
            <div class="boxContent">
                <i class="fa fa-bed icon"></i>
                <h1 class="title">Cadastrar Quarto</h1>

            </div>
            <a href="cadastrarQuarto.php"></a>
        </div>
        <div class="box">
            <div class="boxContent">
                <i class="fa fa-calendar icon"></i>
                <h1 class="title">Cadastrar Reserva</h1>
            </div>
            <a href="cadastrarReserva.php"></a>
        </div>

        <div class="box">
            <div class="boxContent">
            <i class="fa fa-user-gear icon"></i>
                <h1 class="title">Cadastrar Funcionário</h1>
            </div>
            <a href="cadastrarFuncionario.php"></a>
        </div>

        
        
    </div>

</body>

</html>