<html>
		<head>
			<title>Cadastro autor</title>
<script type="text/javascript">
function TestaVal() {
	if (document.Form.autor.value == ""||document.Form.autor.value == " "){
		alert ("O Campo Autor Não Preenchido...Cadastro Não Realizado!")
		return false 
		}
	if (document.Form.sitacao.value == ""||document.Form.sitacao.value == " "){
		alert ("O Campo Sitação Autor Não Preenchido...Cadastro Não Realizado!")
		return false 
		}
}</script></head>
<body>
<table>
	<?php
		$voltar='0';
		require "constantes.php";
		$id_qualquer=$_POST['editora'];
		$id_qualquer=$_REQUEST['editora'];
		
		include("include/conect_banco.php");
		$t=mysql_query("SELECT matricula, nome_usuario,	nivel_acesso FROM usuarios WHERE matricula='$id_qualquer'")or die("Erro no Comando SQL: ".mysql_error());
		$sql=mysql_fetch_array($t);
			$matricul=$sql['matricula'];
			$nome=$sql['nome_usuario'];
			$nivel_acess=$sql['nivel_acesso'];
			
			echo "<form action=\"index.php?acao=$VADU\" method=\"post\">";?></table>
<table border="0" width="560" align="center">
        <tr height="25">
          <td height="29" width="114"><font>Matrícula: </font></td> 
          <td ><?php echo"<input id=\"matricula\" name=\"matricula\" type=\"text\" size=\"10\" value=\"".$matricul."\"/>";?></td>
          <td height="29" width="50"><font>Nome: </font></td> 
          <td ><?php echo"<input id=\"titulo\" name=\"titulo\" type=\"text\" size=\"45\" value=\"".$nome."\"/>";?></td></tr>
		  
        <tr height="25"><td width="114">Nível de Acesso: </td>
          <td width="128"><select name="acesso">
              <?php
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM acesso;")or die("Erro no Comando SQL: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$s[$i]=$d['id'];
					  			$asseso[$i] =$d['nivel_acesso'];
						  }
					  for ($a=0;$a < $k;$a++){
					  		echo "<option value=\"".$s[$a]."\">".$asseso[$a]."</option>";
						}
					  ?>
          </select></td>
          <td width="50">Sexo: </td>
          <td width="178">
		  	<input type="radio" name="sexo" value"1"/>Masculino
		  	<input type="radio" name="sexo" value"2"/>Feminino</td></tr>
		  <tr>
          <td>Corpo</td>
          <td colspan="1"><select name="corpo">
              <?php
			$z=mysql_query("SELECT id_corpo, id_curso FROM usuario_corpo_curso where matricula='$matricul'")or die("Erro no Comando SQL: ".mysql_error());
			$num=mysql_fetch_array($z);
			$id_corp=$num['id_corpo'];
			$id_curs=$num['id_curso'];	
			
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM corpo;")or die("Erro no Comando SQL: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$u[$i]=$d['id'];
					  			$corpo[$i] =$d['corpo'];// ei criar chave estrangeira com o vidal no note dele lembrese seu bacana
						  }
					  for ($a=0;$a < $k;$a++){
					  	if ($id_corp==$u[$a])echo "<option value=\"".$u[$a]."\">".$corpo[$a]."</option>";
						else echo "<option value=\"".$u[$a]."\">".$corpo[$a]."</option>";
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
					  			$curso[$i] =$d['descricao_curso'];
						  }
					  for ($a=0;$a < $k;$a++){
					  	if ($id_curs==$s[$a])echo "<option value=\"".$s[$a]."\" selected>".$curso[$a]."</option>";
					  	else echo "<option value=\"".$s[$a]."\">".$curso[$a]."</option>";
						}
					  ?></select></td></tr>
		<tr>
			<td>Senha</td>
			<td colspan="3"><input type="text" name="senha" value"12" maxlength="11"/></td></tr>
		  <tr>
			<td><input type="submit" value="Alterar" name="enviar"/></td>
			<td colspan="3">&nbsp;</td></tr>
    </form>
      </table>
					  </body></html>