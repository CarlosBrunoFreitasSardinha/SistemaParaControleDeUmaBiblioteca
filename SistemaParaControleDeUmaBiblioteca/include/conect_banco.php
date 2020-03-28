<?php

$dbname="tb_biblioteca";
$usuario="root";
$password="";

//1º passo - Conecta ao servidor MySQL
if(!($id = mysql_connect("localhost",$usuario,$password))) {
//mensagem de erro
  echo "<p align=\"center\"><big><strong>Não foi possível estabelecer uma 
  conexão   com o gerenciador MySQL. Favor Contactar o Administrador.
  </strong></big></p>";
  exit;
}

//2º passo - Seleciona o Banco de Dados
if(!($con = mysql_select_db($dbname,$id))) {
  echo " <p align=\"center\"><big><strong>Não foi possível estabelecer uma 
  conexão   com o gerenciador MySQL. Favor Contactar o Administrador.
  </strong></big></p>";
  exit;
}
?>