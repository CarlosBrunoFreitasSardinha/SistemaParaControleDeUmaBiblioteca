<html>
		<head>
			<title>Cadastro Autor</title>
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
		$id_qualquer=$_POST['id'];
		$id_qualquer=$_REQUEST['id'];
		
		include("include/conect_banco.php");
		$pesquisa=mysql_query("SELECT * FROM idioma WHERE id_idioma='$id_qualquer'")or die("Erro no Comando SQL: ".mysql_error());
		$s=mysql_fetch_array($pesquisa);
		$nome = $s['idioma'];
		 echo "<form action=\"index.php?acao=$VADI\" method=\"post\">";?></table>
<table>
   <tr>
   		<td width="180"> Informe Titulo da Idioma</td>
		<td><?php
		echo "<input name=\"titulo\" type=\"text\" size=\"50\" value=\"".$nome."\" />
			  <input name=\"identificador\" type=\"hidden\" value=\"".$id_qualquer."\"/>";?></td></tr>
   <tr>
   		<td><input type="submit" name="enviar" value="Alterar"/></td>
		<td><input type="reset" name="limpar" value="Limpar"/></form></td></tr></table></body></html>