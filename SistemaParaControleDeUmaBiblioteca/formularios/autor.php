<html>
		<head>
			<title>Cadastro autor</title>
<script type="text/javascript">
function TestaVal() {
	if (document.Form.autor.value == ""||document.Form.autor.value == " ") {
		alert ("O Campo Autor Não Preenchido...Cadastro Não Realizado!")
		return false 
		}
	if (document.Form.sitacao.value == ""||document.Form.sitacao.value == " ") {
		alert ("O Campo Sitação Autor Não Preenchido...Cadastro Não Realizado!")
		return false 
		}
}</script></head>
<body>
	<?php
		require "constantes.php";
			echo "<form name=\"Form\" onSubmit=\"return TestaVal()\" action=\"index.php?acao=$RCA\" method=\"post\">";?>
<table>
   <tr>
   		<td>Informe o nome do autor</td>
		<td><input name="autor" type="text" size="50" /></td></tr>
   <tr>
		<td>Informe a sitação do autor</td>
		<td><input name="sitacao" type="text" size="50" /></td></tr>
   <tr>
   		<td><input type="submit" name="enviar" value="cadastrar"/></td>
		<td><input type="reset" name="enviar" value="limpar"/></td></tr></table></form>
</body></html>