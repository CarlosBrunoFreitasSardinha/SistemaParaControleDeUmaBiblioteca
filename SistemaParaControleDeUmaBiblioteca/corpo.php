<?php

		$acao=$_REQUEST['acao'];
			if ($acao=='')include("inicio.php");//echo "E fica assim";
			if($acao==$P)include("funcoes/pesquisa.php");
			//formularios simples
			if ($_SESSION['nivel_acesso']=='1'||$_SESSION['nivel_acesso']=='2'||$_SESSION['nivel_acesso']=='3'){
			 	if($acao==$CR)include("formularios/formulario_reserva.php");
				else if($acao==$LCE)include("funcoes/visualizar_emprestimo.php");
				else if($acao==$RCR)include("include/cadastro_reserva.php");
				else if($acao==$VR)include("funcoes/visualizar_reserva.php");
				else if($acao==$VRI)include("funcoes/v_item_reserva.php");
				}
			
			if ($_SESSION['nivel_acesso']=='2'||$_SESSION['nivel_acesso']=='3'){
				if($acao==$CE)include("formularios/formulario_emprestimo.php");
				else if($acao==$CD)include("formularios/formulario_devolucao.php");
				else if($acao==$CM)include("formularios/multa.php");
				else if($acao==$RM)include("include/multa.php");
				else if($acao==$RE)include("include/emprestimo.php");
				else if($acao==$RCD)include("include/cadastro_devolucao.php");
			}
			
			if ($_SESSION['nivel_acesso']=='3') {
				if($acao==$PERIODO)include("test.php");
				if($acao==$CL)include("formularios/formulario_livro.php");
				else if($acao==$CMD)include("formularios/formulario_cd-dvd-fita_video.php");
				else if($acao==$CF)include("formularios/formulario_foheto.php");
				else if($acao==$CT)include("formularios/formulario_anuarios_relatorios.php");
				else if($acao==$CI)include("formularios/idioma.php");
				else if($acao==$CC)include("formularios/curso.php");
				else if($acao==$CA)include("formularios/autor.php");
				else if($acao==$CTM)include("formularios/tipo_midia.php");
				else if($acao==$CED)include("formularios/formulario_editora.php");
				else if($acao==$CU)include("formularios/formulario_usuario.php");
				else if($acao==$CTA)include("formularios/tipo_aquisicao.php");
//Alterar dados
					  
				else if($acao==$VADA)include("formularios/tabela_autor.php");
				else if($acao==$VADE)include("formularios/tabela_editora.php");
				else if($acao==$TCC)include("formularios/tabela_curso.php");
				else if($acao==$VADU)include("formularios/tabela_usuario.php");
				else if($acao==$VADTM)include("formularios/tabela_tipo_midia.php");
				else if($acao==$VADI)include("formularios/tabela_idioma.php");
				else if($acao==$VADL)include("formularios/tabela_livro.php");
				else if($acao==$VADM)include("formularios/tabela_midia.php");
				else if($acao==$VADF)include("formularios/tabela_folheto.php");
				else if($acao==$VADT)include("formularios/tabela_texto.php");
				else if($acao==$ADA)include("formularios/alter_autor.php");
				else if($acao==$ADE)include("formularios/alter_editora.php");
				else if($acao==$ADI)include("formularios/alter_idioma.php");
				else if($acao==$ADF)include("formularios/alter_folheto.php");
				else if($acao==$ADU)include("formularios/alter_usuario.php");
				else if($acao==$ACC)include("formularios/alter_curso.php");
				else if($acao==$ADM)include("formularios/alter_midia.php");
				else if($acao==$ADTM)include("formularios/alter_tipo_midia.php");
				else if($acao==$ADL)include("formularios/alter_livro.php");
				else if($acao==$ADT)include("formularios/alter_texto.php");
			
				else if($acao==$RCTA)include("include/cadastro_tipo_aquisicao.php");
				else if($acao==$RCA)include("include/cadastro_autor.php");
				else if($acao==$RCI)include("include/cadastro_idiomas.php");
				else if($acao==$RCTM)include("include/cadastro_tipo_midia.php");
				else if($acao==$RCL)include("include/cadastro_livro.php");
				else if($acao==$RCT)include("include/cadastro_anuarios_relatorios.php");
				else if($acao==$RCF)include("include/cadastro_folheto.php");
				else if($acao==$RCMD)include("include/cadastro_midia.php");
				else if($acao==$RCED)include("include/cadastro_editora.php");
				else if($acao==$RCU)include("include/cadastro_usuario.php");
				else if($acao==$REV)include("include/emprestimo_reserva.php");
				else if($acao==$RCC)include("include/cadastro_curso.php");
				
				else if($acao==$REMP)include("funcoes/emprestimo_reserva.php");
				else if($acao==$ALT)include("funcoes/cancelar_reserva.php");
				else if($acao==$RGM)include("funcoes/contabilidade_emprestimo_diario.php");
				else if($acao==$RGAM)include("funcoes/cont_anual.php");
				else if($acao==$VM)include("funcoes/multas.php");
				else if($acao==$LM)include("funcoes/limpar_multa.php");
			 }
?>