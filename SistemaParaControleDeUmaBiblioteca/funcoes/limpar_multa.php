<HTML>
<head>
<title>se ferro bacana</title>
</head>
<body>

	<table border="0">
<?php
require "constantes.php";
	   echo "<form action=\"index.php?acao=".$LM."\" method=\"post\">";
	  ?>
		<tr><?php
		include_once "include/conect_banco.php";
		global $id_multa;
		$id_multa=$_REQUEST['id_multa'];
			$sql=mysql_query("SELECT * FROM Multa WHERE id_multa = '$id_multa';")or die("Erro no comando SQL:   ".mysql_error());
		 	$s= mysql_num_rows($sql);
		 
		for ($i=0;$i<$s;$i++){
			$array_sql = mysql_fetch_array($sql);
			$emprestimo =$array_sql['id_emprestimo'];
			$valor   =$array_sql['valor'];
		 }
		$sql=mysql_query("SELECT * FROM emprestimo WHERE id_emprestimo = '$emprestimo';")or die("Erro no comando SQL:   ".mysql_error());
		 	$s= mysql_num_rows($sql);
		 
		for ($i=0;$i<$s;$i++){
			$array_sql = mysql_fetch_array($sql);
			$item =$array_sql['id_item_acervo'];
		 }
		echo "<td colspan=\"5\">Informe o id da Multa:
			<input type=\"text\" name=\"id_multa\" value=\"".$id_multa."\" size=\"15\" />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type=\"submit\" value=\"buscar\"/></td>
		</tr>";
//------------------------------------------------------------------------------------------------------------------------------------------------------------
		echo "
		<tr>
			<td width=\"134\" colspan=\"2\">Id Empréstimo:</td>
			<td width=\"90\">";

		echo "<input type=\"text\" name=\"emprestimo\" value=\"".$emprestimo."\" size=\"15\" />
		  </td>
			<td width=\"100\" align=\"center\">Item Bibliográfia:</td>
			<td><input type=\"text\" name=\"item\" value=\"".$item."\" size=\"15\" />
			</td>
		</tr>";
		echo "<tr>
			<td colspan=\"2\">Valor em R$
			</td>
			<td><input type=\"text\" name=\"valor\" value=\"".$valor."\" size=\"15\" /></td>
			<td width=\"130\"></form>
		  <td colspan=\"2\">&nbsp;</td>
		</tr>";
		 echo "<form action=\"index.php?acao=".$LM."\" method=\"post\">
			
			<input type=\"hidden\" name=\"id_multa\" value=\"".$id_multa."\" size=\"15\" />";
			?>
		<tr>
			<td colspan="3">Confirmação do Pagamento:</td>
			<td width="86">
			<input type="radio" name="confirmacao" size="15" value="1" />sim
		  	<input type="radio" name="confirmacao" size="15" value="0" />não</td>
		</tr>
		<tr>
			<td><input name="criar" type="submit" value="enviar"/></td>
			<td colspan="2"><input name="limpar" type="submit" value="limpar"/></td>
			</tr>
	  </form>
	</table>
	<?php
		include ("include/conect_banco.php");
		$confirmacao=$_POST['confirmacao'];
		$id_multa=$_POST['id_multa'];
		if (!$confirmacao=='0'){
			$sql=mysql_query("UPDATE multa SET pagamento_multa='$confirmacao' WHERE id_multa='$id_multa'")or die ("Erro no comando SQL".mysql_error());
			echo "Multa Limpa com sucesso!";
		 }
		?>
</body>
</HTML>