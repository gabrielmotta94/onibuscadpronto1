<?php 
$host= "localhost";
$user = "root";
$pass = "";
$banco = "cadastro";
$conexao = mysql_connect($host,$user,$pass) or die(mysql_error());
mysql_select_db($transporte) or die(mysql_error());
?>
<?php
$email=$_POST['email'];
$senha=$_POST['senha'];
$sql= mysql_query("SELECT * FROM usuarios WHERE email = '$email'
