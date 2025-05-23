<?php
require_once("./Config.php");
class Histoire
{
    // Ajout d'une histoire
    public static function save($id_user, $categorie, $titre, $personnages_principaux, $description, $histoire, $image_couverture)
    {
        $data = get_connection();
        if ($data->query("INSERT INTO histoires(id_user, categorie, titre, personnages_principaux, description, histoire, image_couverture) VALUES ('$id_user', '$categorie', '$titre', '$personnages_principaux', '$description', '$histoire', '$image_couverture')")) {
            $me["Reussite"] = "Histoire enregistrée";
            $me["Dernier_Enregistrement"] = self::get_last();
            return $me;
        } else {
            $me["Message"] = "Echec d'enregistrement";
            return $me;
        }
    }

    // Suppression d'une histoire
    public static function delete($id_histoire)
    {
        $data = get_connection();
        if ($data->query("DELETE FROM histoires WHERE id_histoire = '$id_histoire'")) {
            $me["Reussite"] = "Suppression réussie";
            return $me;
        } else {
            $me["Message"] = "Echec de suppression";
            return $me;
        }
    }

    // Modification d'une histoire
    public static function update($id_histoire, $id_user, $categorie, $titre, $personnages_principaux, $description, $histoire, $image_couverture)
    {
        $data = get_connection();
        if ($data->query("UPDATE histoires SET id_user = '$id_user', categorie = '$categorie', titre = '$titre', personnages_principaux = '$personnages_principaux', description = '$description', histoire = '$histoire', image_couverture = '$image_couverture' WHERE id_histoire = '$id_histoire'")) {
            $me["Reussite"] = "Modification réussie";
            return $me;
        } else {
            $me["Message"] = "Echec de modification";
            return $me;
        }
    }

    // Sélectionner toutes les histoires
    public static function select_all()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM histoires")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $me["Message"] = "Aucune donnée disponible";
            return $me;
        }
    }

    // Sélectionner une histoire par son id
    public static function select_one($id_histoire)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM histoires WHERE id_histoire = '$id_histoire'")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $me["Message"] = "Aucune donnée disponible";
            return $me;
        }
    }
    public static function select_by_categorie($categorie)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM histoires WHERE categorie = '$categorie'")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $me["Message"] = "Aucune donnée disponible";
            return $me;
        }
    }
    // Dernière histoire enregistrée
    public static function get_last()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM histoires ORDER BY id_histoire DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }

    // Compter le nombre d'histoires
    public static function compterHistoire()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT count(id_histoire) as total FROM histoires")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $me["Message"] = "Aucune donnée disponible";
            return $me;
        }
    }
}
