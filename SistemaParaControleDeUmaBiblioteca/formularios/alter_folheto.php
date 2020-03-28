<html>
<head>
	<title>Cadastro Anu&aacute;rios</title>
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
</script>
</head>
<body>
<?php
require "constantes.php";

	   echo "<form action=\"index.php?acao=".$VADF."\" method=\"post\">";
	$id_l_item=$_REQUEST['id_l'];
	
	include ("include/conect_banco.php");

	   $sql= mysql_query("SELECT * FROM folheto WHERE id_acervo='$id_l_item' ") or die ("Erro no Comando SQL".mysql_error());
	   $SQL=mysql_fetch_array($sql);
	   $imprenta=$SQL['imprenta_folheto'];
	   $ano=$SQL['ano_folheto'];
	   $colecao=$SQL['tipo_colecao_folheto'];
	   $idioma=$SQL['idioma_folheto'];
	   $edicao=$SQL['edicao_folheto'];
	   $tombo=$SQL['tombo'];
	   $sql= mysql_query("SELECT id_autor FROM autor_acervo WHERE id_acervo='$id_l_item' ") or die ("Erro no Comando SQL".mysql_error());
	   $SQL=mysql_fetch_array($sql);
	   $aut['0']=$SQL['id_autor'];
$sql= mysql_query("SELECT * FROM aquisicao WHERE id_acervo='$id_l_item' ") or die ("Erro no Comando SQL".mysql_error());
	   $SQL=mysql_fetch_array($sql);
	   $quantidade = $SQL['quantidade_aquisicao'];//tabela aquisição
	   $tipo_aquisicao = $SQL['id_tipo_aquisicao'];//tabela tipo_aquisicao
	   if ($tipo_aquisicao=='0'){
	   		$descricao = $SQL['preco'];}
	   else{$descricao = $SQL['doacao'];}//tabela aquisição
	   		$data = $SQL['data_aquisicao'];//tabela aquisição
			
$sql= mysql_query("SELECT * FROM acervo WHERE id_acervo='$id_l_item' ") or die ("Erro no Comando SQL".mysql_error());
	   $SQL=mysql_fetch_array($sql);
	   $titulo =$SQL['titulo_acervo'];//tabela acervo
	   $volume =$SQL['volume_acervo'];//tabela acervo
	   $serie=$SQL['serie_acervo'];//tabela acervo
	   $assuntos =$SQL['assuntos_acervo'];//tabela acervo
	   $notas =$SQL['observacoes_acervo'];//tabela acervo


	   echo "<form name=\"texto\" onSubmit=\"return TestaVal()\" action=\"index.php?acao=".$RCT."\" method=\"post\">";
	  ?>
	<table width="498" border="0">
	
	<tr height="25">
			 <td height="29">Autor: </td>
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
             </select></td><!--colar aqui-->
          <?php echo "<td height=\"24\">Edi&ccedil;&atilde;o:</td>";
          echo "<td><input name=\"edicao\" size=\"22\" value=\"".$edicao."\" type=\"text\"/></td>
		</tr>";?>
	
	<tr height="25">
     	<td ><font>Titulo:</font></td>
	    <td colspan="5"><?php echo "<input name=\"titulo\" type=\"text\" value=\"".$titulo."\" size=\"70\"/>";?></td>
	</tr>
	  
		   
		   <tr valign="top" height="25">
			 <td width="82" height="28"><font>Volume : &nbsp;</font></td>
		 	 <td width="166"><?php echo "<input name=\"volume\" text=\"text\" value=\"".$volume."\" size=\"25\"/></td>";
			 echo "<td width=\"72\" height=\"28\"><font>Tombo : &nbsp;</font></td>";
		 	 echo "<td width=\"160\"><input name=\"tombo\" text=\"text\" value=\"".$tombo."\" size=\"22\"/></td>
		</tr>";echo "
		<tr>
			<td><font>Cole&ccedil;&atilde;o:</font></td>";
            echo "<td><input name=\"colecao\" size=\"25\" type=\"text\" value=\"".$colecao."\"/></td>";
			echo "
			  <td><font>Idiomas:</font></td>
				      <td><select name=\"idioma\">";
					  include_once "include/conect_banco.php";
					  $t=mysql_query("SELECT * FROM idioma;")or die("Erro no Comando SQL: ".mysql_error());
						$k=mysql_num_rows($t);
						for ($i=0;$i < $k;$i++){
								$d = mysql_fetch_array($t);
								$f[$i]=$d['id_idioma'];
					  			$idioms[$i] =$d['idioma'];// ei criar chave estrangeira com o vidal no note dele lembrese seu bacana
						  }
					  for ($a=0;$a < $k;$a++){
					  		echo "<option value=\"".$f[$a]."\">".$idioms[$a]."</option>";
						}
                     echo " </select></td>
		</tr>";
		  echo "
		<tr height=\"30\">
  			<td><font>Aquisi&ccedil;&atilde;o: </font></td>
      		<td><select name=\"tipo_aquisicao\" onChange=\"Verselect(tipo_aquisicao)\"> ";
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
      			echo "
		<td colspan=\"2\">
			<input type=\"hidden\" name=\"descricao\" id=\"descricao\"/>
			<iframe name=\"naruto\" src=\"formularios/compra.php\" height=\"25\" width=\"250\" scrolling=\"no\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"></iframe></td>
		
  </tr>
		<tr height=\"25\">
          <td height=\"24\"><font>Imprenta:</font></td>";
			echo "<td><input name=\"imprenta\" value=\"".$imprenta."\" size=\"25\" type=\"text\"/></td>"; 
			echo "<td><font>Data registro:</font></td>";
        	echo "<td><input name=\"data_registro\" value=\"".$data."\" type=\"text\" size=\"12\"/></td>
		</tr>";
		echo "
		<tr height=\"25\" colspan=\"6\">
          <td><font>Notas:&nbsp;</font></td>";
		  	echo "<td colspan=\"5\"><input name=\"notas\" value=\"".$notas."\" size=\"70\" type=\"text\"/></td>
		</tr>";
		echo "
	   <tr height=\"25\">
		  	  <td><font>Assuntos:</font></td>";
        	  echo "<td colspan=\"3\"><input size=\"70\" value=\"".$assuntos."\" type=\"text\" name=\"assuntos\"/></td>
	   </tr>
	   <tr><input type=\"hidden\" name=\"id_l\" value=\"".$id_l_item."\"/><input type=\"hidden\" name=\"positivo\" value=\"1\"/>";
	   echo "<td width=\"79\">N&ordm; exemplares:</td>";
		 echo "<td width=\"168\"><input name=\"n_exemplares\" value=\"".$quantidade."\" size=\"22\" type=\"text\"/></td></tr>";?>
	  <tr>
			<td colspan="2"><input name="submit" type="submit" value="Enviar"/></td>
			<td colspan="2"><input name="reset" type="reset" value="Resetar"/></td>
	  </tr>
</table>
</form>

</body>
</html>