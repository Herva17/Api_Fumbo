<?php
header('Content-Type: Application/json');
require_once("./Controlleurs/Ouvrage.php");
$data = array();
$url = explode('/', $_SERVER['REQUEST_URI']);
//print_r($url);
$url_path1 = $url[2];
$url_path2 = $url[3];

if ($url_path1 == "ouvrage") {
    // GET requests
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if ($url_path2 == "select_all") {
            $data["response"] = selectionner_ouvrages();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "compter") {
            $data["response"] = compter_ouvrages();
            echo json_encode($data);
            exit;
        }
    } 
    // POST requests
    elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($url_path2 == "select_one") {
            $data["response"] = selectionner_un_ouvrage();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "enregistrer") {
            $data["response"] = enregistrer_ouvrage();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "modifier") {
            $data["response"] = modification_ouvrage();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "supprimer") {
            $data["response"] = supprimer_ouvrage();
            echo json_encode($data);
            exit;
        }
    }
}