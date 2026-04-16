CREATE DATABASE IF NOT EXISTS sae23_absences;
USE sae23_absences;

CREATE TABLE groupes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    groupe_id INT NOT NULL
);

CREATE TABLE modules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20) NOT NULL,
    libelle VARCHAR(100) NOT NULL
);

CREATE TABLE enseignants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL,
    motdepasse VARCHAR(50) NOT NULL,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE seances (
    id INT AUTO_INCREMENT PRIMARY KEY,
    module_id INT NOT NULL,
    groupe_id INT NOT NULL,
    date_seance DATE NOT NULL,
    heure_seance TIME NOT NULL,
    enseignant_id INT NOT NULL
);

CREATE TABLE absences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    seance_id INT NOT NULL,
    etudiant_id INT NOT NULL,
    creneau VARCHAR(20) NOT NULL,
    type_absence VARCHAR(10) NOT NULL
);

INSERT INTO groupes (nom) VALUES ('G1'), ('G2');

INSERT INTO modules (code, libelle)
VALUES ('R209', 'Web Dynamique'),
       ('R202', 'Développement Web'),
       ('R203', 'JavaScript');

INSERT INTO enseignants (login, motdepasse, nom)
VALUES ('admin', 'admin', 'Prof Test');

INSERT INTO etudiants (nom, prenom, groupe_id)
VALUES
('Dupont', 'Jean', 1),
('Martin', 'Paul', 1),
('Bernard', 'Lucas', 1),
('Ali', 'Ahmed', 2),
('Mali', 'Yves', 2);