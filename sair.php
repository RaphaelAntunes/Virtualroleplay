<?php

session_start();
include("conexao.php");
include("project.php");

session_destroy();
echo "<script>location.href='index.php'</script>";


?>