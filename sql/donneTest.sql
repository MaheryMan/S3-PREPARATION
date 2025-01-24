-- Insérer des types d'habitations
INSERT INTO types_habitations (nom) VALUES
('Maison'),
('Studio'),
('Appartement');

-- Insérer des habitations
INSERT INTO habitations (type_id, nb_chambres, loyer_jour, quartier, description) VALUES
(1, 4, 50.00, 'Quartier des Lilas', 'Une maison spacieuse avec un grand jardin.'),
(2, 1, 30.00, 'Centre-ville', 'Un studio moderne parfait pour une personne seule.'),
(3, 3, 45.00, 'Quartier Résidentiel', 'Un appartement lumineux idéal pour une famille.');

-- Insérer des photos pour les habitations
INSERT INTO photos (habitation_id, url_photo) VALUES
(1, 'maison_photo1.png'),
(1, 'maison_photo2.png'),
(1, 'maison_photo3.png'),
(2, 'studio_photo1.png'),
(2, 'studio_photo2.png'),
(2, 'studio_photo3.png'),
(3, 'appartement_photo1.png'),
(3, 'appartement_photo2.png'),
(3, 'appartement_photo3.png');

