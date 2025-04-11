<?php
require_once("./Config.php");
class User
{
    public $me = array();

    public static function save($Username, $Prenom, $Email, $Password, $Bio, $Image, $Date_Inscription, $Id_Nationalite)
    {
        $data = get_connection();
        if ($data->query("INSERT INTO users(username, prenom, email, password, bio, image, date_inscription, id_nationalite) 
                          VALUES ('$Username', '$Prenom', '$Email', '$Password', '$Bio', '$Image', '$Date_Inscription', '$Id_Nationalite')")) {
            $me["Reussite"] = "Utilisateur enregistré";
            $me["Dernier_Enregistrement"] = self::get_last();
            return $me;
        } else {
            $me["Message"] = "Echec d'enregistrement";
            return $me;
        }
    }

    public static function delete($Id_User)
    {
        $data = get_connection();
        if ($data->query("DELETE FROM users WHERE id_user = '$Id_User'")) {
            $me["Reussite"] = "Suppression réussie";
            return $me;
        } else {
            $me["Message"] = "Echec de suppression";
            return $me;
        }
    }

    public static function update($Id_User, $Username, $Prenom, $Email, $Password, $Bio, $Image, $Id_Nationalite)
    {
        $data = get_connection();
        if ($data->query("UPDATE users 
                          SET username = '$Username', prenom = '$Prenom', email = '$Email', password = '$Password', bio = '$Bio', image = '$Image', id_nationalite = '$Id_Nationalite' 
                          WHERE id_user = '$Id_User'")) {
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
        $donnees = $data->query("SELECT * FROM users")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $me["Message"] = "Aucune donnée disponible";
            return $me;
        }
    }

    public static function select_one($Id_User)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM users WHERE id_user = '$Id_User'")->fetchAll();
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
        $donnees = $data->query("SELECT * FROM users ORDER BY id_user DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }

    public static function CompterUsers()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT count(id_user) as total FROM users")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $me["Message"] = "Aucune donnée disponible";
            return $me;
        }
    }

    public static function se_connecter($identifiant, $password)
    {
        $data = get_connection();
        $query = $data->prepare("SELECT * FROM users WHERE (email = :identifiant OR username = :identifiant) AND password = :password");
        $query->execute([
            ':identifiant' => $identifiant,
            ':password' => $password
        ]);
        $user = $query->fetch();

        if ($user) {
            return [
                "Message" => "Vous êtes connecté avec succès, monsieur " . $user['username']
            ];
        } else {
            return [
                "Message" => "Identifiants incorrects. Veuillez réessayer."
            ];
        }
    }
}