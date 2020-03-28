<?php
//tabela de livros	
					echo "<center><table border=\"0\" cellspacing=\"0\" cellpading=\"0\" width=\"560\">
							<tr>
								<td colspan=\"4\" bgcolor=\"#000000\"><font color=\"#ffffff\"><b><center>Folhetos</font></td></tr>
							<tr>
								<td width=\"175\"><center><b><font color=\"#000099\">Titulo</td>";
			if($opcao=='1' || $opcao=='3' || $opcao=='4')echo"<td width=\"140\"><center><b><font color=\"#000099\">Editora</td>";
			if($opcao=='2')echo"<td width=\"140\"><center><b><font color=\"#000099\">Autor</td>";
			   			   echo"<td width=\"140\"><center><b><font color=\"#000099\">Assunto</td>
								<td width=\"105\"><center><b><font color=\"#000099\">Nº Exemplares</td></tr>";
								for ($i=0;$i < $lin3;$i++){
									if (($i%2)=='1'){
										echo "<tr bgcolor=\"#EBEBEB\">
												<td><center><font size=\"2\">".$titulo_acervo_folheto[$i]."</td>
												<td><center><font size=\"2\">";
												for ($t=0;$t< $qt;$t++){
													if($tipo3[$i]==$nomes_editoras[$t][1])echo $nomes_editoras[$t][0];
												}echo "</td>
												<td><center><font size=\"2\">".$assuntos_acervo_folheto[$i]."</td>
												<td><center><font size=\"2\">".$quantidade_aquisicao_folheto[$i]."</td>
											    </tr>";
									 }
									if (($i%2)=='0'){
										echo "<tr bgcolor=\"#CAC8C8\">
												<td><center><font size=\"2\">".$titulo_acervo_folheto[$i]."</font></td>
												<td><center><font size=\"2\">";
												for ($t=0;$t< $qt;$t++){
													if($tipo3[$i]==$nomes_editoras[$t][1]) echo $nomes_editoras[$t][0];
												}echo "</td>
												<td><center><font size=\"2\">".$assuntos_acervo_folheto[$i]."</td>
												<td><center><font size=\"2\">".$quantidade_aquisicao_folheto[$i]."</td>
								 				</tr>";
									 }
								   }echo "</table></center><br><br><br><br>";
?>