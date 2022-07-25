<?php
session_start();
include("conexao.php");


$user = $_POST['user'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha2  = $_POST['confirmsenha'];



$pesquisa = "SELECT * from cadastro where user like '$user' or email like '$email'";
$pesquisaresultado = mysqli_query($connect, $pesquisa);
$row_usuario = mysqli_fetch_array($pesquisaresultado);
$rowtotal = $pesquisaresultado->num_rows;

//echo $rowtotal;
if($rowtotal > 0){
    if($user == $row_usuario['user']){
    $_SESSION['callback'] = "Este nome de usuário já está em uso.";
    echo "<script>location.href='register.php'</script>";
}else{
    $_SESSION['callback'] = "Este e-mail já esta vinculado a outra conta.";
    echo "<script>location.href='register.php'</script>";
}

}else{

    $qry = "INSERT INTO `cadastro` (`user`, `email`, `senha`) VALUES ('$user', '$email', '$senha')";
    $qry_ok = mysqli_query($connect, $qry);
    $cod = base64_encode($email);
    $_SESSION['user'] = $user;
    echo "<script>location.href='send_mail.php?key=$cod&id=$user'</script>";}

