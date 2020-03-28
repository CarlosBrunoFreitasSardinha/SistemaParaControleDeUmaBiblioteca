<?php 

		include_once "include/conect_banco.php";
//inserindo dados na tabela autor
		$descricao_tipo_midia=$_POST['tipo_midia'];

		$sql = mysql_query("INSERT INTO tipo_midia(descricao_tipo_midia) VALUES ('$descricao_tipo_midia')")or die("Erro no comando SQL:".mysql_error());
		?>
<html>
<head>
<title>Cadastro autor</title>
</head>
<body>
<?php
require "constantes.php";
	   echo "<form action=\"index.php?acao=".$RCTM."\" method=\"post\">";
	  ?>
<table>
   <tr>
	
	<td>Informe o Novo tipo de midia</td>
	<td><input name="tipo_midia" type="text" size="25" /></td>
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
		echo "<center>Novo tipo Midia inserido com sucesso....";
		
?>
