<?php
session_start();
require_once('../db/connect.php');
if (isset($_SESSION['numero'])) {
    $idE = $_GET['id'];
    $req =$BDD->prepare("SELECT * FROM message WHERE (emmetteur=? AND destinataire=?) OR (emmetteur=? AND destinataire=?)
   ORDER BY dateHeure ");
    $req->execute(array($_SESSION['numero'],$idE,$idE,$_SESSION['numero']));
    $affiche_message=$req->fetchAll();
    ?>
    <?php
    foreach ($affiche_message as $message){
        ?>
        <div class='conversation'>
            <?php
            if ($message['emmetteur']==$_SESSION['numero']){
                ?>
                <div  class=' talk droite'>
                    <p><?=$message['contenu']?></p>
                    <small class='d-block '></small>
                </div>
            <?php }  if ($message['destinataire']==$_SESSION['numero']) {
                ?>
                <div  class='talk gauch'>
                    <p><?=$message['contenu']?></p>
                    <small class='d-block '> </small>
                </div>
            <?php }?>
        </div>
        <?php
    }
}
?>