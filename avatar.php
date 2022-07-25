<?php 

session_start();
include("conexao.php");

$name = $_SESSION['user'];



if(isset($_POST['enviar-formulario'])):

    $formatosPermitidos = array("png", "jpg", "svg", "jpeg");
    $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
    
    if(in_array($extensao, $formatosPermitidos)):
    
        $pasta = "avatar/";
        $temporario = $_FILES['arquivo']['tmp_name'];
        $novoNome =    $name.".$extensao";
               
       
    
    if(move_uploaded_file($temporario, $pasta.$novoNome)):
        $_SESSION['statuslogo'] = "Sua foto de perfil, foi alterada com sucesso";
      //  $result_usuario = "UPDATE clientes SET ext = '$extensao' WHERE empresa='$table'";
        $result_usuario = "UPDATE cadastro set avatar = '$novoNome' WHERE user like '$name'";
        $resultado_usuario = mysqli_query($connect, $result_usuario);
echo "<script>location.href='perfil.php'</script>";
    
    else:
        $_SESSION['statuslogo'] = "Não foi possivel atualizar a foto de perfil";
echo "<script>location.href='perfil.php'</script>";
    endif;   
    else:
        $_SESSION['statuslogo'] = "Formato Invalido <br>(Validos: PNG, JPG, SVG, JPEG)";
echo "<script>location.href='perfil.php'</script>";
    endif;
    
    
    endif;
