<?php

include("conexao.php");

if(!$_SESSION){
    $_SESSION['callback'] = "Autentique-se, você não está autenticado.";
    echo "<script>location.href='index.php'</script>";
}
?>