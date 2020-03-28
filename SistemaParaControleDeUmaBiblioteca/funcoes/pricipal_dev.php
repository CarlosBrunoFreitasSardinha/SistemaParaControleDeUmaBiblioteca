<br>
			<?php
			include_once "include/conect_banco.php";
$frase="SELECT id_emprestimo,id_item_acervo,id_usuario_emprestimo,devolucao_item,date_format(data_emprestimo,'%d/%m/%Y') as data_emprestimo, date_format(prazo_emprestimo, '%d/%m/%Y') as prazo FROM emprestimo  WHERE prazo_emprestimo LIKE '%".date("Y-m-d")."%' AND devolucao_item=0 ORDER BY id_emprestimo desc";

			$t=mysql_query($frase)or die("Ocorreu um erro no comando Select: ".mysql_error());
			$k=mysql_num_rows($t);
			echo "<table width=\"324px\" cellspacing=\"0px\"> 
			<tr>
				<td>
				</td>
				<td><center><font color=\"#000099\"><b>Id
				</td>
				<td><center><font color=\"#000099\"><b>Matrícula
				</td>
				<td><center><font color=\"#000099\"><b>Item
				</td>
				<td><center><font color=\"#000099\"><b>Data
				</td></tr>";
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$id_emprestimo[$i]=$d['id_emprestimo'];
								$item_acervo[$i]=$d['id_item_acervo'];
								$SQL=mysql_query("SELECT tombo FROM livro WHERE id_acervo='$item_acervo[$i]'")or die("Ocorreu um erro no comando Select: ".mysql_error());
								$sql=mysql_fetch_array($SQL);
								$tombo[$i]=$sql['tombo'];
								$matricula[$i]=$d['id_usuario_emprestimo'];
								$data_emprestimo[$i]=$d['data_emprestimo'];
								$data_devolucao[$i]=$d['prazo'];
								$confirmacao[$i]=$d['devolucao_item'];
							if(($i%2)=='1'){
								echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#EBEBEB\">
								<td><center>";if(strcmp($data_devolucao[$i],date("d/m/Y"))==0){echo "<a href=\"index.php?acao=$CD&&id_devolucao=".$id_emprestimo[$i]."\"><img src=\"images/b_edit.png\">"; }echo"</td>
								<td><center><font size=\"2\">".$id_emprestimo[$i]." </td>
								<td><center><font size=\"2\">".$matricula[$i]."</td>
								<td><center><font size=\"2\">".$tombo[$i]."</td>
								<td><center><font size=\"2\">".$data_emprestimo[$i]."</td>";
							}
							else if(($i%2)=='0'){
								echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#CAC8C8\">
								<td><center>";if($confirmacao[$i]=='0'){echo "<a href=\"index.php?acao=$CD&&id_devolucao=".$id_emprestimo[$i]."\"><img src=\"images/b_edit.png\">"; }echo"</td>
								<td><center><font size=\"2\">".$id_emprestimo[$i]."</font> </td>
								<td><center><font size=\"2\">".$matricula[$i]."</td>
								<td><center><font size=\"2\">".$tombo[$i]."</td>
								<td><center><font size=\"2\">".$data_emprestimo[$i]."</td>";
							}echo "</td></tr>";	
							if($i=='19')break;
						}
			 echo "</table>";
			?>