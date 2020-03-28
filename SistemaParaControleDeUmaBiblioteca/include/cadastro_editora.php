
		<html>
<head>
<title>Cadastro Editora</title>
</head>
<body><?php 

		include_once "include/conect_banco.php";
//inserindo dados na tabela autor
		$editora=$_POST['editora'];

		$sql = mysql_query("INSERT INTO editora(editora) VALUES ('$editora')")or die("Erro no comando SQL:".mysql_error());
		?>
<?php
require "constantes.php";

	   echo "<form action=\"index.php?acao=$RCED\" method=\"post\">";
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
		<?php
		
		echo "Editora inserido com sucesso....";
		
?>
