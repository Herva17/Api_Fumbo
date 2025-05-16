<?php
require_once("./Config.php");
class Ouvrage
{
    public $response = array();

    public static function enregistrer($titre_ouvrage, $id_user, $id_categorie, $annee_publication, $image, $langue, $isbn, $resume, $format, $Nb_pages, $fichier_livre, $tags)
    {
        $data = get_connection();
        $query = $data->prepare("INSERT INTO ouvrage (titre_ouvrage, id_user, id_categorie, annee_publication, image, langue, isbn, resume, format, Nb_pages, fichier_livre, tags) 
                                 VALUES (:titre_ouvrage, :id_user, :id_categorie, :annee_publication, :image, :langue, :isbn, :resume, :format, :Nb_pages, :fichier_livre, :tags)");
        $success = $query->execute([
            ':titre_ouvrage' => $titre_ouvrage,
            ':id_user' => $id_user,
            ':id_categorie' => $id_categorie,
            ':annee_publication' => $annee_publication,
            ':image' => $image,
            ':langue' => $langue,
            ':isbn' => $isbn,
            ':resume' => $resume,
            ':format' => $format,
            ':Nb_pages' => $Nb_pages,
            ':fichier_livre' => $fichier_livre,
            ':tags' => $tags
        ]);

        if ($success) {
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
        $donnees = $data->query("SELECT * FROM ouvrage ORDER BY id_ouvrage DESC LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);
        if (count($donnees) > 0) {
            return $donnees;
        }
    }

    public static function select_all()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM ouvrage")->fetchAll(PDO::FETCH_ASSOC);
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["Message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function update($id_ouvrage, $titre_ouvrage, $id_user, $id_categorie, $annee_publication, $image, $langue, $isbn, $resume, $format, $Nb_pages, $fichier_livre, $tags)
    {
        $data = get_connection();
        $query = $data->prepare("UPDATE ouvrage 
                                 SET titre_ouvrage = :titre_ouvrage, id_user = :id_user, id_categorie = :id_categorie, 
                                     annee_publication = :annee_publication, image = :image, langue = :langue, isbn = :isbn, 
                                     resume = :resume, format = :format, Nb_pages = :Nb_pages, fichier_livre = :fichier_livre, tags = :tags
                                 WHERE id_ouvrage = :id_ouvrage");
        $success = $query->execute([
            ':id_ouvrage' => $id_ouvrage,
            ':titre_ouvrage' => $titre_ouvrage,
            ':id_user' => $id_user,
            ':id_categorie' => $id_categorie,
            ':annee_publication' => $annee_publication,
            ':image' => $image,
            ':langue' => $langue,
            ':isbn' => $isbn,
            ':resume' => $resume,
            ':format' => $format,
            ':Nb_pages' => $Nb_pages,
            ':fichier_livre' => $fichier_livre,
            ':tags' => $tags
        ]);

        if ($success) {
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
        $query = $data->prepare("SELECT * FROM ouvrage WHERE id_ouvrage = :id_ouvrage");
        $query->execute([':id_ouvrage' => $id_ouvrage]);
        $donnees = $query->fetchAll(PDO::FETCH_ASSOC);
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
        $donnees = $data->query("SELECT count(id_ouvrage) as total FROM ouvrage")->fetchAll(PDO::FETCH_ASSOC);
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
        $query = $data->prepare("DELETE FROM ouvrage WHERE id_ouvrage = :id_ouvrage");
        $success = $query->execute([':id_ouvrage' => $id_ouvrage]);

        if ($success) {
            $response["Reussite"] = "Suppression réussie";
            return $response;
        } else {
            $response["Message"] = "Échec de suppression";
            return $response;
        }
    }
}