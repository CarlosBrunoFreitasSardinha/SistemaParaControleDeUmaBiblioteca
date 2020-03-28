<?php
/*esse agoritmo cria um calendario atual com base na data de hoje
possue um campo para armazenar que dia corresonde a aquela data
possue outro campo que armazenada o dia
e um ultimo campo que armazena a disponibilidade
1 = para livre
0 = para indisponivel

e a função semana_util recebe a data atual e retor a data correspondente a sete dias e caso e o setimo dia seja um feriado ela retornar o dia senguinte livre...
ha três tentações: 
* ser: 
* ter: 
* poder: 

se vc entende, prenchaas depois dos dois pontos e veja o que tem que fazer, para não cair em tentação.
*/

$data_devolucao = semana_util($data);
//echo $data_devolucao;
function semana_util($datas){
$y=date("Y");
$l=date("l");
$d=date("d");
$m=date("m");
 $ano['0']['31']['3']='1';
 if ($y%4==0){
 	$ano['1']['29']['3']='1';
  }else {
 	$ano['1']['28']['3']='1';
   }
 $ano['2']['31']['3']='1';
 $ano['3']['30']['3']='1';
 $ano['4']['31']['3']='1';
 $ano['5']['30']['3']='1';
 $ano['6']['31']['3']='1';
 $ano['7']['31']['3']='1';
 $ano['8']['30']['3']='1';
 $ano['9']['31']['3']='1';
$ano['10']['30']['3']='1';
$ano['11']['31']['3']='1';
$mes['11']='31';
$mes['10']='30';
$mes['9']='31';
$mes['8']='30';
$mes['7']='31';
$mes['6']='31';
$mes['5']='30';
$mes['4']='31';
$mes['3']='30';
$mes['2']='31';
if ($y%4==0)$mes['1']='29';
else $mes['1']='28';
$mes['0']='31';
$semana=array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
//$semana=array('1','2','3','4','5','6','7');
for ($i='0';$i<'12';$i++){
	if ($m==$i){
		for ($j='0';$j<'7';$j++){
			if (!strcmp( $semana[$j], $l)){
				$valor=$j;
			 }
		 }
	}
 }
$a=$valor;
// mes atual
for ($i=0;$i<'12';$i++){

	if (($i+'1')==$m){
	$a=$valor;
	$v=0;
		for ($j=$d-1;$j<$mes[$i];$j++){
			if ($a==6 && $v=='0'){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a='0';
				$v='1';
			}
			else if ($a==5 && $v=='0'){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a++;
				$v='1';
				}
			else if ($a==4 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a++;
				$v='1';
				}
			else if ($a==3 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a++;
				$v='1';
				}
			else if ($a==2 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a++;
				$v='1';
				}
			else if ($a==1 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a++;
				$v='1';
				}
			else if ($a==0 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a++;
				$v='1';
				}
				$v='0';
	 	}
	}
//ultimo mes
else if (($i+1)>$m){$v=0;
		for ($j='0';$j<$mes[$i];$j++){
			if ($a==6 && $v=='0'){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a='0';
				$v='1';
			}
			else if ($a==5 && $v=='0'){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a++;
				$v='1';
				}
			else if ($a==4 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a++;
				$v='1';
				}
			else if ($a==3 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a++;
				$v='1';
				}
			else if ($a==2 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a++;
				$v='1';
				}
			else if ($a==1 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a++;
				$v='1';
				}
			else if ($a==0 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a++;
				$v='1';
				}
				$v='0';
	 	}
}
}
/**/
for ($i=($m-1);$i>=0;$i--){
	if (($i+'1')==$m){
		$a=$valor;
		$v=0;
		for ($j=($d-'1');$j>=0;$j--){
			if ($a==6 && $v=='0'){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a--;
				$v='1';
			}
			else if ($a==5 && $v=='0'){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a--;
				$v='1';
				}
			else if ($a==4 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a--;
				$v='1';
				}
			else if ($a==3 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a--;
				$v='1';
				}
			else if ($a==2 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a--;
				$v='1';
				}
			else if ($a==1 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a--;
				$v='1';
				}
			else if ($a==0 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a='6';
				$v='1';
				}
				$v='0';
	 	}
	}
	if (($i+'1') < $m){
		$v=0;
		for ($j=$mes[$i]-1;$j>=0;$j--){
			if ($a==6 && $v=='0'){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a--;
				$v='1';
			}
			else if ($a==5 && $v=='0'){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a--;
				$v='1';
				}
			else if ($a==4 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a--;
				$v='1';
				}
			else if ($a==3 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a--;
				$v='1';
				}
			else if ($a==2 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a--;
				$v='1';
				}
			else if ($a==1 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a--;
				$v='1';
				}
			else if ($a==0 && $v==0){
				$ano[$i][$j]['0']=$semana[$a];
				$ano[$i][$j]['1']=$j;
				$a='6';
				$v='1';
				}
				$v='0';
	 	}
	}
}

/// primeiros meses
include("include/conect_banco.php");
$pesquisa="SELECT data_bloqueada
			FROM calendario";
$select=mysql_query($pesquisa)or die("Erro no Comando SQL: ".mysql_error());
$linhas=mysql_num_rows($select);
for ($i='0';$i < $linhas;$i++){
	$resul=mysql_fetch_array($select);
	$resultado[$i]=$resul['data_bloqueada'];
 }
for ($i='0';$i<'12';$i++){
	for ($j=0;$j < $mes[$i];$j++){
		//$semana=array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	
		if (!strcmp($ano[$i][$j]['0'],"Monday"))$ano[$i][$j]['2']=1;
		if (!strcmp($ano[$i][$j]['0'],"Tuesday"))$ano[$i][$j]['2']=1;
		if (!strcmp($ano[$i][$j]['0'],"Wednesday"))$ano[$i][$j]['2']=1;
		if (!strcmp($ano[$i][$j]['0'],"Thursday"))$ano[$i][$j]['2']=1;
		if (!strcmp($ano[$i][$j]['0'],"Friday"))$ano[$i][$j]['2']=1;
		if (!strcmp($ano[$i][$j]['0'],"Saturday"))$ano[$i][$j]['2']=0;
		if (!strcmp($ano[$i][$j]['0'],"Sunday"))$ano[$i][$j]['2']=0;
		
		for ($k=0;$k<$linhas;$k++){
			$pri = explode("-", $resultado[$k]);
			if (($i+1) == $pri[1]){
				if (($ano[$i][$j]['1']+1) == $pri[2]){
					$ano[$i][$j]['2'] = '0';  
			 	}
			 }
		  }
	  }
	}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
 /* visualizar o calendario
for ($i='0';$i<'12';$i++){
echo "<table align=\"left\" height=\"235\" border=\"1\" cellpading=\"0\">";
	echo "<tr height=\"15\" valign=\"middle\">
		<td colspan=\"7\" align=\"center\"><br>Mês de".($i+1)."</td></tr>";
	echo "<tr>
		<td>Domingo</td>
		<td>Segunda</td>
		<td>Terça</td>
		<td>Quarta</td>
		<td>Quinta</td>
		<td>Sexta</td>
		<td>Sábado</td></tr>";
		//$semana=array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	for ($j=0;$j < $mes[$i];$j++){
	
	if (!strcmp($ano[$i][$j]['0'],"Monday")&& $j=='0')echo "<td>&nbsp;</td><td>".($ano[$i][$j]['1']+1)."</td>";
	if (!strcmp($ano[$i][$j]['0'],"Tuesday")&& $j=='0')echo "<td>&nbsp;</td><td>&nbsp;</td><td>".($ano[$i][$j]['1']+1)."</td>";
	if (!strcmp($ano[$i][$j]['0'],"Wednesday")&& $j=='0')echo "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>".($ano[$i][$j]['1']+1)."</td>";
	if (!strcmp($ano[$i][$j]['0'],"Thursday")&& $j=='0')echo "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>".($ano[$i][$j]['1']+1)."</td>";
	if (!strcmp($ano[$i][$j]['0'],"Friday")&& $j=='0')echo "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>".($ano[$i][$j]['1']+1)."</td>";
	if (!strcmp($ano[$i][$j]['0'],"Saturday")&& $j=='0')echo "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>".($ano[$i][$j]['1']+1)."</td></tr>";
	
	if (!strcmp($ano[$i][$j]['0'],"Sunday"))echo "<tr><td>".($ano[$i][$j]['1']+1)."</td>";
	
	if (!strcmp($ano[$i][$j]['0'],"Monday")&& $j!='0')echo "<td>".($ano[$i][$j]['1']+1)."</td>";
	if (!strcmp($ano[$i][$j]['0'],"Tuesday")&& $j!='0')echo "<td>".($ano[$i][$j]['1']+1)."</td>";
	if (!strcmp($ano[$i][$j]['0'],"Wednesday")&& $j!='0')echo "<td>".($ano[$i][$j]['1']+1)."</td>";
	if (!strcmp($ano[$i][$j]['0'],"Thursday")&& $j!='0')echo "<td>".($ano[$i][$j]['1']+1)."</td>";
	if (!strcmp($ano[$i][$j]['0'],"Friday")&& $j!='0')echo "<td>".($ano[$i][$j]['1']+1)."</td>";
	if (!strcmp($ano[$i][$j]['0'],"Saturday")&& $j!='0')echo "<td>".($ano[$i][$j]['1']+1)."</td></tr>";
}echo "</table>";
 }
 
			include("funcoes/gerente_de_datas.php");
			$newdate = explode("/", $data);
			$seven=$newdate[2]."/".$newdate[1]."/".$newdate[0];
 */
 			$pri = explode("/", $datas);
			$pris=$pri[0].$pri[1].$pri[2];
			$a=0;
			$kkk=0;
 		for ($i='0';$i<'12';$i++){
			for ($j=0;$j < $mes[$i];$j++){
				if (($i+1) == $pri[1]){
					if (($ano[$i][$j]['1']+1) == $pri[0]){
						$a=1;
			 		}
				 }
				 if ($a>='8'&& $ano[$i][$j]['2'] == '1'){
				 	$chidori=($ano[$i][$j]['1']+'1')."/".($i+1)."/2010";
					$kkk=1;
					break;
					}
				 if ($a!=0 ){
				 	$a++;
				 }
			}if($kkk==1)break;
		 }
return $chidori;
 }
 //---------------------------------------------------------------------------------------------------------------------------------------------------------------------
?>