<html>
<head>
<title>Cadastro Tipo Aquisicao</title>
<script type="text/javascript">
function TestaVal() {
	if (document.tipo_aquisicao.tipo_aquisicao.value == ""||document.tipo_aquisicao.tipo_aquisicao.value == " ") {
		alert ("O Campo Tipo Aquisição Não Preenchido...Cadastro Não Realizado!")
		return false 
		}
}
</script>
</head>
<body>
<?php require "constantes.php";
		echo "<form onSubmit=\"return TestaVal()\" name=\"tipo_aquisicao\" action=\"index.php?acao=".$RCTA."\" method=\"post\">";?>
<table>
   <tr>
	
	<td>Informe o Novo tipo de Aquisi&ccedil;&atilde;o </td>
	<td><input name="tipo_aquisicao" type="text" size="25" /></td>
   </tr>
   <tr>
   	<td><input type="submit" name="enviar" value="cadastrar"/></td>
	<td><input type="reset" name="enviar" value="limpar"/></td>
   </tr>
   </table>
</form>
</body>
</html>
