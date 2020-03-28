<?php
			$name=$_POST['titulo'];
			$identificador=$_POST['matricula'];
			$sexo=$_POST['sexo'];
			$cur=$_POST['curso'];
			$cor=$_POST['corpo'];
			$ace=$_POST['acesso'];
			$sen=$_POST['senha'];
			$senha=md5($sen);
			
			include("include/conect_banco.php");
		
			$z=mysql_query("UPDATE usuarios SET nome_usuario='$name', nivel_acesso= '$ace', senha= '$senha'  WHERE matricula='$identificador'")or die("Erro no Comando SQL: ".mysql_error());
			$z=mysql_query("UPDATE usuario_corpo_curso SET id_curso='$cur', id_corpo= '$cor'  WHERE matricula='$identificador'")or die("Erro no Comando SQL: ".mysql_error());
			
		echo "<center><table border=\"0\" cellspacing=\"0\" cellpading=\"0\" width=\"560\">
							<tr>
								<td colspan=\"6\" bgcolor=\"#000000\"><font color=\"#ffffff\"><b><center>Usuários</td></tr>";
							echo "<tr>
								<td width=\"\"><center><font color=\"#000099\"><b></b></td>
								<td width=\"\"><center><font color=\"#000099\"><b>Matrícula</b></td>
								<td width=\"\"><center><font color=\"#000099\"><b>Nome</b></td>
								<td width=\"\"><center><font color=\"#000099\"><b>Nível Acesso</b></td>
								<td width=\"\"><center><font color=\"#000099\"><b>Curso</b></td>
								<td width=\"\"><center><font color=\"#000099\"><b>Corpo</b></td></tr>";	
		include("include/conect_banco.php");
		$t=mysql_query("SELECT matricula, nome_usuario,	nivel_acesso FROM usuarios")or die("Erro no Comando SQL: ".mysql_error());
		$k=mysql_num_rows($t);
		for ($i=0;$i<$k;$i++){
			$sql=mysql_fetch_array($t);
			$matricula[$i]=$sql['matricula'];
			$nome[$i]=$sql['nome_usuario'];
			$nivel_acesso[$i]=$sql['nivel_acesso'];
			}
		for ($i=0;$i<$k;$i++){
			$z=mysql_query("SELECT id_corpo, id_curso FROM usuario_corpo_curso where matricula='$matricula[$i]'")or die("Erro no Comando SQL: ".mysql_error());
			$num=mysql_fetch_array($z);
			$id_corpo[$i]=$num['id_corpo'];
			$id_curso[$i]=$num['id_curso'];
		}
		for ($i=0;$i<$k;$i++){
			$z=mysql_query("SELECT descricao_curso FROM curso WHERE id_curso='$id_curso[$i]'")or die("Erro no Comando SQL: ".mysql_error());
			$num=mysql_fetch_array($z);
			$curso[$i]=$num['descricao_curso'];
		
			$z=mysql_query("SELECT corpo FROM corpo WHERE id='$id_corpo[$i]'")or die("Erro no Comando SQL: ".mysql_error());
			$nu=mysql_fetch_array($z);
			$corpo[$i]=$nu['corpo'];
			
		
									if (($i%2)=='1'){
										echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#EBEBEB\" height=\"20\">
												<td><center><a href=\"index.php?acao=$ADU&&editora=".$matricula[$i]."\"><img src=\"images/b_edit.png\"></a></td>
												<td><center><font size=\"2\">".$matricula[$i]."</td>
												<td><center><font size=\"2\">".$nome[$i]." </td>
												<td><center><font size=\"2\">".$nivel_acesso[$i]." </td>
												<td><center><font size=\"2\">".$curso[$i]." </td>
												<td><center><font size=\"2\">".$corpo[$i]." </td>
											    </tr>";
									 }
									if (($i%2)=='0'){//bgcolor=\"#C4DBDB\"azul legal
										echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#CAC8C8\">
												<td><center><a href=\"index.php?acao=$ADU&&editora=".$matricula[$i]."\"><img src=\"images/b_edit.png\"></a></td>
												<td><center><font size=\"2\">".$matricula[$i]."</td>
												<td><center><font size=\"2\">".$nome[$i]." </td>
												<td><center><font size=\"2\">".$nivel_acesso[$i]." </td>
												<td><center><font size=\"2\">".$curso[$i]." </td>
												<td><center><font size=\"2\">".$corpo[$i]." </td>
								 				</tr>";
									 }
								   }echo "</table></center><br><br><br><br>";
?>