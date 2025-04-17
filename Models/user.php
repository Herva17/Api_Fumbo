<?php
require_once("./Config.php");
class User
{
    public $me = array();

    public static function save($Username, $Prenom, $Email, $Password, $Bio, $Image, $Date_Inscription, $Id_Nationalite)
    {
        $data = get_connection();
    
        // Vérifier si l'id_nationalite existe dans la table nationalite
        if ($Id_Nationalite !== null) {
            $query = $data->prepare("SELECT * FROM nationalite WHERE id_nationalite = :id_nationalite");
            $query->execute([':id_nationalite' => $Id_Nationalite]);
            $nationalite = $query->fetch();
    
            if (!$nationalite) {
                return [
                    "Message" => "La nationalité spécifiée n'existe pas. Veuillez fournir un id_nationalite valide."
                ];
            }
        }
    
        // Vérifier si l'email ou le nom d'utilisateur existe déjà
        $query = $data->prepare("SELECT * FROM users WHERE email = :email OR username = :username");
        $query->execute([
            ':email' => $Email,
            ':username' => $Username
        ]);
        $existingUser = $query->fetch();
    
        if ($existingUser) {
            return [
                "Message" => "L'email ou le nom d'utilisateur existe déjà. Veuillez en choisir un autre."
            ];
        }
    
        // Hachage du mot de passe
        $hashedPassword = password_hash($Password, PASSWORD_BCRYPT);
    
        // Insérer le nouvel utilisateur
        $query = $data->prepare("INSERT INTO users (username, prenom, email, password, bio, image, date_inscription, id_nationalite) 
                                 VALUES (:username, :prenom, :email, :password, :bio, :image, :date_inscription, :id_nationalite)");
        $success = $query->execute([
            ':username' => $Username,
            ':prenom' => $Prenom,
            ':email' => $Email,
            ':password' => $hashedPassword, // Utilisation du mot de passe haché
            ':bio' => $Bio,
            ':image' => $Image,
            ':date_inscription' => $Date_Inscription,
            ':id_nationalite' => $Id_Nationalite
        ]);
    
        if ($success) {
            return [
                "Reussite" => "Utilisateur enregistré",
                "Dernier_Enregistrement" => self::get_last()
            ];
        } else {
            return [
                "Message" => "Echec d'enregistrement"
            ];
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

    public static function se_connecter($Identifiant, $Password)
    {
        $pdo = get_connection();
    
        // Requête SQL pour vérifier l'utilisateur
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :identifiant OR username = :identifiant");
        $stmt->execute(['identifiant' => $Identifiant]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Utiliser PDO::FETCH_ASSOC pour éviter les index numériques
    
        // Vérifiez si l'utilisateur existe et si le mot de passe correspond
        if ($user && password_verify($Password, $user['password'])) {
            unset($user['password']); // Supprimez le mot de passe avant de retourner les données
            return [
                "Message" => "Connexion réussie",
                "Utilisateur" => $user
            ];
        }
    
        return [
            "Message" => "Identifiants incorrects. Veuillez réessayer."
        ];
    }
}