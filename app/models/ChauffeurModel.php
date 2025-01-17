<?php

namespace app\models;

use Flight;

class ChauffeurModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllChauffeur()
    {
        $stmt = $this->db->query("SELECT * FROM Chauffeur");
        return $stmt->fetchAll();
    }
    public function getChaufferVehiculeParJour($date)
    {
        $sql = "SELECT 
            c.nom AS chauffeur_nom,
            v.modele AS vehicule_modele,
            v.immatriculation AS vehicule_immatriculation,
            DATE(t.date_debut) AS date_trajet
            FROM Trajet t
            JOIN Chauffeur c ON t.id_chauffeur = c.id_chauffeur
            JOIN Vehicule v ON t.id_vehicule = v.id_vehicule
            WHERE DATE(t.date_debut) = :date";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['date' => $date]);
        return $stmt->fetchAll();
    }
    public function getSommeTrajetsParJour($date)
    {
        $sql = "SELECT 
                c.nom AS chauffeur_nom,
                v.modele AS vehicule_modele,
                v.immatriculation AS vehicule_immatriculation,
                SUM(t.distance_km) AS total_distance_km,
                SUM(t.montant_recette) AS total_montant_recette,
                SUM(t.montant_carburant) AS total_montant_carburant
            FROM Trajet t
            JOIN Chauffeur c ON t.id_chauffeur = c.id_chauffeur
            JOIN Vehicule v ON t.id_vehicule = v.id_vehicule
            WHERE DATE(t.date_debut) = :date
            GROUP BY c.nom, v.modele, v.immatriculation";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['date' => $date]);
        return $stmt->fetchAll();
    }
    function getSalaries()
    {
        // Requête SQL
        $sql = "
                SELECT 
                    c.id_chauffeur,
                    c.nom AS chauffeur_nom,
                    v.id_vehicule,
                    v.immatriculation,
                    v.modele AS vehicule_modele,
                    vs.montant_minimum,
                    vr.montant AS versement,
                    s.date AS date_salaire,
                    CASE 
                        WHEN vr.montant < vs.montant_minimum THEN vr.montant * 0.08
                        ELSE vr.montant * 0.25
                    END AS salaire_calcule
                FROM Chauffeur c
                INNER JOIN Salaire s ON c.id_chauffeur = s.id_chauffeur
                INNER JOIN Vehicule v ON v.id_vehicule = (
                    SELECT id_vehicule 
                    FROM Versement
                    WHERE id_chauffeur = c.id_chauffeur
                    LIMIT 1
                )
                INNER JOIN Versement vs ON vs.id_vehicule = v.id_vehicule
                INNER JOIN Versement vr ON vr.id_vehicule = v.id_vehicule
            ";

        // Préparation et exécution
        $stmt = $this->db->prepare($sql);
        // Résultats
        $results = $stmt->fetchAll();
        return $results;
    }
    function getSalariesByDate($date)
    {
        // Requête SQL
        $sql = "
                SELECT 
                    c.id_chauffeur,
                    c.nom AS chauffeur_nom,
                    v.id_vehicule,
                    v.immatriculation,
                    v.modele AS vehicule_modele,
                    vs.montant_minimum,
                    vr.montant AS versement,
                    s.date AS date_salaire,
                    CASE 
                        WHEN vr.montant < vs.montant_minimum THEN vr.montant * 0.08
                        ELSE vr.montant * 0.25
                    END AS salaire_calcule
                FROM Chauffeur c
                INNER JOIN Salaire s ON c.id_chauffeur = s.id_chauffeur
                INNER JOIN Vehicule v ON v.id_vehicule = (
                    SELECT id_vehicule 
                    FROM Versement
                    WHERE id_chauffeur = c.id_chauffeur
                    LIMIT 1
                )
                INNER JOIN Versement vs ON vs.id_vehicule = v.id_vehicule
                INNER JOIN Versement vr ON vr.id_vehicule = v.id_vehicule
                WHERE s.date = :date;
            ";

        // Préparation et exécution
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['date' => $date]);

        // Résultats
        $results = $stmt->fetchAll();
        return $results;
    }
}
