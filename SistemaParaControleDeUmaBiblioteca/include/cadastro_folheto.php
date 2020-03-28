<?php 
include "conect_banco.php";

$autor = $_POST['autor'];//tabela autor
$tombo =$_POST['tombo'];
$quantidade = $_POST['n_exemplares'];//tabela aquisicao-----
$tipo_aquisicao = $_POST['tipo_aquisicao'];//tabela tipo aquisicao
$descricao =$_POST['descricao'];//tabela aquisiчуo
$data=$_POST['data_registro'];//tabela aquisicao$serie = $_POST['serie'];//tabela acervo
$titulo = $_POST['titulo'];//tabela acervo
$volume = $_POST['volume'];//tabela acervo
$notas = $_POST['notas'];//tabela acervo
$assuntos = $_POST['assuntos'];//tabela acervo
$ano=$_REQUEST['ano'];//tabela folheto ---Campo a ser criado
$idioma = $_POST['idioma'];//tabela  folheto
$imprenta = $_POST['imprenta'];//tabela folheto
$colecao = $_POST['colecao'];//tabela folheto
$edicao = $_POST['edicao'];//tabela folheto

//inserindo dados na tabela acervo

$sql = mysql_query("INSERT INTO acervo(titulo_acervo, observacoes_acervo, assuntos_acervo, volume_acervo, serie_acervo) VALUES('$titulo','$notas','$assuntos','$volume','$serie')")or die("Erro no comando SQL:".mysql_error());

//buscando o id do item no acervo

	$flet=mysql_query("SELECT id_acervo FROM acervo WHERE titulo_acervo= '$titulo'")or die("Erro no Comando SQL: ".mysql_error());
	$lin=mysql_num_rows($flet);
	for ($i=0;$i<$lin;$i++){
		$a = mysql_fetch_array($flet);
		$acervo= $a['id_acervo'];
	 }

//inserindo dados na tabela  autor_acervo

$sql= mysql_query("INSERT INTO autor_acervo(id_autor,id_acervo) VALUES($autor,$acervo)")or die ("Erro no Comando SQL: ".mysql_error());

$dados_tipo_aquisicao =mysql_query("SELECT * FROM tipo_aquisicao WHERE id_tipo_aquisicao ='$tipo_aquisicao';")or die("Erro no comando SQL:".mysql_error());
$id_aquisicao=mysql_fetch_array($dados_tipo_aquisicao);
$idg= $id_aquisicao['descricao_tipo_aquisicao'];
echo $idg."<br>";
if (strcmp( $idg, "Compra")=='0'){
	$preco=$descricao;
	$origem=" ";
}else {
	$preco='3';
	$origem=$descricao;}

//inserindo dados na tabela Aquisicao
$sql = mysql_query("INSERT INTO aquisicao(id_tipo_aquisicao, id_acervo, data_aquisicao, quantidade_aquisicao,preco , origem ) VALUES ('$tipo_aquisicao', '$acervo', '$data', '$quantidade' ,'$preco' ,'$origem')") or die("Erro no comando SQL:".mysql_error());
// BUSCANDO O ID DA AQUISICAO	

$dados_tipo_aquisicao =mysql_query("SELECT * FROM aquisicao WHERE id_acervo = $acervo;")or die("Erro no Comando SQL: ".mysql_error());
$id_aquisicao=mysql_fetch_array($dados_tipo_aquisicao);
$idf= $id_aquisicao['id_aquisicao'];


//inserindo dados na tabela item_acervo


$sql = mysql_query("INSERT INTO item_acervo(id_item_acervo, id_aquisicao) VALUES ($acervo,$idf)")or die("Erro no comando SQL:".mysql_error());



$sql = mysql_query("INSERT INTO folheto(id_acervo, idioma_folheto, imprenta_folheto, tipo_colecao_folheto, edicao_folheto, tombo)VALUES ( $acervo, '$idioma', '$imprenta', '$colecao', '$edicao','$tombo')")or die("Erro no comando SQL:".mysql_error());

include("funcoes/zera_variaveis.php");
require "constantes.php";
include("formularios/formulario_foheto.php");
echo "Cadastrado realizado com sucesso!";
?>