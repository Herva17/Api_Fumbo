<?php
require_once("./Config.php");
class Auteur
{
    public $me = array();

    public static function save($Nom, $Prenom, $Id_Nationalite, $Image)
    {
        $data = get_connection();
        if ($data->query("INSERT INTO auteur(nom_auteur, prenom_auteur, id_nationalite, image) VALUES ('$Nom', '$Prenom', '$Id_Nationalite', '$Image')")) {
            $me["Reussite"] = "Auteur enregistré";
            $me["Dernier_Enregistrement"] = self::get_last();
            return $me;
        } else {
            $me["Message"] = "Echec d'enregistrement";
            return $me;
        }
    }

    public static function delete($Id_Auteur)
    {
        $data = get_connection();
        if ($data->query("DELETE FROM auteur WHERE id_auteur = '$Id_Auteur'")) {
            $me["Reussite"] = "Suppression réussie";
            return $me;
        } else {
            $me["Message"] = "Echec de suppression";
            return $me;
        }
    }

    public static function update($Id_Auteur, $Nom, $Prenom, $Id_Nationalite, $Image)
    {
        $data = get_connection();
        if ($data->query("UPDATE auteur SET nom_auteur = '$Nom', prenom_auteur = '$Prenom', id_nationalite = '$Id_Nationalite', image = '$Image' WHERE id_auteur = '$Id_Auteur'")) {
            $me["Reussite"] = "Modification réussie";
            return $me;
        } else {
            $me["Message"] = "Echec de modification";
            return $me;
        }
    }

    public static function select_all()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM auteur")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $me["Message"] = "Aucune donnée disponible";
            return $me;
        }
    }

    public static function select_one($Id_Auteur)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM auteur WHERE id_auteur = '$Id_Auteur'")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $me["Message"] = "Aucune donnée disponible";
            return $me;
        }
    }

    public static function get_last()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM auteur ORDER BY id_auteur DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }

    public static function CompterAuteur()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT count(id_auteur) as total FROM auteur")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $me["Message"] = "Aucune donnée disponible";
            return $me;
        }
    }
}