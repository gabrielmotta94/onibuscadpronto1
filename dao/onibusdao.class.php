<?php
require 'conexaobanco.class.php';
   class OnibusDAO { //DATA ACCESS OBJECT

   private $conexao = null;
   public function __construct(){
     $this->conexao = ConexaoBanco::getInstance();
   }
   public function __destruct(){
   }
   public function cadastrarOnibus($oni){
     try{
       //statement                    //SQL --> case insensitive
       $stat=$this->conexao->prepare("insert into onibus (idonibus,numeroOnibus,numeroLinha,origem,destino,horaSaida, motorista)
       values (null,?,?,?,?,?,?)");
       $stat->bindValue(1, $oni->numeroOnibus);
       $stat->bindValue(2, $oni->numeroLinha);
       $stat->bindValue(3, $oni->origem);
       $stat->bindValue(4, $oni->destino);
       $stat->bindValue(5, $oni->horaSaida);
       $stat->bindValue(6, $oni->motorista);
       $stat->execute();
     }catch(PDOException $e){
       echo "Erro ao cadastrar! ".$e;
     }//fecha catch
   }//fecha cadastrarLivro

   public function buscarOnibus(){
     try{
       $stat = $this->conexao->query("select * from onibus");
       $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Onibus');
       return $array;
     }catch(PDOException $e){
       echo "Erro ao buscar ônibus!".$e;
     }//fecha catch
   }

   public function deletarOnibus($id){
     try{
       $stat = $this->conexao->prepare("delete from onibus where idonibus = ?");
       $stat->bindValue(1, $id);
       $stat->execute();
     }catch(PDOException $e){
       echo "Erro ao deletar ônibus! ".$e;
     }//fecha catch
   }//fecha deletarOnibus
 }//fecha classe
