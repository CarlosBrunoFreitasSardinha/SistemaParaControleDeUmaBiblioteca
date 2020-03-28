<br>
<?php 
		include_once "include/conect_banco.php";
		
			$t=mysql_query("SELECT * FROM multa WHERE pagamento_multa=0")or die("Erro no comando SQL: ".mysql_error());
			$k=mysql_num_rows($t);
			echo "<center><table border=\"0\" width=\"324px\" cellspacing=\"0\" cellpading=\"0\"> 
			<tr>
				<td>
				</td>
				<td><center><font color=\"#000099\"><b>Id
				</td>
				<td><center><font color=\"#000099\"><b>Empréstimo
				</td>
				<td><center><font color=\"#000099\"><b>Valor
				</td></tr> ";
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$id_multa[$i]=$d['id_multa'];
								$id_emprestimo[$i]=$d['id_emprestimo'];
								$valor[$i]=$d['valor'];
								$pagamento[$i]=$d['pagamento_multa'];
							if (($i%2)=='1'){
							echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#CAC8C8\"> 
								<td><center><font size=\"2\">";
								if ($pagamento[$i]=='0'){
									echo "<a href=\"index.php?acao=$LM&&id_multa=".$id_multa[$i]."\">
										<img src=\"images/b_edit.png\">";
								 }
								 echo"</td>
								<td><center><font size=\"2\">".$id_multa[$i]."</td>
								<td><center><font size=\"2\">".$id_emprestimo[$i]."</td>
								<td><center><font size=\"2\"> R$  ".$valor[$i].",00</td><tr>";
								}

								else{
									echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#EBEBEB\"> 
											<td><center><font size=\"2\">";
									if ($pagamento[$i]=='0'){
										echo "<a href=\"index.php?acao=$LM&&id_multa=".$id_multa[$i]."\">
										<img src=\"images/b_edit.png\">";
										 }echo" </font></td>
											<td><center><font size=\"2\">".$id_multa[$i]." </font></td>
											<td><center><font size=\"2\">".$id_emprestimo[$i]."</td>
											<td><center><font size=\"2\"> R$  ".$valor[$i].",00</td><tr>";
								}if($i=='7')break;
						}
						echo "</table>"?>