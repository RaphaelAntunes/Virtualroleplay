<?php

session_start();
include("conexao.php");
include("project.php");

$user = $_SESSION['user'];


$pesquisa = "SELECT * from cadastro where user like '$user' or email like '$user'";
$pesquisaresultado = mysqli_query($connect, $pesquisa);
$row_usuario = mysqli_fetch_array($pesquisaresultado);

$qry = "SELECT * from whitelist where user like '$user'";
$qry_r = mysqli_query($connect, $qry);
$qr = mysqli_fetch_array($qry_r);

if($row_usuario['confirmado'] == 1 && $row_usuario['whitelist' == 1]){
    echo "<script>location.href='main.php'</script>";

}

else if($row_usuario['confirmado']!= 1){
    echo "<script>location.href='waiting.php'</script>";
}

else if($row_usuario['whitelist' == 0] && $row_usuario['confirmado'] == 1 && $qr['make'] == 0){
    echo "<script>location.href='whitelist.php'</script>";

}





?>