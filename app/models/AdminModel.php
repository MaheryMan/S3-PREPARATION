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
}