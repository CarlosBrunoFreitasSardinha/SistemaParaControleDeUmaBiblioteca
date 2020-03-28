<?php 

		include_once "include/conect_banco.php";
//inserindo dados na tabela autor
		$curso=$_POST['curso'];

		$sql = mysql_query("INSERT INTO curso(descricao_curso) VALUES ('$curso')")or die("Erro no comando SQL:".mysql_error());
		include "formularios/curso.php";
		  echo "Curso inserido com sucesso....";?>
