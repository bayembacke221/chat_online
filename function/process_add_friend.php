<?php
session_start();
require_once('../db/connect.php');
require_once('../function/function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];

    addFriendship($BDD, $_SESSION['numero'], $user_id);

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);

    header("Location: ../page/suivi.php");
}
?>
