<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco="test";

//$host = "localhost";
//$user = "virtualr_site";
//$pass = "8Iax8~d%WUK7";
//$banco="virtualr_site";

$connect = new mysqli($host, $user, $pass, $banco);

if(!$connect){

	die("Falha na Conexão:" . mysqli_connect_error());
}

mysqli_set_charset($connect,"utf8");
	
?>

