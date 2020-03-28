<?php 
include "conect_banco.php";
$autor = $_POST['autor'];//tabela autor
$tombo =$_POST['tombo'];
$titulo = $_POST['titulo'];//tabela acervo
$volume = $_POST['volume'];//tabela acervo
$serie = $_POST['serie'];//tabela acervo
$notas = $_POST['notas'];//tabela accervo
$assuntos = $_POST['assuntos'];//tabela acervo
$ano=$_REQUEST['ano'];//tabela ta sobrando
$idioma = $_POST['idioma'];//tabela texto
$edicao = $_POST['edicao'];//tabela texto
$imprenta = $_POST['imprenta'];//tabela texto
$colecao = $_POST['colecao'];//tabela texto
$tipo_aquisicao = $_POST['tipo_aquisicao'];//tabela tipo aquisicao
$origem =$_POST['origem'];//tabela tipo aquisicao
$preco =$_POST['preco'];//tabela tipo aquisicao
$quantidade = $_POST['n_exemplares'];//tabela aquisicao
$data=$_POST['data_registro'];//tabela aquisicao




//inserindo dados na tabela acervo

$sql = mysql_query("INSERT INTO acervo(titulo_acervo, observacoes_acervo, assuntos_acervo, volume_acervo, serie_acervo) VALUES('$titulo','$notas','$assuntos','$volume','$serie')")or die("Erro no comando SQL:".mysql_error());
//buscando o id do item no acervo

	$flet=mysql_query("SELECT id_acervo FROM acervo WHERE titulo_acervo= '$titulo'")or die("Erro no comando SQL:".mysql_error());
	$lin=mysql_num_rows($flet);
	for ($i=0;$i<$lin;$i++){
		$a = mysql_fetch_array($flet);
		$acervo= $a['id_acervo'];
	 }

//inserindo dados na tabela  autor_acervo

$sql= mysql_query("INSERT INTO autor_acervo(id_autor,id_acervo) VALUES('$autor','$acervo')")or die ("Erro no comando SQL:".mysql_error());


$dados_tipo_aquisicao =mysql_query("SELECT * FROM tipo_aquisicao WHERE id_tipo_aquisicao ='$tipo_aquisicao';")or die("Erro no comando SQL:".mysql_error());
$id_aquisicao=mysql_fetch_array($dados_tipo_aquisicao);
$idg= $id_aquisicao['descricao_tipo_aquisicao'];

if (strcmp( $idg, "Compra")=='0'){
	$preco=$descricao;
	$origem=" ";
}else {
	$preco='0';
	$origem=$descricao;}

//inserindo dados na tabela Aquisicao
$sql = mysql_query("INSERT INTO aquisicao(id_tipo_aquisicao, id_acervo, data_aquisicao, quantidade_aquisicao,preco , origem ) VALUES ('$tipo_aquisicao', '$acervo', '$data', '$quantidade' ,'$preco' ,'$origem')") or die("Erro no comando SQL:".mysql_error());
// BUSCANDO O ID DA AQUISICAO	

$dados_tipo_aquisicao =mysql_query("SELECT * FROM aquisicao WHERE id_acervo = '$acervo';")or die("Erro no comando SQL:".mysql_error());
$id_aquisicao=mysql_fetch_array($dados_tipo_aquisicao);
$idf= $id_aquisicao['id_aquisicao'];

//inserindo dados na tabela item_acervo


$sql = mysql_query("INSERT INTO item_acervo(id_item_acervo, id_aquisicao) VALUES ($acervo,$idf)")or die("Erro no comando SQL:".mysql_error()); 

$sql = mysql_query("INSERT INTO texto(id_acervo, edicao_texto, idioma_texto, imprenta_texto, tipo_colecao_texto, tombo, ano_texto)VALUES ( $acervo, '$edicao', '$idioma', '$imprenta', '$colecao','$tombo','$ano')")or die("Erro no comando SQL:".mysql_error());
include("funcoes/zera_variaveis.php");

require "constantes.php";
include ("formularios/formulario_anuarios_relatorios.php");

echo "Cadastrado realizado com sucesso!";
?>