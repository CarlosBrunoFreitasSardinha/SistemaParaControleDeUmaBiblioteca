<?php
			$name=$_POST['titulo'];
			$identificador=$_POST['identificador'];
			include("include/conect_banco.php");
		
			$z=mysql_query("UPDATE idioma SET idioma='$name' WHERE id_idioma='$identificador'")or die("Erro no Comando SQL: ".mysql_error());
		echo "<center><table border=\"0\" cellspacing=\"0\" cellpading=\"0\" width=\"560\">
							<tr>
								<td colspan=\"4\" bgcolor=\"#000000\"><font color=\"#ffffff\"><b><center>Idiomas</td></tr>";
								
		include("include/conect_banco.php");
		$t=mysql_query("SELECT * FROM idioma")or die("Erro no Comando SQL: ".mysql_error());
		$k=mysql_num_rows($t);
		for ($i=0;$i<$k;$i++){
			$sql=mysql_fetch_array($t);
			$id_autor[$i]=$sql['id_idioma'];
			$nome[$i]=$sql['idioma'];
		
									if (($i%2)=='1'){
										echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#EBEBEB\" height=\"20\">
												<td width=\"25\"><center><a href=\"index.php?acao=$ADI&&id=".$id_autor[$i]."\"><img src=\"images/b_edit.png\"></a></td>
												<td><center><font size=\"2\">".$nome[$i]." </td>
											    </tr>";
									 }
									if (($i%2)=='0'){//bgcolor=\"#C4DBDB\"azul legal
										echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#CAC8C8\">
												<td><center><a href=\"index.php?acao=$ADI&&id=".$id_autor[$i]."\"><img src=\"images/b_edit.png\"></a></td>
												<td><center><font size=\"2\">".$nome[$i]." </td>
								 				</tr>";
									 }
								   }echo "</table></center><br><br><br><br>";
?>