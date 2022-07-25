<?php

session_start();
include("conexao.php");
//include("project.php");

$user = $_SESSION['user'];

$pesquisa = "SELECT * from cadastro where user like '$user' or email like '$user'";
$pesquisaresultado = mysqli_query($connect, $pesquisa);
$row_usuario = mysqli_fetch_array($pesquisaresultado);



if($row_usuario['whitelist'] != 1){
    echo "<script>location.href='waiting.php'</script>";

}


?>

<head>
    <title>Login - VirtualRP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/logovr.svg" rel="shortcut icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/owl.carousel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/hover.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<body>

    <nav class="navbar navbar-expand-lg ">
        <div class="container d-flex justify-content-center align-items-center">
            <a class="navbar-brand" href="../"><img src="img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">


                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0 ">
                <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link bordernav" href="perfil.php"><img class="avatar mr-1" src="avatar/<?php echo $row_usuario['avatar']; ?>" alt="">
                            <?php echo $row_usuario['user']; ?></a>
                    </li>
                    <li class="nav-item active d-flex justify-content-center ">
                        <a class="nav-link " href="process.php">Inicio </a>
                    </li>
                    <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link" href="#">Loja</a>
                    </li> <li class="nav-item d-flex justify-content-center">
                        <?php if($row_usuario['admin'] == 1){echo "<a class='nav-link' href='admin.php'>Admin</a>";}?>
                    </li>
                    <li class="nav-item d-flex justify-content-center">
                        <?php if($row_usuario['whitelist'] == 0 || $row_usuario['whitelist'] == 2){echo "<a class='nav-link' href='whitelist.php'>Whitelist</a>";}?>
                    </li>

                    <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link" href="sair.php">Sair</a>
                    </li>
                </form>
            </div>
        </div>
    </nav>

    <section class="main d-flex justify-content-center align-items-center flex-column">
        <div class="d-flex justify-content-center align-items-center avisos">
            <div class="d-flex justify-content-center align-items-center flex-row">
                <img style="width:150px; margin-right: 30px;" src="img/certo.png" alt="">

                <h5 class="text-white">Parabéns <span><?php echo $row_usuario['user']; ?></span>, sua Whitelist foi aprovada !!!<br>
                    Agora você tem total acesso ao nosso servidor.<br><br>

                    Conecte com o IP: 192.168.0.1
                </h5>
            </div>

        </div>

    </section>
    <footer class="d-flex">
        <div class="container d-flex justify-content-between flex-lg-row flex-column align-items-center text-lg-right text-center">
            <img src="img/logovr.svg " alt=" ">
            <div>
                <p>® 2021 Virtual Roleplay<br> Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
</body>


<script>
    document.getElementById("register").addEventListener("click", function(event) {
        event.preventDefault()
        window.location.href = "register.php";

    });
</script>

<!-- Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js "></script>
<script src="js/meu.js "></script>
<script src="js/videomask.js "></script>
<script src="js/owl.carousel.min.js "></script>
<script src="js/main.js "></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js " integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ " crossorigin="anonymous "></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js " integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm " crossorigin="anonymous "></script>