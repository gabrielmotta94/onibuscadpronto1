<?php
require 'conexaobanco.class.php';
   class IntermunicipalDAO { //DATA ACCESS OBJECT

   private $conexao = null;
   public function __construct(){
     $this->conexao = ConexaoBanco::getInstance();
   }
   public function __destruct(){
   }
   public function cadastrarOnibus($oni){
     try{
       //statement                    //SQL --> case insensitive
       $stat=$this->conexao->prepare("insert into intermunicipal (idonibus,numeroOnibus,numeroLinha,destino,horaSaida, modalidade, motorista)
       values (null,?,?,?,?,?,?)");
       $stat->bindValue(1, $oni->numeroOnibus);
       $stat->bindValue(2, $oni->numeroLinha);
       $stat->bindValue(3, $oni->destino);
       $stat->bindValue(4, $oni->horaSaida);
       $stat->bindValue(5, $oni->modalidade);
       $stat->bindValue(6, $oni->motorista);
       $stat->execute();
     }catch(PDOException $e){
       echo "Erro ao cadastrar! ".$e;
     }//fecha catch
   }//fecha cadastrarLivro

   public function buscarOnibus(){
     try{
       $stat = $this->conexao->query("select * from intermunicipal");
       $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Intermunicipal');
       return $array;
     }catch(PDOException $e){
       echo "Erro ao buscar ônibus intermunicipal!".$e;
     }//fecha catch
   }

   public function deletarOnibus($id){
     try{
       $stat = $this->conexao->prepare("delete from intermunicipal where idonibus = ?");
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

         case "numeroOnibus": $query = "where numeroOnibus like '%".$pesquisa."%'";
         break;

         case "numeroLinha": $query = "where numeroLinha like '%".$pesquisa."%'";
         break;

         case "destino": $query = "where destino like '%".$pesquisa."%'";
         break;

         case "horaSaida": $query = "where horaSaida like '%".$pesquisa."%'";
         break;

         case "modalidade": $query = "where modalidade like '%".$pesquisa."%'";
         break;

         case "motorista": $query = "where motorista like '%".$pesquisa."%'";
         break;

         default: $query = "";
         break;
       }

       if(empty($pesquisa)){
         $query = "";
       }

       $stat = $this->conexao->query("select * from intermunicipal {$query}");
       $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Intermunicipal');
       return $array;

     }catch(PDOException $e){
       echo "Erro ao filtrar ônibus! ".$e;

     }//fecha catch
   }//fecha método filtrar

public function alterarIntermunicipal($oni){
     try{
       $stat = $this->conexao->prepare("update intermunicipal set numeroOnibus=?, numeroLinha=?, destino=?, horaSaida=?, modalidade=?, motorista=? where idonibus=?");
       $stat->bindValue(1, $oni->numeroOnibus);
       $stat->bindValue(2, $oni->numeroLinha);
       $stat->bindValue(3, $oni->destino);
       $stat->bindValue(4, $oni->horaSaida);
       $stat->bindValue(5, $oni->modalidade);
       $stat->bindValue(6, $oni->motorista);
       $stat->bindValue(7, $oni->idOnibus);
       $stat->execute();

     }catch(PDOException $e){
       echo "Erro ao alterar ônibus! ".$e;
     }//fecha catch
   }//fecha método alterar
 }//fecha classe
