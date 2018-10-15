<?php
require 'conexaobanco.class.php';
   class InterestadualDAO { //DATA ACCESS OBJECT

   private $conexao = null;
   public function __construct(){
     $this->conexao = ConexaoBanco::getInstance();
   }
   public function __destruct(){
   }
   public function cadastrarOnibus($oni){
     try{
       //statement                    //SQL --> case insensitive
       $stat=$this->conexao->prepare("insert into interestadual (idonibus,empresa,origem,destino,horaSaida,modalidade,motorista,box)
       values (null,?,?,?,?,?,?,?)");
       $stat->bindValue(1, $oni->empresa);
       $stat->bindValue(2, $oni->origem);
       $stat->bindValue(3, $oni->destino);
       $stat->bindValue(4, $oni->horaSaida);
       $stat->bindValue(5, $oni->modalidade);
       $stat->bindValue(6, $oni->motorista);
       $stat->bindValue(7, $oni->box);
       $stat->execute();
     }catch(PDOException $e){
       echo "Erro ao cadastrar! ".$e;
     }//fecha catch
   }//fecha cadastrarLivro

   public function buscarOnibus(){
     try{
       $stat = $this->conexao->query("select * from interestadual");
       $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Interestadual');
       return $array;
     }catch(PDOException $e){
       echo "Erro ao buscar ônibus!".$e;
     }//fecha catch
   }

   public function deletarOnibus($id){
     try{
       $stat = $this->conexao->prepare("delete from interestadual where idonibus = ?");
       $stat->bindValue(1, $id);
       $stat->execute();
     }catch(PDOException $e){
       echo "Erro ao deletar ônibus! ".$e;
     }//fecha catch
   }//fecha deletarOnibus
 }//fecha classe
