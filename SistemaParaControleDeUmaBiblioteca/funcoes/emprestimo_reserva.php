<html>

<head>
	<title>Formulário Empr&eacute;stimo</title>
	<script type="text/javascript">
	function data(){
			document.emprestimo.data_s.value = document.emprestimo.data_now.value;
			document.emprestimo.data_p.value = document.emprestimo.data_seven.value;
	}

function TestaVal() {
	if (document.emprestimo.matricula.value == "" || document.matricula.id_item.value == " ") {
		alert ("O Campo Tombo Não Preenchido...Cadastro Não Realizado!")
		return false
		}
	if (document.emprestimo.id_item.value == "" || document.emprestimo.id_item.value == " ") {
		alert ("O Campo Tombo Não Preenchido...Cadastro Não Realizado!")
		return false 
		}
	if (document.emprestimo.data_saida.value == "" || document.emprestimo.data_saida.value == " ") {
		alert ("O Campo Data Saída Não Preenchido...Cadastro Não Realizado!")
		return false 
		}
	if (document.emprestimo.data_prazo.value == "" || document.emprestimo.data_prazo.value == " ") {
		alert ("O Campo Data Prazo Não Preenchido...Cadastro Não Realizado!")
		return false 
		}
 }
	</script>
</head>
<body>
<?php
require "constantes.php";
	   echo "<form onSubmit=\"return TestaVal()\" action=\"index.php?acao=".$REV."\" name=\"emprestimo\" method=\"post\">";
	  ?>
	<table width="640" border="0">
	<tr>
	<td colspan="3" align="center">Campos</td>
	<td colspan="4" align="center">Proprietarios dos dados </td>
	</tr>
	<tr>
	  <td width="96">Matricula:</td>
	  <td>
	  	<?php
		$tombo=$_REQUEST['item'];
include "include/conect_banco.php";
require "constantes.php";

$item_tombo=mysql_query("SELECT tombo FROM livro WHERE id_acervo='$tombo'") or die ("Erro no comando SQL".mysql_error());
	$yp=mysql_num_rows($item_tombo);
	if($yp){	
		$acervo_id=mysql_fetch_array($item_tombo);
			$id_item=$acervo_id['tombo'];
	}
$item_tombo=mysql_query("SELECT tombo FROM video WHERE id_acervo='$tombo'") or die ("Erro no comando".mysql_error());
	$yp=mysql_num_rows($item_tombo);
	if ($yp){	
		$acervo_id=mysql_fetch_array($item_tombo);
		$id_item=$acervo_id['tombo'];
	}
$item_tombo=mysql_query("SELECT tombo FROM folheto WHERE id_acervo='$tombo'") or die ("Erro no comando".mysql_error());
	$yp=mysql_num_rows($item_tombo);
	if($yp){	
		$acervo_id=mysql_fetch_array($item_tombo);
			$id_item=$acervo_id['tombo'];
	}
$item_tombo=mysql_query("SELECT tombo FROM texto WHERE id_acervo='$tombo'") or die ("Erro no comando".mysql_error());
	$yp=mysql_num_rows($item_tombo);
	if($yp){	
		$acervo_id=mysql_fetch_array($item_tombo);
			$id_item=$acervo_id['tombo'];
	}
	$itemm=$id_item;
		$matriculla=$_REQUEST['matricula'];
		echo "<input type=\"text\" size=\"18\" maxlength=\"8\" name=\"matricula\" onChange=\"Procura_usuario(matricula.value)\" value=\"".$matriculla."\"/>";?></td>
		  
	  	<td colspan="4">&nbsp;Tombo do item:</td>
		<td colspan=""><?php
		echo "<input type=\"text\" size=\"18\" maxlength=\"8\" name=\"id_item\" onChange=\"Procura_item(id_item.value)\" value=\"".$itemm."\"/>";?></td></tr>
	<tr>
		<td>De</td>
		<td colspan="2" width="89">
	<?php  //usar o Explode.
		$data=date("d/m/Y");
			echo "<input type=\"hidden\" name=\"data_now\" value=\"".$data."\"/>";
			$xD=date("Y/m/d");
			echo "<input type=\"hidden\" name=\"data_saida\" value=\"".$xD."\"/>";
		?>
			<input type="text"name="data_s"size="18"/> </td>
		<td colspan="2">
			<input name="buton" type="button" onClick="data()" value="Datas"/></td>
		<td width="25">     Até:</td>
		<td width="155" colspan="2">
	<?php  
			include("funcoes/gerente_de_datas.php");
			$newdate = explode("/", $data_devolucao);
			$seven=$newdate[2]."/".$newdate[1]."/".$newdate[0];
			
			echo "<input type=\"hidden\" name=\"data_prazo\" value=\"".$seven."\"/>";
			echo "<input type=\"hidden\" name=\"data_seven\" value=\"".$data_devolucao."\"/>";
		?>
	  		<input type="text" name="data_p" value="" size="18"/></td>
	</tr>
	<tr>
		<td><input type="submit" name="enviar" value="enviar"/></td>
		<td colspan="2"><input type="reset" name="reset" value="limpar"/></td>
	</tr>
	</table>
</form>
</body>
</html>