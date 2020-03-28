<?php 

		include_once "include/conect_banco.php";
		$opcao=$_POST['opcao'];
		$string=$_POST['string'];
		
		if ($opcao=='1')include("funcoes/editora.php");
		else if ($opcao=='2')include("funcoes/autor.php");
		else if ($opcao=='4')include("funcoes/assuntos.php");
		else if ($opcao=='3')include("funcoes/titulo.php");
		
		
		if ($l != '0'){
			if ($lin != '0')include("funcoes/apresenta_video.php");
			if ($lin2 != '0')include("funcoes/apresenta_livro.php");
			if ($lin3 != '0')include("funcoes/apresenta_folheto.php");
			if ($lin4 != '0')include("funcoes/apresenta_texto.php");
		}		 
?>