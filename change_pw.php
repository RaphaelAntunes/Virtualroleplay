<?php 

session_start();
include("conexao.php");

$user = $_SESSION['user'];
$antiga = $_POST['atual'];
$nova = $_POST['nova'];

$pesquisa = "SELECT * from cadastro where user like '$user' or email like '$user'";
$pesquisaresultado = mysqli_query($connect, $pesquisa);
$row_usuario = mysqli_fetch_array($pesquisaresultado);


if($row_usuario['senha'] == $antiga){
    $result_usuario = "UPDATE cadastro set senha = '$nova' WHERE user like '$user' or email like '$user'";
    $resultado_usuario = mysqli_query($connect, $result_usuario);
    $_SESSION['statuslogo'] = "A senha foi alterada com sucesso";
echo "<script>location.href='perfil.php'</script>";
}else{
    $_SESSION['statuslogo'] = "Sua senha atual está errada e não pode ser alterada.";
    echo "<script>location.href='perfil.php'</script>";
}