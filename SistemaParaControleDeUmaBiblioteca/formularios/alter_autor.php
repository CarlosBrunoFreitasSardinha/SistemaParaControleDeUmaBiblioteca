<html>
		<head>
			<title>Cadastro autor</title>
<script type="text/javascript">
function TestaVal() {
	if (document.Form.autor.value == ""||document.Form.autor.value == " "){
		alert ("O Campo Autor Não Preenchido...Cadastro Não Realizado!")
		return false 
		}
	if (document.Form.sitacao.value == ""||document.Form.sitacao.value == " "){
		alert ("O Campo Sitação Autor Não Preenchido...Cadastro Não Realizado!")
		return false 
		}
}</script></head>
<body>
<table>
	<?php
		$voltar='0';
		require "constantes.php";
		$auter=$_POST['auto'];
		$auter=$_REQUEST['auto'];
		
		include("include/conect_banco.php");
		$pesquisa=mysql_query("SELECT * FROM autor WHERE id_autor='$auter'")or die("Ocorreu um erro no comando Select: ".mysql_error());
		$s=mysql_fetch_array($pesquisa);
		$auto = $s['nome_autor'];
		$sita =$s['sitacao_autor'];
		
		 echo "<form action=\"index.php?acao=$VADA\" method=\"post\">";?>
		</table>
<table>
   <tr>
   		<td width="180"> Informe o nome do autor</td>
		<td><?php echo "<input name=\"autor\" type=\"text\" size=\"50\" value=\"".$auto."\" />";?></td></tr>
   <tr>
		<td width="180">Informe a sitação do autor</td>
		<td><?php echo "<input name=\"sitacao\" type=\"text\" size=\"50\" value=\"".$sita."\" />
		<input name=\"auto\" type=\"hidden\" size=\"10\" value=\"".$auter."\" />";?></td></tr>
   <tr>
   		<td><input type="submit" name="enviar" value="Alterar"/></td>
		<td><input type="reset" name="limpar" value="Limpar"/></form></td></tr></table>
		
</body></html>