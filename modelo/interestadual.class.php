<?php
class Interestadual {

  private $idonibus;
  private $empresa;
  private $origem;
  private $destino;
  private $horaSaida;
  private $modalidade;
  private $motorista;
  private $box;

  public function __construct(){}
  public function __destruct(){}

  public function __get($a){return $this->$a;}
  public function __set($a, $v){$this->$a = $v;}

  public function __toString(){
    return nl2br ("ID do Onibus: $this->idonibus
                  Empresa: $this->empresa
                  Origem: $this->origem
                  Destino: $this->destino
                  Hora saida: $this->horaSaida
                  Modalidade: $this->modalidade
                  Motorista: $this->motorista
                  Box: $this->box");

  }//fecha toString
}//fecha classe
