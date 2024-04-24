-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 18 avr. 2024 à 18:19
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'a761ce3a45d97e41840a788495e85a70d1bb3815');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id` varchar(255) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `domaineSouhaite` varchar(255) DEFAULT NULL,
  `etablissementPrefere` varchar(255) DEFAULT NULL,
  `dernierDiplome` varchar(255) DEFAULT NULL,
  `anneeEtude` varchar(255) DEFAULT NULL,
  `dates` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id`, `firstName`, `lastName`, `dateNaissance`, `gender`, `email`, `phoneNumber`, `country`, `domaineSouhaite`, `etablissementPrefere`, `dernierDiplome`, `anneeEtude`, `dates`) VALUES
('6596916b8f957', 'sdfjkdsf', 'eazjeazk', '2002-12-08', 0, 'sdfsfsdf@mail.com', '+212660726737', 'Maroc', 'DroitPublic, Theatre', 'uir, uemf', 'bac', '2022', '2024-01-04'),
('65a7d4ec33ea1', 'aze', 'aze', '2024-02-08', 0, 'azeazezae@gmail.com', '+212660726737', 'Maroc', 'autre', 'none', '1bac', '2022', '2024-01-17'),
('65a7d545066ce', 'aze', 'aze', '2024-02-01', 0, 'azeazeaze@gmail', '+12622222222', 'Maroc', 'autre', 'none', 'bac', '2312', '2024-01-17');

-- --------------------------------------------------------

--
-- Structure de la table `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `ranking` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ranking`
--

INSERT INTO `ranking` (`id`, `name`, `label`, `ranking`) VALUES
(1, 'uir', 'Université Internationale de Rabat- UIR', 5),
(2, 'um6ss', 'Université Mohammed VI des Sciences de Santé - UM6SS - Casablanca', 1),
(3, 'uiass', 'Université Internationale Abulcasis des Sciences de Santé- UIASS - Rabat', 3),
(4, 'uemf', 'Université Euro-méditerranéenne de Fès - UEMF', 1),
(5, 'um6p', 'Université Mohammed VI Polytechnique - UM6PBen guérir', 0),
(6, 'upm', 'Université Privée Marrakech Tensift El Haouz -UPM', 0),
(7, 'upolis', 'Université Internationale d’Agadir -Universiapolis', 0),
(8, 'uic', 'Université Internationale de Casablanca - UIC', 2),
(9, 'eac', 'Ecole Supérieure d’Architecture de Casablanca - EAC', 0),
(10, 'ecc', 'Ecole Centrale de Casablanca - ECC', 0),
(11, 'esca', 'ESCA Ecole de Management', 0),
(12, 'upmc', 'Université Privée Mundiapolis- Casablanca', 0),
(13, 'upf', 'Université Privée de Fès - UPF', 0),
(14, 'supco', 'Sup de Co - Ecole Supérieure de Commerce - Marrakech', 0),
(15, 'estem', 'Ecole Supérieure en Ingénierie de l\'Information, Télécoms, Management et Génie Civil – ESTEM Casablanca', 0),
(16, 'igac', 'Institut Supérieur du Génie Appliqué Casablanca - IGA Casablanca', 0),
(17, 'emsic', 'Ecole Marocaine des Sciences de l\'Ingénieur Casablanca - EMSI-Casablanca', 0),
(18, 'emsir', 'Ecole Marocaine des Sciences de l\'Ingénieur Rabat - EMSI Rabat', 0),
(19, 'isgar', 'Institut Supérieur d\'Ingénierie et des Affaires Privé - Rabat - ISGA Rabat', 0),
(20, 'isgaf', 'Institut Supérieur d\'Ingénierie et des Affaires - ISGA Fès', 0),
(21, 'isgam', 'Institut Supérieur d\'Ingénierie et des Affaires - ISGA Marrakech', 0),
(22, 'emgr', 'Ecole Marocaine d’Ingénierie - EMG-Rabat', 0),
(23, 'istlc', 'Institut Supérieur de transport et de la Logistique - ISTL-Casablanca', 0),
(24, 'hemc', 'Institut des Hautes Etudes de Management- HEM Casablanca', 0),
(25, 'heec', 'Ecole des Hautes Etudes Economiques, Commerciales et d’Ingénierie - HEEC - Marrakech', 0),
(26, 'supmf', 'Ecole Supérieure de Management de Commerce et d\'Informatique- SUP\'MANAGEMENT- Fès', 0),
(27, 'iihem', 'International Institute for Higher Education in Morocco – IIHEM - Rabat', 0),
(28, 'eigsica', 'Ecole d\'Ingénierie en Génie des Systèmes Industriels de Casablanca- EIGSICA', 0),
(29, 'supmti', 'Ecole Supérieure de Management, Informatique et Télécommunication- SUPMTI Rabat', 0),
(30, 'eheio', 'Ecole des Hautes Etudes d’Ingénierie- EHEIO Oujda', 0),
(31, 'emaaa', 'Ecole de Management et d\'Administration des Affaires- Agadir', 0),
(32, 'isgac', 'Institut Supérieur d\'Ingénierie et des Affaires - ISGA-Casablanca', 0),
(33, 'ismagi', 'Institut Supérieur de Management d\'administration et de Genie Informatique -ISMAGI', 0),
(34, 'autres', 'Autres', 0),
(35, 'none', 'Aucune préférence', 2);

