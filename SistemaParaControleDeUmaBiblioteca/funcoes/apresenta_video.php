<?php //tabela de Mídias	
echo "<center><table border=\"0\" cellspacing=\"0\" cellpading=\"0\" width=\"560\">
						<tr>
							<td colspan=\"4\" bgcolor=\"#000000\"><font color=\"#ffffff\"><b><center>Mídias</td></tr>
							<tr>
								<td width=\"175\"><b><font color=\"#000099\"><center>Titulo</td>";
			if($opcao=='1' || $opcao=='4' || $opcao=='3')echo"<td width=\"140\"><b><font color=\"#000099\"><center>Editora</td>";
			if($opcao=='2')echo"<td width=\"140\"><b><font color=\"#000099\"><center>Autor</td>";
			   			   echo"<td width=\"140\"><b><font color=\"#000099\"><center>Assunto</td>
								<td width=\"105\"><b><font color=\"#000099\"><center>Nº Exemplares</td></tr>";
								for ($i=0;$i < $lin;$i++){
									if (($i%2)=='1'){
										echo "<tr bgcolor=\"#EBEBEB\">
												<td><center><font size=\"2\">".$titulo_acervo_video[$i]."</td>
												<td><center><font size=\"2\">";
												for ($t=0;$t< $qt;$t++){
													if($tipo[$lin]==$nomes_editoras[$t][1]) echo $nomes_editoras[$t][0];
												}echo "</td>";			
												echo "
												<td><center><font size=\"2\">".$assuntos_acervo_video[$i]."</td>
												<td><center><font size=\"2\">".$quantidade_aquisicao_video[$i]."</td>
												</tr>";
									  }if (($i%2)=='0'){
											echo "<tr bgcolor=\"#CAC8C8\">
												<td><center><font size=\"2\">".$titulo_acervo_video[$i]."</td>
												<td><center><font size=\"2\">";
												for ($t=0;$t< $qt;$t++){
													if($tipo[$i]==$nomes_editoras[$t][1]) echo $nomes_editoras[$t][0];
												}echo "</td>";
												echo "
												<td><center><font size=\"2\">".$assuntos_acervo_video[$i]."</td>
												<td><center><font size=\"2\">".$quantidade_aquisicao_video[$i]."</td>
												</tr>";
											 }
									}echo "</table></center><br><br><br><br>"; ?>