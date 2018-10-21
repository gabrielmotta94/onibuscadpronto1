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
   }//fecha cadastrarOnibus

   public function buscarOnibus(){
     try{
       $stat = $this->conexao->query("select * from interestadual");
       $array = $stat->fetchAll(PDO::FETCH_CLASS, 'interestadual');
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

   public function filtrar($pesquisa, $filtro){
     try{
       $query="";
       switch($filtro){
         case "todos": $query = "";
         break;

         case "idonibus": $query = "where idonibus =".$pesquisa;
         break;

         case "empresa": $query = "where empresa like '%".$pesquisa."%'";
         break;

         case "origem": $query = "where origem like '%".$pesquisa."%'";
         break;

         case "destino": $query = "where destino like '%".$pesquisa."%'";
         break;

         case "horaSaida": $query = "where horaSaida like '%".$pesquisa."%'";
         break;

         case "modalidade": $query = "where modalidade like '%".$pesquisa."%'";
         break;

         case "motorista": $query = "where motorista like '%".$pesquisa."%'";
         break;

         case "box": $query = "where box like '%".$pesquisa."%'";
         break;

         default: $query = "";
         break;
       }

       if(empty($pesquisa)){
         $query = "";
       }

       $stat = $this->conexao->query("select * from interestadual {$query}");
       $array = $stat->fetchAll(PDO::FETCH_CLASS, 'interestadual');
       return $array;

     }catch(PDOException $e){
       echo "Erro ao filtrar ônibus! ".$e;
 } //fecha catch
}//fecha filtrar

public function alterarInterestadual($oni){
  try{
    $stat = $this->conexao->prepare("update interestadual set empresa=?, origem=?, destino=?, horasaida=?, modalidade=?, motorista=?, box=? where idonibus=?");
    $stat->bindValue(1, $oni->empresa);
    $stat->bindValue(2, $oni->origem);
    $stat->bindValue(3, $oni->destino);
    $stat->bindValue(4, $oni->horaSaida);
    $stat->bindValue(5, $oni->modalidade);
    $stat->bindValue(6, $oni->motorista);
    $stat->bindValue(7, $oni->box);
    $stat->bindValue(8, $oni->idOnibus);
    $stat->execute();
  }catch(PDOException $e){
    echo "Erro ao alterar ônibus! ".$e;
  }//fecha catch
}//fecha método alterar
}//fecha classe
