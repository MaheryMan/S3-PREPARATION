<?php

namespace app\models;

use Flight;

class AdminModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function listerHabitation(){
        $stmt = $this->db->query("
            SELECT h.*, p.url_photo 
            FROM habitations h
            LEFT JOIN photos p ON h.id = p.habitation_id
            GROUP BY h.id
        ");
        return $stmt->fetchAll();
    }
    public function ajouterHabitation($typeId, $nbChambres, $loyerJour, $quartier, $description, $url_photos){
        $stmt = $this->db->prepare("
            INSERT INTO habitations (type_id, nb_chambres, loyer_jour, quartier, description)
            VALUES (?, ?, ?, ?, ?)
        ");
        try {
            $this->db->beginTransaction();
            $stmt->execute([$typeId, $nbChambres, $loyerJour, $quartier, $description]);
            $habitationId = $this->db->lastInsertId();
            
            $photoStmt = $this->db->prepare("INSERT INTO photos (habitation_id, url_photo) VALUES (?, ?)");
            foreach ($url_photos as $url) {
                $photoStmt->execute([$habitationId, $url]);
            }
            
            $this->db->commit();
        } catch (\Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
        return $stmt->execute([$typeId, $nbChambres, $loyerJour, $quartier, $description]);
    }
    public function getTypeHabitation(){
        $stmt = $this->db->query("SELECT * FROM types_habitations");
        return $stmt->fetchAll();
    }
    public function getHabitation($id){
        $stmt = $this->db->prepare("SELECT * FROM habitations WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function getPhotosbyId($id){
        $stmt = $this->db->prepare("SELECT * FROM photos WHERE habitation_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    public function getUrlPhoto($id){
        $stmt = $this->db->prepare("SELECT url_photo FROM photos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchColumn();
    }
    public function supprimerPhoto($id){
        $stmt = $this->db->prepare("DELETE FROM photos WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function supprimerHabitation($id) {
        try {
            $this->db->beginTransaction();
            
            // Delete photos first (foreign key constraint)
            $stmtPhotos = $this->db->prepare("DELETE FROM photos WHERE habitation_id = ?");
            $stmtPhotos->execute([$id]);
            
            // Delete habitation
            $stmtHabitation = $this->db->prepare("DELETE FROM habitations WHERE id = ?");
            $stmtHabitation->execute([$id]);
            
            // Reset auto-increment to max id + 1
            $this->db->query("ALTER TABLE habitations AUTO_INCREMENT = 1");
            $this->db->query("SET @count = 0");
            $this->db->query("UPDATE habitations SET id = @count:= @count + 1");
            $this->db->query("ALTER TABLE habitations AUTO_INCREMENT = @count + 1");
            
            $this->db->commit();
            return true;
        } catch (\Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
    
    public function modifierHabitation($id, $typeId, $nbChambres, $loyerJour, $quartier, $description){
        $stmt = $this->db->prepare("
            UPDATE habitations
            SET type_id = ?, nb_chambres = ?, loyer_jour = ?, quartier = ?, description = ?
            WHERE id = ?
        ");
        return $stmt->execute([$typeId, $nbChambres, $loyerJour, $quartier, $description, $id]);
    }
}