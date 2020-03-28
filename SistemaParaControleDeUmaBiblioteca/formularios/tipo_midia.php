<html>
<head>
<title>Cadastro Autor</title>
<script type="text/javascript">
function TestaVal() {
	if (document.tipo_midia.tipo_midia.value == ""||document.tipo_midia.tipo_midia.value == " ") {
		alert ("O Campo Tipo Mídia Não Preenchido...Cadastro Não realizado")
		return false 
		}
}
</script>
</head>
<body>
<?php require "constantes.php";
		echo "<form onSubmit=\"return TestaVal()\" action=\"index.php?acao=".$RCTM."\" name=\"tipo_midia\" method=\"post\">";?>
<table>
   <tr>
	<td>Informe o Novo tipo de Mídia</td>
	<td><input name="tipo_midia" type="text" size="25" /></td></tr>
   <tr>
   	<td><input type="submit" name="enviar" value="cadastrar"/></td>
	<td><input type="reset" name="enviar" value="limpar"/></td></tr>
   </table></form></body></html>
