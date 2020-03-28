<?php 
include "conect_banco.php";

$emprestimo = $_POST['id_emprestimo'];//tabela multa
$valor=$_POST['valor'];//tabela multa


$sql = mysql_query("INSERT INTO multa ( id_emprestimo, valor) VALUES 
('$emprestimo' , '$valor')") or die ("Erro no comando SQL:".mysql_error());
?>
<HTML>
<head>
<title>Formul&aacute;rio Multa</title>
</head>
<body>

	<table>
	<?php
	require_once "constantes.php";
	echo "<form action=\"index.php?acao=".$CM."\" method=\"post\">";?>
		<tr>
		<td width="166" colspan=\"3\">Multa sobre o emprestimo:
			</td>
			<td width=90><?php
				$emprestimo=$_REQUEST['id_emprestimo'];
			 echo "<input type=\"text\" name=\"id_emprestimo\"  size=\"15\" value=\"".$emprestimo."\" />";?>
			</td>
		<td width="58" colspan=\"3\"><input type="submit" name="buscar" value="buscar" />
			</td>
			<td width=304>  
			</td>
		</tr>
		</form>
		<?php
			echo "<form action=\"index.php?acao=".$RM."\" method=\"post\">";
			include_once "conect_banco.php";
		
			$emprestimo=$_REQUEST['id_emprestimo'];
			$sql=mysql_query("SELECT * FROM emprestimo WHERE id_emprestimo = '$emprestimo';")or die("Erro no comando SQL:   ".mysql_error());
		 	$s= mysql_num_rows($sql);
		 
		for ($i=0;$i<$s;$i++){
		$array_sql = mysql_fetch_array($sql);
		$matricula =$array_sql['id_usuario_emprestimo'];
		$id_item   =$array_sql['id_item_acervo'];
		$ids       =$array_sql['id_emprestimo'];
		}
		echo "<input type=\"hidden\" name=\"id_emprestimo\"  size=\"15\" value=\"".$emprestimo."\" />
		<tr>
			<td width=\"78\">Usuário:</td>
			<td width=\"90\">";

		echo "<input type=\"text\" name=\"matricula\" value=\"".$matricula."\" size=\"15\" />
		  </td>
			<td width=\"178\" align=\"center\">Item Bibliografia:</td>
			<td><input type=\"text\" name=\"id_acervo\" value=\"".$id_item."\" size=\"15\" />
			</td>
		</tr>";?>
		<tr>
			<td><?php echo "Valor em R$"; ?>
			</td>
			<td><input type="text" name="valor" size="15" />
			</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td><input name="criar" type="submit" value="criar"/></td>
			<td colspan="3"><input name="limpar" type="reset" value="limpar"/></td>
			
		</tr>
	  </form>
	</table>
</body>
</HTML>
<?php
echo "Multa Registrada com Sucesso!";
?>