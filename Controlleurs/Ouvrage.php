<?php
require_once("./Models/Ouvrage.php");
$retour = array();
function selectionner_ouvrages()
{
    // Appel au modèle pour récupérer tous les ouvrages
    $ouvrages = Ouvrage::select_all();

    if (isset($ouvrages["Message"])) {
        return [
            "Message" => $ouvrages["Message"]
        ];
    }

    return [
        "Reussite" => "Liste des ouvrages récupérée avec succès",
        "Ouvrages" => $ouvrages
    ];
}

function selectionner_un_ouvrage()
{
    $id_ouvrage = isset($_POST["id_ouvrage"]) ? htmlspecialchars(trim($_POST["id_ouvrage"])) : null;

    if (!$id_ouvrage) {
        return [
            "Message" => "Veuillez fournir l'identifiant de l'ouvrage."
        ];
    }

    // Appel au modèle pour récupérer un ouvrage spécifique
    $ouvrage = Ouvrage::select_one($id_ouvrage);

    if (isset($ouvrage["message"])) {
        return [
            "Message" => $ouvrage["message"]
        ];
    }

    return [
        "Reussite" => "Ouvrage récupéré avec succès",
        "Ouvrage" => $ouvrage
    ];
}
function enregistrer_ouvrage()
{
    $titre_ouvrage = isset($_POST["titre_ouvrage"]) ? htmlspecialchars(trim($_POST["titre_ouvrage"])) : null;
    $id_auteur = isset($_POST["id_auteur"]) ? htmlspecialchars(trim($_POST["id_auteur"])) : null;
    $id_categorie = isset($_POST["id_categorie"]) ? htmlspecialchars(trim($_POST["id_categorie"])) : null;
    $annee_publication = isset($_POST["annee_publication"]) ? htmlspecialchars(trim($_POST["annee_publication"])) : null;
    $langue = isset($_POST["langue"]) ? htmlspecialchars(trim($_POST["langue"])) : null;
    $isbn = isset($_POST["isbn"]) ? htmlspecialchars(trim($_POST["isbn"])) : null;
    $resume = isset($_POST["resume"]) ? htmlspecialchars(trim($_POST["resume"])) : null;
    $format = isset($_POST["format"]) ? htmlspecialchars(trim($_POST["format"])) : null;
    $Nb_pages = isset($_POST["Nb_pages"]) ? htmlspecialchars(trim($_POST["Nb_pages"])) : null;
    $tags = isset($_POST["tags"]) ? htmlspecialchars(trim($_POST["tags"])) : null;

    // Gestion de l'upload de l'image
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "../fumbo_fichiers/ouvrages/"; // Dossier de destination
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

    // Gestion de l'upload du fichier livre
    if (isset($_FILES["fichier_livre"]) && $_FILES["fichier_livre"]["error"] == 0) {
        $targetDir = "../fumbo_fichiers/fichiers/"; // Dossier de destination
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Créer le dossier s'il n'existe pas
        }

        $fileName = basename($_FILES["fichier_livre"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Vérification et déplacement du fichier
        if (move_uploaded_file($_FILES["fichier_livre"]["tmp_name"], $targetFilePath)) {
            $fichier_livre = $targetFilePath; // Enregistrer le chemin du fichier
        } else {
            $retour["Message"] = "Erreur lors du téléchargement du fichier.";
            return $retour;
        }
    } else {
        $fichier_livre = null; // Pas de fichier fourni
    }

    // Appel au modèle pour l'enregistrement
    return Ouvrage::enregistrer($titre_ouvrage, $id_auteur, $id_categorie, $annee_publication, $image, $langue, $isbn, $resume, $format, $Nb_pages, $fichier_livre, $tags);
}

function modification_ouvrage()
{
    $id_ouvrage = isset($_POST["id_ouvrage"]) ? htmlspecialchars(trim($_POST["id_ouvrage"])) : null;
    $titre_ouvrage = isset($_POST["titre_ouvrage"]) ? htmlspecialchars(trim($_POST["titre_ouvrage"])) : null;
    $id_auteur = isset($_POST["id_auteur"]) ? htmlspecialchars(trim($_POST["id_auteur"])) : null;
    $id_categorie = isset($_POST["id_categorie"]) ? htmlspecialchars(trim($_POST["id_categorie"])) : null;
    $annee_publication = isset($_POST["annee_publication"]) ? htmlspecialchars(trim($_POST["annee_publication"])) : null;
    $langue = isset($_POST["langue"]) ? htmlspecialchars(trim($_POST["langue"])) : null;
    $isbn = isset($_POST["isbn"]) ? htmlspecialchars(trim($_POST["isbn"])) : null;
    $resume = isset($_POST["resume"]) ? htmlspecialchars(trim($_POST["resume"])) : null;
    $format = isset($_POST["format"]) ? htmlspecialchars(trim($_POST["format"])) : null;
    $Nb_pages = isset($_POST["Nb_pages"]) ? htmlspecialchars(trim($_POST["Nb_pages"])) : null;
    $tags = isset($_POST["tags"]) ? htmlspecialchars(trim($_POST["tags"])) : null;

    // Gestion de l'upload de l'image
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "../fumbo_fichiers/ouvrages/"; // Dossier de destination
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

    // Gestion de l'upload du fichier livre
    if (isset($_FILES["fichier_livre"]) && $_FILES["fichier_livre"]["error"] == 0) {
        $targetDir = "../fumbo_fichiers/fichiers/"; // Dossier de destination
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Créer le dossier s'il n'existe pas
        }

        $fileName = basename($_FILES["fichier_livre"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Vérification et déplacement du fichier
        if (move_uploaded_file($_FILES["fichier_livre"]["tmp_name"], $targetFilePath)) {
            $fichier_livre = $targetFilePath; // Enregistrer le chemin du fichier
        } else {
            $retour["Message"] = "Erreur lors du téléchargement du fichier.";
            return $retour;
        }
    } else {
        $fichier_livre = null; // Pas de nouveau fichier fourni
    }

    // Appel au modèle pour la modification
    return Ouvrage::update($id_ouvrage, $titre_ouvrage, $id_auteur, $id_categorie, $annee_publication, $image, $langue, $isbn, $resume, $format, $Nb_pages, $fichier_livre, $tags);
}


function compter_ouvrages()
{
    // Appel au modèle pour compter les ouvrages
    $compte = Ouvrage::CompterOuvrage();

    if (isset($compte["Message"])) {
        return [
            "Message" => $compte["Message"]
        ];
    }

    return [
        "Reussite" => "Nombre total d'ouvrages récupéré avec succès",
        "Total" => $compte[0]["total"]
    ];
}


function supprimer_ouvrage()
{
    $id_ouvrage = isset($_POST["id_ouvrage"]) ? htmlspecialchars(trim($_POST["id_ouvrage"])) : null;

    if (!$id_ouvrage) {
        return [
            "Message" => "Veuillez fournir l'identifiant de l'ouvrage à supprimer."
        ];
    }

    // Appel au modèle pour supprimer l'ouvrage
    $resultat = Ouvrage::delete($id_ouvrage);

    if (isset($resultat["Reussite"])) {
        return [
            "Reussite" => $resultat["Reussite"]
        ];
    } else {
        return [
            "Message" => $resultat["Message"] ?? "Échec de la suppression de l'ouvrage."
        ];
    }
}