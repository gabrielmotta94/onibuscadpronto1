<?php
class Onibus {

  private $idonibus;
  private $numeroOnibus;
  private $numeroLinha;
  private $origem;
  private $destino;
  private $horaSaida;
  private $motorista;

  public function __construct(){}
  public function __destruct(){}

  public function __get($a){return $this->$a;}
  public function __set($a, $v){$this->$a = $v;}

  public function __toString(){
    return nl2br ("ID do Onibus: $this->idonibus
                  Numero do Onibus: $this->numeroOnibus
                  Numero da Linha: $this->numeroLinha
                  Origem: $this->origem
                  Destino: $this->destino
                  Horario de Saida: $this->horaSaida
                  Motorista: $this->motorista");

  }//fecha toString
}//fecha classe
