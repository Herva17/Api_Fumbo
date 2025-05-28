<?php
require_once("./Config.php");

class Abonnement
{
    // Ajouter un abonnement
public static function ajouter($id_abonne, $id_auteur)
{
    // Connexion à la base de données
    $data = get_connection();

    // Préparer la requête SQL pour insérer un abonnement
    $sql = "INSERT INTO abonnements (id_abonne, id_auteur) VALUES (?, ?)";
    $stmt = $data->prepare($sql);

    try {
        // Exécuter la requête avec les paramètres fournis
        $success = $stmt->execute([$id_abonne, $id_auteur]);

        // Vérifier si l'insertion a réussi
        if ($success) {
            return [
                "succes" => true,
                "message" => "Abonnement ajouté avec succès"
            ];
        } else {
            // Retourner une réponse d'échec si l'exécution échoue
            return [
                "succes" => false,
                "message" => "Erreur lors de l'ajout de l'abonnement"
            ];
        }
    } catch (PDOException $e) {
        // Gérer les exceptions PDO pour éviter les erreurs non contrôlées
        return [
            "succes" => false,
            "message" => "Erreur PDO : " . $e->getMessage()
        ];
    }
}

    // Supprimer un abonnement
    public static function supprimer($id_abonne, $id_auteur)
    {
        $data = get_connection();
        $sql = "DELETE FROM abonnements WHERE id_abonne = ? AND id_auteur = ?";
        $stmt = $data->prepare($sql);
        $success = $stmt->execute([$id_abonne, $id_auteur]);
        if ($success) {
            return ["Reussite" => "Abonnement supprimé avec succès"];
        } else {
            return ["Message" => "Erreur lors de la suppression de l'abonnement"];
        }
    }

    // Sélectionner tous les abonnements d'un utilisateur
    public static function select_by_user($id_abonne)
    {
        $data = get_connection();
        $sql = "SELECT abonnements.*, users.username, users.prenom, users.image
                FROM abonnements
                INNER JOIN users ON abonnements.id_auteur = users.id
                WHERE abonnements.id_abonne = ?";
        $stmt = $data->prepare($sql);
        $stmt->execute([$id_abonne]);
        $donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            return ["Message" => "Aucun abonnement trouvé pour cet utilisateur"];
        }
    }

    // Compter le nombre d'abonnements d'un utilisateur
    public static function compter($id_abonne)
    {
        $data = get_connection();
        $sql = "SELECT COUNT(*) as total FROM abonnements WHERE id_abonne = ?";
        $stmt = $data->prepare($sql);
        $stmt->execute([$id_abonne]);
        $donnees = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($donnees) {
            return $donnees;
        } else {
            return ["Message" => "Aucune donnée disponible"];
        }
    }

    // Sélectionner tous les abonnés d'un auteur
   public static function select_abonnes($id_auteur)
{
    $data = get_connection();
    $sql = "SELECT abonnements.*, users.username, users.prenom, users.image
            FROM abonnements
            INNER JOIN users ON abonnements.id_abonne = users.id_user
            WHERE abonnements.id_auteur = ?";
    $stmt = $data->prepare($sql);
    $stmt->execute([$id_auteur]);
    $donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($donnees) > 0) {
        return $donnees;
    } else {
        return ["Message" => "Aucun abonné trouvé pour cet auteur"];
    }
}
public static function compter_abonnes($id_auteur)
{
    $data = get_connection();
    $sql = "SELECT COUNT(*) as total FROM abonnements WHERE id_auteur = ?";
    $stmt = $data->prepare($sql);
    $stmt->execute([$id_auteur]);
    $donnees = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($donnees) {
        return $donnees;
    } else {
        return ["Message" => "Aucune donnée disponible"];
    }
}
}