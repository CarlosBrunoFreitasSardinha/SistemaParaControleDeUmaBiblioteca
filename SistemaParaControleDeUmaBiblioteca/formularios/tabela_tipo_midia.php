<?php
			$name=$_POST['titulo'];
			$identificador=$_POST['identificador'];
			include("include/conect_banco.php");
		
			$z=mysql_query("UPDATE tipo_midia SET descricao_tipo_midia='$name' WHERE id_tipo_midia='$identificador'")or die("Erro no Comando SQL: ".mysql_error());
		echo "<center><table border=\"0\" cellspacing=\"0\" cellpading=\"0\" width=\"560\">
							<tr>
								<td colspan=\"2\" bgcolor=\"#000000\"><font color=\"#ffffff\"><b><center>Tipo Mídias</td></tr>";
								
		include("include/conect_banco.php");
		$t=mysql_query("SELECT * FROM tipo_midia")or die("Erro no Comando SQL: ".mysql_error());
		$k=mysql_num_rows($t);
		for ($i=0;$i<$k;$i++){
			$sql=mysql_fetch_array($t);
			$id_autor[$i]=$sql['id_tipo_midia'];
			$nome[$i]=$sql['descricao_tipo_midia'];
		
									if (($i%2)=='1'){
										echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#EBEBEB\" height=\"20\">
												<td width=\"25\"><center><a href=\"index.php?acao=$ADTM&&editora=".$id_autor[$i]."\"><img src=\"images/b_edit.png\"></a></td>
												<td><center><font size=\"2\">".$nome[$i]." </td>
											    </tr>";
									 }
									if (($i%2)=='0'){//bgcolor=\"#C4DBDB\"azul legal
										echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#CAC8C8\">
												<td><center><a href=\"index.php?acao=$ADTM&&editora=".$id_autor[$i]."\"><img src=\"images/b_edit.png\"></a></td>
												<td><center><font size=\"2\">".$nome[$i]." </td>
								 				</tr>";
									 }
								   }echo "</table></center><br><br><br><br>";
?>