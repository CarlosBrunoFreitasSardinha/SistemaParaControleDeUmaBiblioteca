<?php
//tabela de livros	
					echo "<center><table border=\"0\" cellspacing=\"0\" cellpading=\"0\" width=\"560\">
							<tr>
								<td colspan=\"4\" bgcolor=\"#000000\"><font color=\"#ffffff\"><b><center>Livros</td></tr>
							<tr>
								<td width=\"175\"><center><font color=\"#000099\"><b>Titulo</b></td>";
			if($opcao=='1' || $opcao=='3' || $opcao=='4')echo"<td width=\"140\"><center><font color=\"#000099\"><b>Editora</b></td>";
			if($opcao=='2')echo"<td width=\"140\"><center><font color=\"#000099\"><b>Autor</b></td>";
			   			   echo"<td width=\"140\"><center><font color=\"#000099\"><b>Assunto</b></td>
								<td width=\"105\"><center><font color=\"#000099\"><b>Nº Exemplares</b></td></tr>";
								for ($i=0;$i < $lin2;$i++){
									if (($i%2)=='1'){
										echo "<tr bgcolor=\"#EBEBEB\">
												<td><center><font size=\"2\">".$titulo_acervo_livro[$i]."</font></td>
												<td><center><font size=\"2\">";
												for ($t=0;$t< $qt;$t++){
													if($tipo2[$i]==$nomes_editoras[$t][1]) echo $nomes_editoras[$t][0];
												}echo "</td>";
										echo "
 												<td><center><font size=\"2\">".$assuntos_acervo_livro[$i]."</td>
												<td><center><font size=\"2\">".$quantidade_aquisicao_livro[$i]."</td>
											    </tr>";
									 }
									if (($i%2)=='0'){//bgcolor=\"#C4DBDB\"azul legal
										echo "<tr bgcolor=\"#CAC8C8\">
												<td><center><font size=\"2\">".$titulo_acervo_livro[$i]."</td>
												<td><center><font size=\"2\">";
												for ($t=0;$t< $qt;$t++){
													if($tipo2[$i]==$nomes_editoras[$t][1]) echo $nomes_editoras[$t][0];
												}echo "</td>";
												echo "
												<td><center><font size=\"2\">".$assuntos_acervo_livro[$i]."</td>
												<td><center><font size=\"2\">".$quantidade_aquisicao_livro[$i]."</td>
								 				</tr>";
									 }
													}
								   echo "</table></center><br><br><br><br>";
?>