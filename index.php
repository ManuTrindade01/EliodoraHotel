<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/b78968e6be.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="style.css" rel="stylesheet">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="barbara.ico" type="image/x-icon">
  <title>Login</title>
</head>

<body>
  <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <form action="autenticacao.php" method="post" class="card p-4" style="width: 400px;">

      <?php if (isset($_GET['mensagem'])) { ?>
        <div class="alert alert-warning mb-3" role="alert">
          <?= $_GET['mensagem'] ?>
        </div>
      <?php } ?>

      <div class="text-center mb-4">
        <img src="img/barbara.png" height="170">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"></span>
      </div>
      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input name="senha" type="password" class="form-control" id="senha">
      </div>
      <button name="entrar" type="submit" class="btn"
        style="background-color: #a70162; color: #fff;">Entrar</button>
      <div class="text-center mt-3">
        <a href="#" class="text-decoration-none" style="color: #a70162">Esqueceu a senha?</a> | <a
          href="cadastrarFuncionario.php" style="color: #a70162" class="text-decoration-none">Cadastre-se</a>
      </div>
    </form>
  </div>

</body>

</html>