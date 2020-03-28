<?php
// Inicia sessões 
session_start(); 

// Recupera o login 
$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE; 
// Recupera a senha, a criptografando em MD5 
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE; 
global $a;
$a=0;
$a=$_POST['valor'];
if ($_SESSION['nivel_acesso']!='1' && $_SESSION['nivel_acesso']!='2' && $_SESSION['nivel_acesso']!='3'){
	if ($a=='1'){
		if (!$login || !$senha) { 
    		echo "Você deve digitar sua senha e login!";
			$a='0';
		 }
		else if(!(!$login || !$senha)){
			 $a='1';
			 include ("include/conect_banco.php");
			 $sql=mysql_query("SELECT * FROM usuarios WHERE matricula='$login'")or die("Erro no Comando SQL: ".mysql_error());
			 $linhas=mysql_num_rows($sql);
		 		if ($linhas>0){
		 			$SQL=mysql_fetch_array($sql);
					if (!strcmp($SQL['senha'],$senha)){
						$_SESSION['nivel_acesso']=$SQL['nivel_acesso'];
						$_SESSION['matricula']=$SQL['matricula'];
						}else echo "Senha incorreta!<br><br>";
		 		 }
		 }
		else{
		 	echo "Login Inexistente.../>";
		}
	}
}

?><html>
<head>
	<title>.:Biblioteca Campus Paraíso TO:.</title>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<script type="text/javascript">
		s=0;
function val(W){
		s=W;
		}
function TestaVal() {
	if (document.Fo.string.value == "" || document.Fo.string.value == " "){
		alert ("Palavra Chave Para Busca não inserida...Preencha o campo e tente novamente!");
		return false 
		}
	if (s== '0'){
		alert ("Você não selecionou uma opção de pesquisa...Selecione e tente Novamente!")
		return false 
		}
}</script>
</head>
<body>
<center>
<table id="tab" id="detalhe" height="660" width="900" cellpadding="0" cellspacing="0">
	<tr  height="165" bgcolor="#000000">
		<td colspan="2" id="fil">
			<table width="900" height="157" border="0" cellpadding="0" cellspacing="0" hspace="0" vspace="0">
				<tr>
					<td width="600"></td>
					<td height="3"><td width="300" align="left">
						<table width="300" height="155" border="0" cellpadding="0" cellspacing="0" hspace="0" vspace="0">
						<tr height="12">
							<td width="55">&nbsp;</td>
							<td width="95">&nbsp;</td>
							<td colspan="2"></td></tr>
						<tr height="88">
							<td width="55">&nbsp;</td>
							<td width="95">&nbsp;</td>
							<td width="92">&nbsp;</td>
							<td width="48">&nbsp;</td></tr>
						
						<tr height="12">
							<td width="55">&nbsp;</td>
							<td width="95">
							<?php if($_SESSION['nivel_acesso']=='1' || $_SESSION['nivel_acesso']=='2' || $_SESSION['nivel_acesso']=='3')echo "<p align=\"right\"><font color=\"#FFFFFF\">O Usuário";$a=0;?>
							<?php 
							 if($_SESSION['nivel_acesso']!='1' && $_SESSION['nivel_acesso']!='2' && $_SESSION['nivel_acesso']!='3')echo"
							<form action=\"index.php\" method=\"post\"><font color=\"#FFFFFF\">Login</font>";?></td>
							<td colspan="2">
							<?php if($_SESSION['nivel_acesso']=='1' || $_SESSION['nivel_acesso']=='2' || $_SESSION['nivel_acesso']=='3')echo "<font color=\"#ffffff\"> &nbsp;Deseja <a href=\"sair.php\" id=\"linksessao\">Efetuar Logoff</a>";?>
							<?php 
							 if($_SESSION['nivel_acesso']!='1' && $_SESSION['nivel_acesso']!='2' && $_SESSION['nivel_acesso']!='3')echo"<input type=\"text\" name=\"login\" maxlength=\"9\" size=\"10\"/>";?></td></tr>
						<tr height="10">
							<td width="55">&nbsp;</td>
							<td width="95"><?php 
							 if($_SESSION['nivel_acesso']!='1' && $_SESSION['nivel_acesso']!='2' && $_SESSION['nivel_acesso']!='3')echo"<font color=\"#FFFFFF\">Senha</font>";?></td>
							<?php 
							echo"<input name=\"valor\" type=\"hidden\" value=\"1\"/>";?>
						  	<td width="92"><?php if($_SESSION['nivel_acesso']!='1' && $_SESSION['nivel_acesso']!='2' && $_SESSION['nivel_acesso']!='3')echo"<input name=\"senha\" type=\"password\" maxlength=\"9\" size=\"10\"/>";?></td>
					  		<td width="48"><?php if($_SESSION['nivel_acesso']!='1' && $_SESSION['nivel_acesso']!='2' && $_SESSION['nivel_acesso']!='3')echo"<input type=\"submit\" name=\"enviar\" value=\"Logar\"/></form>";?></td>
							</tr></table></td>
				</tr>
