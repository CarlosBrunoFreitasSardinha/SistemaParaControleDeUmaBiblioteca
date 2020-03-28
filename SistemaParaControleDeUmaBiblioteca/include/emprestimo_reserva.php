<?PHP
include "include/conect_banco.php";
require "constantes.php";


$tombo = $_POST['id_item'];
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
	}
/*
$id_item = $_POST['id_item'];*/
$matricula = $_POST['matricula'];


		$data = $_POST['data_saida'];//tabela emprestimo
		$prazo = $_POST['data_prazo'];//tabela emprestimo
		$sql = mysql_query("INSERT INTO emprestimo (id_item_acervo, id_usuario_emprestimo, data_emprestimo, prazo_emprestimo) VALUES ('$id_item', '$matricula','$data','$prazo')")or die ("Erro no comando SQL:".mysql_error());
		
		$sql = mysql_query("SELECT id_reserva FROM tb_reserva  WHERE id_acervo_reserva=$id_item AND id_usuario=$matricula AND confirmacao_reserva=0")or die ("Erro no comando SQL:".mysql_error());
		$select=mysql_fetch_array($sql);
		$id   =$select['id_reserva'];
		echo $id."lll.";
		$sql = mysql_query("UPDATE tb_reserva SET confirmacao_reserva=1 WHERE id_reserva=$id")or die ("Erro no Comando SQL:".mysql_error());
		
		//header("Location: index.php");
		echo "Empréstimo realizado com sucesso";
		
?>