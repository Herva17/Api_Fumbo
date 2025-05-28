<?php
header('Content-Type: Application/json');
require_once("./Controlleurs/Abonnement.php");
$data = array();
$url = explode('/', $_SERVER['REQUEST_URI']);
$url_path1 = $url[2] ?? null;
$url_path2 = $url[3] ?? null;

if ($url_path1 == "abonnement") {
    // GET requests
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if ($url_path2 == "utilisateur") {
            $data["response"] = select_abonnements_utilisateur();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "compter") {
            $data["response"] = compter_abonnements_utilisateur();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "abonnes_auteur") {
            $data["response"] = select_abonnes_auteur();
            echo json_encode($data);
            exit;
        }
    }
    // POST requests
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($url_path2 == "abonnes_auteur") {
        $data["response"] = select_abonnes_auteur();
        echo json_encode($data);
        exit;
    } elseif ($url_path2 == "compter_abonnes_auteur") {
        $data["response"] = compter_abonnes_auteur();
        echo json_encode($data);
        exit;
    } elseif ($url_path2 == "ajouter") {
        $data["response"] = ajouter_abonnement();
        echo json_encode($data);
        exit;
    } elseif ($url_path2 == "supprimer") {
        $data["response"] = supprimer_abonnement();
        echo json_encode($data);
        exit;
    }
}
}