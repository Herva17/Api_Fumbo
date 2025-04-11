<?php
require_once("./Models/User.php");
// enregistrement
$retour = array();

function save_user()
{
    $Username = isset($_POST["Username"]) ? htmlspecialchars(trim($_POST["Username"])) : null;
    $Prenom = isset($_POST["Prenom"]) ? htmlspecialchars(trim($_POST["Prenom"])) : null;
    $Email = isset($_POST["Email"]) ? htmlspecialchars(trim($_POST["Email"])) : null;
    $Password = isset($_POST["Password"]) ? htmlspecialchars(trim($_POST["Password"])) : null;
    $Bio = isset($_POST["Bio"]) ? htmlspecialchars(trim($_POST["Bio"])) : null;
    $Id_Nationalite = isset($_POST["Id_Nationalite"]) ? htmlspecialchars(trim($_POST["Id_Nationalite"])) : null;

    // Gestion de l'upload de l'image
    if (isset($_FILES["Image"]) && $_FILES["Image"]["error"] == 0) {
        $targetDir = "./uploads/users/"; // Dossier de destination
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
        $Image = null; // Pas d'image fournie
    }

    $Date_Inscription = date("Y-m-d H:i:s"); // Date actuelle

    // Appel au modèle pour l'enregistrement
    return User::save($Username, $Prenom, $Email, $Password, $Bio, $Image, $Date_Inscription, $Id_Nationalite);
}

// suppression
function delete_user()
{
    $Id_User = isset($_POST["id_user"]) ? htmlspecialchars(trim($_POST["id_user"])) : null;
    return User::delete($Id_User);
}

// modification
function update_user()
{
    $Id_User = isset($_POST["id_user"]) ? htmlspecialchars(trim($_POST["id_user"])) : null;
    $Username = isset($_POST["Username"]) ? htmlspecialchars(trim($_POST["Username"])) : null;
    $Prenom = isset($_POST["Prenom"]) ? htmlspecialchars(trim($_POST["Prenom"])) : null;
    $Email = isset($_POST["Email"]) ? htmlspecialchars(trim($_POST["Email"])) : null;
    $Password = isset($_POST["Password"]) ? htmlspecialchars(trim($_POST["Password"])) : null;
    $Bio = isset($_POST["Bio"]) ? htmlspecialchars(trim($_POST["Bio"])) : null;
    $Id_Nationalite = isset($_POST["Id_Nationalite"]) ? htmlspecialchars(trim($_POST["Id_Nationalite"])) : null;

    // Gestion de l'upload de l'image
    if (isset($_FILES["Image"]) && $_FILES["Image"]["error"] == 0) {
        $targetDir = "./uploads/users/"; // Dossier de destination
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
    return User::update($Id_User, $Username, $Prenom, $Email, $Password, $Bio, $Image, $Id_Nationalite);
}

// sélection de tous les utilisateurs
function select_all_user()
{
    return User::select_all();
}

// sélection d'un seul utilisateur
function select_one_user()
{
    $Id_User = isset($_GET["id_user"]) ? htmlspecialchars(trim($_GET["id_user"])) : null;
    return User::select_one($Id_User);
}

// compter les utilisateurs
function compter_user()
{
    return User::CompterUsers();
}

// connexion
function se_connecter()
{
    $Identifiant = isset($_POST["Identifiant"]) ? htmlspecialchars(trim($_POST["Identifiant"])) : null;
    $Password = isset($_POST["Password"]) ? htmlspecialchars(trim($_POST["Password"])) : null;

    // Appel au modèle pour vérifier les identifiants
    return User::se_connecter($Identifiant, $Password);
}