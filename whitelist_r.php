<?php

session_start();
include("conexao.php");
include("project.php");

$id = $_GET['id'];




$pesquisa = "UPDATE cadastro set whitelist = 2 where user like '$id'";
$pesquisaresultado = mysqli_query($connect, $pesquisa);
echo $pesquisaresultado;

if($pesquisaresultado == 1){

    $pesquisa = "DELETE from whitelist where user like '$id'";
    $pesquisaresultado = mysqli_query($connect, $pesquisa);

    echo "<script>location.href='clients_whitelist.php'</script>";

}
