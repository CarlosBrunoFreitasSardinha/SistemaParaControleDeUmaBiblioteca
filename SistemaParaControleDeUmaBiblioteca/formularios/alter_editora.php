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
		$id_qualquer=$_POST['editora'];
		$id_qualquer=$_REQUEST['editora'];
		
		include("include/conect_banco.php");
		$pesquisa=mysql_query("SELECT * FROM editora WHERE id_editora='$id_qualquer'")or die("Ocorreu um erro no comando Select: ".mysql_error());
		$s=mysql_fetch_array($pesquisa);
		$nome = $s['editora'];
		 echo "<form action=\"index.php?acao=$VADE\" method=\"post\">";?></table>
<table>
   <tr>
   		<td width="180"> Informe Titulo da Editora</td>
		<td><?php
		echo "<input name=\"titulo\" type=\"text\" size=\"50\" value=\"".$nome."\" /><input name=\"identificador\" type=\"hidden\" value=\"".$id_qualquer."\"/>";?></td></tr>
   <tr>
   		<td><input type="submit" name="enviar" value="Alterar"/></td>
		<td><input type="reset" name="limpar" value="Limpar"/></form></td></tr></table></body></html>