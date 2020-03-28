<?php

$matricula=$_POST['matricula'];
$sexo=$_POST['sexo'];
$curso=$_POST['curso'];
$corpo=$_POST['corpo'];
$nome=$_POST['nome'];
$acesso=$_POST['acesso'];
$senha=md5($_POST['senha']);

					  include_once "include/conect_banco.php";
$sql    = mysql_query("INSERT INTO usuarios(matricula, nome_usuario, nivel_acesso, senha) VALUES ('$matricula', '$nome', '$acesso', '$senha')")or die("Erro no Comando SQL: ".mysql_error());
$sql    = mysql_query("INSERT INTO usuario_corpo_curso(matricula, id_corpo, id_curso) VALUES ('$matricula', '$corpo', '$curso')")or die("Erro no Comando SQL: ".mysql_error());
echo "Cadastro Realizado com Sucesso!!!";
?>
<html>
<head>
<title>Untitled Document</title>
</head>
<body>
<?php
require "constantes.php";

	   echo "<form onSubmit=\"return TestaVal()\" name=\"usuario\" action=\"index.php?acao=".$RCU."\" method=\"post\">";
	  ?>
      <table border="0" width="560" align="center">
        <tr height="25">
          <td height="29" width="114"><font>Matrícula: </font></td> 
          <td ><input id="matricula" name="matricula" type="text" size="10"/></td>
          <td height="29" width="50"><font>Nome: </font></td> 
          <td ><input id="nome" name="nome" type="text" size="45"/></td></tr>
		  
        <tr height="25"><td width="114">Nível de Acesso: </td>
          <td width="128"><select name="acesso">
              <?php
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM acesso;")or die("Erro no Comando SQL: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$s[$i]=$d['id'];
					  			$assesos[$i] =$d['nivel_acesso'];// ei criar chave estrangeira com o vidal no note dele lembrese seu bacana
						  }
					  for ($a=0;$a < $k;$a++){
					  		echo "<option value=\"".$s[$a]."\">".$assesos[$a]."</option>";
						}
					  ?>
          </select></td>
          <td width="50">Sexo: </td>
          <td width="178"><input type="radio" name="sexo" value"1"/>Masculino<input type="radio" name="sexo" value"2"/>Feminino</td></tr>
		  <tr>
          <td>Corpo</td>
          <td colspan="1"><select name="corpo">
              <?php
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM corpo;")or die("Erro no Comando SQL: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$ss[$i]=$d['id'];
					  			$corpos[$i] =$d['corpo'];
						  }
					  for ($a=0;$a < $k;$a++){
					  		echo "<option value=\"".$ss[$a]."\">".$corpos[$a]."</option>";
						}
					  ?>
          </select></td>
          <td width="50" height="24">Cursos: </td>
          <td colspan="1"><select name="curso">
              <?php
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM curso;")or die("Erro no Comando SQL: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$s[$i]=$d['id_curso'];
					  			$cursos[$i] =$d['descricao_curso'];// ei criar chave estrangeira com o vidal no note dele lembrese seu bacana
						  }
					  for ($a=0;$a < $k;$a++){
					  		echo "<option value=\"".$s[$a]."\">".$cursos[$a]."</option>";
						}
					  ?></select></td></tr>
		<tr>
			<td>Senha: </td>
			<td colspan="3"><input type="password" name="senha" size="12" maxlength="11"/></td></tr>
		  <tr>
			<td><input type="submit" value="Cadastrar" name="enviar"/></td>
			<td colspan="3"><input type="reset" value="Limpar" name="limpar"/></td></tr>
    </form>
      </table>
</body>
</html>