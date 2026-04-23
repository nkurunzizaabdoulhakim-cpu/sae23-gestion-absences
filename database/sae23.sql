CREATE DATABASE IF NOT EXISTS `sae23` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sae23`;

CREATE TABLE `absences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seance_id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `creneau` varchar(20) NOT NULL,
  `type_absence` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `enseignants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `enseignants` (`id`, `login`, `motdepasse`, `nom`) VALUES
(1, 'ennaji', 'admin', 'Ennaji'),
(2, 'ravach', 'admin', 'Ravach'),
(3, 'broussin', 'admin', 'Broussin'),
(4, 'kramm', 'admin', 'Kramm');

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `groupe_id` int(11) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `groupe_id`, `login`, `motdepasse`) VALUES
(1, 'Zakaria', 'A', 1, 'zakariaa', '1234'),
(2, 'Salah', 'A', 1, 'salaha', '1234'),
(3, 'Promisse', 'A', 1, 'promissea', '1234'),
(4, 'Rayan', 'A', 1, 'rayana', '1234'),
(5, 'Abdoulhakim', 'A', 1, 'abdoulhakima', '1234'),
(6, 'Amine', 'A', 1, 'aminea', '1234'),
(7, 'Anta', 'A', 1, 'antaa', '1234'),
(8, 'Moreau', 'B', 2, 'moreaub', '1234'),
(9, 'Dubois', 'B', 2, 'duboisb', '1234'),
(10, 'Simon', 'B', 2, 'simonb', '1234'),
(11, 'Laurent', 'B', 2, 'laurentb', '1234'),
(12, 'Lefebvre', 'B', 2, 'lefebvreb', '1234'),
(13, 'Michel', 'B', 2, 'bmichel', '1234'),
(14, 'Garcia', 'B', 2, 'garciab', '1234'),
(15, 'David', 'C', 3, 'davidc', '1234'),
(16, 'Bertrand', 'C', 3, 'bertrandc', '1234'),
(17, 'Roux', 'C', 3, 'rouxc', '1234'),
(18, 'Vincent', 'C', 3, 'cvincent', '1234'),
(19, 'Fournier', 'C', 3, 'fournierc', '1234'),
(20, 'Morel', 'C', 3, 'morelc', '1234'),
(21, 'Girard', 'C', 3, 'girardc', '1234'),
(22, 'Andre', 'D', 4, 'andred', '1234'),
(23, 'Lefevre', 'D', 4, 'lefevred', '1234'),
(24, 'Mercier', 'D', 4, 'mercierd', '1234'),
(25, 'Dupont', 'D', 4, 'dupontd', '1234'),
(26, 'Lambert', 'D', 4, 'lambertd', '1234'),
(27, 'Bonnet', 'D', 4, 'bonnetd', '1234'),
(28, 'Francois', 'D', 4, 'francoisd', '1234');

CREATE TABLE `groupes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `groupes` (`id`, `nom`) VALUES
(1, 'Groupe A'),
(2, 'Groupe B'),
(3, 'Groupe C'),
(4, 'Groupe D');

CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `modules` (`id`, `code`, `libelle`) VALUES
(1, 'R201', 'Technologies de l\'Internet'),
(2, 'R202', 'Admin système et fondamentaux de la virtualisation'),
(3, 'R203', 'Bases des services réseaux'),
(4, 'R204', 'Initiation à la téléphonie d\'entreprise'),
(5, 'R205', 'Signaux et systèmes pour les transmissions'),
(6, 'R206', 'Numérisation de l\'information'),
(7, 'R207', 'Sources de données'),
(8, 'R208', 'Analyse et traitement de données structurées'),
(9, 'R209', 'Initiation au développement web'),
(10, 'R210', 'Anglais technique 2'),
(11, 'R211', 'Communication'),
(12, 'R212', 'Projet Personnel et Professionnel'),
(13, 'R213', 'Mathématiques des systèmes numériques'),
(14, 'R214', 'Analyse mathématique des signaux'),
(15, 'SAE21', 'Construire un réseau pour une TPE'),
(16, 'SAE22', 'Mesurer et caractériser un signal ou un système'),
(17, 'SAE23', 'Mettre en place une solution info d\'entreprise'),
(18, 'SAE24', 'Projet intégratif'),
(19, 'SAE25', 'Portfolio');

CREATE TABLE `seances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `groupe_id` int(11) NOT NULL,
  `date_seance` date NOT NULL,
  `heure_seance` time NOT NULL,
  `enseignant_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;