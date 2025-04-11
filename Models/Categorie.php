<?php
include("./Config.php");
class Categorie
{
    public $response = array();

    public static function enregistrer($nom_categorie)
    {
        $data = get_connection();
        if ($data->query("INSERT INTO categorie (nom_categorie) VALUES ('$nom_categorie')")) {
            $response["message"] = "Enregistrement réussi";
            $response["Dernier_Enregistrement"] = self::afficher_dernier_enreg();
            return $response;
        } else {
            $response["Message"] = "Enregistrement échoué";
            return $response;
        }
    }

    public static function afficher_dernier_enreg()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM categorie ORDER BY id_categorie DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }

    public static function select_all()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM categorie")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["Message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function update($id_categorie, $nom_categorie)
    {
        $data = get_connection();
        if ($data->query("UPDATE categorie SET nom_categorie = '$nom_categorie' WHERE id_categorie = '$id_categorie'")) {
            $response["message"] = "Modification réussie";
            return $response;
        } else {
            $response["Message"] = "Modification échouée";
            return $response;
        }
    }

    public static function select_one($id_categorie)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM categorie WHERE id_categorie = '$id_categorie'")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function compterCategorie()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT count(id_categorie) as total FROM categorie")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["Message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function delete($id_categorie)
    {
        $data = get_connection();
        if ($data->query("DELETE FROM categorie WHERE id_categorie = '$id_categorie'")) {
            $response["Reussite"] = "Suppression réussie";
            return $response;
        } else {
            $response["Message"] = "Échec de suppression";
            return $response;
        }
    }
}