<html>
<head>
<title>Tabela Empréstimo Diário</title>
</head>
<body>
<?php
	include("include/conect_banco.php");
	$data_1=$_POST['data_1'];
	$data_2=$_POST['data_2'];
	/*
	$data_1="22/07/2010";
	$data_2="10/08/2010";*/
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

?><center>
	<table height="150px" width="900"
	<?php 
	$tree=0;
	$confi=0;
	for ($i='0';$i<$k;$i++){
			for ($o='0';$o<$font;$o++){
				if	($usuarios[$i][2]==$cult_lin[$o] && $usuarios[$i][1]!='0'){
					if ($usuarios[$i][1] > $zx[$tree] || $o=='0'){
						$zx[$tree]['0']=$cult_lin[$o];
						$zx[$tree]['1']=$usuarios[$i][1];
						$zx[$tree]['2']=$usuarios[$i][0];
						$confi=1;
					  }
			 }
			if ($o==($font-'1')&&$confi==1){
				$tree++;
				$confi=0;
			}
		  }
	 }
	 echo "<table border=\"0\" width=\"900px\">
	 <tr bgcolor=\"#000000\">
		<td colspan=\"4\" align=\"center\"><font color=\"#FFFFFF\" size=\"3\"><b>Tabela dos alunos que mais efetuara Emprestimos Em Seus Respectivos Cursos</td></tr>";
		echo"<tr bgcolor=\"#FFFFFF\">
		<td width=\"50px\" align=\"center\"><font color=\"#000099\" size=\"2\"><b>Matrícula</td>
		<td width=\"500px\" align=\"center\"><font color=\"#000099\" size=\"2\"><b>Aluno</td>
		<td width=\"50px\" align=\"center\"><font color=\"#000099\" size=\"2\"><b>Quantidade</td>
		<td width=\"300px\" align=\"center\"><font color=\"#000099\" size=\"3\"><b>Curso</td></tr>";
	 for ($t=0;$t<$tree;$t++){
		echo "<tr\">";
		if(($t%2)=='1')echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\"  bgcolor=\"#EBEBEB\">";
		else echo "<tr onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\"  bgcolor=\"#CAC8C8\">";
		
		echo "<td><center><font size=\"2\">".$zx[$t][2]."</td>
		<td><center><font size=\"2\">";
		$alfa=$zx[$t][2];
		$busca=mysql_query("SELECT nome_usuario FROM usuarios WHERE matricula=$alfa")or die("Erro No Comando SQL: ".mysql_error());
		$res=mysql_fetch_array($busca);
		echo $res['nome_usuario'];
		echo "</td>
		<td><center><font size=\"2\">".$zx[$t][1]."</td>
		<td><center><font size=\"2\">";
		echo $title[($zx[$t][0]-1)];
		echo "</td></tr>";
		}
	?>
		</table>
</body>
</html>
