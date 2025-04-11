<?php
require_once("./Models/Auteur.php");
// enregistrement
$retour = array();

function save_auteur()
{
    $Nom = isset($_POST["Nom_Auteur"]) ? htmlspecialchars(trim($_POST["Nom_Auteur"])) : null;
    $Prenom = isset($_POST["Prenom_Auteur"]) ? htmlspecialchars(trim($_POST["Prenom_Auteur"])) : null;
    $Id_Nationalite = isset($_POST["Id_Nationalite"]) ? htmlspecialchars(trim($_POST["Id_Nationalite"])) : null;

    // Gestion de l'upload de l'image
    if (isset($_FILES["Image"]) && $_FILES["Image"]["error"] == 0) {
        $targetDir = "./uploads/auteurs/"; // Dossier de destination
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
    return Auteur::save($Nom, $Prenom, $Id_Nationalite, $Image);
}

// suppression
function delete_auteur()
{
    $Id_Auteur = isset($_POST["id_auteur"]) ? htmlspecialchars(trim($_POST["id_auteur"])) : null;
    return Auteur::delete($Id_Auteur);
}

// modification
function update_auteur()
{
    $Id_Auteur = isset($_POST["id_auteur"]) ? htmlspecialchars(trim($_POST["id_auteur"])) : null;
    $Nom = isset($_POST["Nom_Auteur"]) ? htmlspecialchars(trim($_POST["Nom_Auteur"])) : null;
    $Prenom = isset($_POST["Prenom_Auteur"]) ? htmlspecialchars(trim($_POST["Prenom_Auteur"])) : null;
    $Id_Nationalite = isset($_POST["Id_Nationalite"]) ? htmlspecialchars(trim($_POST["Id_Nationalite"])) : null;

    // Gestion de l'upload de l'image
    if (isset($_FILES["Image"]) && $_FILES["Image"]["error"] == 0) {
        $targetDir = "./uploads/auteurs/"; // Dossier de destination
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
    return Auteur::update($Id_Auteur, $Nom, $Prenom, $Id_Nationalite, $Image);
}

// sélection de tous les auteurs
function select_all_auteur()
{
    return Auteur::select_all();
}

// sélection d'un seul auteur
function select_one_auteur()
{
    $Id_Auteur = isset($_GET["id_auteur"]) ? htmlspecialchars(trim($_GET["id_auteur"])) : null;
    return Auteur::select_one($Id_Auteur);
}

// compter les auteurs
function compter_auteur()
{
    return Auteur::CompterAuteur();
}