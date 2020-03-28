<html>
<head>
	<title>cadastro Mídia</title>
<script type="text/javascript">
	function Verselect(Campo) {
		Icombo = Campo.selectedIndex;
		 if (Campo.options[Icombo].value=='2'){
			window.open('formularios/doacao.php', 'naruto');
		 }
		if (Campo.options[Icombo].value=='1'){
			window.open('formularios/compra.php', 'naruto');
		 }
	  }
function TestaVal() {
	if (document.video.autor.value == "" || document.video.autor.value == " ") {
		alert ("O Campo Autor Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.editora.value == "" || document.video.editora.value == " ") {
		alert ("O Campo Editora Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.titulo.value == "" || document.video.titulo.value == " ") {
		alert ("O Campo Titulo Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.cutter.value == "" || document.video.cutter.value == " ") {
		alert ("O Campo Cutter Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.colecao.value == "" || document.video.colecao.value == " ") {
		alert ("O Campo Coleção Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.classificacao.value == "" || document.video.classificacao.value == " ") {
		alert ("O Campo Classificação Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.local.value == "" || document.video.local.value == " ") {
		alert ("O Campo Local Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.ano.value == "" || document.video.ano.value == " ") {
		alert ("O Campo Ano Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.data_registro.value == "" || document.video.data_registro.value == " ") {
		alert ("O Campo Data Registro Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.volume.value == "" || document.video.volume.value == " ") {
		alert ("O Campo Volune Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.idioma.value == "" || document.video.idioma.value == " ") {
		alert ("O Campo Idioma Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.serie.value == "" || document.video.serie.value == " ") {
		alert ("O Campo Série Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.cdd.value == "" || document.video.cdd.value == " ") {
		alert ("O Campo CDD Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.notas.value == "" || document.video.notas.value == " ") {
		alert ("O Campo Notas Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.assuntos.value == "" || document.video.assuntos.value == " ") {
		alert ("O Campo Assuntos Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.tipo_aquisicao.value == "" || document.video.tipo_aquisicao.value == " ") {
		alert ("O Campo Tipo Aquisição Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.tipo_midia.value == "" || document.video.tipo_midia.value == " ") {
		alert ("O Campo Tipo Mídia Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.tombo.value == "" || document.video.tombo.value == " ") {
		alert ("O Campo Tombo Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.video.n_exemplares.value == "" || document.video.n_exemplares.value == " ") {
		alert ("O Campo Nº de exemplares: Não Preenchido...Cadastro Não Realizado")
		return false 
		}
		else return true
}
	</script>
</head>
<body>

<?php
require "constantes.php";

	   echo "<form name=\"video\" onSubmit=\"return TestaVal()\" action=\"index.php?acao=".$RCMD."\" method=\"post\">";
	  ?>
      <table width="491" align="left">
        <tr height="25">
          <td ><font>Autor:</font></td>
          <td colspan="1">
		  <select name="autor">
              <?php
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM autor")or die("Ocorreu um erro no comando Select: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$s[$i]=$d['id_autor'];
					  			$autor[$i] =$d['nome_autor'];// ei criar chave estrangeira com o vidal no note dele lembrese seu bacana
						  }
					  for ($a=0;$a < $k;$a++){
					  		echo "<option value=\"".$s[$a]."\">".$autor[$a]."</option>";
						}
					  ?></select></td>
		  <td><font>Editora:</font></td>
          <td>
		  <select name="editora">
              <?php
					  include_once "include/conect_banco.php";
					  	$t=mysql_query("SELECT * FROM editora;")or die("Ocorreu um erro no comando Select: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$s[$i]=$d['id_editora'];
					  			$autor[$i] =$d['editora'];// ei criar chave estrangeira com o vidal no note dele lembrese seu bacana
						  }
					  for ($a=0;$a < $k;$a++){
					  		echo "<option value=\"".$s[$a]."\">".$autor[$a]."</option>";
						}
					  ?>
					  </td>
        </tr>
		<tr height="25">
          <td height="29" ><font>Titulo:</font></td>
          <td colspan="5"><input type="text" size="70" name="titulo"/></td>
        </tr>
        <tr height="25">
          <td width="88" height="24"><p><font>Cutter : &nbsp;</font></p></td>
          <td width="180"><input name="cutter" text="text" size="25"/></td>
          <td width="54" align="center"><font>Coleção:</font></td>
          <td width="178"><input name="colecao" size="25" type="text"/></td>
        </tr>
        <tr>
          <td width="88" height="24"><font>Classificação:</font></td>
          <td width="180"><input type="text" size="25" name="classificacao"/></td>
          <td height="24" align="center"><font>Local</font>:</td>
          <td><input name="local" size="25" type="text"/></td>
        </tr>
        <tr height="25">
          <td><font>Ano:</font></td>
          <td><input size="25" type="text" name="ano"/></td>
          <td><font>Data registro:</font></td>
          <td>
		  <?php echo "<input name=\"data_registro\" type=\"text\" value=\"".date("Y/m/d")." \"size=\"25\"/>";?></td>
        </tr> 
        <tr height="25"> 
          <td height="24"><font>Volume:</font></td> 
          <td><input name="volume" size="25" type="text"/></td> 
          <td align="center"><font>Idioma:</font></td> 
          <td><select name="idioma"> 
              <?php
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM idioma;")or die("Ocorreu um erro no comando Select: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$f[$i]=$d['id_idioma'];
					  			$idioma[$i] =$d['idioma'];// ei criar chave estrangeira com o vidal no note dele lembrese seu bacana
						  }
					  for ($a=0;$a < $k;$a++){
					  		echo "<option value=\"".$f[$a]."\">".$idioma[$a]."</option>";
						}
					  ?>
          </select>
		  <td height="34"></td>
        </tr>
        <tr>
          <td><font>Serie:</font></td>
          <td><input name="serie" size="25" type="text"/></td>
          <td align="center">CDD:</td>
          <td><input size="25" name="cdd" type="text"/></td>
        </tr>
        <tr height="25" colspan="6">
          <td><font>Notas:&nbsp;</font></td>
          <td colspan="5"><input name="notas" size="70" type="text"/></td>
        </tr>
        <tr height="25">
          <td><font>Assuntos:</font></td>
          <td colspan="3"><input size="70" type="text" name="assuntos"/></td>
        </tr>
		<tr height="30">
  			<td><font>Aquisi&ccedil;&atilde;o: </font></td>
      		<td><select name="tipo_aquisicao" onChange="Verselect(tipo_aquisicao)"> 
        	<?php 
					  include_once "include/conect_banco.php";
					  	$t=mysql_query("SELECT * FROM tipo_aquisicao")or die("Erro no Comando SQL: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
					 			$aq[$i]=$d['id_tipo_aquisicao'];
								$aquisicao[$i]=$d['descricao_tipo_aquisicao'];
						 		echo "<option value=\"".$aq[$i]."\" size=\"22\">".$aquisicao[$i]."</option>";
						 }
							echo "</select></td>";
      			?>
		<td colspan="2">
			<input type="hidden" name="descricao" id="descricao"/>
			<iframe name="naruto" src="formularios/compra.php" height="25" width="250" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></td>
		
  </tr>
        <tr height="25">
          <td>Tipo m&iacute;dia:</td>
          <td><select name="tipo_midia">
              <?php
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM tipo_midia")or die("Ocorreu um erro no comando Select: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$id_midia[$i]=$d['id_tipo_midia'];
								$t_midia[$i]=$d['descricao_tipo_midia'];
				 				echo "<option value=\"".$id_midia[$i]."\">".$t_midia[$i]."</option>";
				 			}
				?>
            </select>
          </td>
          <td height="27"><font>Tombo</font></td>
          <td><input name="Tombo" type="text" size="25"/></td>
        </tr>
		<tr height="25">
          <td height="27"><font>Nºexemplares:</font></td>
          <td colspan="3"><input name="n_exemplares" type="text" size="25"/></td></tr>
		<tr>
          <td><input name="submit" type="submit" value="enviar"/></td>
          <td><input name="reset" type="reset" value="resetar"/></td>
		</tr>
      </table>
    </form>


</body>
</html>