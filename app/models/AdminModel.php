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
}