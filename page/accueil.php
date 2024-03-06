<?php
session_start();
require_once('../db/connect.php');
require_once('../function/function.php');
if (isset($_SESSION['email'])) {
    $user = getUser($_SESSION['numero'], $BDD);



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

        <!--========== BOOTSTRAP ==========-->
        <link href='../assets/bootstrap/css/bootstrap.min.css' rel='stylesheet'>


        <!--========== LIGHRSLIDE CSS ==========-->
        <link href='../assets/css/lightslider.css' rel='stylesheet'>


        <!--========== CSS ==========-->
        <link href="../assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >

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
                    <li class="nav__item"><a href="accueil.php" class=" nav__link active-link"><i class="bx bxs-home"></i> Accueil</a></li>
                    <li class="nav__item"><a href="messagerie.php" class="nav__link "><i class="bx bxs-message-alt-detail"></i>Messagerie</a></li>
                    <li class="nav__item"><a href="suivi.php" class="nav__link">Suivis des demandes</a></li>
                    <li class="nav__item"><a href="#" class="nav__link">Favoris</a></li>
                    <li class="nav__item"><a href="logout.php" class="nav__link">Deconnexion</a></li>
                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <?php
    require_once('list_users.php');
    ?>


    <?php
    require_once('../page/footer.php');
    ?>

    <!--========== SCROLL REVEAL ==========-->
    <script src="../assets/dist/scrollreveal.js"></script>

    <!--========== SCROLL REVEAL ==========-->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    <!--========== BOOTSTRAP JS ==========-->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    <!--========== JQUERY ==========-->
    <script src="../assets/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/jquery/jquery.min.js"></script>

    <!--========== LIGHTSLIDER JS ==========-->
    <script src="../assets/js/lightslider.js"></script>


    <!--========== MAIN JS ==========-->
    <script src="../assets/js/main.js"></script>

    </body>
    </html>

    <?php
}else{
    header("Location: ../index.php");
    exit;
}
?>