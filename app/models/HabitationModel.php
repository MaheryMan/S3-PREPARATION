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

    /**
     * Récupère toutes les habitations avec leur première photo et leur type.
     *
     * @return array
     */
    public function getAll()
    {
        $stmt = $this->db->query("
            SELECT 
                h.id AS habitation_id,
                h.nb_chambres,
                h.loyer_jour,
                h.quartier,
                h.description,
                t.nom AS type_habitation,
                (
                    SELECT p.url_photo 
                    FROM photos p 
                    WHERE p.habitation_id = h.id 
                    ORDER BY p.id ASC 
                    LIMIT 1
                ) AS photo_url
            FROM habitations h
            JOIN types_habitations t ON h.type_id = t.id
        ");
        return $stmt->fetchAll();
    }
    /**
     * Récupère une habitation par ID avec ses informations complètes et toutes ses photos.
     *
     * @param int $habitationId
     * @return array|null
     */
    public function getById($habitationId)
    {
        // Récupère les informations de l'habitation, son type et la première photo
        $stmt = $this->db->prepare("
            SELECT 
                h.id AS habitation_id,
                h.nb_chambres,
                h.loyer_jour,
                h.quartier,
                h.description,
                t.nom AS type_habitation,
                (
                    SELECT p.url_photo 
                    FROM photos p 
                    WHERE p.habitation_id = h.id 
                    ORDER BY p.id ASC 
                    LIMIT 1
                ) AS first_photo
            FROM habitations h
            JOIN types_habitations t ON h.type_id = t.id
            WHERE h.id = :habitation_id
        ");
        $stmt->execute(['habitation_id' => $habitationId]);
        $habitation = $stmt->fetch();

        if (!$habitation) {
            // Retourne null si l'habitation n'existe pas
            return null;
        }

        return $habitation;
    }
    public function getAdditionalPhotos($habitationId)
    {
        $stmt = $this->db->prepare("
            SELECT url_photo 
            FROM photos 
            WHERE habitation_id = :habitation_id
            ORDER BY id ASC
            LIMIT 100 OFFSET 1
        ");
        $stmt->execute(['habitation_id' => $habitationId]);
        $photos = $stmt->fetchAll();

        return array_column($photos, 'url_photo');
    }

    /**
     * Vérifie si une habitation est disponible entre deux dates.
     *
     * @param int $habitationId
     * @param string $startDate Format YYYY-MM-DD
     * @param string $endDate Format YYYY-MM-DD
     * @return bool
     */
    public function isAvailable($habitationId, $startDate, $endDate)
    {
        $stmt = $this->db->prepare("
                SELECT COUNT(*) AS nb_reservations
                FROM reservations
                WHERE habitation_id = :habitation_id
                  AND (
                       (:start_date BETWEEN date_arrivee AND date_depart)
                       OR (:end_date BETWEEN date_arrivee AND date_depart)
                       OR (date_arrivee BETWEEN :start_date AND :end_date)
                       OR (date_depart BETWEEN :start_date AND :end_date)
                  )
            ");
        $stmt->execute([
            ':habitation_id' => $habitationId,
            ':start_date' => $startDate,
            ':end_date' => $endDate
        ]);

        $result = $stmt->fetch();
        return $result['nb_reservations'] == 0;
    }
    public function addReservation($habitationId, $userId, $startDate, $endDate)
    {
        $stmt = $this->db->prepare("
            INSERT INTO reservations (habitation_id, user_id, date_arrivee, date_depart)
            VALUES (:habitation_id, :user_id, :date_arrivee, :date_depart)
        ");

        return $stmt->execute([
            ':habitation_id' => $habitationId,
            ':user_id' => $userId,
            ':date_arrivee' => $startDate,
            ':date_depart' => $endDate
        ]);
    }
}
