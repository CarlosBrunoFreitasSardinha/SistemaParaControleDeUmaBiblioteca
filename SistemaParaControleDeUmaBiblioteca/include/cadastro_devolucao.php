<?php 
include "conect_banco.php";

$data=date("Y/m/d");//tabela emprestimo
$renovacao=$_POST['renovacao'];
$id_emprestimo=$_POST['id_emprestimo'];
$id_item =$_POST['id_item'];


	$sql = mysql_query("UPDATE emprestimo SET data_devolucao='$data',devolucao_item='1' WHERE id_emprestimo ='$id_emprestimo'")or die("Erro no comando SQL:".mysql_error());
  		$w=mysql_query("SELECT id_usuario_emprestimo FROM emprestimo WHERE id_item_acervo='$id_item' AND devolucao_item='0'")or die("Erro no comando SQL: ".mysql_error());
			$u=mysql_num_rows($w);
			for ($i=0;$i<100;$i++){}
			if ($u !='0'){
				echo "\n \n O item em questуo nуo teve sua devoluчуo registrada. Verifique na tabela Emprestimo";
				$x='1';
			}
if ($renovacao=='1'){
		include("funcoes/valida_emprestimo.php");
	}else if($renovacao=='0'){
		include("formularios/formulario_devolucao.php");
		echo "Devolu&ccedil;&atilde;o Realizada com Sucesso!";
	}
?>