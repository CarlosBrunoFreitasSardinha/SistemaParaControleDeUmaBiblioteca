<html>
<head>
<title>Tabela Empréstimo Diário</title>
</head>
<body><center>
	<table border="0" cellpadding="0" cellspacing="0" hspace="0" vspace="0">
		<tr bgcolor="#C1F7F5" height="25">
			<td colspan="12" align="center"><font color="#000099"><b>Relatório Empréstimo Mensal</td>
		</tr>
		<tr bgcolor="#A3CE9D">
			<td colspan="6" align="center"><font color="#000099"><b>Mês: 
			<?php
			$meses=array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Desembro");
			$s=$_REQUEST['mes'];
			echo $meses[($s-1)];
			?></td>
			<td colspan="6" align="center"><font color="#000099"><b>ANO: <?php echo date("Y"); ?></td>
		</tr>
	<?php
	include("contabilidade_curso.php");
	include("../constantes.php");
	// apresenta no do curso
	echo "<tr bgcolor=\"#C1F7F5\">";
		
			  echo "<td width=\"65px\"><font size=\"2\" color=\"#000099\"><b>&nbsp;&nbsp;&nbsp;Dias</td>";
			  for ($o=0;$o<$font;$o++){
	 		  		echo "<td width=\"45px\"align=\"center\"><font size=\"2\" color=\"##000099\"><b>".$title[$o]."</td>";
			  }
		   	  echo "<td width=\"40px\" align=\"center\"><font size=\"2\" color=\"#000099\"><b>Total</td></tr>";
	// apresenta o calculado
	
	for ($i=0;$i < $mes[$mez-1];$i++){
		
		if (($i%2)=='1')echo "<tr bgcolor=\"#EBEBEB\" onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" >";
		else echo "<tr bgcolor=\"#CAC8C8\" onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" >";
		
			  echo "<td width=\"65px\"><font size=\"2\">&nbsp;&nbsp;&nbsp;".($i+'1')."</td>";
			  for ($o=0;$o<$font;$o++){
	 		  		echo "<td width=\"150px\"align=\"center\"><font size=\"2\">".$as[$i][$o]."</td>";
			  }
		   	  echo "<td width=\"40px\" align=\"center\"><font size=\"2\"><b>";
			  $rt=0;
			for ($r=0; $r<10;$r++){
				$rt+=$as[$i][$r];
				}
			  echo $rt;
			  echo "</td>
			</tr>";
	}
	// linha do resultado soma
	
	?>
		<tr>
			<td colspan="12" align="center">&nbsp;</td>
		</tr>
	<?php
		echo "<tr bgcolor=\"#000000\" onMouseOut=\"this.style.background=''\"  onmouseover=\"this.style.background='#9EDAB0';\" >";
		  echo "<td width=\"\"><font color=\"#ffffff\"><b><center>Total:&nbsp; </td>";
		  for ($o=0;$o<$font;$o++){
		 	  echo "<td width=\"\"><font color=\"#ffffff\"><b><center>".$qt_curso[$o]['0']."</td>";
			  }
		  echo "<td width=\"\"><font color=\"#ffffff\"><b><center>";
			  $rtr=0;
			for ($r=0; $r<10;$r++){
				$rtr+=$qt_curso[$r]['0'];
				}
			  echo $rtr;
			  echo "</td>
			</tr>";
	?>
	</table>
</body>
</html>
