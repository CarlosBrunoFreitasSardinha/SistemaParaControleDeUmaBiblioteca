<html>
<head>
<script type="text/javascript">
	function livrar(valor){
			parent.document.getElementById("descricao").value = valor; 
			}
</script>
</head>
<body>
<?php
		echo "<table border=\"0\" height=\"20\" width=\"250\" cellpadding=\"0\" cellspacing=\"0\" hspace=\"0\" vspace=\"0\">
				<tr><form method=\"post\">
					<td>Origem:</td>
					<td align=\"right\"><input type=\"text\" size=\"22\"name=\"preco\" onChange=\"livrar(preco.value)\"/>
				<tr></table>";
?>
</body>
</html>