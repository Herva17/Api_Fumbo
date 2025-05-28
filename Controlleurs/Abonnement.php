<?php
require_once("./Models/Abonnement.php");

function ajouter_abonnement()
{
    // Récupérer les paramètres depuis la requête POST
    $id_abonne = isset($_POST["id_abonne"]) ? intval($_POST["id_abonne"]) : null;
    $id_auteur = isset($_POST["id_auteur"]) ? intval($_POST["id_auteur"]) : null;

    // Vérifier si les paramètres sont manquants
    if (!$id_abonne || !$id_auteur) {
        // Retourner une réponse JSON avec un message d'erreur
        echo json_encode([
            "succes" => false,
            "message" => "Paramètres manquants"
        ]);
        return; // Arrêter l'exécution de la fonction
    }

    // Appeler la méthode pour ajouter l'abonnement
    $result = Abonnement::ajouter($id_abonne, $id_auteur);

    // Vérifier si la méthode retourne une réponse valide
    if ($result && isset($result["succes"])) {
        // Retourner la réponse telle quelle si elle contient déjà les bonnes clés
        echo json_encode($result);
    } else {
        // Retourner une réponse JSON générique si la méthode ne retourne pas le bon format
        echo json_encode([
            "succes" => false,
            "message" => "Une erreur s'est produite lors de l'ajout de l'abonnement"
        ]);
    }
}

function supprimer_abonnement()
{
    $id_abonne = isset($_POST["id_abonne"]) ? intval($_POST["id_abonne"]) : null;
    $id_auteur = isset($_POST["id_auteur"]) ? intval($_POST["id_auteur"]) : null;
    if (!$id_abonne || !$id_auteur) {
        return ["Message" => "Paramètres manquants"];
    }
    return Abonnement::supprimer($id_abonne, $id_auteur);
}

function select_abonnements_utilisateur()
{
    $id_abonne = isset($_GET["id_abonne"]) ? intval($_GET["id_abonne"]) : null;
    if (!$id_abonne) {
        return ["Message" => "Paramètre id_abonne manquant"];
    }
    return Abonnement::select_by_user($id_abonne);
}

function compter_abonnements_utilisateur()
{
    $id_abonne = isset($_GET["id_abonne"]) ? intval($_GET["id_abonne"]) : null;
    if (!$id_abonne) {
        return ["Message" => "Paramètre id_abonne manquant"];
    }
    return Abonnement::compter($id_abonne);
}
function select_abonnes_auteur()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id_auteur = isset($_POST["id_auteur"]) ? intval($_POST["id_auteur"]) : null;
    } else {
        $id_auteur = isset($_GET["id_auteur"]) ? intval($_GET["id_auteur"]) : null;
    }
    if (!$id_auteur) {
        return ["Message" => "Paramètre id_auteur manquant"];
    }
    return Abonnement::select_abonnes($id_auteur);
}

function compter_abonnes_auteur()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id_auteur = isset($_POST["id_auteur"]) ? intval($_POST["id_auteur"]) : null;
    } else {
        $id_auteur = isset($_GET["id_auteur"]) ? intval($_GET["id_auteur"]) : null;
    }
    if (!$id_auteur) {
        return ["Message" => "Paramètre id_auteur manquant"];
    }
    return Abonnement::compter_abonnes($id_auteur);
}