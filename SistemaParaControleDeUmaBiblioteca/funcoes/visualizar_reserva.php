<?php 

		$id_item   =$_POST['id_ac'];
		$matricula =$_POST['mat'];
		$exp       =$_POST['data_reserva'];
			$it= explode("/", $exp);
			$datas= date('Y')."/".$it['1']."/".$it['0'];
		$inserir=0;
		$inserir   = $_POST['apresenta'];
					$x=0;
			 include ("include/conect_banco.php");
			 $swl=mysql_query("SELECT * FROM usuarios WHERE matricula='$matricula'")or die("Erro no Comando SQL: ".mysql_error());
			 $lins=mysql_num_rows($swl);
		 		if ($lins==0&&$inserir=='1'){
					echo "Usuario Inexistente!";
					$x=4;
					}
					
			include_once "include/conect_banco.php";
		if ($inserir=='1'&&$x==0){
			$sql=mysql_query("INSERT INTO tb_reserva(id_acervo_reserva, id_usuario, data_reserva)
			VALUES('$id_item' ,'$matricula' ,'$datas')") or die ("Erro no Comando".mysql_error());
			$in++;
			}
		
			$t=mysql_query("SELECT * FROM tb_reserva ORDER BY data_reserva")or die("Ocorreu um erro no comando Select: ".mysql_error());
			$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$id_multa[$i]=$d['id_acervo_reserva'];
								$USUARIO[$i]=$d['id_usuario'];
								$valor[$i]=$d['data_reserva'];
								$pagamento[$i]=$d['confirmacao_reserva'];
								}
	for ($i=0;$i < $k;$i++){
		$t=mysql_query("SELECT nome_usuario FROM usuarios WHERE $USUARIO[$i]")or die("Erro no Comando SQL: ".mysql_error());
			$sql=mysql_fetch_array($t);
			$nome[$i]=$sql['nome_usuario'];
			
			$pesquisa=mysql_query("SELECT id_autor FROM autor_acervo WHERE id_acervo='$id_multa[$i]'")or die("Erro no Comando SQL: ".mysql_error());
			$resultado_p=mysql_fetch_array($pesquisa);
			$ida[$i]=$resultado_p['id_autor'];
			
			$pesq	=mysql_query("SELECT nome_autor FROM autor WHERE id_autor='$ida[$i]'")or die("Erro no Comando SQL: ".mysql_error());
			$resulta=mysql_fetch_array($pesq);
			$autor[$i]  = $resulta['nome_autor'];
			
			$z=mysql_query("SELECT id_corpo, id_curso FROM usuario_corpo_curso WHERE matricula='$USUARIO[$i]'")or die("Erro no Comando SQL: ".mysql_error());
			$num=mysql_fetch_array($z);
			$id_corpo[$i]=$num['id_corpo'];
			$id_curso[$i]=$num['id_curso'];
			
			$z=mysql_query("SELECT descricao_curso FROM curso WHERE id_curso='$id_curso[$i]'")or die("Erro no Comando SQL: ".mysql_error());
			$num=mysql_fetch_array($z);
			$curso[$i]=$num['descricao_curso'];
			}
			for ($i=0;$i < $k;$i++){
				$z=mysql_query("SELECT titulo_acervo FROM acervo WHERE id_acervo=$id_multa[$i]")or die("Erro no Comando SQL: ".mysql_error());
			 	$num=mysql_fetch_array($z);
				$titulo[$i]=$num['titulo_acervo'];
			 
			
			if ($i==0){echo "<center><table border=\"0\" cellspacing=\"0\" cellpading=\"0\" width=\"580\">
							<tr>
								<td colspan=\"10\" bgcolor=\"#000000\"><font color=\"#ffffff\"><b><center>Reservas</td></tr>
			<tr>
				<td width=\"20\"><center><font color=\"#000099\"><b></b></td>
				<td width=\"20\"><center><font color=\"#000099\"><b></b></td>
				<td width=\"\"><center><font color=\"#000099\"><b>Tombo</b></td>
				<td width=\"\"><center><font color=\"#000099\"><b>Matricula</b></td>
				<td width=\"\"><center><font color=\"#000099\"><b>Autor</b></td>
				<td width=\"\"><center><font color=\"#000099\"><b>Nome</b></td>
				<td width=\"\"><center><font color=\"#000099\"><b>Curso</b></td>
				<td width=\"\"><center><font color=\"#000099\"><b>Titulo</b></td>
				<td width=\"\"><center><font color=\"#000099\"><b>Data Reserva</b></td>
				<td width=\"\"><center><font color=\"#000099\"><b>confirmação</b></td></tr>";}
				if (($i%2)=='1'){
					echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#EBEBEB\">
							<td><center><font size=\"2\">";
							if ($pagamento[$i]=='0'){
								echo "<a href=\"index.php?acao=$REMP&&item=".$id_multa[$i]."&&matricula=".$USUARIO[$i]."\"><img src=\"images/b_edit.png\">";
							  }echo"</td>
							<td><center><font size=\"2\">";
							if ($pagamento[$i]=='0'){
								echo "<a href=\"index.php?acao=$ALT&&item=".$id_multa[$i]."&&matricula=".$USUARIO[$i]."\"><img src=\"images/b_drop.png\">";
							  }echo"</td>
								<td><center><font size=\"2\">".$id_multa[$i]." </td>
								<td><center><font size=\"2\">".$USUARIO[$i]."</td>
								<td><center><font size=\"2\">".$autor[$i]."</td>
								<td><center><font size=\"2\">".$nome[$i]."</td>
								<td><center><font size=\"2\">".$curso[$i]."</td>
								<td><center><font size=\"2\">".$titulo[$i]."</td>
								<td><center><font size=\"2\">".$valor[$i]."</td>
								<td><center><font size=\"2\">";if($pagamento[$i]=='0'){echo "Não Confirmado";}
																else if($pagamento[$i]=='1'){ echo"Confirmado";}
																else if($pagamento[$i]=='2'){ echo"Cancelado";}
																echo "</td></tr>";
					}
							else{
							echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#CAC8C8\">
								<td><center><font size=\"2\">";
								if($pagamento[$i]=='0'){
									echo "<a href=\"index.php?acao=$REMP&&item=".$id_multa[$i]."&&matricula=".$USUARIO[$i]."\"><img src=\"images/b_edit.png\">";
									}echo"</td>
								<td><center><font size=\"2\">";
								if ($pagamento[$i]=='0'){
									echo "<a href=\"index.php?acao=$ALT&&item=".$id_multa[$i]."&&matricula=".$USUARIO[$i]."\"><img src=\"images/b_drop.png\">";
									}echo"</td>
								<td><center><font size=\"2\">".$id_multa[$i]."</font> </td>
								<td><center><font size=\"2\">".$USUARIO[$i]."</td>
								<td><center><font size=\"2\">".$autor[$i]."</td>
								<td><center><font size=\"2\">".$nome[$i]."</td>
								<td><center><font size=\"2\">".$curso[$i]."</td>
								<td><center><font size=\"2\">".$titulo[$i]."</td>
								<td><center><font size=\"2\">".$valor[$i]."</td>
								<td><center><font size=\"2\">";if($pagamento[$i]=='0'){echo "Não Confirmado";}
																else if($pagamento[$i]=='1'){ echo"Confirmado";}
																else if($pagamento[$i]=='2'){ echo"Cancelado";}
																echo "</td></tr>";
								}
						}
			 echo "</table>";
?>