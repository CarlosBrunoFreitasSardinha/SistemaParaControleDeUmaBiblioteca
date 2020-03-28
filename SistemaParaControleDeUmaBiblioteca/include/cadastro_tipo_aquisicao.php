
		<html>
<head>
<title>Cadastro autor</title>
</head>
<body>
<?php 

	require "constantes.php";
	include_once "include/conect_banco.php";
//inserindo dados na tabela autor
		$descricao_tipo_midia=$_POST['tipo_aquisicao'];

		$sql = mysql_query("INSERT INTO tipo_aquisicao(descricao_tipo_aquisicao) VALUES ('$descricao_tipo_midia')")or die("Erro no comando SQL:".mysql_error());

	   echo "<form action=\"index.php?acao=".$RCTA."\" method=\"post\">";
	  ?>
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

		<?php
		
		echo "Tipo Aquisição inserido com sucesso....";
		
?>