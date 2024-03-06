<?php
$friendRequest = getFriendRequestByNumero($BDD,$_SESSION['numero']);
$friendRequestFromMember = getFriendRequestFromMemberByNumero($BDD,$_SESSION['numero']);
$friendList = getFriendListByNumero($BDD,$_SESSION['numero']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/list_users.css?t=<?php echo time(); ?>">
    <link  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel='stylesheet' >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center activity">
                <div><span class="activity-done">Mes demandes</span></div>
            </div>
            <div class="mt-3">
                <ul class="list list-inline">
                    <?php
                    foreach ($friendRequest as $user) {
                        ?>
                        <li class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"><i class="fa fa-check-circle checkicon"></i>
                                <div class="ml-2">
                                    <h6 class="mb-0"><?=$user['prenom']?> <?=$user['nom']?></h6>
                                    <div class="d-flex flex-row mt-1 text-black-50 date-time">
                                        <div><i class="fa fa-mail-forward"></i><span class="ml-2"><?=$user['email']?></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column mr-2">
                                    <div class="profile-image"><img class="rounded-circle" src="https://cdn-icons-png.flaticon.com/512/598/598364.png" width="30"/>
                                    </div><span class="date-time"><?=$user['DateDemande']?></span></div>

                                    <div><span class="activity-done">Demande envoyee</span></div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center activity">
                <div><span class="activity-done">Les demandes recus</span></div>
            </div>
            <div class="mt-3">
                <ul class="list list-inline">
                    <?php
                    foreach ($friendRequestFromMember as $user) {
                        ?>
                        <li class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"><i class="fa fa-check-circle checkicon"></i>
                                <div class="ml-2">
                                    <h6 class="mb-0"><?=$user['prenom']?> <?=$user['nom']?></h6>
                                    <div class="d-flex flex-row mt-1 text-black-50 date-time">
                                        <div><i class="fa fa-mail-forward"></i><span class="ml-2"><?=$user['email']?></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column mr-2">
                                    <div class="profile-image"><img class="rounded-circle" src="https://cdn-icons-png.flaticon.com/512/598/598364.png" width="30"/>
                                    </div><span class="date-time"><?=$user['DateDemande']?></span></div>
                                <?php
                                if ($user['etat'] == 0) {
                                    ?>
                                    <button class="btn btn-primary update-friend-btn" data-user-id="<?=$user['numero']?>">Accepter</button>
                                    <?php
                                } else {
                                    ?>
                                    <button class="btn btn-success" disabled>Ami</button>
                                    <?php
                                }
                                ?>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center activity">
                <div><span class="activity-done">Mes demandes</span></div>
            </div>
            <div class="mt-3">
                <ul class="list list-inline">
                    <?php
                    foreach ($friendList as $user) {
                        ?>
                        <li class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center"><i class="fa fa-check-circle checkicon"></i>
                                <div class="ml-2">
                                    <h6 class="mb-0"><?=$user['prenom']?> <?=$user['nom']?></h6>
                                    <div class="d-flex flex-row mt-1 text-black-50 date-time">
                                        <div><i class="fa fa-mail-forward"></i><span class="ml-2"><?=$user['email']?></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column mr-2">
                                    <div class="profile-image"><img class="rounded-circle" src="https://cdn-icons-png.flaticon.com/512/598/598364.png" width="30"/>
                                    </div><span class="date-time"><?=$user['DateDemande']?></span></div>
                                <a href="../messaging/discussion.php?id=<?=$user['numero']?>"><button class="btn btn-success" >Discussion</button></a>

                            </div>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../assets/jquery/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".update-friend-btn").click(function () {
            var userId = $(this).data("user-id");

            $.ajax({
                type: "POST",
                url: "../function/process_update_friend.php",
                data: { user_id: userId },
                success: function (response) {

                    console.log(response);
                }
            });
        });
    });
</script>

</body>
</html>
