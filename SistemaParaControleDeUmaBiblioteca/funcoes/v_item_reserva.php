<?php 

		
		$id_acervo=$_POST['id_acervo'];
		include_once("constantes.php");
		
		echo"<form action=\"index.php?acao=".$VRI."\" method=\"post\">
		Informe o id do item do acervo:  <input type=\"text\" name=\"id_acervo\" value=\"".$id_acervo."\" size=\"15\" />".$id_acervo."
		<input type=\"submit\" name=\"procurar\" value=\"procurar\"><a href=\"index.php?acao=".$CR."\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Criar reserva</a></form>";
		
	$id_acervo=$_POST['id_acervo'];
	include_once "include/conect_banco.php";
			$t=mysql_query("SELECT * FROM tb_reserva WHERE id_acervo_reserva = '$id_acervo'")or die("Erro no comando SQL: ".mysql_error());
			$k=mysql_num_rows($t);
			echo "<center><table border=\"0\" cellspacing=\"0\" cellpading=\"0\" width=\"560\">
							<tr>
								<td colspan=\"4\" bgcolor=\"#000000\"><font color=\"#ffffff\"><b><center>Reservas</td></tr>
			<tr>
				<td width=\"140\"><center><font color=\"#000099\"><b>Tombo</b></td>
				<td width=\"140\"><center><font color=\"#000099\"><b>Matricula</b></td>
				<td width=\"140\"><center><font color=\"#000099\"><b>Data Reserva</b></td>
				<td width=\"140\"><center><font color=\"#000099\"><b>Data Prazo</b></td></tr>";
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$id_multa[$i]=$d['id_acervo_reserva'];
								$id_emprestimo[$i]=$d['id_usuario'];
								$valor[$i]=$d['data_reserva'];
								$pagamento[$i]=$d['prazo_reserva'];
							if(($i%2)==0)echo "<tr bgcolor=\"#CAC8C8\">
								<td><center><font size=\"2\">".$id_multa[$i]."</font> </td>
								<td><center><font size=\"2\">".$id_emprestimo[$i]."</td>
								<td><center><font size=\"2\">".$valor[$i]."</td>
								<td><center><font size=\"2\">".$pagamento[$i]."</td></tr>";
							else echo "<tr bgcolor=\"#EBEBEB\">
								<td><center><font size=\"2\">".$id_multa[$i]."</font> </td>
								<td><center><font size=\"2\">".$id_emprestimo[$i]."</td>
								<td><center><font size=\"2\">".$valor[$i]."</td>
								<td><center><font size=\"2\">".$pagamento[$i]."</td></tr>";
						}
			 echo "</table>";
?>