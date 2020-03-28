<HTML>
<head>
<title>Formul&aacute;rio Multa</title>
<script type="text/javascript">
function TestaVal() {
	if (document.Form.id_emprestimo.value == ""||document.Form.id_emprestimo.value == " ") {
		alert ("O Campo Multa sobre o empréstimo Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.Form.matricula.value == ""||document.Form.matricula.value == " ") {
		alert ("O Campo Usuário Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.Form.id_acervo.value == ""||document.Form.id_acervo.value == " ") {
		alert ("O Campo Item Bibliográfico Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.Form.valor.value == ""||document.Form.valor.value == " ") {
		alert ("O Campo Valor em R$ Não Preenchido...Cadastro Não Realizado")
		return false 
		}
}
</script>
</head>
<body>

	<table>
	<?php
	require_once "constantes.php";
	echo "<form onSubmit=\"return TestaVal()\" name=\"Form\" action=\"index.php?acao=".$CM."\" method=\"post\">";?>
		<tr>
		<td width="166" colspan=\"3\">Multa sobre o empréstimo:
			</td>
			<td width=90><?php
				$emprestimo=$_POST['id_emprestimo'];
			 echo "<input type=\"text\" name=\"id_emprestimo\"  size=\"15\" value=\"".$emprestimo."\" />";?>
			</td>
		<td width="58" colspan=\"3\"><input type="submit" name="buscar" value="buscar" />
			</td>
			<td width=304><input type="reset" name="reset" value="Limpar"/>
			</td>
		</tr>
		</form>
		<?php
		
		 include_once "include/conect_banco.php";
		 $sql=mysql_query("SELECT id_item_acervo,id_usuario_emprestimo,date_format(data_emprestimo,'%d/%m/%Y') as data_emprestimo, date_format(prazo_emprestimo, '%d/%m/%Y') as prazo_emprestimo FROM emprestimo WHERE id_emprestimo = '$emprestimo' AND devolucao_item='0';")or die("Erro no comando SQL: ".mysql_error());
		 $s= mysql_num_rows($sql);
		for ($i=0;$i<$s;$i++){
			$array_sql = mysql_fetch_array($sql);
			$data_prazo=$array_sql['prazo_emprestimo'];
		  }
		  
			echo "<form onSubmit=\"return TestaVal()\" name=\"Form\" action=\"index.php?acao=".$RM."\" method=\"post\">";
			include_once "include/conect_banco.php";
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
			<td>Valor em R$
			</td>
			<td><?php
			$data=date("Y/m/d");//tabela emprestimo
					include("funcoes/diferenca_de_datas.php");
					echo "<input name=\"dias\" type=\"hidden\" value=\"".$dias."\" />";
					$sql = mysql_query("UPDATE emprestimo SET data_devolucao='$data',devolucao_item='1' WHERE id_emprestimo ='$emprestimo'")or die("Erro no comando SQL:".mysql_error());
				$valor=$_POST['dias'];
				echo"<input type=\"text\" name=\"valor\" value=\"".$valor."\" size=\"15\" />";?>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr><td><input name="criar" type="submit" value="criar"/></td>
			<td colspan="3"><input name="limpar" type="reset" value="limpar"/></td></tr>
	  </form>
	</table>
</body>
</HTML>