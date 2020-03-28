<?php
	include("include/conect_banco.php");
				
							$SqL=mysql_query("SELECT editora FROM editora")or die("Erro no comando SQL: ".mysql_error());
							$qt=mysql_num_rows($SqL);
							for ($i=0;$i<$qt;$i++){
								$resultado_editoras= mysql_fetch_array($SqL);
								$nomes_editoras[$i]=$resultado_editoras['editora'];
								}
								
				$SQL=mysql_query("SELECT id_acervo, assuntos_acervo, titulo_acervo FROM acervo WHERE titulo_acervo LIKE '%".$string."%';")or die("Erro no comando SQL: ".mysql_error());
				$l=mysql_num_rows($SQL);
				if (!$l == '0'){
						$lin='0';
						$lin2='0';
						$lin3='0';
						$lin4='0';
					for ($i=0;$i<$l;$i++){
						$sql= mysql_fetch_array($SQL);
						$id_acervo[$i]=$sql['id_acervo'];
						$assuntos_acervo[$i]=$sql['assuntos_acervo'];
						$dados[$i]['0']=$sql['id_acervo'];
						$dados[$i]['1']=$sql['titulo_acervo'];
						$dados[$i]['2']=$sql['assuntos_acervo'];
						}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------
//busca os videos correspondentes

					for ($i=0;$i<$l;$i++){
						$SQL=mysql_query("SELECT id_video FROM video WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$sql= mysql_fetch_array($SQL);
						$v= mysql_num_rows($SQL);
						if ($v!='0'){
							$id_video[$lin]=$sql['id_video'];
							$id_acervo_video[$lin]=$id_acervo[$i];
							$assuntos_acervo_video[$lin]=$assuntos_acervo[$i];
							$titulo_acervo_video[$lin]=$dados[$i]['1'];
							$kkk=mysql_query("SELECT id_editora FROM editora_acervo WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
							$resultado= mysql_fetch_array($kkk);
							$tipo[$lin]=$resultado['id_editora'];
							$lin++;
						 }
				 	}
					for ($i=0;$i<$lin;$i++){
						$SQL=mysql_query("SELECT quantidade_aquisicao FROM aquisicao WHERE id_acervo = '$id_acervo_video[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$sql= mysql_fetch_array($SQL);
						$quantidade_aquisicao_video[$i]=$sql['quantidade_aquisicao'];
			 			}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------
//busca os livros correspondentes
					for ($i=0;$i<$l;$i++){
						$SQL=mysql_query("SELECT id_livro FROM livro WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$sql= mysql_fetch_array($SQL);
						$v= mysql_num_rows($SQL);
						if ($v!='0'){
							$id_livro[$lin2]=$sql['id_livro'];
							$id_acervo_livro[$lin2]=$id_acervo[$i];
							$assuntos_acervo_livro[$lin2]=$assuntos_acervo[$i];
							$titulo_acervo_livro[$lin2]=$dados[$i]['1'];
							$SqL=mysql_query("SELECT id_editora FROM editora_acervo WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
							$resultado= mysql_fetch_array($SqL);
							$tipo2[$lin2]=$resultado['id_editora'];
							$lin2++;
						 }
				 	}
					for ($i=0;$i<$lin2;$i++){
						$SQL=mysql_query("SELECT quantidade_aquisicao FROM aquisicao WHERE id_acervo = '$id_acervo_livro[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$sql= mysql_fetch_array($SQL);
						$quantidade_aquisicao_livro[$i]=$sql['quantidade_aquisicao'];
						 
			 		}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------
//busca os folhetos correspondentes

					for ($i=0;$i<$l;$i++){
						$SQL=mysql_query("SELECT id_folheto FROM folheto WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$sql= mysql_fetch_array($SQL);
						$v= mysql_num_rows($SQL);
						if ($v!='0'){
							$id_folheto[$lin3]=$sql['id_folheto'];
							$id_acervo_folheto[$lin3]=$id_acervo[$i];
							$assuntos_acervo_folheto[$lin3]=$assuntos_acervo[$i];
							$titulo_acervo_folheto[$lin3]=$dados[$i]['1'];
							$SqL=mysql_query("SELECT id_editora FROM editora_acervo WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
							$resultado= mysql_fetch_array($SqL);
							$tipo3[$lin3]=$resultado['id_editora'];
							$lin3++;
						 }
				 	}
					for ($i=0;$i<$lin3;$i++){
						$SQL=mysql_query("SELECT quantidade_aquisicao FROM aquisicao WHERE id_acervo = '$id_acervo_folheto[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$sql= mysql_fetch_array($SQL);
						$quantidade_aquisicao_folheto[$i]=$sql['quantidade_aquisicao'];
			 			}
						//----------------------------------------------------------------------------------------------------------------------------------------------------------------------
//busca os textos anuarios correspondentes

					
					for ($i=0;$i<$l;$i++){
						$SQL=mysql_query("SELECT id_texto FROM texto WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$sql= mysql_fetch_array($SQL);
						$v= mysql_num_rows($SQL);
						if ($v!='0'){
							$id_texto[$lin4]=$sql['id_folheto'];
							$id_acervo_texto[$lin4]=$id_acervo[$i];
							$assuntos_acervo_texto[$lin4]=$assuntos_acervo[$i];
							$titulo_acervo_texto[$lin4]=$dados[$i]['1'];
							$SqL=mysql_query("SELECT id_editora FROM editora_acervo WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
							$resultado= mysql_fetch_array($SqL);
							$tipo4[$lin4]=$resultado['id_editora'];
							$lin4++;
						 }
				 	}
					for ($i=0;$i<$lin4;$i++){
						$SQL=mysql_query("SELECT quantidade_aquisicao FROM aquisicao WHERE id_acervo = '$id_acervo_texto[$i]'")or die("Erro no comando SQL: ".mysql_error());			
						$sql= mysql_fetch_array($SQL);
						$quantidade_aquisicao_texto[$i]=$sql['quantidade_aquisicao'];
			 			}
			 }
?>