<?php

session_start();
include("conexao.php");
include("project.php");

$user = $_SESSION['user'];
$id = $_GET['id'];

$pesquisa = "SELECT * from cadastro where user like '$user' or email like '$user'";
$pesquisaresultado = mysqli_query($connect, $pesquisa);
$row_usuario = mysqli_fetch_array($pesquisaresultado);

if ($row_usuario['admin'] == 0) {
    echo "<script>location.href='main.php'</script>";
}

$pesquisa = "SELECT * from whitelist where user like '$id'";
$pesquisaresultado = mysqli_query($connect, $pesquisa);
$row_usuario = mysqli_fetch_array($pesquisaresultado);

?>

<style>
  .btn-aceitar {
            width: 150px;
            border-radius: 10px;
            height: 64px;
            color: white;
            background-color: #42730B;
        }
        
        .btn-negar {
            width: 150px;
            border-radius: 10px;
            height: 64px;
            color: white;
            background-color: #FF0000;
        }
</style>

<head>
    <title>Admin - VirtualRP</title>
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
                    </li>

                    <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link" href="sair.php">Sair</a>
                    </li>
                </form>
            </div>
        </div>
    </nav>

    <section class="whitelistcorrigir d-flex align-items-center flex-column">
        <h1>Você está vendo a Whitelist de: <span><?php echo $row_usuario['user'] ?></span></h1>
        <h2 class="mt-3">Descritivas:</h2>
        <h3 class="mt-5">O que é amor a vida ?</h3>
        <span2>R: <?php echo $row_usuario['questao1']; ?></span2>
        <div class="d-flex justify-content-center align-items-center flex-lg-row flex-column text-center">
            <div class="mr-lg-5 cx">
                <h3 class="mt-5">O que é "Metagaming" ?</h3>
                <span2>R: <?php echo $row_usuario['questao2']; ?></span2>
            </div>
            <div class="cx">
                <h3 class="mt-5">O que é "Power Gaming" ?</h3>
                <span2>R: <?php echo $row_usuario['questao3']; ?></span2>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-lg-row flex-column text-center">
            <div class="mr-lg-5 cx">
                <h3 class="mt-5">O que é "Combat Logging" ?</h3>
                <span2>R: <?php echo $row_usuario['questao4']; ?></span2>
            </div>
            <div class="cx">
                <h3 class="mt-5">O que é "Random Deathmatch" ?</h3>
                <span2>R: <?php echo $row_usuario['questao5']; ?></span2>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-lg-row flex-column text-center">
            <div class="mr-lg-5 cx">
                <h3 class="mt-5">O que é "Vehicle Deathmatch" ?</h3>
                <span2>R: <?php echo $row_usuario['questao6']; ?></span2>
            </div>
            <div class="cx">
                <h3 class="mt-5">O que é "Dark RolePlay" ?</h3>
                <span2>R: <?php echo $row_usuario['questao7']; ?></span2>
            </div>
        </div>

        <h2 class="mt-3">Optativas:</h2>
        <h3 class="mt-5">1) - <?php echo $row_usuario['questao8'] ?>{ <img width="20" src="<?php if ($row_usuario['questao8'] == 2) {
                                                                                                echo "img/ok.png";
                                                                                            } else {
                                                                                                echo "img/x.png";
                                                                                            } ?>" alt=""> }
            | 2) <?php echo $row_usuario['questao9'] ?>- { <img width="20" src="<?php if ($row_usuario['questao9'] == 4) {
                                                                                    echo "img/ok.png";
                                                                                } else {
                                                                                    echo "img/x.png";
                                                                                } ?>" alt=""> } |
            3) <?php echo $row_usuario['questao10'] ?>- { <img width="20" src="<?php if ($row_usuario['questao10'] == 1) {
                                                                                    echo "img/ok.png";
                                                                                } else {
                                                                                    echo "img/x.png";
                                                                                } ?>" alt=""> } |
            4) <?php echo $row_usuario['questao11'] ?>- { <img width="20" src="<?php if ($row_usuario['questao11'] == 3) {
                                                                                    echo "img/ok.png";
                                                                                } else {
                                                                                    echo "img/x.png";
                                                                                } ?>" alt="">} |
            5) <?php echo $row_usuario['questao12'] ?>- { <img width="20" src="<?php if ($row_usuario['questao12'] == 1) {
                                                                                    echo "img/ok.png";
                                                                                } else {
                                                                                    echo "img/x.png";
                                                                                } ?>" alt=""> } </h3>
        <div class="d-flex flex-lg-row flex-column justify-content-center align-items-center mt-5">
            <a href="whitelist_r.php?id=<?php echo $id;?>" class="mr-lg-5 mb-lg-0 mb-3"><button class="btn-negar">Remover</button></a>
            <a href="whitelist_a.php?id=<?php echo $id;?>" class="mb-lg-0 mb-3" ><button class="btn-aceitar">Aprovar</button></a>
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