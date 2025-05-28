<?php
require_once("./Models/Histoire.php");
$retour = array();

// Enregistrement d'une histoire
function save_histoire()
{
    $id_user = isset($_POST["id_user"]) ? htmlspecialchars(trim($_POST["id_user"])) : null;
    $categorie = isset($_POST["categorieId"]) ? htmlspecialchars(trim($_POST["categorieId"])) : null;
    $titre = isset($_POST["titre"]) ? htmlspecialchars(trim($_POST["titre"])) : null;
    $personnages_principaux = isset($_POST["personnages_principaux"]) ? htmlspecialchars(trim($_POST["personnages_principaux"])) : null;
    $description = isset($_POST["description"]) ? htmlspecialchars(trim($_POST["description"])) : null;
    $histoire = isset($_POST["histoire"]) ? htmlspecialchars(trim($_POST["histoire"])) : null;

    return Histoire::save($id_user, $categorie, $titre, $personnages_principaux, $description, $histoire);
}

// Suppression d'une histoire
function delete_histoire()
{
    $id_histoire = isset($_POST["id_histoire"]) ? htmlspecialchars(trim($_POST["id_histoire"])) : null;
    return Histoire::delete($id_histoire);
}

// Modification d'une histoire
function update_histoire()
{
    $id_histoire = isset($_POST["id_histoire"]) ? htmlspecialchars(trim($_POST["id_histoire"])) : null;
    $id_user = isset($_POST["id_user"]) ? htmlspecialchars(trim($_POST["id_user"])) : null;
    $categorie = isset($_POST["categorieId"]) ? htmlspecialchars(trim($_POST["categorieId"])) : null;
    $titre = isset($_POST["titre"]) ? htmlspecialchars(trim($_POST["titre"])) : null;
    $personnages_principaux = isset($_POST["personnages_principaux"]) ? htmlspecialchars(trim($_POST["personnages_principaux"])) : null;
    $description = isset($_POST["description"]) ? htmlspecialchars(trim($_POST["description"])) : null;
    $histoire = isset($_POST["histoire"]) ? htmlspecialchars(trim($_POST["histoire"])) : null;
    $date_creation = isset($_POST["date_creation"]) ? htmlspecialchars(trim($_POST["date_creation"])) : date("Y-m-d H:i:s");


    return Histoire::update($id_histoire, $id_user, $categorie, $titre, $personnages_principaux, $description, $histoire, $date_creation);
}

// Sélection de toutes les histoires
function select_all_histoire()
{
    return Histoire::select_all();
}
function select_histoire_by_categorie()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $categorie = isset($_POST["categorie"]) ? htmlspecialchars(trim($_POST["categorie"])) : null;
    } else {
        $categorie = isset($_GET["categorie"]) ? htmlspecialchars(trim($_GET["categorie"])) : null;
    }
    return Histoire::select_by_categorie($categorie);
}
// Sélection d'une histoire par son id
function select_one_histoire()
{
    $id_histoire = isset($_GET["id_histoire"]) ? htmlspecialchars(trim($_GET["id_histoire"])) : null;
    return Histoire::select_one($id_histoire);
}

// Compter les histoires
function compter_histoire()
{
    return Histoire::compterHistoire();
}

function select_histoires_details()
{
    $histoires = Histoire::select_histoires_details();

    if (isset($histoires["Message"])) {
        return [
            "Message" => $histoires["Message"]
        ];
    }

    return [
        "Reussite" => "Liste détaillée des histoires récupérée avec succès",
        "Histoires" => $histoires
    ];
}
