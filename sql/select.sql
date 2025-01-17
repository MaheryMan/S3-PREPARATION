-- 1. Liste par jour des véhicules et son chauffeur correspondant
SELECT 
    DATE(date_debut) AS date_trajet,
    v.modele AS vehicule,
    c.nom AS chauffeur,
    SUM(t.distance_km) AS km_effectue,
    SUM(t.montant_recette) AS montant_recette,
    SUM(t.montant_carburant) AS montant_carburant
FROM 
    Trajet t
JOIN 
    Vehicule v ON t.id_vehicule = v.id_vehicule
JOIN 
    Chauffeur c ON t.id_chauffeur = c.id_chauffeur
GROUP BY 
    DATE(date_debut), v.id_vehicule;

-- 2. Total montant bénéfice par véhicule
SELECT 
    v.modele AS vehicule,
    SUM(t.montant_recette - t.montant_carburant) AS benefice_total
FROM 
    Trajet t
JOIN 
    Vehicule v ON t.id_vehicule = v.id_vehicule
GROUP BY 
    v.id_vehicule;

-- 3. Total montant bénéfice par jour
SELECT 
    DATE(date_debut) AS date_trajet,
    SUM(montant_recette - montant_carburant) AS benefice_total_journalier
FROM 
    Trajet
GROUP BY 
    DATE(date_debut);

-- 4. Afficher les trajets les plus rentables par jour
SELECT 
    DATE(date_debut) AS date_trajet,
    id_trajet,
    (montant_recette - montant_carburant) AS benefice_net
FROM 
    Trajet
ORDER BY 
    DATE(date_debut), benefice_net DESC;

-- 5. Afficher les véhicules disponibles dans une date donnée (ex: '2024-12-01')
SELECT 
    v.modele AS vehicule
FROM 
    Vehicule v
WHERE 
    v.id_vehicule NOT IN (
        SELECT id_vehicule FROM Trajet WHERE DATE(date_debut) = '2024-12-01'
        UNION ALL
        SELECT id_vehicule FROM Panne WHERE DATE(date_panne) = '2024-12-01'
);

-- 6. Afficher le taux de pourcentage de panne par mois
SELECT 
    v.modele AS vehicule,
    COUNT(p.id_panne) * 100 / (25 * COUNT(DISTINCT DATE_FORMAT(p.date_panne, '%Y-%m'))) AS taux_panne_percentage
FROM 
    Vehicule v LEFT JOIN Panne p ON v.id_vehicule = p.id_vehicule
GROUP BY 
   v.id_vehicule;