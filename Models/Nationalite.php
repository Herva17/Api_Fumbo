<?php
require_once ("./Config.php");
class Nationalite
{
    public $me = array();

    public static function save($Nom, $Image)
    {
        $data = get_connection();
        if ($data->query("INSERT INTO nationalite(nom_nationalite, image) VALUES ('$Nom', '$Image')")) {
            $me["Reussite"] = "Enregistrement effectué";
            $me["Dernier_Enregistrement"] = self::get_last();
            return $me;
        } else {
            $me["Message"] = "Echec d'enregistrement";
            return $me;
        }
    }

    public static function delete($Id_Nationalite)
    {
        $data = get_connection();
        if ($data->query("DELETE FROM nationalite WHERE id_nationalite = '$Id_Nationalite'")) {
            $me["Reussite"] = "Suppression réussie";
            return $me;
        } else {
            $me["Message"] = "Echec de suppression";
            return $me;
        }
    }

    public static function update($Id_Nationalite, $Nom, $Image)
    {
        $data = get_connection();
        if ($data->query("UPDATE nationalite SET nom_nationalite = '$Nom', image = '$Image' WHERE id_nationalite = '$Id_Nationalite'")) {
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
        $donnees = $data->query("SELECT * FROM nationalite")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $me["Message"] = "Aucune donnée disponible";
            return $me;
        }
    }

    public static function select_one($Id_Nationalite)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM nationalite WHERE id_nationalite = '$Id_Nationalite'")->fetchAll();
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
        $donnees = $data->query("SELECT * FROM nationalite ORDER BY id_nationalite DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }

    public static function CompterNationalite()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT count(id_nationalite) as total FROM nationalite")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $me["Message"] = "Aucune donnée disponible";
            return $me;
        }
    }
}