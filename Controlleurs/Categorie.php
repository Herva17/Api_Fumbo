<?php
require_once("./Models/Categorie.php");
$retour = array();

function enregistrer_categorie()
{
    $nom_categorie = isset($_POST["nom_categorie"]) ? htmlspecialchars(trim($_POST["nom_categorie"])) : null;

    // Appel au modèle pour l'enregistrement
    return Categorie::enregistrer($nom_categorie);
}

function modification_categorie()
{
    $id_categorie = isset($_POST["id_categorie"]) ? htmlspecialchars(trim($_POST["id_categorie"])) : null;
    $nom_categorie = isset($_POST["nom_categorie"]) ? htmlspecialchars(trim($_POST["nom_categorie"])) : null;

    // Appel au modèle pour la modification
    return Categorie::update($id_categorie, $nom_categorie);
}

function selectionner_categories()
{
    // Appel au modèle pour récupérer toutes les catégories
    return Categorie::select_all();
}

function selectionner_une_categorie()
{
    $id_categorie = isset($_POST["id_categorie"]) ? htmlspecialchars(trim($_POST["id_categorie"])) : null;

    // Appel au modèle pour récupérer une catégorie spécifique
    return Categorie::select_one($id_categorie);
}

function compter_categories()
{
    // Appel au modèle pour compter les catégories
    return Categorie::compterCategorie();
}

function supprimer_categorie()
{
    $id_categorie = isset($_POST["id_categorie"]) ? htmlspecialchars(trim($_POST["id_categorie"])) : null;

    // Appel au modèle pour supprimer une catégorie
    return Categorie::delete($id_categorie);
}