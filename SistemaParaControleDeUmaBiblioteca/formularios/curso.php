<html>
<head>
<title>Cadastro autor</title>
<script type="text/javascript">
function TestaVal() {
	if (document.Form.curso.value == ""||document.Form.curso.value == " ") {
		alert ("O Campo Idioma Não Preenchido...Cadastro Não Realizado!")
		return false 
		}
}
</script>
</head>
<body>
<?php
require "constantes.php";
	   echo "<form onSubmit=\"return TestaVal()\" name=\"Form\" action=\"index.php?acao=".$RCC."\" method=\"post\">";
	  ?>
<table>
   <tr>
	
	<td>Informe o Curso</td>
	<td><input name="curso" type="text" size="25" /></td></tr>
   <tr>
   	<td><input type="submit" name="enviar" value="cadastrar"/></td>
	<td><input type="reset" name="enviar" value="limpar"/></td></tr>
   </table></form>
</body></html>