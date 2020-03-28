<?php 

		include_once "include/conect_banco.php";
		
			$t=mysql_query("SELECT * FROM multa WHERE pagamento_multa=0")or die("Erro no comando SQL: ".mysql_error());
			$k=mysql_num_rows($t);
			echo "<center><table border=\"0\" cellspacing=\"0\" cellpading=\"0\" width=\"560\">
							<tr>
								<td colspan=\"5\" bgcolor=\"#000000\"><font color=\"#ffffff\"><b><center>Multas</td></tr>
			<tr>
				<td width=\"20\"><center><font color=\"#000099\"><b>&nbsp;</b></td>
				<td width=\"140\"><center><font color=\"#000099\"><b>Id_multa</b></td>
				<td width=\"140\"><center><font color=\"#000099\"><b>Id_emprestimo</b></td>
				<td width=\"120\"><center><font color=\"#000099\"><b>Valor</b></td>
				<td width=\"140\"><center><font color=\"#000099\"><b>Pagamento multa</b></td></tr>";
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
								<td><center><font size=\"2\"> R$  ".$valor[$i].",00</td>
								<td><center><font size=\"2\">";
											if ($pagamento[$i] == '0') echo "Não Confirmado";
											else echo "Confirmado";
											
											echo "</td><tr>";
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
											<td><center><font size=\"2\"> R$  ".$valor[$i].",00</td>
											<td><center><font size=\"2\">";
											if ($pagamento[$i] == '0') echo "Não Confirmado";
											else echo "Confirmado";
											
											echo "</td><tr>";
								}
						}
						echo "</table>"
?>