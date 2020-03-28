<?php 
// Inicia sessões, para assim poder destruí-las 
session_start(); 
session_destroy(); 
$a='0';
header("Location: index.php"); 
?>
