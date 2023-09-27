<?php
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


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body style="background-color: ;">
    <?php require_once("menu.html"); ?>


    <div class="container">
        <h2 class="mt-3">
            <?php
            session_start();
            $nome = $_SESSION['nome'];
            ?>
            Seja bem vindo(a),
            <?= $nome ?>.
            <br>
    </div>

    <div class="container">
        <br>
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Hóspede</h5>
                        <a href="cadastrarHospede.php" class="btn"
                            style="background-color: #a70162; color: #ffffff;">Cadastrar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Funcionário</h5>
                        <a href="cadastrarFuncionario.php" class="btn"
                            style="background-color: #a70162; color: #ffffff;">Cadastrar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Marca</h5>
                        <a href="cadastrarMarca.php" class="btn"
                            style="background-color: #a70162; color: #ffffff;">Cadastrar</a>
                    </div>
                </div>
            </div>

        </div>

        <br>
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Produto</h5>
                        <a href="cadastrarProduto.php" class="btn"
                            style="background-color: #a70162; color: #ffffff;">Cadastrar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Categoria</h5>
                        <a href="cadastrar]Tipo.php" class="btn"
                            style="background-color: #a70162; color: #ffffff;">Cadastrar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Quarto</h5>
                        <a href="cadastrarQuarto.php" class="btn"
                            style="background-color: #a70162; color: #ffffff;">Cadastrar</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>