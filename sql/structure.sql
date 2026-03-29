-- Script SQL
-- Création de la base de données 
CREATE DATABASE IF NOT EXISTS ega_manager; 
USE ega_manager; 

-- Création des tables

CREATE TABLE utilisateur(
    id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    motdepasse VARCHAR(255),
    date_inscription DATETIME
);

CREATE TABLE categorie (
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    couleur VARCHAR(7)
);

CREATE TABLE depense(
    id_depense INT PRIMARY KEY AUTO_INCREMENT,
    montant DECIMAL(10, 2),
    date DATE,
    description TEXT,
    id_categorie INT NOT NULL,
    id_utilisateur INT NOT NULL,
    FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur) ON DELETE CASCADE
);

CREATE TABLE budget (
    id_budget INT PRIMARY KEY AUTO_INCREMENT,
    montant_limite DECIMAL(10,2),
    mois INT,
    annee INT,
    id_categorie INT NOT NULL,
    id_utilisateur INT NOT NULL,
    FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur) ON DELETE CASCADE,
    UNIQUE(id_utilisateur, id_categorie, mois, annee)
);

CREATE TABLE revenu (
    id_revenu INT PRIMARY KEY AUTO_INCREMENT,
    montant DECIMAL(10,2),
    source VARCHAR(100),
    date DATE,
    id_utilisateur INT NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur) ON DELETE CASCADE
);