<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Devolucao</title>
</head>

<body>

<?php
require "constantes.php";

	   echo "<form action=\"index.php?acao=\"".$RCD."\" method=\"post\"> wu speak babaques";
	  
	   $a=$_REQUEST['id_emprestimo'];
	   if($a!=''){	
		 include "include/conect_banco.php";
		 $emprestimo=$_REQUEST['id_emprestimo'];
		 $sql=mysql_query("SELECT * FROM emprestimo WHERE id_emprestimo = $emprestimo;")or die("o erre e o seguinte cumpadi:   ".mysql_error());
		 
		  }
		echo "<table align=\"left\">
        <tr valign=\"top\">
          <td colspan=\"2\">Matricula</td>
          <td width=\"112\"><input type=\"text\" size=\"10\" maxlength=\"8\" value=\"".$matricula."\"/> </td>";
          echo "<td colspan=\"3\"> Fred - liga com t_usuarios
		  </td>
        </tr>";
		echo "<tr>
          		<td colspan=\"2\">Identificação do livro</td>
          		<td><input type=\"text\" size=\"10\" maxlength=\"8\" value=\"".$id_item."\"/></td>";
        echo "<td colspan=\"3\">busca na tabela</td></tr>";
				
        echo "<tr><td width=\"90\">De</td><td colspan=\"2\">busca na tabela<td width=\"61\"> Até:</td><td colspan=\"2\">busca na tabela</td></tr>";
		echo "<tr><td height=\"31\" colspan=\"2\">Data devolu&ccedil;&atilde;o </td><td>";
		  $z=date("Y/m/d");
		  
	  		echo "<input type=\"text\" name=\"data_devolucao\" value=\"".$z." \" size=\"20\"/></td>";
			?> 
		  <td width="148">
		  <?php 
		  if(){ echo "";
		  }else echo "";
		  ?></td>
        </tr>
		<tr valign="middle" height="15">
			<td height="24">renova&ccedil;&atilde;o:</td>
	  	  <td width="99"><input type="radio" value="1" name="renovacao"/>sim</td>
			<td><input type="radio" value="0" name="renovacao"/>n&atilde;o</td>
			<td colspan="2"><input type="submit" name="submit" value="enviar"/></td>
			<td colspan="2"><input type="reset" name="reset" value="limpar"/></td>
		</tr>
      </table>
    </form>
</body>
</html>
