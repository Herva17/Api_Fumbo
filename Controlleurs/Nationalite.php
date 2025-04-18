<?php
require_once("./Models/Nationalite.php");
// enregistrement
$retour = array();

function save_nationalite()
{
    $Nom = isset($_POST["Nom_Nationalite"]) ? htmlspecialchars(trim($_POST["Nom_Nationalite"])) : null;

    // Gestion de l'upload de l'image
    if (isset($_FILES["Image"]) && $_FILES["Image"]["error"] == 0) {
        $targetDir = "../fumbo_Images/nationalites/"; // Dossier de destination
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Créer le dossier s'il n'existe pas
        }

        $fileName = basename($_FILES["Image"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Vérification et déplacement du fichier
        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $targetFilePath)) {
            $Image = $targetFilePath; // Enregistrer le chemin de l'image
        } else {
            $retour["Message"] = "Erreur lors du téléchargement de l'image.";
            return $retour;
        }
    } else {
        $retour["Message"] = "Aucune image fournie ou erreur lors de l'upload.";
        return $retour;
    }

    // Appel au modèle pour l'enregistrement
    return Nationalite::save($Nom, $Image);
}

// suppression
function delete_nationalite()
{
    $id_nationalite = isset($_POST["id_nationalite"]) ? htmlspecialchars(trim($_POST["id_nationalite"])) : null;
    return Nationalite::delete($id_nationalite);
}

// modification
function update_nationalite()
{
    $id_nationalite = isset($_POST["id_nationalite"]) ? htmlspecialchars(trim($_POST["id_nationalite"])) : null;
    $Nom = isset($_POST["Nom_Nationalite"]) ? htmlspecialchars(trim($_POST["Nom_Nationalite"])) : null;

    // Gestion de l'upload de l'image
    if (isset($_FILES["Image"]) && $_FILES["Image"]["error"] == 0) {
        $targetDir = "./uploads/nationalites/"; // Dossier de destination
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Créer le dossier s'il n'existe pas
        }

        $fileName = basename($_FILES["Image"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Vérification et déplacement du fichier
        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $targetFilePath)) {
            $Image = $targetFilePath; // Enregistrer le chemin de l'image
        } else {
            $retour["Message"] = "Erreur lors du téléchargement de l'image.";
            return $retour;
        }
    } else {
        $Image = null; // Pas de nouvelle image fournie
    }

    // Appel au modèle pour la modification
    return Nationalite::update($id_nationalite, $Nom, $Image);
}

// sélection de toutes les nationalités
function select_all_nationalite()
{
    return Nationalite::select_all();
}

// sélection d'une seule nationalité
function select_one_nationalite()
{
    $id_nationalite = isset($_GET["id_nationalite"]) ? htmlspecialchars(trim($_GET["id_nationalite"])) : null;
    return Nationalite::select_one($id_nationalite);
}

// compter les nationalités
function compter_nationalite()
{
    return Nationalite::CompterNationalite();
}