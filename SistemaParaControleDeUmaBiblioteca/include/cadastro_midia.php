<?php 
include "conect_banco.php";

$autor = $_POST['autor'];//tabela autor
$tombo =$_POST['tombo'];
$titulo = $_POST['titulo'];//tabela accervo
$serie = $_POST['serie'];//tabela accervo
$cdd = $_POST['cdd'];//tabela accervo
$notas = $_POST['notas'];//tabela accervo
$assuntos = $_POST['assuntos'];//tabela accervo
$volume = $_POST['volume'];//tabela accervo
$classificacao = $_POST['classificacao'];
$tipo_aquisicao = $_POST['tipo_aquisicao'];//tabela tipo aquisicao
$quantidade = $_POST['n_exemplares'];//tabela aquisicao
$data=$_POST['data_registro'];//tabela aquisicao
$descricao =$_POST['descricao'];//tabela aquisiчуo
$tipo_midia = $_POST['tipo_midia'];//tabela verificar em tipo midia
$local = $_POST['local'];//tabela video
$editora = $_POST['editora'];//tabela editora
$ano = $_POST['ano'];//tabela video
$cutter = $_POST['cutter'];//tabela video
$colecao = $_POST['colecao'];//tabela video
$idioma = $_POST['idioma'];//tabela video

//inserindo dados na tabela acervo

$sql = mysql_query("INSERT INTO acervo(titulo_acervo, observacoes_acervo, assuntos_acervo, volume_acervo, serie_acervo) VALUES('$titulo','$notas','$assuntos','$volume','$serie')")or die("Erro no comando SQL:".mysql_error());

//buscando o id do item no acervo

	$flet=mysql_query("SELECT id_acervo FROM acervo WHERE titulo_acervo= '$titulo'")or die("Erro no comando SQL:".mysql_error());
	$lin=mysql_num_rows($flet);
	for ($i=0;$i<$lin;$i++){
		$a = mysql_fetch_array($flet);
		$acervo= $a['id_acervo'];
	 }

$sql=mysql_query("INSERT INTO editora_acervo(id_editora,id_acervo) VALUES ($editora, $acervo)")or die("Erro no comando SQL:".mysql_error());

//inserindo dados na tabela  autor_acervo

$sql= mysql_query("INSERT INTO autor_acervo(id_autor,id_acervo) VALUES($autor,$acervo)")or die ("Erro no comando SQL:".mysql_error());

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

$dados_tipo_aquisicao =mysql_query("SELECT * FROM aquisicao WHERE id_acervo = $acervo;")or die("Erro no comando SQL:".mysql_error());
$id_aquisicao=mysql_fetch_array($dados_tipo_aquisicao);
$idf= $id_aquisicao['id_aquisicao'];


//inserindo dados na tabela item_acervo


$sql = mysql_query("INSERT INTO item_acervo(id_item_acervo, id_aquisicao) VALUES ($acervo,$idf)")or die("Erro no comando SQL:".mysql_error());

//inserindo dados na tabela video

$sql = mysql_query("INSERT INTO video(id_acervo, cutter_video, editora_video, local_video, ano_video, idioma_video, tipo_colecao_video, cdd_video, classificacao_video, id_tipo_midia, tombo)VALUES ( $acervo, '$cutter', '$editora', '$local', '$ano', $idioma, '$colecao', '$cdd','$classificacao', '$tipo_midia','$tombo')")or die("Erro no comando SQL:".mysql_error());

include("funcoes/zera_variaveis.php");
require "constantes.php";
include ("formularios/formulario_cd-dvd-fita_video.php");

echo "Cadastrado realizado com sucesso!";
?>