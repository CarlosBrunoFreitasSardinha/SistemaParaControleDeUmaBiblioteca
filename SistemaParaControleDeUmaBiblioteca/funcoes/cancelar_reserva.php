<?php
$id_item=$_REQUEST['item'];
$matricula=$_REQUEST['matricula'];
		include_once "include/conect_banco.php";
		$sql = mysql_query("SELECT id_reserva FROM tb_reserva  WHERE id_acervo_reserva=$id_item AND id_usuario=$matricula AND confirmacao_reserva=0")or die ("Erro no comando SQL:".mysql_error());
		$select=mysql_fetch_array($sql);
		$id   =$select['id_reserva'];
		$sql = mysql_query("UPDATE tb_reserva SET confirmacao_reserva=2 WHERE id_reserva=$id")or die ("Erro no Comando SQL:".mysql_error());
		echo "Processo de Cancelamento Realizado Com Sucesso! <a href=\"index.php?acao=$VR\">Voltar</a>";
		
?>