<?php

		$acao=$_REQUEST['acao'];
			if ($acao=='')echo "Inicio";
			if($acao==$P)echo "Resultado da Busca";
			//Formul�rios simples
			if ($_SESSION['nivel_acesso']=='1'||$_SESSION['nivel_acesso']=='2'||$_SESSION['nivel_acesso']=='3'){
			 	if($acao==$CR)echo "Formul�rio Reserva";
				else if($acao==$LCE)echo "Visualizar Empr�stimo";
				else if($acao==$RCR)echo "Cadastro Reserva";
				else if($acao==$VR)echo "Visualizar Reserva";
				else if($acao==$VRI)echo "Vizualizar Item Reserva";
				}
			
			if ($_SESSION['nivel_acesso']=='2'||$_SESSION['nivel_acesso']=='3'){
				if($acao==$CE)echo "Formul�rio Empr�stimo";
				else if($acao==$CD)echo "Formul�rio Devolu��o";
				else if($acao==$CM)echo "Criar Multa";
				else if($acao==$RM)echo "Tabela Multa";
				else if($acao==$RE)echo "Empr�stimo";
				else if($acao==$RCD)echo "Devolu��o";
			}
			
			if ($_SESSION['nivel_acesso']=='3') {
				if($acao==$CL)echo "Formul�rio Livro";
				else if($acao==$CMD)echo "Formul�rio_M�dias";
				else if($acao==$CF)echo "Formul�rio Foheto";
				else if($acao==$CT)echo "Formul�rio Anu�rios Relat�rios";
				else if($acao==$CI)echo "Idioma";
				else if($acao==$CC)echo "Curso";
				else if($acao==$CA)echo "Autor";
				else if($acao==$CTM)echo "Tipo M�dia";
				else if($acao==$CED)echo "Formul�rio Editora";
				else if($acao==$CU)echo "Formul�rio Usu�rio";
				else if($acao==$CTA)echo "Tipo Aquisicao";
//Alterarar dados
					  
				else if($acao==$VADA)echo "Tabela Autor";
				else if($acao==$VADE)echo "Tabela Editora";
				else if($acao==$TCC)echo "Tabela Curso";
				else if($acao==$VADU)echo "Tabela Usu�rio";
				else if($acao==$VADTM)echo "Tabela Tipo_M�dia";
				else if($acao==$VADI)echo "Tabela Idioma";
				else if($acao==$VADL)echo "Tabela Livro";
				else if($acao==$VADM)echo "Tabela M�dia";
				else if($acao==$VADF)echo "Tabela Folheto";
				else if($acao==$VADT)echo "Tabela Texto";
				else if($acao==$ADA)echo "Alterar Autor";
				else if($acao==$ADE)echo "Alterar Editora";
				else if($acao==$ADI)echo "Alterar Idioma";
				else if($acao==$ADF)echo "Alterar Folheto";
				else if($acao==$ADU)echo "Alterar Usu�rio";
				else if($acao==$ACC)echo "Alterar Curso";
				else if($acao==$ADM)echo "Alterar M�dia";
				else if($acao==$ADTM)echo "Alterar Tipo_M�dia";
				else if($acao==$ADL)echo "Alterar Livro";
				else if($acao==$ADT)echo "Alterar Texto";
			
				else if($acao==$RCTA)echo "Cadastro Tipo Aquisicao";
				else if($acao==$RCA)echo "Cadastro Autor";
				else if($acao==$RCI)echo "Cadastro Idiomas";
				else if($acao==$RCTM)echo "Cadastro Tipo_M�dia";
				else if($acao==$RCL)echo "Cadastro Livro";
				else if($acao==$RCT)echo "Cadastro Anu�rios Relat�rios";
				else if($acao==$RCF)echo "Cadastro Folheto";
				else if($acao==$RCMD)echo "Cadastro M�dia";
				else if($acao==$RCED)echo "Cadastro Editora";
				else if($acao==$RCU)echo "Cadastro Usu�rio";
				else if($acao==$REV)echo "Empr�stimo Reserva";
				else if($acao==$RCC)echo "Cadastro Curso";
				
				else if($acao==$REMP)echo "Empr�stimo Reserva";
				else if($acao==$ALT)echo "Cancelar Reserva";
				else if($acao==$VM)echo "Multas";
				else if($acao==$LM)echo "Limpar Multa";
			 }
?>