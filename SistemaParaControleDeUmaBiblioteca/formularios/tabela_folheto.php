<?php 

	include ("include/conect_banco.php");
	$au = $_POST['autor'];//tabela autor
	$tomb =$_POST['tombo'];
	$titu = $_POST['titulo'];//tabela-acervo
	$volum = $_POST['volume'];//tabela-acervo
	$seri = $_POST['serie'];//tabela-acervo
	$nota = $_POST['notas'];//tabela-accervo
	$assunt= $_POST['assuntos'];//tabela-acervo
	$an=$_POST['ano'];//tabela-ta-sobrando
	$idiom = $_POST['idioma'];//tabela-folheto
	$edica = $_POST['edicao'];//tabela-folheto
	$imprent = $_POST['imprenta'];//tabela-folheto
	$coleca = $_POST['colecao'];//tabela-folheto
	$descricao = $_POST['descricao'];
	$tipo_aquisica = $_POST['tipo_aquisicao'];//tabela-tipo-aquisicao
	if ($tipo_aquisica =='1'){
	$prec=$descricao;
	$orige="-";
	}else {
	$prec='0';
	$orige=$descricao;}
	
	$quantidad = $_POST['n_exemplares'];//tabela aquisicao
	$dat=$_POST['data_registro'];//tabela aquisicao
	$acerv=$_POST['id_l'];//tabela aquisicao
	$positivo=$_POST['positivo'];
	if ($positivo){
	$sql = mysql_query(" UPDATE aquisicao 
		  SET id_tipo_aquisicao= $tipo_aquisica, data_aquisicao= '$dat', quantidade_aquisicao= $quantidad, preco= $prec, origem= '$orige'
		  WHERE id_acervo=$acerv ") or die("Erro no comando SQL:".mysql_error());
	
$sql = mysql_query("UPDATE folheto
					SET  edicao_folheto='$edica', idioma_folheto='$idiom', imprenta_folheto='$imprent', tipo_colecao_folheto='$coleca', tombo='$tomb'
					WHERE id_acervo=$acerv ") or die("Erro no comando SQL:".mysql_error());

	$sql = mysql_query("UPDATE acervo SET titulo_acervo= '$titu', observacoes_acervo= '$nota', assuntos_acervo= '$assunt', volume_acervo= '$volum', serie_acervo= '$seri' WHERE id_acervo='$acerv'")or die("Erro no comando SQL:".mysql_error());

	$sql= mysql_query("UPDATE autor_acervo SET id_autor='$au' WHERE id_acervo='$acerv'")or die ("Erro no comando SQL:".mysql_error());
	
}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	include ("include/conect_banco.php");
	   $sql= mysql_query("SELECT * FROM folheto") or die ("Erro no Comando SQL".mysql_error());
	   $linhas=mysql_num_rows($sql);
	   for ($i=0;$i<$linhas;$i++){
	   		$SQL=mysql_fetch_array($sql);
			$id_acervo[$i] = $SQL['id_acervo'];//tabela livro
			$isbn[$i] = $SQL['imprenta_folheto'];//tabela 
			$editora[$i] = $SQL['idioma_folheto'];//tabela livro
			$tombo[$i] = $SQL['tombo'];//tabela livro
	}
	for ($i=0;$i<$linhas;$i++){		
		include("include/conect_banco.php");//pesquisa
		$t=mysql_query("SELECT editora FROM editora WHERE id_editora= '$editora[$i]'")or die("Erro no Comando SQL: ".mysql_error());
	   	$SQL=mysql_fetch_array($t);
		$S[$i]=$SQL['editora'];
	   $sql= mysql_query("SELECT id_autor FROM autor_acervo WHERE id_acervo='$id_acervo[$i]'") or die ("Erro no Comando SQL".mysql_error());
	   		$SQL=mysql_fetch_array($sql);
			$aut[$i]=$SQL['id_autor'];		
	   $sql= mysql_query("SELECT nome_autor FROM autor WHERE id_autor='$aut[$i]'") or die ("Erro no Comando SQL".mysql_error());
	   		$SQL=mysql_fetch_array($sql);
			$autor[$i]=$SQL['nome_autor'];
			
	   $sql= mysql_query("SELECT * FROM aquisicao WHERE id_acervo='$id_acervo[$i]' ") or die ("Erro no Comando SQL".mysql_error());
	   		$SQL=mysql_fetch_array($sql);
			$quantidade[$i] = $SQL['quantidade_aquisicao'];//tabela aquisi��o
			$tipo_aquisicao[$i] = $SQL['id_tipo_aquisicao'];//tabela tipo_aquisicao
			if ($tipo_aquisicao[$i]=='0'){
	   			$descricao[$i] = $SQL['preco'];}
				else{$descricao[$i] = $SQL['doacao'];}//tabela aquisi��o
			$data[$i] = $SQL['data_aquisicao'];//tabela aquisi��o
	   
	   $sql= mysql_query("SELECT * FROM acervo WHERE id_acervo='$id_acervo[$i]' ") or die ("Erro no Comando SQL".mysql_error());
	   		$SQL=mysql_fetch_array($sql);
			$titulo[$i] =$SQL['titulo_acervo'];//tabela acervo
			$assuntos[$i] =$SQL['assuntos_acervo'];//tabela acervo
		if($i==0){echo "<table border=\"0\" cellspacing=\"0\" cellpading=\"0\">
							<tr>
								<td colspan=\"9\" width=\"560\" bgcolor=\"#000000\"><font color=\"#ffffff\"><b><center>Folhetos</td></tr>";
							echo "<tr>
								<td width=\"\"><center><font color=\"#000099\"><b>&nbsp;&nbsp;&nbsp;</b></td>
								<td width=\"\"><center><font color=\"#000099\"><b>Autor</b></td>
								<td width=\"\"><center><font color=\"#000099\"><b>Titulo</b></td>
								<td width=\"\"><center><font color=\"#000099\"><b>Editora</b></td>
								<td width=\"\"><center><font color=\"#000099\"><b>Quantidade</b></td>
								<td width=\"\"><center><font color=\"#000099\"><b>ISBN</b></td>
								<td width=\"\"><center><font color=\"#000099\"><b>Assuntos</b></td>
								<td width=\"\"><center><font color=\"#000099\"><b>Tombo</b></td></tr>";}
						if (($i%2)=='1'){
										echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#EBEBEB\">
												<td><center><a href=\"index.php?acao=$ADF&&id_l=".$id_acervo[$i]."\"><img src=\"images/b_edit.png\" alt=\"Alterar\"></a></td>
												<td><center><font size=\"2\">".$autor[$i]." </td>
												<td><center><font size=\"2\">".$titulo[$i]."</td>
												<td><center><font size=\"2\">".$S[$i]."</td>
												<td><center><font size=\"2\">".$quantidade[$i]."</td>
												<td><center><font size=\"2\">".$isbn[$i]."</td>
												<td><center><font size=\"2\">".$assuntos[$i]."</td>
												<td><center><font size=\"2\">".$tombo[$i]."</td>
											    </tr>";
									 }
									if (($i%2)=='0'){//bgcolor=\"#C4DBDB\"azul legal
										echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" bgcolor=\"#CAC8C8\">
												<td><center><a href=\"index.php?acao=$ADF&&id_l=".$id_acervo[$i]."\"><img src=\"images/b_edit.png\" alt=\"Alterar\"></a></td>
												<td><center><font size=\"2\">".$autor[$i]." </td>
												<td><center><font size=\"2\">".$titulo[$i]."</td>
												<td><center><font size=\"2\">".$S[$i]."</td>
												<td><center><font size=\"2\">".$quantidade[$i]."</td>
												<td><center><font size=\"2\">".$isbn[$i]."</td>
												<td><center><font size=\"2\">".$assuntos[$i]."</td>
												<td><center><font size=\"2\">".$tombo[$i]."</td>
								 				</tr>";
									 }}echo "</table></center><br><br><br><br>";//}
?>
