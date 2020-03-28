<html>

<head>
	<title>Cadastro   Livro</title>
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
	if (document.livro.autor.value == "" || document.livro.autor.value == " ") {
		alert ("O Campo Autor Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.editora.value == "" || document.livro.editora.value == " ") {
		alert ("O Campo Editora Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.titulo.value == "" || document.livro.titulo.value == " ") {
		alert ("O Campo Titulo Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.edicao.value == "" || document.livro.edicao.value == " ") {
		alert ("O Campo Edição Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.colecao.value == "" || document.livro.colecao.value == " ") {
		alert ("O Campo Coleção Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.classificacao.value == "" || document.livro.classificacao.value == " ") {
		alert ("O Campo Classificação Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.local.value == "" || document.livro.local.value == " ") {
		alert ("O Campo Local Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.ano.value == "" || document.livro.ano.value == " ") {
		alert ("O Campo Ano Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.n_exemplares.value == "" || document.livro.n_exemplares.value == " ") {
		alert ("O Campo Nº de exemplares: Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.serie.value == "" || document.livro.serie.value == " ") {
		alert ("O Campo Série Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.isbn.value == "" || document.livro.isbn.value == " ") {
		alert ("O Campo ISBN Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.notas.value == "" || document.livro.notas.value == " ") {
		alert ("O Campo Notas Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.assuntos.value == "" || document.livro.assuntos.value == " ") {
		alert ("O Campo Assuntos Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.tipo_aquisicao.value == "" || document.livro.tipo_aquisicao.value == " ") {
		alert ("O Campo Tipo Aquisição Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.idioma.value == "" || document.livro.idioma.value == " ") {
		alert ("O Campo Idioma Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.tombo.value == "" || document.livro.tombo.value == " ") {
		alert ("O Campo Tombo Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	if (document.livro.data_registro.value == "" || document.livro.data_registro.value == " ") {
		alert ("O Campo Data Registro Não Preenchido...Cadastro Não Realizado")
		return false 
		}
}
</script>
<link type="text/javascript" href="funcoes/valida_formulario_livro.js" rel="index">
</head>
<body>
<?php
require "constantes.php";

	   echo "<form onSubmit=\"return TestaVal()\" name=\"livro\" action=\"index.php?acao=".$RCL."\" method=\"post\">";
	  ?>
      <table border="0" width="488" align="left">
        <tr height="25">
          <td><font>Autor </font></td>
          <td colspan="1"><select name="autor">
              <?php
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM autor;")or die("Erro no Comando SQL: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$s[$i]=$d['id_autor'];
					  			$autor[$i] =$d['nome_autor'];
						  }
					  for ($a=0;$a < $k;$a++){
					  		echo "<option value=\"".$s[$a]."\">".$autor[$a]."</option>";
						}
					  ?>
          </select></td>
          <td width="30"><font>Editora:</font></td>
          <td>
		  <select name="editora">
              <?php
					  include_once "include/conect_banco.php";
					  	$t=mysql_query("SELECT * FROM editora;")or die("Erro no Comando SQL: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$s[$i]=$d['id_editora'];
					  			$autor[$i] =$d['editora'];
						  }
					  for ($a=0;$a < $k;$a++){
					  		echo "<option value=\"".$s[$a]."\">".$autor[$a]."</option>";
						}?></td></tr>
        <tr height="25">
          <td height="29" ><font>Titulo: </font></td> 
          <td colspan="5"><input id="titulo" name="titulo" type="text" size="70"/></td> 
        </tr>
        <tr height="25">
          <td width="82" height="24"><p><font>Edição: &nbsp;</font></p></td>
          <td width="170"><input name="edicao" type="text" size="25"/></td>
          <td width="92"><font>Coleção: </font></td>
          <td width="150"><input name="colecao" type="text" size="22"/></td>
        </tr> 
        <tr>
          <td width="82" height="24"><font>Classificação:</font></td>
          <td width="170"><input name="classificacao" type="text" size="25"/></td>
          <td height="24"><font>Local &nbsp; </font>:</td>
          <td><input name="local" type="text" size="22"/></td>
        </tr> 
        <tr height="25">
          <td><font>Ano:</font></td>
          <td><input name="ano" type="text" size="10"/></td>
		  <td><font>N&ordm; de exemplares:</font></td>
			<td><input name="n_exemplares" type="text" size="22"/></td>
        </tr>
        <tr height="25">
          <td><font>Volume:</font></td>
          <td><input name="volume" type="text" size="25"/></td>
          <td><font>N&ordm de páginas:</font></td>
          <td><input name="n_pagina" type="text" size="22"/></td>
        </tr> 
        <tr> 
          <td><font>S&eacute;rie:</font></td>
          <td><input name="serie" type="text" size="25"></td>
          <td><font>ISBN:</font></td>
          <td><input name="isbn" type="text" size="22"/></td>
        </tr> 
        <tr height="25">
          <td><font>Notas:&nbsp;</font></td>
          <td colspan="5"><input name="notas" type="text" size="70"/></td>
        </tr>
        <tr height="25">
          <td><font>Assuntos:</font></td>
          <td colspan="3"><input name="assuntos" type="text" size="70"/></td>
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
			<iframe name="naruto" src="formularios/compra.php" height="25" width="250" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe>
			<input type="hidden" name="descricao" id="descricao" /></td></tr>
  <tr height="25" valign="top">
	<td>Idioma: </td>
	<td><select name="idioma">
              <?php
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM idioma;")or die("Erro no Comando SQL: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$f[$i]=$d['id_idioma'];
					  			$idioma[$i] =$d['idioma'];
						  }
					  for ($a=0;$a < $k;$a++){
					  		echo "<option value=\"".$f[$a]."\">".$idioma[$a]."</option>";
						}
					  ?>
          </select></td>
    <td>Tombo: </td>
    <td valign="top"><input type="text" size="22" name="tombo"/>
    </td>
  </tr>
  <tr>
    <td><font>Data registro:</font></td>
    <td><?php echo "<input name=\"data_registro\" type=\"text\" value=\"".date("d/m/Y")." \"size=\"12\"/>";?></td>
    <td><input name="submit" type="submit" value="enviar"/></td>
    <td colspan="1"><input name="reset" type="reset" value="resetar"/></td>
  </tr>
      </table>
    </form>
</body>
</html>