<?php
header('Content-Type: Application/json');
require_once("./Controlleurs/Categorie.php");
$data = array();
$url = explode('/', $_SERVER['REQUEST_URI']);
//print_r($url);
$url_path1 = $url[2];
$url_path2 = $url[3];
if ($url_path1 == "categorie") {
    // GET requests
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if ($url_path2 == "select_all") {
            $data["response"] = selectionner_categories();
            echo json_encode($data);
        } elseif ($url_path2 == "compter") {
            $data["response"] = compter_categories();
            echo json_encode($data);
        }
    } 
    // POST requests
    elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($url_path2 == "select_one") {
            $data["response"] = selectionner_une_categorie();
            echo json_encode($data);
        } elseif ($url_path2 == "enregistrer") {
            $data["response"] = enregistrer_categorie();
            echo json_encode($data);
        } elseif ($url_path2 == "modifier") {
            $data["response"] = modification_categorie();
            echo json_encode($data);
        } elseif ($url_path2 == "supprimer") {
            $data["response"] = supprimer_categorie();
            echo json_encode($data);
        }
    }
}