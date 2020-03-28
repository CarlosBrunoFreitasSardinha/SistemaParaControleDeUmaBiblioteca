<?php 

		include_once "include/conect_banco.php";
//inserindo dados na tabela autor
		$idioma=$_POST['idioma'];

		$sql = mysql_query("INSERT INTO idioma(idioma) VALUES ('$idioma')")or die("Erro no comando SQL:".mysql_error());
		?>
		
<html>
<head>
<title>Cadastro autor</title>
</head>
<body>
<?php
require "constantes.php";

	   echo "<form action=\"index.php?acao=".$RCI."\" method=\"post\">";
	  ?>
<table>
   <tr>
	
	<td>Informe o Idioma</td>
	<td><input name="idioma" type="text" size="25" /></td>
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
		echo "Idioma inserido com sucesso....";
		
?>
