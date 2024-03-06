<?php
session_start();
if (!isset($_SESSION['email'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- Font Icon -->
        <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--========== BOX ICONS ==========-->
        <link href='assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/css/styles.css?t=<?php echo time(); ?>">


        <!-- STYLE CSS -->
        <link rel="stylesheet" href="assets/css/style.css?t=<?php echo time(); ?>">


        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

        <!--========== BOX ICONS ==========-->
        <link href='assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link  href="assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/css/styles.css?t=<?php echo time(); ?>">


    </head>
    <body>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="index.php" class="nav__link active-link">Accueil</a></li>
                    <li class="nav__item"><a href="#" class="nav__link ">Services</a></li>
                    <li class="nav__item"><a href="#" class="nav__link">Espace  Prestataire</a></li>
                    <li class="nav__item"><a href="#" class="nav__link">Espace Client</a></li>
                    <li class="nav__item"><a href="#" class="nav__link">Contactez nous</a></li>

                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>
    <br><br><br><br><br>
    <div class="fusion-layout-column fusion_builder_column fusion_builder_column_2_3 fusion-builder-column-3 fusion-two-third 2_3" style="margin-top:0px;margin-bottom:30px;width:100%; margin-right: 4%;">


    <section class="sign-in" >
        <div class="container" style="max-width: 60%;box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img style="border-radius: 10%;" src="assets/img/img1.jpg" alt="sing up image"></figure>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Se connecter</h2>
                    <form method="POST" action="traitementConnexion.php" enctype="multipart/form-data">
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-warning" role="alert">
                                <?php echo htmlspecialchars($_GET['error']);?> <!--Convertit les caractères spéciaux en entités HTML -->
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo htmlspecialchars($_GET['success']);?>
                            </div>
                        <?php }
                        ?>
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="email" id="email" placeholder="votre email"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="mot de passe"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Se connecter"/>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>



    <?php
    require_once('page/footer.php')

    ?>

    <!--========== SCROLL REVEAL ==========-->
    <script src="assets/dist/scrollreveal.js"></script>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/main.js"></script>


    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    </body>
    </html>
    <?php
}else{
    header("Location: index.php");
    exit;
}
?>