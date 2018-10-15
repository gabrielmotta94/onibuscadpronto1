<?php session_start(); ob_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Index</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h1 class="jumbotron bg-info">Seja bem vindo a Transportes Waskiewicz!</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Sistema</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro-onibus.php">Cad. Ônibus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consulta-onibus.php">Cons. Ônibus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro-intermunicipal.php">Cad. Intermunicipal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consulta-intermunicipal.php">Cons. Intermunicipal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro-interestadual.php">Cad. Interestadual</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consulta-interestadual.php">Cons. Interestadual</a>
          </li>
        </ul>
      </div>
    </nav>

    <h2>Cadastro de Ônibus Urbano, Intermunicipal e Interestadual.</h2>
  </div>
</body>
</html>
