<?php

session_start();
include("conexao.php");

$pergunta1 = $_POST['pergunta1'];
$pergunta2 = $_POST['pergunta2'];
$pergunta3 = $_POST['pergunta3'];
$pergunta4 = $_POST['pergunta4'];
$pergunta5 = $_POST['pergunta5'];
$pergunta6 = $_POST['pergunta6'];
$pergunta7 = $_POST['pergunta7'];
$pergunta8 = $_POST['pergunta8'];
$pergunta9 = $_POST['pergunta9'];
$pergunta10 = $_POST['pergunta10'];
$pergunta11 = $_POST['pergunta11'];
$pergunta12 = $_POST['pergunta12'];
$id = $_SESSION['user'];


$pesquisa = "SELECT * from whitelist where user like '$id'";
$pesquisaresultado = mysqli_query($connect, $pesquisa);
$row_usuario = mysqli_fetch_array($pesquisaresultado);
$rowtotal = $pesquisaresultado->num_rows;

if ($rowtotal == 1) {
  $_SESSION['callback'] = "Sua Whitelist já foi foi respondida ou está em análise";
   echo "<script>location.href='main.php'</script>";
} else {
  $qry = "INSERT INTO `whitelist` (`questao1`, `questao2`, `questao3`,`questao4`,`questao5`,`questao6`,`questao7`,`questao8`,`questao9`,`questao10`,`questao11`,`questao12`,`user`, `make`) 
  VALUES ('$pergunta1','$pergunta2','$pergunta3','$pergunta4','$pergunta5','$pergunta6','$pergunta7','$pergunta8','$pergunta9','$pergunta10','$pergunta11','$pergunta12','$id', 1)";
  $qry_ok = mysqli_query($connect, $qry);
  $_SESSION['callback'] = "Whitelist enviada com sucesso ! Em breve receberá o retorno aqui mesmo, no proprio site :)";
  echo "<script>location.href='main.php'</script>";
}





