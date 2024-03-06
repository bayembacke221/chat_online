<?php
session_start();
require_once('../db/connect.php');
if (isset($_SESSION['numero'])) {
    $id = (int)$_POST['id'];


     $req2 =$BDD->prepare("SELECT * FROM message WHERE  emmetteur=? AND destinataire=? AND lu=?");
    $req2->execute(array($_SESSION['numero'],$id,1));
    $affiche_message=$req2->fetchAll();
   
    $req2 =$BDD->prepare("UPDATE  message SET lu= ? WHERE emmetteur=? AND destinataire=?");
    $req2->execute(array(0,$_SESSION['numero'],$id));
    foreach($affiche_message as $message){
        echo "<div class='conversation'>";
        echo 
        "<div  class=' talk droite'>
           <p>".nl2br($message['contenu'])."</p>";
        echo "</div>"; 
    }
    
}?>