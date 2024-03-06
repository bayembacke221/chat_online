<?php
function getUser($numero, $conn){
    $sql = "SELECT p.* 
    FROM  personne p WHERE numero=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$numero]);
 
    if ($stmt->rowCount() === 1) {
         $user = $stmt->fetch();
         return $user;
    }else {
        $user = [];
        return $user;
    }
 }

 function getAllUsersExceptFriendship($conn, $numero){
     $sql = "SELECT  p.* FROM  personne p WHERE p.numero NOT IN (SELECT recepteur FROM amitie WHERE demandeur = ?)
                               AND p.numero NOT IN (SELECT demandeur FROM amitie WHERE recepteur = ?) AND p.numero != ?";
     $stmt = $conn->prepare($sql);
     $stmt->execute([$numero, $numero, $numero]);


     if ($stmt->rowCount() > 0) {
         $users = $stmt->fetchAll();
         return $users;
     }else {
         $users = [];
         return $users;
     }
 }

 function addFriendship($conn, $numero, $numeroAmi){
     $sql = "INSERT INTO `amitie` ( `etat`,`demandeur`, `recepteur`) VALUES (?, ?, ?)";
     $stmt = $conn->prepare($sql);
     $stmt->execute([0,$numero, $numeroAmi]);
 }

function getFriendRequestByNumero($conn, $numero){
    $sql = "SELECT p.*,a.*
            FROM personne p
            INNER JOIN amitie a ON (p.numero = a.recepteur)
            WHERE a.demandeur = ? AND a.etat = 0";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$numero]);

    if ($stmt->rowCount() > 0) {
        $friendRequests = $stmt->fetchAll();
        return $friendRequests;
    } else {
        $friendRequests = [];
        return $friendRequests;
    }
}

function getFriendRequestFromMemberByNumero($conn, $numero){
    $sql = "SELECT p.*, a.*
            FROM personne p
            INNER JOIN amitie a ON (p.numero = a.demandeur)
            WHERE a.recepteur = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$numero]);

    if ($stmt->rowCount() > 0) {
        $friendRequestFromMember = $stmt->fetchAll();
        return $friendRequestFromMember;
    } else {
        $friendRequestFromMember = [];
        return $friendRequestFromMember;
    }
}

function getFriendListByNumero($conn, $numero){
    $sql = "SELECT p.*, a.*
            FROM personne p
            INNER JOIN amitie a ON (p.numero = a.recepteur OR p.numero = a.demandeur)
            WHERE (a.demandeur = ? OR a.recepteur = ?) AND a.etat = 1 AND p.numero != ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$numero, $numero, $numero]);

    if ($stmt->rowCount() > 0) {
        $friendList = $stmt->fetchAll();
        return $friendList;
    } else {
        $friendList = [];
        return $friendList;
    }
}




function updateFriendship($conn, $numero, $numeroAmi){
    $sql = "UPDATE `amitie` SET `etat` = 1 WHERE `demandeur` = ? AND `recepteur` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$numero, $numeroAmi]);
}

?>