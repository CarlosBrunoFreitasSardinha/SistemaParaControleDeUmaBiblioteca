<html>

<head>
	<title>Cadastro Folheto</title>
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
	if (document.folheto.autor.value == "" || document.folheto.autor.value == " ") {
		alert ("O Campo Autor Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.ano.value == "" || document.folheto.ano.value == " ") {
		alert ("O Campo Ano Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.titulo.value == "" || document.folheto.titulo.value == " ") {
		alert ("O Campo Titulo Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.volume.value == "" || document.folheto.volume.value == " ") {
		alert ("O Campo Volune Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.tombo.value == "" || document.folheto.tombo.value == " ") {
		alert ("O Campo Tombo Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.colecao.value == "" || document.folheto.colecao.value == " ") {
		alert ("O Campo Coleção Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.idioma.value == "" || document.folheto.idioma.value == " ") {
		alert ("O Campo Idioma Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.serie.value == "" || document.folheto.serie.value == " ") {
		alert ("O Campo Série Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.edicao.value == "" || document.folheto.edicao.value == " ") {
		alert ("O Campo Edição Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.tipo_aquisicao.value == "" || document.folheto.tipo_aquisicao.value == " ") {
		alert ("O Campo Tipo Aquisição Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.imprenta.value == "" || document.folheto.serie.value == " ") {
		alert ("O Campo Imprenta Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.data_registro.value == "" || document.folheto.data_registro.value == " ") {
		alert ("O Campo Data Registro Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.notas.value == "" || document.folheto.notas.value == " ") {
		alert ("O Campo Notas Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.assuntos.value == "" || document.folheto.assuntos.value == " ") {
		alert ("O Campo Assuntos Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.folheto.n_exemplares.value == "" || document.folheto.n_exemplares.value == " ") {
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
	   echo "<form onSubmit=\"return TestaVal()\" name=\"folheto\" action=\"index.php?acao=".$RCF."\" method=\"post\">";
	  ?>
	<table width="503" align="left">
	
	
	<tr height="25">
     	<td ><font>Autor:</font></td>
	    <td><select name="autor">
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
		 <td width="57" height="24"><font>Ano:</font></td>
      <td width="166"><input type="text" size="22" name="ano"/></td>
	</tr>
	  
	<tr height="25">
			 <td height="29" ><font>Titulo:</font></td>
		 	 <td colspan="5"><input type="text" size="70" name="titulo"/></td>
	</tr>
		   
		   <tr valign="top" height="25">
			 <td width="82" height="28"><font>Volume: &nbsp;</font>	     </td>
		 	 <td width="178"><input name="volume" text="text" size="25"/></td>
          	 <td height="24""><font>Tombo:</font></td>
			  <td><input name="tombo" size="22" type="text"/></td>
		</tr>
		<tr>                    
			<td><font>Cole&ccedil;&atilde;o:</font></td>
            <td><input name="colecao" size="25" type="text"/></td>
			 
			  <td><font>Idiomas:</font></td>
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
                      </select></td>
		</tr>
		<tr height="25">
          <td><font>S&eacute;rie:</font></td>
          <td><input name="serie" size="25" type="text"/></td>
		  
          <td height="24">Edi&ccedil;&atilde;o:</td>
          <td><input name="edicao" size="22" type="text"/></td>
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
          <td height="24"><font>Imprenta:</font></td>
			  <td><input name="imprenta" size="25" type="text"/></td>                    
				      
			<td><font>Data registro:</font></td>
        	<td><?php echo "<input name=\"data_registro\" type=\"text\" value=\"".date("Y/m/d")." \"size=\"12\"/>";?></td>
		</tr>
		<tr height="25" colspan="6">
          <td><font>Notas:&nbsp;</font></td>
		  	<td colspan="5"><input name="notas" size="70" type="text"/></td>
		</tr>
	   <tr height="25">
		  	  <td><font>Assuntos:</font></td>
        	  <td colspan="3"><input size="70" type="text" name="assuntos"/></td>
	   </tr>
	   <tr>
			 <td width="73">N&ordm; exemplares:</td>
			 <td colspan="3" width="170"><input name="n_exemplares" size="22" type="text"/></td></tr>
	  <tr>
	  
			<td colspan="2"><input name="submit" type="submit" value="enviar"/></td>
			<td colspan="2"><input name="reset" type="reset" value="resetar"/></td>
	  </tr></tr>
</table>
</form>


</body>
</html>