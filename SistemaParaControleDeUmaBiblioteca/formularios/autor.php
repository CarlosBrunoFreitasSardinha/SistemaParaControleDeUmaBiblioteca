<html>
		<head>
			<title>Cadastro autor</title>
<script type="text/javascript">
function TestaVal() {
	if (document.Form.autor.value == ""||document.Form.autor.value == " ") {
		alert ("O Campo Autor N�o Preenchido...Cadastro N�o Realizado!")
		return false 
		}
	if (document.Form.sitacao.value == ""||document.Form.sitacao.value == " ") {
		alert ("O Campo Sita��o Autor N�o Preenchido...Cadastro N�o Realizado!")
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
		<td>Informe a sita��o do autor</td>
		<td><input name="sitacao" type="text" size="50" /></td></tr>
   <tr>
   		<td><input type="submit" name="enviar" value="cadastrar"/></td>
		<td><input type="reset" name="enviar" value="limpar"/></td></tr></table></form>
</body></html>