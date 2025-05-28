<?php
header('Content-Type: Application/json;charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: *');
header('Access-Control-Allow-Headers: *');
$user = md5('herva');
$mdp = md5('mdp');
if ((isset($_GET['user']) && $_GET['user'] == 'herva' || isset($_GET['user']) && $_GET['user'] == $user)
    && (isset($_GET['mdp']) && $_GET['mdp'] == "mdp" || isset($_GET['mdp']) && $_GET['mdp'] == $mdp)
) {
    require_once("Routes/Nationalite.php");
    require_once("Routes/Histoire.php");
    require_once("Routes/user.php");
    require_once("Routes/Ouvrage.php");
    require_once("Routes/Categorie.php");
    require_once("Routes/Abonnement.php");

    echo json_encode($retour);
    exit;
} else{
    $retour["message"] = "accès réfusé"; 
}