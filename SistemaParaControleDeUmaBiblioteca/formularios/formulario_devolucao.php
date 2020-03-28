<html>
<head>
	<title>Formulário Devolução</title></head>
	<body>
<?php
require ("constantes.php");
	   echo "<form action=\"index.php?acao=".$CD."\" method=\"post\">";
	  ?>
      <table width="560" cellpadding="0" border="0" cellspacing="0" width="541">
	   
		<tr valign="top">
          <td colspan="2">Informe o id do empréstimo</td>
		  <td width="100"><?php  
								$id_empres =$_POST['id_devolucao'];
		 						$id_empres =$_REQUEST['id_devolucao'];
		 					 	echo "<input type=\"text\" name=\"id_devolucao\" value=\"".$id_empres."\" size=\"10\"/>";// print $id_emprestimo;
							 ?></td>
          <td colspan="3" width="460" align="left">
				<input type="submit" name="buscar" value="buscar"/>
	   </form></td>
        </tr>
	   <?php
		 $emprestimo=$_POST['id_devolucao'];
		 $emprestimo=$_REQUEST['id_devolucao'];
	   if($emprestimo!=''){	
		 include_once "include/conect_banco.php";
		 $sql=mysql_query("SELECT id_item_acervo,id_usuario_emprestimo,date_format(data_emprestimo,'%d/%m/%Y') as data_emprestimo, date_format(prazo_emprestimo, '%d/%m/%Y') as prazo_emprestimo FROM emprestimo WHERE id_emprestimo = '$emprestimo' AND devolucao_item='0';")or die("Erro no comando SQL: ".mysql_error());
		 $s= mysql_num_rows($sql);
		for ($i=0;$i<$s;$i++){
			$array_sql = mysql_fetch_array($sql);
			$matricula =$array_sql['id_usuario_emprestimo'];
			$id_item   =$array_sql['id_item_acervo'];
			$data_saida=$array_sql['data_emprestimo'];
			$data_prazo=$array_sql['prazo_emprestimo'];
		  }
		  $date=date("d/m/Y");
		  $pri = explode("/", $date); 
		  $seg = explode("/", $data_prazo);
			$pris=$pri[2].$pri[1].$pri[0];
			$segs=$seg[2].$seg[1].$seg[0];
		  		if ($pris <= $segs){
	   				echo "<form name=\"devolucao\" action=\"index.php?acao=$RCD\" method=\"post\">";
				}
		 else echo "<form name=\"devolucao\" action=\"index.php?acao=$CM\" method=\"post\">";
	  }echo "<input type=\"hidden\" name=\"id_item\" value=\"".$id_item."\" />";

		echo "<tr valign=\"top\">
          <td colspan=\"2\">Matricula</td>
          <td width=\"112\"><input type=\"text\" size=\"10\" maxlength=\"8\" name=\"matricula\" value=\"".$matricula."\"/> </td>";
		 include_once "include/conect_banco.php";
		  $SQL   = mysql_query("SELECT nome_usuario FROM usuarios WHERE matricula = '$matricula'") or die("Erro no comando SQL: ".mysql_error());
		 	$fetch = mysql_fetch_array($SQL);
		 	$nome=$fetch['nome_usuario'];
          echo "<td colspan=\"3\">".$nome."</td></tr>";
		  
		  include_once "include/conect_banco.php";
		    $SQL   = mysql_query("SELECT titulo_acervo FROM acervo WHERE id_acervo = '$id_item'") or die("Erro no comando SQL: ".mysql_error());
		 	$fetch = mysql_fetch_array($SQL);
		 	$titulo_acervo=$fetch['titulo_acervo'];
		 	$SQL   =mysql_query("SELECT tombo FROM livro WHERE id_acervo = '$id_item'")or die("Erro no comando SQL: ".mysql_error());
		 	$fetch = mysql_fetch_array($SQL);
		 	$tombo =$fetch['tombo'];
		echo "<tr><td colspan=\"2\">Identificação do livro</td>
          		  <td><input type=\"text\" size=\"10\" maxlength=\"8\" name=\"id_acervo\" value=\"".$tombo."\"/></td>";
        	echo "<td colspan=\"3\">".$titulo_acervo."</td></tr>";
        echo "<tr><td width=\"90\">De</td><td colspan=\"2\">".$data_saida."</td>
				  <td width=\"61\" colspan=\"2\"> Até:</td><td>
				  ".$data_prazo."</td>			</tr>";
		
		echo "<tr><td height=\"31\" colspan=\"2\">Data devolu&ccedil;&atilde;o </td>";
	  		echo "<td>".$date."
	   <input type=\"hidden\" name=\"id_emprestimo\" value=\"".$emprestimo."\"/></td>";
			?> 
		  <td width="79">resultado</td>
		  <td colspan="2"><?php  
		  $pri = explode("/", $date); 
		  $seg = explode("/", $data_prazo);
			$pris=$pri[2].$pri[1].$pri[0];
			$segs=$seg[2].$seg[1].$seg[0];
		  		if ($pris > $segs){
					echo"<font size=\"3\" color=\"red\">Usuário Multado</font>";
					$data=date("Y/m/d");//tabela emprestimo
					include("funcoes/diferenca_de_datas.php");
					echo "<input name=\"dias\" type=\"hidden\" value=\"".$dias."\" />";
					$sql = mysql_query("UPDATE emprestimo SET data_devolucao='$data',devolucao_item='1' WHERE id_emprestimo ='$emprestimo'")or die("Erro no comando SQL:".mysql_error());
					}
					else echo "<font size=\"3\" color=\"blue\">OK!!</font>";?></td>
        </tr>
		<tr valign="middle" height="15">
			<td height="24">Renova&ccedil;&atilde;o:</td>
	  	  <td width="78"><input type="radio" value="1" name="renovacao"/>sim</td>
			<td><input type="radio" value="0" name="renovacao"/>n&atilde;o</td>
			<td colspan="2"><input type="submit" name="submit" value="enviar"/></td>
		  <td width="52" colspan="2"><input type="reset" name="reset" value="limpar"/></td>
		</tr>
    </form></table>
</body>
</html>