<?php
require_once("./Models/Ouvrage.php");
$retour = array();

function selectionner_ouvrages()
{
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
    $id_auteur = isset($_POST["id_user"]) ? htmlspecialchars(trim($_POST["id_user"])) : null;
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
        $targetDir = "../uploads/ouvrages/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $image = $targetFilePath;
        } else {
            $retour["Message"] = "Erreur lors du téléchargement de l'image.";
            return $retour;
        }
    } else {
        $image = null;
    }

    // Gestion de l'upload du fichier livre
    if (isset($_FILES["fichier_livre"]) && $_FILES["fichier_livre"]["error"] == 0) {
        $targetDir = "../uploads/fichiers/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $fileName = basename($_FILES["fichier_livre"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["fichier_livre"]["tmp_name"], $targetFilePath)) {
            $fichier_livre = $targetFilePath;
        } else {
            $retour["Message"] = "Erreur lors du téléchargement du fichier.";
            return $retour;
        }
    } else {
        $fichier_livre = null;
    }

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
        $targetDir = "../uploads/ouvrages/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $image = $targetFilePath;
        } else {
            $retour["Message"] = "Erreur lors du téléchargement de l'image.";
            return $retour;
        }
    } else {
        $image = null;
    }

    // Gestion de l'upload du fichier livre
    if (isset($_FILES["fichier_livre"]) && $_FILES["fichier_livre"]["error"] == 0) {
        $targetDir = "../uploads/fichiers/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $fileName = basename($_FILES["fichier_livre"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["fichier_livre"]["tmp_name"], $targetFilePath)) {
            $fichier_livre = $targetFilePath;
        } else {
            $retour["Message"] = "Erreur lors du téléchargement du fichier.";
            return $retour;
        }
    } else {
        $fichier_livre = null;
    }

    return Ouvrage::update($id_ouvrage, $titre_ouvrage, $id_auteur, $id_categorie, $annee_publication, $image, $langue, $isbn, $resume, $format, $Nb_pages, $fichier_livre, $tags);
}

function compter_ouvrages()
{
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

function select_ouvrage_by_categorie()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id_categorie = isset($_POST["id_categorie"]) ? htmlspecialchars(trim($_POST["id_categorie"])) : null;
    } else {
        $id_categorie = isset($_GET["id_categorie"]) ? htmlspecialchars(trim($_GET["id_categorie"])) : null;
    }
    return Ouvrage::select_by_categorie($id_categorie);
}

function supprimer_ouvrage()
{
    $id_ouvrage = isset($_POST["id_ouvrage"]) ? htmlspecialchars(trim($_POST["id_ouvrage"])) : null;

    if (!$id_ouvrage) {
        return [
            "Message" => "Veuillez fournir l'identifiant de l'ouvrage à supprimer."
        ];
    }

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

// --- FONCTIONS AJOUTÉES ---

function afficher_livres()
{
    $livres = Ouvrage::afficheLivres();

    if (isset($livres["Message"])) {
        return [
            "Message" => $livres["Message"]
        ];
    }

    return [
        "Reussite" => "Liste des livres affichée avec succès",
        "Livres" => $livres
    ];
}

function compter_livres_afficher()
{
    $compte = Ouvrage::compterLivresAfficher();

    if (isset($compte["Message"])) {
        return [
            "Message" => $compte["Message"]
        ];
    }

    return [
        "Reussite" => "Nombre total de livres affichés récupéré avec succès",
        "Total" => $compte["total"]
    ];
}