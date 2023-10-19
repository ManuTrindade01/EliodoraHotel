<?php
require_once("verificaAutenticacao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="barbara.ico" type="image/x-icon">
    <title>Relatórios</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b78968e6be.js" crossorigin="anonymous"></script>


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Principal.css">
</head>

<body style="background-color: ;">
    <?php require_once("menu.html"); ?>
    <br> <br>
    <div class="container1">
        <div class="box">
            <div class="boxContent">
            <i class="fa fa-user-group icon"></i>
                <h1 class="title">Hóspedes Cadastrados</h1>
            </div>
            <a href="listarHospedes.php"></a>
        </div>
        <div class="box">
            <div class="boxContent">
                <i class="fa fa-bed icon"></i>
                <h1 class="title">Quartos Cadastrados</h1>

            </div>
            <a href="listarQuarto.php"></a>
        </div>
        <div class="box">
            <div class="boxContent">
                <i class="fa fa-calendar icon"></i>
                <h1 class="title">Reservas cadastradas</h1>
            </div>
            <a href="listarReserva.php"></a>
        </div>

        <div class="box">
            <div class="boxContent">
            <i class="fa fa-user-gear icon"></i>
                <h1 class="title">Funcionários Cadastrados</h1>
            </div>
            <a href="listarFuncionario.php"></a>
        </div>

        
        
    </div>
    </div>

</body>

</html>