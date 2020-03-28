<?php  
include("../include/conect_banco.php");
$pesw="SELECT * FROM curso";
$rtd=mysql_query($pesw)or die("Erro no Comando SQL: ".mysql_error());
$font=mysql_num_rows($rtd);
for ($o=0;$o<$font;$o++){
	$resultado=mysql_fetch_array($rtd);
	$cult_lin[$o]=$resultado["id_curso"];
	$title[$o]=$resultado["descricao_curso"];
 }
for ($w=0;$w < 12;$w++){
	  for ($i=0;$i < $mes[$w];$i++){
	  		for ($j=0;$j < $linhas;$j++){
				if ($data[$j]['1'] == $w){
					if ($data[$j]['0']==($i+'1')){
						for ($o=0;$o<$font;$o++){
							if ($data[$j]['3']==$cult_lin[$o]){
								$qt_curso[$o]['0']+=1;
								$qt[$o]['0']+=1;	
							  }
						  }
					 }
				 }
	   		 }
			for ($r=0; $r<$font;$r++){
				$as[$i][$r] = $qt[$r]['0'];
				}
				for ($r='0';$r<$font;$r++){
					$qt[$r]['0']=0;
		 		 }
	   }
	   
		for ($r='0';$r<$font;$r++){
			if ($r==0)$soma=0;
			if ($r!=$font)$anual[$w][$r]=$qt_curso[$r]['0'];
			$soma+=$qt_curso[$r]['0'];
			$qt_curso[$r]['0']=0;
			if ($r==$font)$anual[$w][$r]=$soma;
		}
}
?>