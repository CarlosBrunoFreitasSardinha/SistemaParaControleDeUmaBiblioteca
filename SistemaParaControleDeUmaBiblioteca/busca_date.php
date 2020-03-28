<?php
	include("include/conect_banco.php");
	$data_1=$_POST['data_1'];
	$data_2=$_POST['data_2'];
	/*
	$data_1="2010-07-22";
	$data_2="2010-08-10";*/
				   $pri=explode("/", $data_2);
				   $dar=$pri['2']."-".$pri['1']."-".$pri['0'];
				   $pri=explode("/", $data_1);
				   $der=$pri['2']."-".$pri['1']."-".$pri['0'];
	//BUSCA TODOS OS USUARIO QUE REALIZARAM EMPÉSTIMO
	$pesquisa="SELECT id_usuario_emprestimo, data_emprestimo FROM emprestimo WHERE data_emprestimo >'$der'  AND data_emprestimo< '$dar'";
	$sql=mysql_query($pesquisa) or die ("Erro no Comando SQL: ".mysql_error());
	$linhas=mysql_num_rows($sql);
	
	//ARMAZENA OS USUARIOS EM UM VETOR
	
	for ($i=0;$i<$linhas;$i++){ 	
		$lac=mysql_fetch_array($sql);
		$SQL[$i]=$lac['id_usuario_emprestimo'];
		$SQ[$i]=$lac['data_emprestimo'];
	 }//ORDENA OS USUARIOS
	for ($i=0;$i<$linhas;$i++){
	 	for ($j=0;$j<$linhas;$j++){
			if ($SQL[$i] > $SQL[$j]){
				$troca=$SQL[$i];
				$SQL[$i]=$SQL[$j];
				$SQL[$j]=$troca;
				
				$tr=$SQ[$i];
				$SQ[$i]=$SQ[$j];
				$SQ[$j]=$tr;
			 }
		 }
	 }
	 for ($i=0;$i<$linhas;$i++){
			 $conta[$i]['0']=$SQL[$i];
			 $conta[$i]['1']=$SQ[$i];
	//	echo $conta[$i]['0']."-->".$conta[$i]['1']."-->".$conta[$i]['2']."<br>";
	}$k=0;
	//ARMAZA O USUARIO APENAS UMA VEZ E CONTA SUA QUANTIDADE DE EMPRESTIMOS..
	for ($i=0;$i<$linhas;$i++){
	 	for ($j=0;$j<$linhas;$j++){
			 if ($SQL[$i]==$SQL[$j])$s++;
		 }
		 $usuarios[$k][0] = $SQL[$i];
		 $usuarios[$k][1] = $s;
		 $k++;
		 $i+=($s-1);
		 $s=0;
	 }//APRESENTA A QUANTIDADE DE EMPRESTIMOS POR USUARIO
	/*for ($i=0;$i<$k;$i++){
		echo $usuarios[$i][0]."-->".$usuarios[$i][1]."<br>";
	}
	*///APRESENTA A QUANTIDADE DE EMPRESTIMOS POR USUARIO
	//Vivo Com a Experança de que um dia eu consigua me curar, poder amenizar a dor... nem sinto mais a minha presença aqui... ssik eu ja vou te encontrar.
	
	//PROCURA OS USUARIOS E SEUS IDs DE CURSOS CORRESPONDENTES ^^
	for ($i=0;$i<$k;$i++){
		$pesq="SELECT id_curso FROM usuario_corpo_curso WHERE matricula=".$usuarios[$i]['0'];
		$sql=mysql_query($pesq) or die ("Erro no Comando SQL: ".mysql_error());
		$saida=mysql_fetch_array($sql);
		$usuarios[$i][2]=$saida['id_curso'];
	//	echo $usuarios[$i][0]."-->".$usuarios[$i][1]."-->".$usuarios[$i][2]."<br>";
	}
	
	 for ($i=0;$i<$linhas;$i++){
	 	  for ($j=0;$j<$k;$j++){
	 	 	   if ($usuarios[$j][0]==$conta[$i]['0']){
			   	   $conta[$i]['2']=$usuarios[$j][2];
				   $data[$i]['3']=$usuarios[$j][2];
				   $pri=explode("-", $conta[$i]['1']);
				   $data[$i]['0']=$pri['2'];
				   $data[$i]['1']=$pri['1'];
				   $data[$i]['2']=$pri['0'];
			    }
		  }
	}
// apartir da_qui ordenara por mes e em seguida por datas...^^]


	 for ($i=0;$i<$linhas;$i++){
	 	  for ($j=0;$j<$linhas;$j++){
		  		if ($data[$i]['1'] < $data[$j]['1']){
					$troca=$data[$i]['0'];
					$data[$i]['0']=$data[$j]['0'];
					$data[$j]['0']=$troca;
				
					$troca2=$data[$i]['1'];
					$data[$i]['1']=$data[$j]['1'];
					$data[$j]['1']=$troca2;
				
					$troca3=$data[$i]['2'];
					$data[$i]['2']=$data[$j]['2'];
					$data[$j]['2']=$troca3;
					
					$troca4=$data[$i]['3'];
					$data[$i]['3']=$data[$j]['3'];
					$data[$j]['3']=$troca4;
				 }
		   }
	  }
	 for ($i=0;$i<$linhas;$i++){
	 	  for ($j=0;$j<$linhas;$j++){
		  		if ($data[$i]['1'] == $data[$j]['1']){
		  			if ($data[$i]['0'] < $data[$j]['0']){
						$troca=$data[$i]['0'];
						$data[$i]['0']=$data[$j]['0'];
						$data[$j]['0']=$troca;
				
						$troca2=$data[$i]['1'];
						$data[$i]['1']=$data[$j]['1'];
						$data[$j]['1']=$troca2;
				
						$troca3=$data[$i]['2'];
						$data[$i]['2']=$data[$j]['2'];
						$data[$j]['2']=$troca3;
				
						$troca4=$data[$i]['3'];
						$data[$i]['3']=$data[$j]['3'];
						$data[$j]['3']=$troca4;
					 }
				 }
		   }
	  }	
include("include/conect_banco.php");
$pesw="SELECT * FROM curso";
$rtd=mysql_query($pesw)or die("Erro no Comando SQL: ".mysql_error());
$font=mysql_num_rows($rtd);
for ($o=0;$o<$font;$o++){
	$resultado=mysql_fetch_array($rtd);
	$cult_lin[$o]=$resultado["id_curso"];
	$title[$o]=$resultado["descricao_curso"];
 }
	
		for ($i='0';$i<$font;$i++){
			$qt_curso[$i]['0']=0;
			$qt[$i]['0']=0;
		 }
		include("ultima.php");
		include("tab_busca.php");
	  // inicia o processo de soma de datas por mees para apresentar na tabela de contabilidade.

//$usuarios[$j][0]=== possue os usuarios e a quantidade emprestio realizado pelos mesmos...
//$data[$i]['0']==== possue as datas de usuario e... amazenadas na ordem... tammbem amazena o curso
?>