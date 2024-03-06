<?php
session_start();
require_once('db/connect.php');
if(!empty($_POST)){
    if(isset($_POST['email']) &&
        isset($_POST['password'])){
        $password = $_POST['password'];
        $email = $_POST['email'];
        if(empty($email)){
            $em = "Ce champ est obligatoire";
            header("Location: index.php?error=$em");
        }else if(empty($password)){
            $em = "Mot de passe requis";

            header("Location: index.php?error=$em");
        }else {
            $sql  = "SELECT * FROM personne WHERE email=?";
            $stmt = $BDD->prepare($sql);
            $stmt->execute([$email]);

            if($stmt->rowCount() === 1){
                $user = $stmt->fetch();

                if ($user['email'] == $email) {
                    if ($password == $user['password']) {
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['nom'] = $user['nom'];
                        $_SESSION['prenom'] = $user['prenom'];
                        $_SESSION['numero'] = $user['numero'];
                        header("Location: page/accueil.php");

                    }else {
                        $em = "Mauvais mot de passe";

                        header("Location: index.php?error=$em");
                    }
                }else {

                    $em = "L'utilisateur saisie n'existe pas ";


                    header("Location: index.php?error=$em");
                }
            }
        }
    }else {
        header("Location: index.php");
        exit;
    }
}else{
    header("Location: index.php");
}