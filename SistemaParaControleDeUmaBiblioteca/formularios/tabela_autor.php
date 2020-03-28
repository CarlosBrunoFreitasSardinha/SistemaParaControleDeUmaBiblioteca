<?php
			$sitac=$_POST['sitacao'];
			$name=$_POST['autor'];
			$auter=$_POST['auto'];
			include("include/conect_banco.php");
			$z=mysql_query("UPDATE autor SET nome_autor='$name', sitacao_autor='$sitac' WHERE id_autor='$auter'")or die("Erro no Comando SQL: ".mysql_error());
			
		echo "<center><table border=\"0\" cellspacing=\"0\" cellpading=\"0\" width=\"560\">
							<tr>
								<td colspan=\"4\" bgcolor=\"#000000\"><font color=\"#ffffff\"><b><center>Autores</td></tr>";
							echo "<tr>
								<td width=\"186\"><center><font color=\"#000099\"><b>Selecionar</b></td>
								<td width=\"187\"><center><font color=\"#000099\"><b>Autor</b></td>
								<td width=\"186\"><center><font color=\"#000099\"><b>Sitação Autor</b></td></tr>";
		include("include/conect_banco.php");
		$t=mysql_query("SELECT * FROM autor")or die("Erro no Comando SQL: ".mysql_error());
		$k=mysql_num_rows($t);
		for ($i=0;$i<$k;$i++){
			$sql=mysql_fetch_array($t);
			$id_autor[$i]=$sql['id_autor'];
			$nome[$i]=$sql['nome_autor'];
			$sitacao[$i]=$sql['sitacao_autor']; 
		
									if (($i%2)=='1'){
										echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#EBEBEB\" height=\"20\">
												<td><center><a href=\"index.php?acao=$ADA&&auto=".$id_autor[$i]."\"><img src=\"images/b_edit.png\"></a></td>
												<td><center><font size=\"2\">".$nome[$i]." </td>
												<td><center><font size=\"2\">".$sitacao[$i]."</td>
											    </tr>";
									 }
									if (($i%2)=='0'){//bgcolor=\"#C4DBDB\"azul legal
										echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#CAC8C8\">
												<td><center><a href=\"index.php?acao=$ADA&&auto=".$id_autor[$i]."\"><img src=\"images/b_edit.png\"></a></td>
												<td><center><font size=\"2\">".$nome[$i]." </td>
												<td><center><font size=\"2\">".$sitacao[$i]."</td>
								 				</tr>";
									 }
								   }echo "</table></center><br><br><br><br>";
?>