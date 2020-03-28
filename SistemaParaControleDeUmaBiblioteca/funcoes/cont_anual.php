<html>
<head>
<title>Tabela Empréstimo Anual</title>
</head>
<body><center><br>
	<table border="0" cellpadding="0" cellspacing="0" hspace="0" vspace="0">
		<tr bgcolor="#C1F7F5">
			<td colspan="12" align="center"><font color="#000099"><b>Relatório Empréstimo Anual</td>
		</tr>
		<tr bgcolor="#A3CE9D">
			<td colspan="6" align="center"><font color="#000099"><b>Mês: 
			<?php
			$meses=array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Desembro", "Anual");
			$s=$_REQUEST['mes'];
			?></td>
			<td colspan="6" align="center"><font color="#000099"><b>ANO: <?php echo date("Y"); ?></td></tr>
	<?php
	include("contabilidade_curso.php");
	include("../constantes.php");// apresenta no do curso
	echo "<tr bgcolor=\"#C1F7F5\">";	
			  echo "<td width=\"65px\"><font size=\"2\" color=\"#000099\"><b>&nbsp;&nbsp;&nbsp;Dias</td>";
			  for ($o=0;$o<$font;$o++){
	 		  		echo "<td width=\"150px\"align=\"center\"><font size=\"2\" color=\"#000099\"><b>".$title[$o]."</td>";
			  }
		   	  echo "<td width=\50px\" align=\"center\"><font size=\"2\" color=\"#000099\"><b>Total</td></tr>";
	// apresenta o calculado
	for ($i=0;$i < 12;$i++){
		
		if (($i%2)=='1')echo "<tr bgcolor=\"#EBEBEB\" onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" >";
		else echo "<tr bgcolor=\"#CAC8C8\" onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" >";
		
			  echo "<td width=\"65px\"><font size=\"2\">&nbsp;&nbsp;&nbsp;".$meses[$i+1]."</td>";
			  for ($o=0;$o<$font;$o++){
	 		  		echo "<td width=\"150px\"align=\"center\"><font size=\"2\">".$anual[$i][$o]."</td>";
			  }
		   	  echo "<td width=\"40px\" align=\"center\"><font size=\"2\"><b>";
			  $rt=0;
			for ($r=0; $r<$font;$r++){
				$rt+=$anual[$i][$r];
				}
				$anual[$i][$font]=$rt;
			  echo $anual[$i][$font];
			  echo "</td>
			</tr>";
	}	// linha do resultado soma
 echo "<tr bgcolor=\"#000000\" onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" >";
			  echo "<td width=\"65px\" align=\"center\"><font size=\"2\" color=\"#FFFFFF\"><b>Total</td>";
			  for ($t=0;$t<$font;$t++){	
	 		   echo "<td width=\"150px\"align=\"center\"><font size=\"2\" color=\"#FFFFFF\"><b>";
			   $resul[$t]=0;
			  		for ($i=0;$i<12;$i++){
			  			$resul[$t]+=$anual[$i][$t];
					 }
			  echo $resul[$t];
			  echo "</td>";
			  }
	 		   echo "<td width=\"65px\"align=\"center\"><font size=\"2\" color=\"#FFFFFF\"><b>";
			  for ($i=0;$i<12;$i++){
			  $resultado[$font]+=$anual[$i][$font];
			  }
			  echo $resultado[$font];
			  echo "</td></tr>";
	?></table>
</body>
</html>