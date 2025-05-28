<?php

header('Content-Type: Application/json');
require("./Controlleurs/Histoire.php");
$data = array();
$url = explode('/', $_SERVER['REQUEST_URI']);

$url_path1 = $url[2] ?? null;
$url_path2 = $url[3] ?? null;

if ($url_path1 == "histoire") {
    // GET requests
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if ($url_path2 == "select") {
            $data["me"] = select_all_histoire();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "compter") {
            $data["me"] = compter_histoire();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "details") { // <-- Ajoute cette route
            $data["me"] = select_histoires_details();
            echo json_encode($data);
            exit;
        }
    }
    // POST requests
    elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($url_path2 == "select_one") {
            $data["me"] = select_one_histoire();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "save") {
            $data["me"] = save_histoire();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "update") {
            $data["me"] = update_histoire();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "delete") {
            $data["me"] = delete_histoire();
            echo json_encode($data);
            exit;
        } elseif ($url_path2 == "by_categorie") {
            $data["me"] = select_histoire_by_categorie();
            echo json_encode($data);
            exit;
        }
    }
}