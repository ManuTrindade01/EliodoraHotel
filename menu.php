<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="barbara.ico" type="image/x-icon">

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,700&display=swap" rel="stylesheet">

</head>
<body>

    <header>
        <nav class="nav-bar">
            <div class="logo" style="font-family: 'Charmonman', cursive;">
                <h2 style="font-family: 'Cormorant Garamond', serif;">Eliodora</h2>
            </div>
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="principal.php" class="nav-link"><i class="fa-solid fa-house"></i>
                            Principal</a></li>
                    <li class="nav-item"><a href="controlarReserva.php" class="nav-link"><i class="fa-solid fa-calendar-days"></i> Reservas</a></li>
                    <li class="nav-item"><a href="relatorios.php" class="nav-link"><i class="fa-solid fa-book"></i>
                            Relatórios</a>
                    </li>

                </ul>
            </div>


            <div class="login-button">
                <button type="button" class="btn btn dropdown-toggle" style="color:aliceblue;"      data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user"></i> <?php echo $_SESSION['nome']; ?>
                </button>
                <ul class="dropdown-menu">
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="sair.php">Sair</a></li>
                </ul>
            </div>


            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="img/menu_white_36dp.svg" alt=""></button>
            </div>
        </nav>
        <div class="mobile-menu">
            <ul>
                <li class="nav-item"><a href="principal.php" class="nav-link">Principal</a></li>
                <li class="nav-item"><a href="controlarReserva.php" class="nav-link">Reservas</a></li>
                <li class="nav-item"><a href="relatorios.php" class="nav-link">Relatórios</a></li>
            </ul>

            <div class="login-button">
                <button><a href="sair.php">Sair</a></button>
            </div>
        </div>
    </header>

    <script src="js/script.js"></script>
</body>

</html>