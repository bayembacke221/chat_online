    
    
    <!--========== SCROLL REVEAL ==========-->
    <script src="../assets/dist/scrollreveal.js"></script>

    <!--========== BOOTSTRAP JS ==========-->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

     <!--========== JQUERY ==========-->
     <script src="../assets/jquery/jquery-3.6.0.min.js"></script>

      <!--========== LIGHTSLIDER JS ==========-->
      <script src="../assets/js/lightslider.js"></script>

    <!--========== MAIN JS ==========-->
    <script src="../assets/js/main.js"></script>
<?php

include("../ConnexionDB/connexionDB.php");
if (isset($_POST['key'])) {

    $key = "%{$_POST['key']}%";

    $sql = "SELECT * FROM service WHERE nom LIKE ?";
    $req = $BDD->prepare($sql);
    $req->execute([$key]);
    if($req->rowCount() > 0){ 
        $services = $req->fetchAll();

        foreach ($services as $service) {
           ?>
            <a href="nav/detail.php?t=<?=$service['idService']?>" class="nav__link">
                <h2 style="display:flex;justify-content:center;align-items:center"  class="idservice" id="affiche">
                    <?=$service['nom']?>
            </h2></a>
            <?php
        }
    }
}else {
    ?>
        <div class="alert alert-info 
                    text-center">
            <i class="fa fa-user-times d-block fs-big"></i>
            Le service "<?=htmlspecialchars($_POST['key'])?>"
            n'existe pas.
        </div>
    <?php
}

?>
<script >
    
//     var affiche = document.querySelectorAll("#affiche");
//    for(var i=0;i<affiche.length;i++){
//         affiche[i].addEventListener("mouseover",function (){
//             this.style.backgroundColor="#048654";
//             this.style.borderRadius=20+"px";
//         })
//         affiche[i].addEventListener("mouseout",function (){
//             this.style.backgroundColor="white";
//         })
//    }



   $(document).ready(function() {
        $(".idservice").click(function(){
            var idService=$(this).data('id');
            //alert(idService);
            $(".modal-title").html(idService)
        })
   })


</script>