-- --------------------------------------------------------

--
-- Structure de la table `selections`
--

CREATE TABLE `selections` (
  `id` int(11) NOT NULL,
  `uir` int(11) DEFAULT 0,
  `um6ss` int(11) DEFAULT 0,
  `uiass` int(11) DEFAULT 0,
  `uemf` int(11) DEFAULT 0,
  `um6p` int(11) DEFAULT 0,
  `upm` int(11) DEFAULT 0,
  `upolis` int(11) DEFAULT 0,
  `uic` int(11) DEFAULT 0,
  `eac` int(11) DEFAULT 0,
  `ecc` int(11) DEFAULT 0,
  `esca` int(11) DEFAULT 0,
  `upmc` int(11) DEFAULT 0,
  `upf` int(11) DEFAULT 0,
  `supco` int(11) DEFAULT 0,
  `estem` int(11) DEFAULT 0,
  `igac` int(11) DEFAULT 0,
  `emsic` int(11) DEFAULT 0,
  `emsir` int(11) DEFAULT 0,
  `isgar` int(11) DEFAULT 0,
  `isgaf` int(11) DEFAULT 0,
  `isgam` int(11) DEFAULT 0,
  `emgr` int(11) DEFAULT 0,
  `istlc` int(11) DEFAULT 0,
  `hemc` int(11) DEFAULT 0,
  `heec` int(11) DEFAULT 0,
  `supmf` int(11) DEFAULT 0,
  `iihem` int(11) DEFAULT 0,
  `eigsica` int(11) DEFAULT 0,
  `supmti` int(11) DEFAULT 0,
  `eheio` int(11) DEFAULT 0,
  `emaaa` int(11) DEFAULT 0,
  `isgac` int(11) DEFAULT 0,
  `ismagi` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `spectacle_form`
--

CREATE TABLE `spectacle_form` (
  `id` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Prenom` varchar(100) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Numero_Whatsapp` varchar(20) DEFAULT NULL,
  `Ville_Spectacle` varchar(100) DEFAULT NULL,
  `Nbr_Tickets` int(11) DEFAULT NULL,
  `Tickets_Payes` int(11) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Etudiant` tinyint(1) DEFAULT NULL,
  `Bachelier` tinyint(1) DEFAULT NULL,
  `Parent` tinyint(1) DEFAULT NULL,
  `Salarie` tinyint(1) DEFAULT NULL,
  `Diplome` tinyint(1) DEFAULT NULL,
  `dates` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `selections`
--
ALTER TABLE `selections`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `spectacle_form`
--
ALTER TABLE `spectacle_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `selections`
--
ALTER TABLE `selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `spectacle_form`
--
ALTER TABLE `spectacle_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
