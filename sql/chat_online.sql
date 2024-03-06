-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 06 mars 2024 à 23:40
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chat_online`
--

-- --------------------------------------------------------

--
-- Structure de la table `amitie`
--

CREATE TABLE `amitie` (
  `idDemande` int(11) NOT NULL,
  `DateDemande` datetime DEFAULT current_timestamp(),
  `etat` tinyint(1) NOT NULL,
  `demandeur` int(11) NOT NULL,
  `recepteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `amitie`
--

INSERT INTO `amitie` (`idDemande`, `DateDemande`, `etat`, `demandeur`, `recepteur`) VALUES
(4, '2024-03-06 21:16:47', 0, 6, 1),
(5, '2024-03-06 22:37:59', 0, 6, 4),
(6, '2024-03-06 22:37:59', 0, 6, 3),
(7, '2024-03-06 22:38:31', 0, 6, 9),
(8, '2024-03-06 22:38:31', 0, 7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `dateHeure` datetime NOT NULL,
  `contenu` varchar(100) DEFAULT NULL,
  `emmetteur` int(11) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `lu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `numero` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `sexe` enum('f','m') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`numero`, `prenom`, `nom`, `sexe`, `email`, `password`, `adresse`, `telephone`, `photo`) VALUES
(1, 'Baye Serigne ', 'Seck', 'm', 'serigneseck@gmail.com', '12345', 'Touba', '771114254', 'seckbaye321.jpg'),
(2, 'Serigne Tacko ', 'Ndao', 'm', 'serignetackouit@gmail.com', '12345', 'Thies', '772213465', 'ndaoserignetacko.jpg'),
(3, 'Serigne Fallou ', 'Dieng', 'm', 'diengserignefallou@gmail.com', '12345', 'Pire', '774238792', 'diengserignefallou.jpg'),
(4, 'Mamadou', 'Gadiaga', 'm', 'gadiagamadou@gmail.com', '12345', 'Mbour', '770104567', 'gadiagamadou.jpg'),
(5, 'Bassirou', 'Ly', 'm', 'bssiroulyl3pcsm@gmail.com', '12345', 'Touba', '773298090', 'bssiroulyl3pcsm.jpg'),
(6, 'Mbacke', 'Mbaye', 'm', 'mbackembaye74@gmail.com', '12345', 'Yoff', '778593165', 'bayembacke.jpg'),
(7, 'Baye Dame', 'Leye', 'm', 'youngbaye@gmail.com', '12345', 'Dakar', '775689067', 'youngbaye.jpg'),
(8, 'Abdou Khadre', 'Diouf', 'm', 'dieylaniabdoukhadre@gmail.com', '12345', 'Mbour', '770243400', 'dieylaniabdoukhadre.jpg'),
(9, 'Fallou', 'Mbaye', 'm', 'mbayefallou@gmail.com', '12345', 'Pire', '775473568', 'mbayefallou.jpg'),
(10, 'Adama', 'Ndoye', 'm', 'ndoyeadama@gmail.com', '12345', 'Pire', '775276708', 'ndoyeadama.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `amitie`
--
ALTER TABLE `amitie`
  ADD PRIMARY KEY (`idDemande`),
  ADD KEY `fk_amitie` (`demandeur`),
  ADD KEY `fk_amitie2` (`recepteur`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Message1` (`emmetteur`),
  ADD KEY `fk_Message2` (`destinataire`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`numero`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `amitie`
--
ALTER TABLE `amitie`
  MODIFY `idDemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `amitie`
--
ALTER TABLE `amitie`
  ADD CONSTRAINT `fk_amitie` FOREIGN KEY (`demandeur`) REFERENCES `personne` (`numero`),
  ADD CONSTRAINT `fk_amitie2` FOREIGN KEY (`recepteur`) REFERENCES `personne` (`numero`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_Message1` FOREIGN KEY (`emmetteur`) REFERENCES `personne` (`numero`),
  ADD CONSTRAINT `fk_Message2` FOREIGN KEY (`destinataire`) REFERENCES `personne` (`numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
