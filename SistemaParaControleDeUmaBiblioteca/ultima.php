<?php 
				   $pi=explode("/", $data_1);
				   $ds=$pi['1'];
				   
				   $xd=explode("/", $data_2);
				   $da=$xd['1'];
				   
	  for ($i=($ds-1);$i <=($da-1);$i++){
	  		for ($j=0;$j < $linhas;$j++){
				if ($data[$j]['1'] == ($i+1)){
						for ($o=0;$o<$font;$o++){
							if ($data[$j]['3']==$cult_lin[$o]){
								$qt_curso[$o]['0']+=1;
								$qt_curso[$o]['1']=$data[$j]['3'];
								$qt[$o]['0']+=1;	
								}
							}
					 }
	   		 }
			for ($r='0';$r<$font;$r++){
				$qt[$r]['0']=0;
		 	 }
		}
?>