</table></td>
	</tr>
	<tr>
	  <td colspan="2" height="25">
	  <table width="900" height="25" bgcolor="#000000" border="0" cellpadding="0" cellspacing="0" hspace="0" vspace="0">
        <tr>
			<?php 
			require "constantes.php";
          	echo "<form action=\"index.php?acao=$P\" method=\"post\" onSubmit=\"return TestaVal()\" name=\"Fo\" >";?>
            <td width="214" align="center"><strong>
<font color="#FFFFFF" size="3"> Pesquisar por:&nbsp;&nbsp;&nbsp; <input type="radio" name="opcao" value="1" onClick="val(1)"/>Editora</font></strong></td>
            <td width="75"><strong><font color="#FFFFFF" size="3"><input type="radio" name="opcao" value="2" onClick="val(2)"/> Autor</font></strong></td>
            <td width="77"><strong><font color="#FFFFFF" size="3"><input type="radio" name="opcao" value="3" onClick="val(3)"/>Titulo</font></strong></td>
            <td width="125"><strong><font color="#FFFFFF" size="3"><input type="radio" name="opcao" value="4" onClick="val(4)"/> Assuntos</font></strong></td>
          <td width="409" align="left"><strong><input type="text" name="string" size="45" value=""/>
		  <?php 
			include_once("constantes.php");
				global $pesquisa;
				$pesquisa=NULL;
				$pesquisa=$_POST['string'];
				echo "<input type=\"hidden\" name=\"aux\"  value=\"".$pesquisa."\"/>" ;?>
		  <input name="Pesquisar" type="submit" value="Pesquisar"/></form> 
	        </strong></td></tr></table></td>
	</tr>
	<tr valign="top">
	<td width="215px" rowspan="2" align="left" bgcolor="#EBEBEB" background="images/repet.gif">
		<table border="0" hspace="0" vspace="0" width="245px" height="450px" background="images/plano.gif" style="background-repeat:no-repeat">
			<tr valign="top">
				<td height="31">
					<img src="images/index_2.gif" width="24" height="24" alt=""></td>
				<td rowspan="8">
				<?php
				include("menu.php")
				?>
				</td>
			</tr>
			<tr>
				<td height="28">
					<?php if($_SESSION['nivel_acesso']=='3'||$_SESSION['nivel_acesso']=='2'||$_SESSION['nivel_acesso']=='1')echo "<img src=\"images/index_2.gif\" width=\"24\" height=\"24\">";?></td>
		  </tr>
			<tr>
				<td height="28">
					<?php if($_SESSION['nivel_acesso']=='3'||$_SESSION['nivel_acesso']=='2')echo "<img src=\"images/index_2.gif\" width=\"24\" height=\"24\">";?></td>
		  </tr>
			<tr>
				<td height="32">
					<?php if($_SESSION['nivel_acesso']=='3'||$_SESSION['nivel_acesso']=='2')echo "<img src=\"images/index_2.gif\" width=\"24\" height=\"24\">";?></td>
		  </tr>
			<tr>
				<td height="29">
					<?php if($_SESSION['nivel_acesso']=='3')echo "<img src=\"images/index_2.gif\" width=\"24\" height=\"24\">";?></td>
		  </tr>
			<tr>
				<td height="28">
					<?php if($_SESSION['nivel_acesso']=='3')echo "<img src=\"images/index_2.gif\" width=\"24\" height=\"24\">";?></td>
		  </tr>
			<tr>
				<td height="29">
					<?php if($_SESSION['nivel_acesso']=='3')echo "<img src=\"images/index_2.gif\" width=\"24\" height=\"24\">";?></td>
		  </tr>
			<tr>
				<td height="26">
					<?php if($_SESSION['nivel_acesso']=='3')echo "<img src=\"images/index_2.gif\" width=\"24\" height=\"24\">";?></td>
		  </tr>
		  <tr>
		  <td colspan="2"></td></tr>
		</table>
	</td>
	  <td width="569" height="45px" valign="middle" align="center" background="images/s.jpg"><font color="#000000" size="+2"><?php include("titulo.php");?></td>
	</tr>
	<tr valign="top">
		<td align="center">
		<?php
		include("corpo.php");
			?></td>
	</tr>
	<tr>
		<td colspan="2" height="25" bgcolor="#CAC8C8">
		  <img src="images/index_2_25.gif" width="838" height="34" alt=""></td></tr></table>
</body>
</html>