<?php 

		include_once "include/conect_banco.php";
//inserindo dados na tabela autor
		$autor=$_POST['autor'];
		$sitacao=$_POST['sitacao'];

		$sql = mysql_query("INSERT INTO autor(nome_autor,sitacao_autor) VALUES ('$autor', '$sitacao')")or die("Erro no comando SQL:".mysql_error());
		include "formularios/autor.php";
		  echo "autor inserido com sucesso....";?>
