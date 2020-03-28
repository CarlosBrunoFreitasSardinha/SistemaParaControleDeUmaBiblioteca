<?php
/*
$tombo = $_POST['id_item'];
$item_tombo=mysql_query("SELECT id_acervo FROM livro WHERE tombo='$tombo'") or die ("Erro no comando SQL".mysql_error());
	$yp=mysql_num_rows($item_tombo);
	if($yp){	
		$acervo_id=mysql_fetch_array($item_tombo);
			$id_item=$acervo_id['id_acervo'];
	}
$item_tombo=mysql_query("SELECT id_acervo FROM video WHERE tombo='$tombo'") or die ("Erro no comando".mysql_error());
	$yp=mysql_num_rows($item_tombo);
	if($yp){	
		$acervo_id=mysql_fetch_array($item_tombo);
			$id_item=$acervo_id['id_acervo'];
	}
$item_tombo=mysql_query("SELECT id_acervo FROM folheto WHERE tombo='$tombo'") or die ("Erro no comando".mysql_error());
	$yp=mysql_num_rows($item_tombo);
	if($yp){	
		$acervo_id=mysql_fetch_array($item_tombo);
			$id_item=$acervo_id['id_acervo'];
	}
$item_tombo=mysql_query("SELECT id_acervo FROM texto WHERE tombo='$tombo'") or die ("Erro no comando".mysql_error());
	$yp=mysql_num_rows($item_tombo);
	if($yp){	
		$acervo_id=mysql_fetch_array($item_tombo);
			$id_item=$acervo_id['id_acervo'];
	}
*/
$matricula = $_POST['matricula'];
$x=0;
$es=0;

			$t=mysql_query("SELECT * FROM tb_reserva")or die("Erro no comando SQL: ".mysql_error());
			$k=mysql_num_rows($t);
			for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$id_acervo[$i]=$d['id_acervo_reserva'];
								$id_emprestimo[$i]=$d['id_usuario'];
								if ($id_item==$id_acervo[$i]){
									$x='1';
									
									echo "<br> O livro esta reservado por ".$id_emprestimo[$r].""; if($es=='0')echo " Deseja fazer  <a href=\"index.php?acao=".$CR."\">Reserva</a>";
									$es='1';
								 }
			 }
			$t=mysql_query("SELECT id_emprestimo, valor FROM multa WHERE pagamento_multa=0")or die("Erro no comando SQL: ".mysql_error());
			$k=mysql_num_rows($t);
			$j='0';
			$pl='0';
							for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$id_emprestimo[$i]=$d['id_emprestimo'];
								$valor[$i]=$d['valor'];
								$w=mysql_query("SELECT id_usuario_emprestimo FROM emprestimo WHERE id_emprestimo='$id_emprestimo[$i]'")or die("Erro no comando SQL: ".mysql_error());
								$usuario=mysql_fetch_array($w);
								$id_usuario_emprestimo[$i]=$usuario['id_usuario_emprestimo'];
								if ($matricula==$id_usuario_emprestimo[$i]){
									$x='1';
									if($j=='0')echo "<br> O Usuário".$id_usuario_emprestimo[$i]." possue multa em aberto. Deseja limpar essa multa  <a href=\"index.php?acao=".$LM."\">Limpar</a>";
									$mi=mysql_query("SELECT id_item_acervo, data_emprestimo, data_devolucao, prazo_emprestimo FROM emprestimo WHERE id_emprestimo='$id_emprestimo[$i]'")or die("Erro no comando SQL: ".mysql_error());
												$sql=mysql_fetch_array($mi);
												$prazo_emprestimo[$i]=$sql['prazo_emprestimo'];
												$data_devolucao[$i]=$sql['data_devolucao'];
												$data_emprestimo[$i]=$sql['data_emprestimo'];
												$id_item_acervo[$i]=$sql['id_item_acervo'];
												echo "<center><table border=\"0\" cellspacing=\"0\" cellpading=\"0\" width=\"560\">";
													if ($j=='0')echo "<tr><td colspan=\"5\" bgcolor=\"#000000\"><font color=\"#ffffff\"><b><center>Multa</font></td></tr>";
														if ($j=='0')echo "<tr>
																<td width=\"112\"><center><font color=\"#000099\"><b>Matricula</b></td>
																<td width=\"112\"><center><font color=\"#000099\"><b>Id Acervo</b></td>
																<td width=\"112\"><center><font color=\"#000099\"><b>Data Empréstimo</b></td>
																<td width=\"112\"><center><font color=\"#000099\"><b>Data Prazo</b></td>
																<td width=\"112\"><center><font color=\"#000099\"><b>Data Devolução</b></td></tr>";
												
													if (($pl%2)=='1'){
														echo "<tr bgcolor=\"#EBEBEB\">
																	<td width=\"112\"><center><font size=\"2\">".$matricula."</font></td>
																	<td width=\"112\"><center><font size=\"2\">".$id_item_acervo[$i]." </td>
																	<td width=\"112\"><center><font size=\"2\">".$data_emprestimo[$i]." </td>
																	<td width=\"112\"><center><font size=\"2\">".$prazo_emprestimo[$i]." </td>
																	<td width=\"112\"><center><font size=\"2\">".$data_devolucao[$i]." </td>
											   					 </tr>";
									 					}
														else{//bgcolor=\"#C4DBDB\"azul legal
															echo "<tr bgcolor=\"#CAC8C8\">
																      <td width=\"112\"><center><font size=\"2\">".$matricula."</font></td>
																      <td width=\"112\"><center><font size=\"2\">".$id_item_acervo[$i]." </td>
																      <td width=\"112\"><center><font size=\"2\">".$data_emprestimo[$i]." </td>
																      <td width=\"112\"><center><font size=\"2\">".$prazo_emprestimo[$i]." </td>
																      <td width=\"112\"><center><font size=\"2\">".$data_devolucao[$i]." </td>
								 								  </tr>";
									 				        }
												$j='1';	
												$pl++;
												if($i == ($k-1))echo "</table></center>";
								}
							}
			$w=mysql_query("SELECT id_usuario_emprestimo FROM emprestimo WHERE id_item_acervo='$id_item' AND devolucao_item='0'")or die("Erro no comando SQL: ".mysql_error());
			$u=mysql_num_rows($w);
			if ($u !=0){
				echo "\n \n O item em questão não teve sua devolução Registrada. Verifique na tabela Empréstimo";
				$x='1';
			}
			$M=mysql_query("SELECT id_emprestimo FROM emprestimo WHERE id_usuario_emprestimo='$matricula' AND devolucao_item='0'")or die("Erro no comando SQL: ".mysql_error());
			$r=mysql_num_rows($M);
			if ($r >='2'){
				echo "\n \n O Usuário possui Mais de 2 Itens em Empr&egrave;stimo. Verifique na tabela Empréstimo";
				$x='1';
			}
	if ($x== '0'){
		$data = date("Y/m/d");//=date("d/m/Y")
		$prazo = strftime("%Y/%m/%d", strtotime("+7 days"));//=strftime("%d/%m/%Y", strtotime("+7 days"));
		include_once ("include/conect_banco.php");
		$sql = mysql_query("INSERT INTO emprestimo(id_item_acervo, id_usuario_emprestimo, data_emprestimo, prazo_emprestimo)VALUES ('$id_item', '$matricula', '$data','$prazo')")or die ("Erro no comando SQL:".mysql_error());
		include("formularios/formulario_devolucao.php");
	echo "Renova&ccedil;&acirc;o Realizada com Sucesso!";
	}
	?>