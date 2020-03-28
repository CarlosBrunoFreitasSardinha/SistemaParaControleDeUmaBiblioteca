<html>
	<head><title>Untitled Document</title>
	<style type="text/css">
	.luf{
		width:324px;
		border:hidden;}
	#n_1{
		width:650px;
		height:400px;
		border:hidden;}

	#inicio_1{
		width:325px;
		height:399px;
		float:left;
		border-right:solid 1px #0066CC;
		}
	#inicio_42{
		width:324px;
		height:399px;
		float:right;
		}
	#inicio_2{
		width:324px;
		height:199px;
		float:right;
		border-bottom:solid 1px #0066CC;}
		
		
	#inicio_4{
		width:324px;
		height:200px;
		float:right;}
	</style>
	</head>
	<body>
	<?php
	if($_SESSION['nivel_acesso']=='3')include("funcoes/bem_vindo_3.php");
	else if($_SESSION['nivel_acesso']=='2')include("funcoes/bem_vindo_2.php");
	else include("funcoes/bem_vindo.php");
	?>
	</body>
</html>
