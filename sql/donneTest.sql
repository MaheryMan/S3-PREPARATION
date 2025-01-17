INSERT INTO Chauffeur (nom, tel) VALUES
('Jean Dupont', '0341234567'),
('Marie Curie', '0339876543'),
('Paul Durand', '0324567890'),
('Emma Lefevre', '0348765432');

INSERT INTO Vehicule (immatriculation, modele) VALUES
('AA-123-BB', 'Renault Clio'),
('CC-456-DD', 'Peugeot 308'),
('EE-789-FF', 'Citroën C4'),
('GG-012-HH', 'Volkswagen Golf'),
('II-345-JJ', 'Toyota Corolla'),
('KK-678-LL', 'Ford Fiesta');

INSERT INTO Trajet (id_chauffeur, id_vehicule, date_debut, date_fin, montant_recette, montant_carburant, distance_km) VALUES
(1, 1, '2024-12-01 08:00:00', '2024-12-01 12:00:00', 100.00, 20.00, 150.00),
(2, 2, '2024-12-01 09:00:00', '2024-12-01 11:30:00', 80.00, 15.00, 120.00),
(3, 3, '2024-12-02 10:00:00', '2024-12-02 14:00:00', 120.00, 25.00, 200.00),
(4, 4, '2024-12-03 08:30:00', '2024-12-03 13:00:00', 150.00, 30.00, 250.00),
(1, 5, '2024-12-04 14:00:00', '2024-12-04 18:00:00', 90.00, 18.00, 140.00),
(2, 6, '2024-12-05 07:00:00', '2024-12-05 10:00:00', 70.00, 12.00, 100.00);

INSERT INTO Panne (id_vehicule, date_panne) VALUES
(1, '2024-12-06 08:00:00'),
(3, '2024-12-07 09:30:00'),
(5, '2024-12-08 12:45:00');

INSERT INTO Versement (id_vehicule, montant_minimum) VALUES
(1, 500.00),
(2, 450.00),
(3, 600.00),
(4, 550.00),
(5, 480.00),
(6, 520.00);
