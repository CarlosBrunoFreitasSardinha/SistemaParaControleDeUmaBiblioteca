<html>
<head>
	<title>Cadastro   video</title>
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
require "constantes.php";<center>
	   echo "<form action=\"index.php?acao=".$VADM."\" method=\"post\">";

				$id_l_item= $_POST['id_l'];
				$id_l_item= $_REQUEST['id_l'];
				
	   echo "<form onSubmit=\"return TestaVal()\" name=\"video\" action=\"index.php?acao=".$VADM."\" method=\"post\">";
	   include ("include/conect_banco.php");
	   
	   $sql= mysql_query("SELECT id_autor FROM autor_acervo WHERE id_acervo='$id_l_item' ") or die("Erro no Comando SQL".mysql_error());
	   $SQL=mysql_fetch_array($sql);
	   $aut =$SQL['id_autor'];
	   
	   $sql= mysql_query("SELECT * FROM video WHERE id_acervo='$id_l_item' ") or die ("Erro no Comando SQL".mysql_error());
	   $SQL=mysql_fetch_array($sql);
	   
	   $classificacao1  = $SQL['classificacao_video'];//tabela video
	   $ano1  = $SQL['ano_video'];//tabela video
	   $n_pagina1  = $SQL['n_pagina_video'];//tabela video
	   $colecao1  = $SQL['colecao_video'];//tabela video
	   $isbn1  = $SQL['cdd_video'];//tabela video
	   $edicao1  = $SQL['cutter_video'];//tabela video
	   $editora1  = $SQL['editora_video'];//tabela video
	   $tombo1  = $SQL['tombo'];//tabela video
	   $local1  = $SQL['local_video'];//tabela video
	   
	   $sql= mysql_query("SELECT * FROM aquisicao WHERE id_acervo='$id_l_item' ") or die ("Erro no Comando SQL".mysql_error());
	   $SQL=mysql_fetch_array($sql);
	   
	   $quantidade1  = $SQL['quantidade_aquisicao'];//tabela aquisição
	   $tipo_aquisicao1  = $SQL['id_tipo_aquisicao'];//tabela tipo_aquisicao
	   if ($tipo_aquisicao1 =='0'){
	   		$descricao1  = $SQL['preco'];}
	   else{$descricao1  = $SQL['doacao'];}//tabela aquisição
	   		$data1  = $SQL['data_aquisicao'];//tabela aquisição
	   
	   
	   $sql= mysql_query("SELECT * FROM acervo WHERE id_acervo='$id_l_item' ") or die ("Erro no Comando SQL".mysql_error());
	   $SQL=mysql_fetch_array($sql);
	   
	   $titulo1  =$SQL['titulo_acervo'];//tabela acervo
	   $vl =$SQL['volume_acervo'];//tabela acervo
	   $serie1  =$SQL['serie_acervo'];//tabela acervo
	   $assuntos1  =$SQL['assuntos_acervo'];//tabela acervo
	   $notas1  =$SQL['observacoes_acervo'];//tabela acervo
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
					  		if ($aut ==$d['id_autor']){
					  			echo "<option value=\"".$s[$a]." selected\">".$autor[$a]."</option>";
							 }
							 else {
					  			echo "<option value=\"".$s[$a]."\">".$autor[$a]."</option>";
							  }
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
					  			$ed[$i] =$d['editora'];
						  }
					  for ($a=0;$a < $k;$a++){
					  		if($s[$a]==$editora1 ){
					  		echo "<option value=\"".$s[$a]."\" selected>".$ed[$a]."</option>";
							 }
							else {
					  		echo "<option value=\"".$s[$a]."\">".$ed[$a]."</option>";
							 }
						}?></td>
        <tr height="25">
          <td height="29" ><font>Titulo: </font></td> 
          <td colspan="5"><?php echo"<input id=\"titulo\" name=\"titulo\" type=\"text\" size=\"70\" value=\"".$titulo1 ."\"/></td> 
        </tr>
        <tr height=\"25\">
          <td width=\"82\" height=\"24\"><p><font>Cutter: &nbsp;</font></p></td>
          <td width=\"170\">"; echo"<input name=\"cutter\" type=\"text\" size=\"25\" value=\"".$edicao1 ."\"/>";?></td>
          <td width="92"><font>Coleção: </font></td>
          <td width="150">
		  		<?php echo"<input name=\"colecao\" type=\"text\" size=\"22\" value=\"".$colecao1 ."\"/>";?></td>
        </tr> 
        <tr>
          <td width="82" height="24"><font>Classificação:</font></td>
          <td width="170">
		  	<?php echo"<input name=\"classificacao\" type=\"text\" size=\"25\" value=\"".$classificacao1 ."\"/>";?></td>
          <td height="24"><font>Local &nbsp; </font>:</td> 
          <td>
		  	<?php echo "<input name=\"local\" type=\"text\" size=\"22\" value=\"".$local1 ."\"/>";?></td>
        </tr> 
        <tr height="25">
          <td><font>Ano:</font></td>
          <td>
		  	<?php echo"<input name=\"ano\" type=\"text\" size=\"10\" value=\"".$ano1 ."\"/>";?></td>
		  <td><font>N&ordm; de exemplares:</font></td>
			<td>
				<?php echo"<input name=\"n_exemplares\" type=\"text\" size=\"22\" value=\"".$quantidade1 ."\"/>";?></td>
        </tr>
        <tr height="25">
          <td><font>Volume:</font></td>
          <td>
		  	<?php echo"<input name=\"volume\" type=\"text\" size=\"25\" value=\"".$vl."\"/>";?></td>
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
					  	if($f[$a]==$idioma1 ){
					  		echo "<option value=\"".$f[$a]."\" selected>".$idioma[$a]."</option>";
							 }
							else {
					  		echo "<option value=\"".$f[$a]."\">".$idioma[$a]."</option>";
							 }
						}
					  ?>
          </select></td>
        </tr> 
        <tr> 
          <td><font>S&eacute;rie:</font></td>
          <td>
		  	<?php echo"<input name=\"serie\" type=\"text\" size=\"25\" value=\"".$serie1 ."\">";?></td>
          <td><font>CDD:</font></td>
          <td>
		  	<?php echo"<input name=\"cdd\" type=\"text\" size=\"22\" value=\"".$isbn1 ."\"/>";?></td>
        </tr> 
        <tr height="25">
          <td><font>Notas:&nbsp;</font></td>
          <td colspan="5">
		  		<?php echo"<input name=\"notas\" type=\"text\" size=\"70\" value=\"".$notas1 ."\"/>";?></td>
        </tr>
        <tr height="25">
          <td><font>Assuntos:</font></td>
          <td colspan="3"><?php echo"<input name=\"assuntos\" type=\"text\" size=\"70\" value=\"".$assuntos1 ."\"/>";?></td>
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
								if($tipo_aquisicao1 ==$aq[$i]){
						 		echo "<option value=\"".$aq[$i]."\" size=\"22\" selected>".$aquisicao[$i]."</option>";
							 }
							else {
						 		echo "<option value=\"".$aq[$i]."\" size=\"22\">".$aquisicao[$i]."</option>";
							 }
						 }
							echo "</select></td>";
      			?>
		<td colspan="2">
			<iframe name="naruto" src="formularios/compra.php" height="25" width="250" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe>
			<?php echo "<input type=\"hidden\" name=\"descricao\" id=\"descricao\"/>";?></td>
  </tr> 
  <tr height="25" valign="top"> 
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
    <td>Tombo: </td>
    <td valign="top"><?php echo"<input type=\"text\" size=\"22\" name=\"tombo\" value=\"".$tombo1 ."\"/>";?></td>
  </tr>
  <tr>
    <td><font>Data registro:</font></td>
    <td><?php echo "<input name=\"data_registro\" type=\"text\" value=\"".$data1 ." \"size=\"12\"/>
					<input type=\"hidden\" name=\"pag\" value=\"1\"/>
					<input type=\"hidden\" name=\"id_l\" value=\"".$id_l_item."\"/><input type=\"hidden\" name=\"positivo\" value=\"1\"/>";
	 ?></td>
    <td><input name="submit" type="submit" value="Alterar"/></td>
    <td colspan="1"><input name="reset" type="reset" value="resetar"/></td>
  </tr>
      </table>
    </form>
	<?php
		$pag='0';
		$pag=$_POST['pag'];
		if ($pag=='1')include("formularios/tabela_video.php");?>
</body>
</html>