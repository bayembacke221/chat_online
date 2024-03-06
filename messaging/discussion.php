<?php
session_start();
require_once('../db/connect.php');
require_once('../function/function.php');
if (isset($_SESSION['numero']) ) {
    $user = getUser($_SESSION['numero'],$BDD);
    $idE = (int) trim($_GET['id']);
    if (isset($_POST['msg'])) {
        $message = trim($_POST['msg']);
        $dateMess = date("Y-m-d h:i:s");
        $lu=0;

        $req="INSERT INTO message(contenu,emmetteur,destinataire,dateHeure,lu) 
           VALUES(?,?,?,?,?)";
        $res=$BDD->prepare($req);
        $res->bindParam(1,$message);
        $res->bindParam(2,$_SESSION['numero']);
        $res->bindParam(3,$idE);
        $res->bindParam(4,$dateMess);
        $res->bindParam(5,$lu);
        $res->execute();
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="../assets/fonts/material-icon/css/material-design-iconic-font.min.css">

        <!--========== BOX ICONS ==========-->
        <link href='../assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!--========== LIGHRSLIDE CSS ==========-->
        <link href='../assets/css/lightslider.css' rel='stylesheet'>

        <!--========== SWEET ALERT CSS ==========-->
        <link href='../assets/css/sweetalert2.min.css' rel='stylesheet'>


        <!--========== CSS ==========-->
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="../assets/style.css?t=<?php echo time(); ?>">

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="../assets/css/styles.css?t=<?php echo time(); ?>">



        <!-- STYLE CSS -->
        <link rel="stylesheet" href="../assets/css/style.css?t=<?php echo time(); ?>">
    </head>
    <body>
    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="../page/accueil.php" class=" nav__link active-link"><i class="bx bxs-home"></i> Accueil</a></li>
                    <li class="nav__item"><a href="../page/suivi.php" class="nav__link">Suivis des demandes</a></li>
                    <li class="nav__item"><a href="../page/logout.php" class="nav__link">Se deconnecter</a></li>
                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>



    <div style="width:60%;margin-top:10%;margin-left:20%;" class="nav-top">
        <div class="location">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="../page/suivi.php">
                        <i id="chevron_width" class="bx bx-chevron-left"> Retour</i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="utilisateur">
            <i class=" bx bxs-circle"></i>
            <div class="d-flex align-items-center">
                <img style="max-width:50%" src="https://www.tomsguide.fr/content/uploads/sites/2/2022/05/avatar-4-est-entre-en-production-declare-james-cameron.jpg"class="card-img  rounded-circle">
            </div>
            <p id="prenom"></p>
            <p id="nom"> </p>
        </div>
    </div>


    <div style="width:60%;margin-top:15%; " class="form-group chat-global mysms">

        <div  class="scrollBarre" id="load">
            <div  id='charger-message'>


            </div>
            <div id="charger-messages">

            </div>
        </div>
        <form method="post" id="envoyer" enctype="multipart/form-data"  class="chat-form">
            <div style="width:30%;margin:auto;display:flex;" class="input-group mb-1 container-inputs-stuffs">
                <div class="files-logo-cont" id="uploadFile">
                </div>
                <div class="group-inp">
                    <textarea cols="3" id="msg" name="msg" class="form-control">

                    </textarea>
                </div>
                <button type="submit" name="envoyer" class="btn btn-success submit-msg-btn" id="sendBtn">
                    <i class='bx bxl-telegram vendor'></i>
                </button>
            </div>
        </form>

    </div>


    <?php
    require_once('../page/footer.php');
    ?>
    <!--========== SCROLL REVEAL ==========-->
    <script src="../assets/dist/scrollreveal.js"></script>

    <!--========== BOOTSTRAP JS ==========-->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    <!--========== LIGHTSLIDER JS ==========-->
    <script src="../assets/js/lightslider.js"></script>

    <!--========== JQUERY ==========-->
    <script src="../assets/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/jquery/jquery.min.js"></script>


    <!--========== MAIN JS ==========-->
    <script src="../assets/js/main.js"></script>

    <script >
        var scrollDown = function(){
            var chatBox = document.getElementById('load');
            chatBox.scrollTop = chatBox.scrollHeight;
        }
        scrollDown();


        setInterval( function(){
            id = <?php echo json_encode($idE); ?>;
            info ='?id='+id;
            var xhr=new XMLHttpRequest();
            var url="affiche_message.php";
            url+=info;
            //alert(url)
            xhr.open('POST',url);
            xhr.send(null);

            xhr.onreadystatechange=function()
            {

                if (xhr.readyState == 4 && xhr.status == 200)
                {
                    document.querySelector("#charger-message").innerHTML=xhr.responseText;
                    scrollDown();
                }
            }
        },100);

    </script>
    </body>
    </html>
    <?php
}else{
    header("Location: ../index.php");
    exit;
}
?>