<?php
namespace app\models;

class UtilisateurModel {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUserById($id){
        $requette = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($requette);
        $stmt->execute([
            ':id' => $id
        ]);
        $user = $stmt->fetch();
        return $user;
    }

    public function getId($email){
        $requette = "SELECT id FROM users WHERE email = :email";
        $stmt = $this->db->prepare($requette);
        $stmt->execute([
            ':email' => $email
        ]);
        return $stmt->fetchColumn();
    }
}