<html>
<head>
	<title>Reserva</title>
</head>
<body>
    <table width="533" align="left" border="0">
<?php
require ("constantes.php");
	   echo "<form action=\"index.php?acao=".$CR."\" method=\"post\">";
	  ?>
	<tr>
		<td colspan="3" align="center">Campos</td>
		<td colspan="3" align="center">Proprietarios dos dados </td></tr>
	<tr>
		<td colspan="2">Matricula</td>
	  	<td width="59">
	  	<?php 
		global $matricula;
		global $id_item;
		$matricula =$_POST['matricula'];
					
		$id_item   =$_POST['id_i'];
		echo "<input type=\"text\" size=\"8\" maxlength=\"8\" name=\"matricula\" value=\"".$matricula."\"/>"; ?></td>
		<td colspan="3">
		<?php
			 include ("include/conect_banco.php");
			 $swl=mysql_query("SELECT * FROM usuarios WHERE matricula='$matricula'")or die("Erro no Comando SQL: ".mysql_error());
			 $lins=mysql_num_rows($swl);
		 		if ($lins==0){
					echo "Usuario Inexistente!";
					$x=4;
					}?></td>
	</tr>
	<tr>
		<td colspan="2">Tombo do item </td>
		<td><?php echo "<input type=\"text\" size=\"8\" maxlength=\"8\"name=\"id_i\" value=\"".$id_item."\"/>"; ?></td>
		<td colspan="3"><input type="submit" name="buscar" value="Buscar"/></td>
	</tr>
	</form>
	<?php
	   echo "<form action=\"index.php?acao=".$VR."\" method=\"post\">";
	   include "include/conect_banco.php";
	   require "constantes.php";

$tombo = $_POST['id_i'];
$item_tombo=mysql_query("SELECT id_acervo FROM livro WHERE tombo='$tombo'") or die ("Erro no comando SQL".mysql_error());
	$yp=mysql_num_rows($item_tombo);
	if($yp){	
		$acervo_id=mysql_fetch_array($item_tombo);
		$id_item=$acervo_id['id_acervo'];
	}
$item_tombo=mysql_query("SELECT id_acervo FROM video WHERE tombo='$tombo'") or die ("Erro no comando".mysql_error());
	$yp=mysql_num_rows($item_tombo);
	if($yp){	
		$acervo_id=mysql_fetch_array($item_tombo);
		$id_item=$acervo_id['id_acervo'];
	}
$item_tombo=mysql_query("SELECT id_acervo FROM folheto WHERE tombo='$tombo'") or die ("Erro no comando".mysql_error());
	$yp=mysql_num_rows($item_tombo);
	if($yp){	
		$acervo_id=mysql_fetch_array($item_tombo);
		$id_item=$acervo_id['id_acervo'];
	}
$item_tombo=mysql_query("SELECT id_acervo FROM texto WHERE tombo='$tombo'") or die ("Erro no comando".mysql_error());
	$yp=mysql_num_rows($item_tombo);
	if($yp){	
		$acervo_id=mysql_fetch_array($item_tombo);
		$id_item=$acervo_id['id_acervo'];
	}//---------------------------------------------------------------------------------------------------------------------------------------------------------------
	  ?>
	<tr><?php 
		include_once "include/conect_banco.php";//busca visualizar na tabela emprestimo, se o item indisponivel
		$matricula=$_POST['matricula'];
		$t=mysql_query("SELECT * FROM emprestimo WHERE devolucao_item='0' AND id_item_acervo='$id_item'")or die("Erro no comando SQL: ".mysql_error());
		$linhas=mysql_num_rows($t);
		echo $linhas;
		if ($linhas > '0'){
			$d = mysql_fetch_array($t);
			$datas=$d['prazo_emprestimo'];
 			$pri = explode("-", $datas);
			$data=$pri[2]."/".$pri[1]."/".$pri[0];
			}
			// agora verificar se esse item ja esta reservado
		$t=mysql_query("SELECT * FROM tb_reserva WHERE id_acervo_reserva ='$id_item'")or die("Erro no comando SQL: ".mysql_error());
		$linha=mysql_num_rows($t);
			//transformar datas pelo explode
			echo "<td width=\"68\" colspan=\"2\">Data Registro</td><td width=\"79\"><input type=\"text\" name=\"data_reserva\" value=\"".$data." \" size=\"20\"/></td>";
			echo "</td><td width=\"155\" colspan=\"3\">&nbsp;";
	  		echo "<input type=\"hidden\" name=\"apresenta\" value=\"1\">
				 <input type=\"hidden\" name=\"id_ac\" value=\"".$id_item."\">
				 <input type=\"hidden\" name=\"mat\" value=\"".$matricula."\">";
			 if ($linhas == 0)echo"<font color=\"#000000\">O Livro Esta Desponível...<br>A&ccedil;&atilde;o de Reserva Negado!</font>";

			//cadastrar item que esta somente em emprestimo
			?></td>
	</tr>
	<tr><input type="hidden" name="apresenta" value="1">
		<td colspan="2">
		<?php
		if($linhas!=0)echo "<input type=\"submit\" name=\"enviar\" value=\"registrar\"/>";
				else "&nbsp;";
		?></td>	</tr>
	</table>
</form>
		<?php
			$apresenta=$_POST['apresenta'];
			if ($apresenta=='1'){
				if (linhas!='0'){
				echo "Processo de Reserva Realizado Com Sucesso!";
				}else echo "O Livro esta disponivel para Empr&eacute;stimo, Processo de Reserva Negado!!!";
			 }
			?>
</body>
</html>