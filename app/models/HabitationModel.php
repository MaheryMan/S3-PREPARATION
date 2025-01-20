<?php

namespace app\models;

use Flight;

class HabitationModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM habitations");
        return $stmt->fetchAll();
    }
}
