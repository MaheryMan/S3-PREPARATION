<?php
namespace app\models;

use Flight;
use \PDO;
use \PDOException;

class LoginModel{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function login($email, $password) {
        try {
            $requette = "SELECT email, password, id FROM users WHERE email = :email";
            $stmt = $this->db->prepare($requette);
            $stmt->execute([
                ':email' => $email
            ]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                echo "Utilisateur non trouvé.";
                return false;
            }
            $_SESSION['user_id'] = $user['id'];
            // Vérification du mot de passe
            if ($user['email'] === null) {      
                return false;
            }
            if ($user['email'] === $email && $user['password'] === $password) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    public function loginAdmin($nom, $motsDePasse){
        try {
            $requette = "SELECT nom, password, id FROM admins WHERE nom = :nom";
            $stmt = $this->db->prepare($requette);
            $stmt->execute([
            ':nom' => $nom
            ]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$admin) {
            echo "Administrateur non trouvé.";
            echo "nom : ".$nom;
            return false;
            }
            $_SESSION['admin_id'] = $admin['id'];
            // Vérification du mot de passe
            if ($admin['nom'] === null) {      
            return false;
            }
            if ($admin['nom'] === $nom && $admin['password'] === $motsDePasse) {
            return true;
            } else {
            return false;
            }
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    public function inscription($email, $password, $nom, $telephone) {
        // Vérification si l'utilisateur existe déjà
        $checkQuery = "SELECT COUNT(*) FROM users WHERE email = :email";
        $checkStmt = $this->db->prepare($checkQuery);
        $checkStmt->execute([':email' => $email]);
        $userExists = $checkStmt->fetchColumn();

        if ($userExists) {
            // Utilisateur existe déjà
            return false;
        }

        // Préparation de la requête pour insérer un nouvel utilisateur
        $requette = "INSERT INTO users (email, password, nom, telephone) VALUES (:email, :password, :nom, :telephone)";
        $stmt = $this->db->prepare($requette);

        // Exécution de la requête avec les paramètres
        $stmt->execute([
            ':email' => $email,
            ':password' => $password,
            ':nom' => $nom,
            ':telephone' => $telephone
        ]);

        // Insertion réussie
        return true;
    }
}