<?php
header('Content-Type: Application/json');
require("./Controlleurs/Nationalite.php");
$data = array();
$url = explode('/', $_SERVER['REQUEST_URI']);
//print_r($url);
$url_path1 = $url[2];
$url_path2 = $url[3];
if ($url_path1 == "nationalite") {
    // GET requests
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if ($url_path2 == "select") {
            $data["me"] = select_all_nationalite();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "compter") {
            $data["me"] = compter_nationalite();
            echo json_encode($data);
            exit;
        }
    } 
    // POST requests
    elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($url_path2 == "select_one") {
            $data["me"] = select_one_nationalite();
            echo json_encode($data);

        } elseif ($url_path2 == "save") {   
            $data["me"] = save_nationalite();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "update") {
            $data["me"] = update_nationalite();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "delete") {
            $data["me"] = delete_nationalite();
            echo json_encode($data);
            exit;
        }
    }
}