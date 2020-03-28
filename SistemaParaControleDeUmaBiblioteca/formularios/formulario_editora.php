<html>
<head>
<title>Cadastro Editora</title>
<script type="text/javascript">
function TestaVal() {
	if (document.Form.editora.value == ""||document.Form.editora.value == " ") {
		alert ("O Campo Editora Não Preenchido...Cadastro Não Realizado!")
		return false 
		}
}
</script>
</head>
<body>
<?php
require "constantes.php";

	   echo "<form name=\"Form\" onSubmit=\"return TestaVal()\" action=\"index.php?acao=$RCED\" method=\"post\">";
	  ?>
<table>
   <tr>
	
	<td>Informe a Editora</td>
	<td><input name="editora" type="text" size="25" /></td>
   </tr>
   <tr>
   	<td><input type="submit" name="enviar" value="cadastrar"/></td>
	<td><input type="reset" name="enviar" value="limpar"/></td>
   </tr>
   </table>
</form>
</body>
</html>
