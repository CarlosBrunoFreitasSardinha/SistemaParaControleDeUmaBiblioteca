<?php 
	  for ($i=0;$i < $mes[$b];$i++){
	  		for ($j=0;$j < $linhas;$j++){
				if ($data[$j]['1'] == $mez){
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
?>