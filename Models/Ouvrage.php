<?php
require_once("./Config.php");
class Ouvrage
{
    public $response = array();

    public static function enregistrer($titre_ouvrage, $id_auteur, $id_categorie, $annee_publication, $image)
    {
        $data = get_connection();
        if ($data->query("INSERT INTO ouvrage (titre_ouvrage, id_auteur, id_categorie, annee_publication, image) 
                          VALUES ('$titre_ouvrage', '$id_auteur', '$id_categorie', '$annee_publication', '$image')")) {
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
        $donnees = $data->query("SELECT * FROM ouvrage ORDER BY id_ouvrage DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }

    public static function select_all()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM ouvrage")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["Message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function update($id_ouvrage, $titre_ouvrage, $id_auteur, $id_categorie, $annee_publication, $image)
    {
        $data = get_connection();
        if ($data->query("UPDATE ouvrage 
                          SET titre_ouvrage = '$titre_ouvrage', id_auteur = '$id_auteur', id_categorie = '$id_categorie', 
                              annee_publication = '$annee_publication', image = '$image' 
                          WHERE id_ouvrage = '$id_ouvrage'")) {
            $response["message"] = "Modification réussie";
            return $response;
        } else {
            $response["Message"] = "Modification échouée";
            return $response;
        }
    }

    public static function select_one($id_ouvrage)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM ouvrage WHERE id_ouvrage = '$id_ouvrage'")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function CompterOuvrage()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT count(id_ouvrage) as total FROM ouvrage")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["Message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function delete($id_ouvrage)
    {
        $data = get_connection();
        if ($data->query("DELETE FROM ouvrage WHERE id_ouvrage = '$id_ouvrage'")) {
            $response["Reussite"] = "Suppression réussie";
            return $response;
        } else {
            $response["Message"] = "Échec de suppression";
            return $response;
        }
    }
}