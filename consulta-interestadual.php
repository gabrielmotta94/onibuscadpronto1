<?php
session_start();
ob_start();

include_once 'dao/interestadualdao.class.php';
include_once 'modelo/interestadual.class.php';
include_once 'util/helper.class.php';

$interestadualDAO = new interestadualDAO();
$array = $interestadualDAO->buscarOnibus();
//TESTE!!!!!!
//var_dump($array);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Consulta de Ônibus Interestadual</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h1 class="jumbotron bg-info">Consulta de Ônibus Interestadual</h1>

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

    <h2>Consulta de Ônibus</h2>
    <?php
    if(isset($_SESSION['msg'])){
      Helper::alert($_SESSION['msg']);
      unset($_SESSION['msg']);
    }

    if(count($array) == 0){
        echo "<h2>Não há ônibus no banco!</h2>";
        return;
    }
    ?>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>ID</th>
            <th>Empresa</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Horário Saída</th>
            <th>Modalidade</th>
            <th>Motorista</th>
            <th>Box</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Empresa</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Horário Saída</th>
            <th>Modalidade</th>
            <th>Motorista</th>
            <th>Box</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          foreach($array as $o){
            echo "<tr>";
              echo "<td>$o->idOnibus</td>";
              echo "<td>$o->empresa</td>";
              echo "<td>$o->origem</td>";
              echo "<td>$o->destino</td>";
              echo "<td>$o->horasaida</td>";
              echo "<td>$o->modalidade</td>";
              echo "<td>$o->motorista</td>";
              echo "<td>$o->box</td>";
              echo "<td><a href='consulta-interestadual.php?id=$o->idOnibus' class='btn btn-danger'>Excluir</a></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div><!-- table responsive -->
  </div>
<?php
  if(isset($_GET['id'])){
    $interestadualDAO->deletarOnibus($_GET['id']);
    $_SESSION['msg'] = "Ônibus excluído com sucesso!";
    ob_end_flush();
    header("location:consulta-interestadual.php");
  }
?>
</body>
</html>
