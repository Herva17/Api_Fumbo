<?php
require_once("./Models/Ouvrage.php");
$retour = array();

function enregistrer_ouvrage()
{
    $titre_ouvrage = isset($_POST["titre_ouvrage"]) ? htmlspecialchars(trim($_POST["titre_ouvrage"])) : null;
    $id_auteur = isset($_POST["id_auteur"]) ? htmlspecialchars(trim($_POST["id_auteur"])) : null;
    $id_categorie = isset($_POST["id_categorie"]) ? htmlspecialchars(trim($_POST["id_categorie"])) : null;
    $annee_publication = isset($_POST["annee_publication"]) ? htmlspecialchars(trim($_POST["annee_publication"])) : null;

    // Gestion de l'upload de l'image
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "./uploads/ouvrages/"; // Dossier de destination
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Créer le dossier s'il n'existe pas
        }

        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Vérification et déplacement du fichier
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $image = $targetFilePath; // Enregistrer le chemin de l'image
        } else {
            $retour["Message"] = "Erreur lors du téléchargement de l'image.";
            return $retour;
        }
    } else {
        $image = null; // Pas d'image fournie
    }

    // Appel au modèle pour l'enregistrement
    return Ouvrage::enregistrer($titre_ouvrage, $id_auteur, $id_categorie, $annee_publication, $image);
}

function modification_ouvrage()
{
    $id_ouvrage = isset($_POST["id_ouvrage"]) ? htmlspecialchars(trim($_POST["id_ouvrage"])) : null;
    $titre_ouvrage = isset($_POST["titre_ouvrage"]) ? htmlspecialchars(trim($_POST["titre_ouvrage"])) : null;
    $id_auteur = isset($_POST["id_auteur"]) ? htmlspecialchars(trim($_POST["id_auteur"])) : null;
    $id_categorie = isset($_POST["id_categorie"]) ? htmlspecialchars(trim($_POST["id_categorie"])) : null;
    $annee_publication = isset($_POST["annee_publication"]) ? htmlspecialchars(trim($_POST["annee_publication"])) : null;

    // Gestion de l'upload de l'image
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "../fumbo_Images/ouvrages/"; // Dossier de destination
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Créer le dossier s'il n'existe pas
        }

        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Vérification et déplacement du fichier
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $image = $targetFilePath; // Enregistrer le chemin de l'image
        } else {
            $retour["Message"] = "Erreur lors du téléchargement de l'image.";
            return $retour;
        }
    } else {
        $image = null; // Pas de nouvelle image fournie
    }

    // Appel au modèle pour la modification
    return Ouvrage::update($id_ouvrage, $titre_ouvrage, $id_auteur, $id_categorie, $annee_publication, $image);
}

function selectionner_ouvrages()
{
    // Appel au modèle pour récupérer tous les ouvrages
    return Ouvrage::select_all();
}

function selectionner_un_ouvrage()
{
    $id_ouvrage = isset($_POST["id_ouvrage"]) ? htmlspecialchars(trim($_POST["id_ouvrage"])) : null;
    // Appel au modèle pour récupérer un ouvrage spécifique
    return Ouvrage::select_one($id_ouvrage);
}

function compter_ouvrages()
{
    // Appel au modèle pour compter les ouvrages
    return Ouvrage::CompterOuvrage();
}

function supprimer_ouvrage()
{
    $id_ouvrage = isset($_POST["id_ouvrage"]) ? htmlspecialchars(trim($_POST["id_ouvrage"])) : null;
    // Appel au modèle pour supprimer un ouvrage
    return Ouvrage::delete($id_ouvrage);
}