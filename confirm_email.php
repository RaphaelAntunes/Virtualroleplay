<?php 

include("conexao.php");
session_start();
$key = $_GET['key'];
$email = base64_decode($key);


$pesquisa = "UPDATE cadastro set confirmado = 1 where email like '$email'";
$pesquisaresultado = mysqli_query($connect, $pesquisa);

if($pesquisaresultado == 1){
    $_SESSION['callback'] = "Seu e-mail foi confirmado com exito, faça login para continuar !";
    echo "<script>location.href='process.php'</script>";
}



?>