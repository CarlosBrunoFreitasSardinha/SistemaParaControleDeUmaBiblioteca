<html>

<head>
	<title>cadastro-- anuarios</title>
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

function TestaVal(){
	if (document.texto.autor.value == "" || document.texto.autor.value == " ") {
		alert ("O Campo Autor Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.ano.value == "" || document.texto.ano.value == " ") {
		alert ("O Campo Ano Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.titulo.value == "" || document.texto.titulo.value == " ") {
		alert ("O Campo Titulo Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.volume.value == "" || document.texto.volume.value == " ") {
		alert ("O Campo Volune Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.tombo.value == "" || document.texto.tombo.value == " ") {
		alert ("O Campo Tombo Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.colecao.value == "" || document.texto.colecao.value == " ") {
		alert ("O Campo Coleção Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.idioma.value == "" || document.texto.idioma.value == " ") {
		alert ("O Campo Idioma Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.serie.value == "" || document.texto.serie.value == " ") {
		alert ("O Campo Série Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.edicao.value == "" || document.texto.edicao.value == " ") {
		alert ("O Campo Edição Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.tipo_aquisicao.value == "" || document.texto.tipo_aquisicao.value == " ") {
		alert ("O Campo Tipo Aquisição Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.imprenta.value == "" || document.texto.serie.value == " ") {
		alert ("O Campo Imprenta Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.data_registro.value == "" || document.texto.data_registro.value == " ") {
		alert ("O Campo Data Registro Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.notas.value == "" || document.texto.notas.value == " ") {
		alert ("O Campo Notas Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.assuntos.value == "" || document.texto.assuntos.value == " ") {
		alert ("O Campo Assuntos Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else if (document.texto.n_exemplares.value == "" || document.texto.n_exemplares.value == " ") {
		alert ("O Campo Nº de exemplares: Não Preenchido...Cadastro Não Realizado")
		return false 
		}
	else return true
}</script>
</head>
<body>
<?php
require "constantes.php";

	   echo "<form name=\"texto\" onSubmit=\"return TestaVal()\" action=\"index.php?acao=".$RCT."\" method=\"post\">";
	  ?>
	<table width="498" border="0" align="left">
	
	<tr height="25">
			 <td height="29" ><font>Autor:</font></td>
		 	 <td><select name="autor">
               <?php
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM autor;")or die("Ocorreu um erro no comando Select: ".mysql_error());
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
			 <td width="72" height="24"><font>Ano:</font></td>
   	  <td width="160"><input type="text" size="22" name="ano"/></td>			
	</tr>
	
	<tr height="25">
     	<td ><font>Titulo:</font></td>
	    <td colspan="5"><input name="titulo" type="text"size="70"/></td>
	</tr>
	  
		   
		   <tr valign="top" height="25">
			 <td width="82" height="28"><font>Volume : &nbsp;</font></td>
		 	 <td width="166"><input name="volume" text="text" size="25"/></td>
			 <td width="72" height="28"><font>Tombo : &nbsp;</font></td>
		 	 <td width="160"><input name="tombo" text="text" size="22"/></td>
		</tr>
		<tr>
			<td><font>Cole&ccedil;&atilde;o:</font></td>
            <td><input name="colecao" size="25" type="text"/></td>
			
			  <td><font>Idiomas:</font></td>
				      <td><select name="idioma">
                        <?php
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM idioma;")or die("Erro no Comando SQL: ".mysql_error());
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
  			<td align="right"><font>Aquisi&ccedil;&atilde;o: </font></td>
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
	     <td width="79">N&ordm; exemplares:</td>
		<td width="168"><input name="n_exemplares" size="22" type="text"/></td></tr>
	  <tr>
	  
			<td colspan="2"><input name="submit" type="submit" value="enviar"/></td>
			<td colspan="2"><input name="reset" type="reset" value="resetar"/></td>
	  </tr>
</table>
</form>


</body>
</html>