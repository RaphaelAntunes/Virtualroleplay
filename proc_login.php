<?php

session_start();
include("conexao.php");

$login = $_POST['email'];
$senha = $_POST['senha'];

$pesquisa = "SELECT * from cadastro where (user like '$login' or email like '$login') and senha like '$senha'";
$pesquisaresultado = mysqli_query($connect, $pesquisa);
$row_usuario = mysqli_fetch_array($pesquisaresultado);
$rowtotal = $pesquisaresultado->num_rows;

//echo $rowtotal;

if($rowtotal == 0){
    $_SESSION['callback'] = "Usuario ou senha inválidos.";
    echo "<script>location.href='index.php'</script>";
}else{
    $_SESSION['user'] = $login;
    echo "<script>location.href='process.php'</script>";
}

