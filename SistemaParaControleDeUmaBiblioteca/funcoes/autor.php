<?php
							$SqL=mysql_query("SELECT * FROM autor")or die("Erro no comando SQL: ".mysql_error());
							$qt=mysql_num_rows($SqL);
							for ($i=0;$i<$qt;$i++){
								$resultado_editoras= mysql_fetch_array($SqL);
								$nomes_editoras[$i][0]=$resultado_editoras['sitacao_autor'];
								$nomes_editoras[$i][1]=$resultado_editoras['id_autor'];
								}
								
				
				$real="SELECT id_autor, sitacao_autor FROM autor WHERE nome_autor  LIKE '%$string%' OR sitacao_autor LIKE '%$string%'";
				$SQL=mysql_query($real)or die("Erro no comando SQL: ".mysql_error());
				$l=mysql_num_rows($SQL);
						$lin='0';
						$lin2='0';
						$lin3='0';
						$lin4='0';
				for ($i=0;$i < $l;$i++){
					$sql= mysql_fetch_array($SQL);
					$id_autor[$i]=$sql['id_autor'];
					$sitacao[$i]=$sql['sitacao_autor'];
					$dados[$i][0]=$sql['id_autor'];
					$dados[$i][1]=$sql['sitacao_autor'];
					$SQL=mysql_query("SELECT id_acervo FROM autor_acervo WHERE id_autor = '$id_autor[$i]'")or die("Erro no comando SQL: ".mysql_error());
					$f=mysql_num_rows($SQL);
					for ($i=0;$i<$f;$i++){
						$resultado=mysql_fetch_array($SQL);
						$id_acervo[$i]=$resultado['id_acervo'];
						$dados[$i][2]=$resultado['id_acervo'];
//				echo $dados[$i][0]."---".$dados[$i][1]."---".$dados[$i][2]."<br>";
				 	}
				 }
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------
//busca os videos correspondentes

					for ($i=0;$i<$f;$i++){
						$X=mysql_query("SELECT id_acervo FROM video WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$ff= mysql_num_rows($X);
						if ($ff==1){
							$SQL=mysql_query("SELECT titulo_acervo, assuntos_acervo FROM acervo WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
							$sql= mysql_fetch_array($SQL);
							$v= mysql_num_rows($SQL);
							$id_video[$lin]=$sql['id_video'];
							$id_acervo_video[$lin]=$id_acervo[$i];
							$assuntos_acervo_video[$lin]=$sql['assuntos_acervo'];
							$titulo_acervo_video[$lin]=$sql['titulo_acervo'];
							$kkk=mysql_query("SELECT id_autor FROM autor_acervo WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
							$resultado= mysql_fetch_array($kkk);
							$tipo[$lin]=$resultado['id_autor'];
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
					for ($i=0;$i<$f;$i++){
						$X=mysql_query("SELECT id_acervo FROM livro WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$ff= mysql_num_rows($X);
						if ($ff==1){
						$SQL=mysql_query("SELECT titulo_acervo, assuntos_acervo FROM acervo WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());					$sql= mysql_fetch_array($SQL);
						$v= mysql_num_rows($SQL);
							$id_livro[$lin2]=$sql['id_livro'];
							$id_acervo_livro[$lin2]=$id_acervo[$i];
							$assuntos_acervo_livro[$lin2]=$sql['assuntos_acervo'];
							$titulo_acervo_livro[$lin2]=$sql['titulo_acervo'];
							$SqL=mysql_query("SELECT id_autor FROM autor_acervo WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
							$resultado= mysql_fetch_array($SqL);
							$tipo2[$lin2]=$resultado['id_autor'];
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

					for ($i=0;$i<$f;$i++){
						$X=mysql_query("SELECT id_acervo FROM folheto WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$ff= mysql_num_rows($X);
						if ($ff==1){
						$SQL=mysql_query("SELECT titulo_acervo, assuntos_acervo FROM acervo WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$sql= mysql_fetch_array($SQL);
						$v= mysql_num_rows($SQL);
							$id_folheto[$lin3]=$sql['id_folheto'];
							$id_acervo_folheto[$lin3]=$id_acervo[$i];
							$assuntos_acervo_folheto[$lin3]=$sql['assuntos_acervo'];
							$titulo_acervo_folheto[$lin3]=$sql['titulo_acervo'];
							$SqL=mysql_query("SELECT id_autor FROM autor_acervo WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
							$resultado= mysql_fetch_array($SqL);
							$tipo3[$lin3]=$resultado['id_autor'];
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

					
					for ($i=0;$i<$f;$i++){
						
						$X=mysql_query("SELECT id_acervo FROM texto WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$ff= mysql_num_rows($X);
						if ($ff==1){
						$SQL=mysql_query("SELECT titulo_acervo, assuntos_acervo FROM acervo WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
						$sql= mysql_fetch_array($SQL);
						$v= mysql_num_rows($SQL);
							$id_texto[$lin4]=$sql['id_folheto'];
							$id_acervo_texto[$lin4]=$id_acervo[$i];
							$assuntos_acervo_texto[$lin4]=$sql['assuntos_acervo'];
							$titulo_acervo_texto[$lin4]=$sql['titulo_acervo'];
							$SqL=mysql_query("SELECT id_autor FROM autor_acervo WHERE id_acervo='$id_acervo[$i]'")or die("Erro no comando SQL: ".mysql_error());
							$resultado= mysql_fetch_array($SqL);
							$tipo4[$lin4]=$resultado['id_autor'];
							$lin4++;
						 }
				 	}
					for ($i=0;$i<$lin4;$i++){
						$SQL=mysql_query("SELECT quantidade_aquisicao FROM aquisicao WHERE id_acervo = '$id_acervo_texto[$i]'")or die("Erro no comando SQL: ".mysql_error());			$sql= mysql_fetch_array($SQL);
						$quantidade_aquisicao_texto[$i]=$sql['quantidade_aquisicao'];
			 			}?>