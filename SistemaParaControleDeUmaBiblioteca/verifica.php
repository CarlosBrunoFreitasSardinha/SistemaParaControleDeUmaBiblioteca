<?php
// Inicia sessões 
session_start(); 

// Recupera o login 
$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE; 
// Recupera a senha, a criptografando em MD5 
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE; 

	if (!$login || !$senha) { 
    	echo "Você deve digitar sua senha e login!";
		header("Location: index.php"); 
	}
	else if(!(!$login || !$senha)){
		 include ("include/conect_banco.php");
		 $sql=mysql_query("SELECT * FROM usuarios WHERE matricula='$login'")or die("Erro no Comando SQL: ".mysql_error());
		 $linhas=mysql_num_rows($sql);
		 if ($linhas>0){
		 	$SQL=mysql_fetch_array($sql);
			$_SESSION['nivel_acesso']=$SQL['nivel_acesso'];
			}
			else{
			 	echo "Login Inexistente...<br><br>";
				header("Location: index.php"); 
			}
	}
?>