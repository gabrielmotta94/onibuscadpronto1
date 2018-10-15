<?php
class Intermunicipal {

  private $idonibus;
  private $numeroOnibus;
  private $numeroLinha;
  private $destino;
  private $horaSaida;
  private $modalidade;
  private $motorista;

  public function __construct(){}
  public function __destruct(){}

  public function __get($a){return $this->$a;}
  public function __set($a, $v){$this->$a = $v;}

  public function __toString(){
    return nl2br ("ID do Onibus: $this->idonibus
                  Numero do Onibus: $this->numeroOnibus
                  Numero da Linha: $this->numeroLinha
                  Destino: $this->destino
                  Horario de Saida: $this->horaSaida
                  Modalidade: $this->modalidade
                  Motorista: $this->motorista");

  }//fecha toString
}//fecha classe
