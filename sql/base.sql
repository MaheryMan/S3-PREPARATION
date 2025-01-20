-- Création de la base de données
CREATE DATABASE IF NOT EXISTS airbnb;
USE airbnb;

-- Table des utilisateurs (clients et admin)
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE NOT NULL,
    nom VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    telephone VARCHAR(20) NOT NULL
);
CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Table des types d'habitation
CREATE TABLE types_habitations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL
);

-- Table des habitations
CREATE TABLE habitations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    type_id INT NOT NULL,
    nb_chambres INT NOT NULL,
    loyer_jour DECIMAL(10,2) NOT NULL,
    quartier VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    FOREIGN KEY (type_id) REFERENCES types_habitations(id)
);

-- Table des photos
CREATE TABLE photos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    habitation_id INT NOT NULL,
    url_photo VARCHAR(255) NOT NULL,
    FOREIGN KEY (habitation_id) REFERENCES habitations(id)
);

-- Table des réservations
CREATE TABLE reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    habitation_id INT NOT NULL,
    user_id INT NOT NULL,
    date_arrivee DATE NOT NULL,
    date_depart DATE NOT NULL,
    FOREIGN KEY (habitation_id) REFERENCES habitations(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insertion des types d'habitation de base
INSERT INTO types_habitations (nom) VALUES
('Maison'),
('Studio'),
('Appartement');