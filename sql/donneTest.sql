-- Supprimer d'abord les données des tables enfants
SET FOREIGN_KEY_CHECKS = 0;  -- Désactiver temporairement la vérification des clés étrangères

DELETE FROM reservations;
DELETE FROM photos;
DELETE FROM habitations;
DELETE FROM types_habitations;
DELETE FROM users;

SET FOREIGN_KEY_CHECKS = 1;  -- Réactiver la vérification des clés étrangères

-- Insertion des utilisateurs
INSERT INTO users (email, nom, password, telephone) VALUES
('user1@test.com', 'Jean Dupont', 'password123', '0123456789'),
('user2@test.com', 'Marie Martin', 'password456', '0234567890'),
('user3@test.com', 'Pierre Durant', 'password789', '0345678901');

-- Insertion des types d'habitations
INSERT INTO types_habitations (nom) VALUES
('Appartement'),
('Maison'),
('Studio'),
('Villa'),
('Loft');

-- Insertion des habitations
INSERT INTO habitations (type_id, nb_chambres, loyer_jour, quartier, description) VALUES
((SELECT id FROM types_habitations WHERE nom = 'Appartement'), 2, 75.00, 'Centre-ville', 'Bel appartement lumineux au cœur de la ville'),
((SELECT id FROM types_habitations WHERE nom = 'Maison'), 4, 150.00, 'Résidentiel', 'Grande maison familiale avec jardin'),
((SELECT id FROM types_habitations WHERE nom = 'Studio'), 1, 45.00, 'Universitaire', 'Studio moderne parfait pour étudiant'),
((SELECT id FROM types_habitations WHERE nom = 'Villa'), 5, 300.00, 'Bord de mer', 'Villa luxueuse avec piscine et vue sur mer'),
((SELECT id FROM types_habitations WHERE nom = 'Loft'), 2, 120.00, 'Quartier artistique', 'Loft industriel rénové avec style');

-- Insertion des photos
INSERT INTO photos (habitation_id, url_photo) VALUES
(1, 'photos/appart1.jpg'),
(2, 'photos/maison1.jpg'),
(3, 'photos/studio1.jpg'),
(4, 'photos/villa1.jpg'),
(5, 'photos/loft1.jpg');

-- Insertion des réservations
INSERT INTO reservations (habitation_id, user_id, date_arrivee, date_depart) VALUES
(1, 1, '2024-01-01', '2024-01-07'),
(2, 2, '2024-01-15', '2024-01-22'),
(3, 3, '2024-02-01', '2024-02-05');
