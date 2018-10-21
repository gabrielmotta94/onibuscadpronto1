<?php
session_start();
ob_start();
include_once 'util/helper.class.php';

if(isset($_GET['id'])){
  include_once "dao/interestadualdao.class.php";
  include_once "modelo/interestadual.class.php";

  $oni = new InterestadualDAO();
  $array = $oni->filtrar($_GET['id'],"codigo");
  //var_dump($array); //só teste
  $oni = $array[0];
  echo $oni; //toString
}else{
  header("location:consulta-interestadual.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Edição de Ônibus Interestadual</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
  <body>

      <div class="container">
        <h1 class="jumbotron bg-info">Edição de ônibus interestadual</h1>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Sistema</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cadastro-interestadual.php">Cad. Interestadual <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="consulta-interestadual.php">Cons. Interestadual</a>
              </li>
            </ul>
          </div>
        </nav>
        <?php
        echo isset($_SESSION['msg']) ? Helper::alert($_SESSION['msg']) : "";
        unset($_SESSION['msg']);
        ?>
        <form name="cadonibus" method="post" action="">
          <div class="form-group">
            <input type="text" name="empresa" placeholder="Empresa: " class="form-control"
             value="<?php if(isset($oni)){ echo $oni->empresa; } ?>"></div>
          <div class="form-group">
            <input type="text" name="origem" placeholder="Origem:" class="form-control"
                   value="<?php if(isset($oni)){ echo $oni->origem; } ?>"></div>
          <div class="form-group">
            <input type="text" name="destino" placeholder="Destino:" class="form-control"
                   value="<?php if(isset($oni)){ echo $oni->destino; } ?>"></div>
          <div class="form-group">
            <input type="time" name="horaSaida" placeholder="Hora Saída: " class="form-control"></div>
          <div class="form-group">
            <div class="form-group">
            <select name="modalidade" class="form-control" value="<?php if(isset($oni)){ echo $oni->modalidade; } ?>">
                <option value="Convencional">Convencional</option>
                <option value="Semi-direto">Semi-direto</option>
                <option value="Direto">Direto</option>
                <option value="Executivo">Executivo</option>
                <option value="Semi-Leito">Semi-Leito</option>
                <option value="Leito">Leito</option>
              </select></div> 
          <div class="form-group">
            <input type="text" name="motorista" placeholder="Motorista:" class="form-control"
                    value="<?php if(isset($oni)){ echo $oni->motorista; } ?>"></div>
          <div class="form-group">
            <input type="number" name="box" placeholder="Box: " class="form-control"
                            value="<?php if(isset($oni)){ echo $oni->box; } ?>"></div>
          <div class="form-group">
            <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
            <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
          </div>
        </form>
        <?php
          if(isset($_POST['alterar'])){
            include_once 'modelo/interestadual.class.php';
            include_once 'dao/interestadualdao.class.php';
            include 'util/padronizacao.class.php';

            $oni = new Interestadual();
            $oni->idOnibus = $_GET['id'];
            $oni->empresa = Padronizacao::antiXSS(Padronizacao::padronizarMaiMin($_POST['empresa']));
            $oni->origem = Padronizacao::antiXSS(Padronizacao::padronizarMaiMin($_POST['origem']));
            $oni->destino = Padronizacao::antiXSS(Padronizacao::padronizarMaiMin($_POST['destino']));
            $oni->horaSaida = Padronizacao::antiXSS($_POST['horaSaida']);
            $oni->modalidade = Padronizacao::antiXSS(Padronizacao::padronizarMaiMin($_POST['modalidade']));
            $oni->motorista = Padronizacao::antiXSS(Padronizacao::padronizarMaiMin($_POST['motorista']));
            $oni->box = $_POST['box'];

            $oniDAO = new InterestadualDAO();
            $oniDAO->alterarInterestadual($oni);

            echo "BLA: ".$oni;

            $_SESSION['msg'] = "Interestadual alterado com sucesso!";
            header("location:consulta-interestadual.php");

            echo "<h2>Interestadual cadastrado com sucesso!</h2>";
            //Helper::alert("Interestadual cadastrado com sucesso!");
            echo $oni;
            ob_end_flush();
          }
        ?>
      </div>
  </body>
</html>
