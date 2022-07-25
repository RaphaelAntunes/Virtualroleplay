<?php 

session_start();
include("conexao.php");
include("project.php");

$id = $_SESSION['user'];

$pesquisa = "SELECT * from cadastro where user like '$id' or email like '$id'";
$pesquisaresultado = mysqli_query($connect, $pesquisa);
$row_usuario = mysqli_fetch_array($pesquisaresultado);

$qry = "SELECT * from whitelist where user like '$id'";
$qry_r = mysqli_query($connect, $qry);
$qr = mysqli_fetch_array($qry_r);

if($row_usuario['confirmado'] != 1){
    echo "<script>location.href='process.php'</script>";
}
if($qr['make'] == 1){
    $_SESSION['callback'] = "Sua Whitelist está em análise, aguarde mais um pouco";
    echo "<script>location.href='process.php'</script>";
}
if($row_usuario['whitelist'] == 1){
    $_SESSION['callback'] = "Sua Whitelist já foi corrigida!";
    echo "<script>location.href='process.php'</script>";
}


?>

<head>
    <title>Cadastro - VirtualRP</title>
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
                            <a class="nav-link " href="main.php">Inicio </a>
                        </li>
                        <li class="nav-item d-flex justify-content-center">
                            <a class="nav-link" href="#">Loja</a>
                        </li>
                        <li class="nav-item d-flex justify-content-center">
                            <a class="nav-link" href="#">Sobre</a>
                        </li>
                        <li class="nav-item d-flex justify-content-center">
                            <a class="nav-link" href="#">Contato</a>
                        </li>
                        <li class="nav-item d-flex justify-content-center">
                            <a class="nav-link" href="sair.php">Sair</a>
                        </li>
                    </form>
                </div>
            </div>
        </nav>

        <section class="conteudo d-flex justify-content-center align-items-center">
            <div class="d-flex justify-content-center align-items-center box2">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <img src="img/logovr2.png" alt="">
                    <h1>Bem vindo a Whitelist do VirtualRoleplay.<br> Você terá a resposta da sua Whitelist aqui mesmo no site, basta aguardar e verificar.</h1>
                    <div class="boxformlist d-flex justify-content-center align-items-center flex-column mt-5">
                        <form action="proc_whitelist.php" method="POST" class="d-flex justify-content-center align-items-center flex-column">
                            <!-------------- PERGUNTAS DA WHITELIST 1 -->
                            <div id="perguntas1" class="perguntas1 text">
                                <h2 class="mb-5 text-center">Questões Descritivas</h2>
                                <div class="d-flex justify-content-between flex-lg-row flex-column">
                                    <div class="item-formlist mb-3 mr-lg-5">
                                        <label for="">O que é "Amor a vida" ?</label>
                                        <input name="pergunta1" type="text" required>
                                    </div>
                                    <div class="item-formlist mb-3">
                                        <label for="">O que é "Metagaming" ?</label>
                                        <input name="pergunta2" type="text" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between flex-lg-row flex-column">
                                    <div class="item-formlist mb-3 mr-lg-5">
                                        <label for="">O que é "Power Gaming" ?</label>
                                        <input name="pergunta3" type="text" required>
                                    </div>
                                    <div class="item-formlist mb-3">
                                        <label for="">O que é "Combat Logging" ? </label>
                                        <input name="pergunta4" type="text" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between flex-lg-row flex-column">
                                    <div class="item-formlist mb-3 mr-lg-5">
                                        <label for="">O que é "Random Deathmatch" ?</label>
                                        <input name="pergunta5" type="text" required>
                                    </div>
                                    <div class="item-formlist mb-3">
                                        <label for="">O que é "Vehicle Deathmatch" ?</label>
                                        <input name="pergunta6" type="text" required>
                                    </div>
                                </div>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="item-formlist mb-3 d-flex flex-column justify-content-center align-items-center">
                                        <label for="">O que é "Dark RolePlay" ?</label>
                                        <input name="pergunta7" type="text" required>
                                    </div>


                                    <div class="item-formlist d-flex mt-3 justify-content-center">
                                        <button type="submit" id="btnproximo" class="btn-login">Proximo >></button>
                                    </div>
                                </div>
                            </div>
                            <!-------------- PERGUNTAS DA WHITELIST 2 -->
                            <div id="perguntas2" class="perguntas2 text-center">
                                <h2 class="mb-5">Questões Optativas</h2>
                                <div class="d-flex justify-content-between flex-lg-row flex-column">
                                    <!-------------- 1-->
                                    <div class="item-formlist mb-3 mr-lg-5 align-self-end">
                                        <label for="">Em uma situação onde um motorista atropela conscientemente pessoas na
                                        rua é considerado:<br><br></label>
                                        <select name="pergunta8" class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                                        <option selected>Escolher...</option>
                                        <option value="1">Dentro do roleplay pois o motorista estava bêbado.</option>
                                        <option value="2">Anti-roleplay pois é Vehicle deathmatch.</option>
                                        <option value="3">Metagaming pois ele sabia que as pessoas estavam na rua.
                                        </option>
                                        <option value="4">Situação normal, tem que atropelar para gerar roleplay.
                                        </option>
                                    </select>
                                        <!--------------2 -->
                                    </div>
                                    <div class="item-formlist mb-3 align-self-end">
                                        <label for="">O indivíduo está fugindo da Policia Militar na ponte da Groove-Street
                                        e para despistar ele pula da ponte e sai correndo, isso é considerado:</label>
                                        <select name="pergunta9" class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                                        <option selected>Escolher...</option>
                                        <option value="1"> Normal, a cima de tudo você tem que fugir e preservar sua
                                            vida.</option>
                                        <option value="2">Anti-roleplay, isso é "Random Death Match". </option>
                                        <option value="3">Anti-roleplay do Policial, não pode perseguir próximo da
                                            Groove-Street.</option>
                                        <option value="4">Anti-roleplay, isso é "Power Gaming".</option>
                                    </select>
                                    </div>
                                    <!--------------3 -->
                                </div>
                                <div class="d-flex justify-content-between flex-lg-row flex-column align-self-end">
                                    <div class="item-formlist mb-3 mr-lg-5">
                                        <label for="">Um indivíduo está indo ao hospital armado e decide atirar em todos os médicos e mata-los, isso é um caso de:<br><br></label>
                                        <select name="pergunta10" class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                                        <option selected>Escolher...</option>
                                        <option value="1">Random Deathmatch</option>
                                        <option value="2">Vehicle Deathmatch</option>
                                        <option value="3">Power Gaming</option>
                                        <option value="4">Livre arbítrio</option>
                                    </select>
                                        <!--------------4 -->
                                    </div>
                                    <div class="item-formlist mb-3 align-self-end">
                                        <label for="">No meio de uma rota um membro da facção PCC está sendo perseguido pela Policia Militar em um determinado ponto do percurso ele desconecta da cidade, isso é:</label>
                                        <select name="pergunta11" class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                                        <option selected>Escolher...</option>
                                        <option value="1">O correto, pois ele iria ser preso.</option>
                                        <option value="2">Certo, pois é "Combat Logging"</option>
                                        <option value="3">Errado, pois é "Combat Logging"</option>
                                        <option value="4">"Metagaming" porque ele sabia que seria preso.</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="d-flex d-flex flex-column justify-content-center align-items-center align-self-end ">
                                    <div class="item-formlist mb-3 ">
                                        <label for="">Em uma situação roleplay cinco indivíduos enquadram uma mulher em uma rua e a chamam de palavras de baixo calão e tentam toca-la, situações como essa ou semelhantes são consideradas: </label>
                                        <select name="pergunta12" class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                                        <option selected>Escolher...</option>
                                        <option value="1">Extremamente proibidas pois é um Dark Roleplay.</option>
                                        <option value="2">Corretas</option>
                                        <option value="3">Certas</option>
                                        <option value="4">Confortáveis</option>
                                    </select>
                                    </div>

                                    <div class="item-formlist d-flex mt-3 flex-row ">
                                        <button id="btnvoltar" type="submit" class="btn-voltar mr-lg-4">Voltar</button>
                                        <button type="submit" class="btn-login">Enviar Whitelist</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
        document.getElementById("btnproximo").addEventListener("click", function(event) {
            event.preventDefault()
            document.getElementById('perguntas1').style.display = 'none';
            document.getElementById('perguntas2').style.display = 'inline';
        });
    </script>
    <script>
        document.getElementById("btnvoltar").addEventListener("click", function(event) {
            event.preventDefault()
            document.getElementById('perguntas1').style.display = 'inline';
            document.getElementById('perguntas2').style.display = 'none';
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