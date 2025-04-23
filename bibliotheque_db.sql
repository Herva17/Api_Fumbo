-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 23 avr. 2025 à 14:21
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
-- Base de données : `bibliotheque_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id_auteur` int(11) NOT NULL,
  `nom_auteur` varchar(100) NOT NULL,
  `prenom_auteur` varchar(100) DEFAULT NULL,
  `id_nationalite` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `nom_auteur`, `prenom_auteur`, `id_nationalite`, `image`) VALUES
(9, 'IRAGI', 'Hervé', 22, 'hdghdghdgh.png');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(5, 'Theatre'),
(6, 'Blague'),
(7, 'Poeme'),
(8, 'Education');

-- --------------------------------------------------------

--
-- Structure de la table `nationalite`
--

CREATE TABLE `nationalite` (
  `id_nationalite` int(11) NOT NULL,
  `nom_nationalite` varchar(100) NOT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `nationalite`
--

INSERT INTO `nationalite` (`id_nationalite`, `nom_nationalite`, `image`) VALUES
(20, 'Congolaise', '../fumbo_Images/nationalites/about2.jpg'),
(21, 'Congolaise', '../fumbo_Images/nationalites/about2.jpg'),
(22, 'Chinoise', '../fumbo_Images/nationalites/CHOISIR.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `id_ouvrage` int(11) NOT NULL,
  `titre_ouvrage` varchar(255) NOT NULL,
  `id_auteur` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `annee_publication` year(4) DEFAULT year(curdate()),
  `image` text DEFAULT NULL,
  `langue` varchar(50) NOT NULL,
  `isbn` varchar(10) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `format` varchar(50) NOT NULL,
  `Nb_pages` int(11) NOT NULL,
  `fichier_livre` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `datePub` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`id_ouvrage`, `titre_ouvrage`, `id_auteur`, `id_categorie`, `annee_publication`, `image`, `langue`, `isbn`, `resume`, `format`, `Nb_pages`, `fichier_livre`, `tags`, `datePub`) VALUES
(7, 'Au bord de notre premiére rencontre', 9, 5, NULL, './uploads/ouvrages/about1.jpg', 'français', '1289094536', 'Ce livre parle de l&#039;histoire d&#039;une soeur ambicieuse', 'pdf', 54, './uploads/fichiers/academie1-1.pdf', 'JHSJDK', '2025-04-23 12:16:35'),
(8, 'Au bord de notre premiére rencontre', 9, 5, NULL, '../fumbo_fichiers/ouvrages/about1.jpg', 'français', '1289094536', 'Ce livre parle de l&#039;histoire d&#039;une soeur ambicieuse', 'pdf', 54, '../fumbo_fichiers/fichiers/academie1-1.pdf', 'JHSJDK', '2025-04-23 12:16:45');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_nationalite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `username`, `prenom`, `email`, `password`, `bio`, `image`, `date_inscription`, `id_nationalite`) VALUES
(84, 'JONATHAN', 'john', 'john@gmail.com', '$2y$10$gdcSkeszLZOPvNyY6cOCC.aw70OIXV8fgG/4X.U.xo83DvKpxwToO', 'Je suis john le pionier de la litterature ugandaise', './uploads/users/Ab1.PNG', '2025-04-22 12:34:12', 21);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id_auteur`),
  ADD KEY `id_nationalite` (`id_nationalite`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `nationalite`
--
ALTER TABLE `nationalite`
  ADD PRIMARY KEY (`id_nationalite`);

--
-- Index pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`id_ouvrage`),
  ADD KEY `id_auteur` (`id_auteur`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_nationalite` (`id_nationalite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `nationalite`
--
ALTER TABLE `nationalite`
  MODIFY `id_nationalite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `id_ouvrage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD CONSTRAINT `auteur_ibfk_1` FOREIGN KEY (`id_nationalite`) REFERENCES `nationalite` (`id_nationalite`);

--
-- Contraintes pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `ouvrage_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`),
  ADD CONSTRAINT `ouvrage_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_nationalite`) REFERENCES `nationalite` (`id_nationalite`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
