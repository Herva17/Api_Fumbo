-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2025 at 01:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliotheque_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` int(11) NOT NULL,
  `id_abonne` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `date_abonnement` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abonnements`
--

INSERT INTO `abonnements` (`id`, `id_abonne`, `id_auteur`, `date_abonnement`) VALUES
(40, 94, 93, '2025-05-30 13:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(5, 'Theatre'),
(6, 'Blague'),
(7, 'Poeme'),
(8, 'Education'),
(9, 'conte');

-- --------------------------------------------------------

--
-- Table structure for table `histoires`
--

CREATE TABLE `histoires` (
  `id_histoire` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `categorieId` int(11) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `personnages_principaux` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `histoire` longtext DEFAULT NULL,
  `date_creation` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `histoires`
--

INSERT INTO `histoires` (`id_histoire`, `id_user`, `categorieId`, `titre`, `personnages_principaux`, `description`, `histoire`, `date_creation`) VALUES
(14, 92, 6, 'Le perroquet du pasteur', 'Kevin , Pasteur Moise, Coco, Mama chantal,L’assemblée', 'Une histoire humoristique qui se déroule dans un village africain où un jeune homme essaie d&#039;impressionner le pasteur de son église... mais tout ne se passe pas comme prévu à cause d’un perroquet un peu trop bavard.', 'Dans le petit village de Mavuna, tout le monde connaît le pasteur Moïse… et surtout son perroquet Coco, qui parle mieux que certains fidèles.\r\n\r\nUn jour, Kevin, un jeune chrétien motivé, frappe à la porte du pasteur.\r\n\r\n— Bonjour pasteur ! Je sens un feu dans mon cœur, je veux prêcher dimanche prochain !\r\n\r\nLe pasteur, heureux de voir la jeunesse s’impliquer, accepte.\r\n\r\n— Très bien, mon fils. Prie, médite… et surtout, sois sincère.\r\n\r\nLe dimanche arrive. L’église est pleine. Même Mama Chantal est assise devant, éventail à la main.\r\n\r\nKevin monte sur la chaire, micro tremblant dans la main.\r\n\r\n— Bien-aimés dans le Seigneur ! Aujourd’hui, le Seigneur m’a donné un message puissant : Repentez-vous !\r\n\r\nL’assemblée est silencieuse… jusqu’à ce qu’on entende :\r\n\r\n— Lui aussi, il a volé l’offrande !\r\n\r\nTout le monde se tourne : c’est Coco, le perroquet du pasteur, assis tranquillement sur son perchoir près de l’orgue.\r\n\r\nKevin panique. Il transpire.\r\n\r\n— Ce… ce n’est pas vrai, c’est une attaque de l’ennemi !\r\n\r\nCoco ne se démonte pas :\r\n\r\n— Kevin, mardi soir, 3 billets dans ta poche !\r\n\r\nL’église explose de rires. Mama Chantal murmure :\r\n— Je le savais ! Trop zélé pour être honnête, ce garçon-là…\r\n\r\nKevin tente de sauver la situation.\r\n\r\n— Bon, revenons à la Parole. Jésus est le chemin, la vérité et la vie !\r\n\r\nCoco :\r\n— Mais toi, t’étais dans la boîte samedi soir !\r\n\r\nLe pasteur se lève, embarrassé, et court couvrir la cage de Coco.\r\n\r\n— Coco ! Tais-toi au nom de Jésus !\r\n\r\nMais Coco finit avec un dernier mot, tout fier :\r\n\r\n— Amen !\r\n\r\nKevin descend de la chaire, tête baissée. Le pasteur le console.\r\n\r\n— Mon fils, prêcher c’est bien… mais il faut régler les petites affaires avant. Et éviter de parler quand Coco est là.\r\n\r\nMorale :\r\nNe laisse jamais un perroquet connaître ta vie privée… surtout si tu veux devenir prédicateur. 😄', '2025-05-27 13:49:40'),
(15, 92, 7, 'KJDKJDKJKD', 'Herve', 'dhdjhjdhjdhjd', 'hqkhhsjhjshjshjjjjjjjjjjjjjjjjjd ddkdkdkdkdkdkkdkdkdkd', '2025-05-28 12:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `nationalite`
--

CREATE TABLE `nationalite` (
  `id_nationalite` int(11) NOT NULL,
  `nom_nationalite` varchar(100) NOT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nationalite`
--

INSERT INTO `nationalite` (`id_nationalite`, `nom_nationalite`, `image`) VALUES
(21, 'Congolaise', '../fumbo_Images/nationalites/about2.jpg'),
(25, 'Burundi', '../uploads/nationalites/drapeau-du-burundi.jpg'),
(26, 'Ghana', '../uploads/nationalites/drapeau-du-ghana.jpg'),
(27, 'Kenya', '../uploads/nationalites/drapeau-du-kenya.jpg'),
(28, 'Afrique du Sud', '../uploads/nationalites/gros-plan-du-drapeau-realiste-de-l-afrique-du-sud-avec-des-textures-interessantes.jpg'),
(29, 'Côte d&#039;ivoire', '../uploads/nationalites/drapeau-de-cote-d-ivoire.jpg'),
(30, 'Senegal', '../uploads/nationalites/drapeau-du-senegal.jpg'),
(31, 'Congo kinshasa', '../uploads/nationalites/drapeau-de-la-republique-democratique-du-congo.jpg'),
(32, 'Cameroun', '../uploads/nationalites/drapeau-du-cameroun.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `id_ouvrage` int(11) NOT NULL,
  `titre_ouvrage` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `annee_publication` year(4) DEFAULT year(curdate()),
  `image` text DEFAULT NULL,
  `langue` varchar(50) NOT NULL,
  `isbn` varchar(10) NOT NULL,
  `resume` longtext NOT NULL,
  `format` varchar(50) NOT NULL,
  `Nb_pages` int(11) NOT NULL,
  `fichier_livre` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `datePub` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ouvrage`
--

INSERT INTO `ouvrage` (`id_ouvrage`, `titre_ouvrage`, `id_user`, `id_categorie`, `annee_publication`, `image`, `langue`, `isbn`, `resume`, `format`, `Nb_pages`, `fichier_livre`, `tags`, `datePub`) VALUES
(16, ' Mon comportement, Ma richesse : L\'attitude et l\'aptitude', 92, 8, '2025', '../uploads/ouvrages/ChatGPT Image May 23, 2025, 11_44_43 AM.png', 'Français', '9067', 'Ce livre explore la puissance du comportement humain dans la construction de la réussite personnelle et collective. À travers une réflexion profonde sur l’attitude et l’aptitude, il montre que la véritable richesse ne réside pas uniquement dans les possessions matérielles, mais dans la façon dont une personne pense, agit, et développe son potentiel. L’auteur invite le lecteur à adopter une posture intérieure positive, disciplinée et persévérante, tout en cultivant les compétences nécessaires pour transformer chaque situation en opportunité de croissance.', 'PDF', 2, '../uploads/fichiers/L\'atitude et l\'aptitude.pdf', '&quot;Développement personnel&quot;', '2025-05-23 09:49:46'),
(17, 'Quelqu&amp;#039;un à qui parler', 92, 8, '2015', '../uploads/ouvrages/Ab1.PNG', 'Français', '09273', 'C&amp;#039;est l&amp;#039;histoire d&amp;#039;un gars qui était perdu dans le vie et qui s&amp;#039;est retrouvé grace à une version de lui quand il était petit', 'pdf', 200, '../uploads/fichiers/Acte d\'engagement.pdf', '&quot;Amitié et clé du bonheur&quot;', '2025-05-24 10:01:27'),
(18, 'La vie en Afrique', 93, 6, '2025', '../uploads/ouvrages/celebration-du-dix-neuvieme-avec-une-representation-symbolique-de-la-fin-de-l-esclavage-aux-etats-unis.jpg', 'Français', '787878321', 'Ce livre raconter l&amp;#039;histoire de l&amp;#039;afrique : La colonisation et autres', 'PDF', 21, '../uploads/fichiers/la force et la foie.pdf', '&quot;la colonisation en afrique&quot;', '2025-05-26 12:50:25'),
(19, 'JHDJKHJDHJDJHDJHD', 92, 7, '0000', '../uploads/ouvrages/ChatGPT Image Apr 28, 2025, 01_04_47 PM.png', 'Français', '135647585', 'DHJHDJKHJHDJHDJKDHJD', 'PDF', 2, '../uploads/fichiers/la force et la foie.pdf', '&quot;DJKFJKJFK&quot;', '2025-05-26 13:05:48'),
(20, 'kjkljkjkjks', 92, 7, '1990', '../uploads/ouvrages/child-5706430_1280.jpg', 'Français', '237485', 'HJSHJSHJSKJS', 'PDF', 12, '../uploads/fichiers/Marron Photo-centré Technologie dans la Vie des Consommateurs Technologie Présentation (1).pdf', '&quot;DHGHGDHGD&quot;', '2025-05-26 13:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `prenom`, `email`, `password`, `bio`, `image`, `date_inscription`, `id_nationalite`) VALUES
(84, 'JONATHAN', 'john', 'john@gmail.com', '$2y$10$gdcSkeszLZOPvNyY6cOCC.aw70OIXV8fgG/4X.U.xo83DvKpxwToO', 'Je suis john le pionier de la litterature ugandaise', './uploads/users/Ab1.PNG', '2025-04-22 12:34:12', 21),
(86, 'Byemba', 'Julien', 'byembajulien@gmail.com', '$2y$10$l3rANyJN23det1mE9OYxse9SYnf3Rrl3uGkBXzEmYyAkpzo0NaraO', 'Je suis Jean Biemba le fils du pionnier BIEMBA', '../uploads/users/Capture.PNG', '2025-05-08 12:28:28', 21),
(88, 'riguen', 'KATEKA', 'kateka@gmail.com', '$2y$10$wEEapg9I58/LiPwcCTiCD.DsNJVrAOq3OmJox3Wv4HJ1Nu.EK4Ox2', 'PLEUR', '../uploads/users/Ab1.PNG', '2025-05-12 14:13:38', 21),
(89, 'Dupont', 'Stanley', 'dupont@gmail.com', '$2y$10$9BZVlCKNcdTrtNtqP1tYOeWvYhL8GVo3G6NJQ5AHNSNzxXwbcesle', 'Je suis dupont', '../uploads/users/Ab1.PNG', '2025-05-14 08:28:56', 21),
(91, 'KITUMAINI', 'Jean', 'kitumainijean@gmail.com', '$2y$10$nUlG3KUghUazNFQrTe/f5unt79yTP218izUC49qZ8iVaxkwAqmmr6', 'Passionné par la lettre j&#039;ai eu ma maitrise en français', '../uploads/users/WhatsApp Image 2024-09-12 à 20.27.55_58a1916c.jpg', '2025-05-22 08:19:31', 21),
(92, 'IRAGI', 'Hervé', 'herveiragi@gmail.com', '$2y$10$qZjn1GV/j/pPAG93NaBzcuLu.RiqR/FVFeGIY0jtTMGlmvKaOcyoW', 'Hervé IRAGI est un ingénieur logiciel passionné par l’innovation technologique et son impact dans le domaine de l’éducation. Spécialisé dans le développement de solutions numériques éducatives, il met ses compétences au service de projets qui favorisent l’apprentissage, l’autonomie et le développement personnel des jeunes.  Guidé par une vision claire : celle d’un monde où la technologie devient un levier d’épanouissement et d’accès au savoir, Hervé conçoit des outils interactifs et accessibles, pensés pour transformer positivement les parcours éducatifs. Son engagement dépasse la technique : il œuvre avec conviction pour une éducation plus inclusive, adaptée aux besoins des nouvelles générations.', '../uploads/users/WhatsApp Image 2024-09-20 à 13.48.08_4c94da1a.jpg', '2025-05-23 09:25:02', 21),
(93, 'Abdoulay', 'Saleh', 'abdoulaysaleh@gmail.com', '$2y$10$IsKqE13.PXGOnXsU3p5A0u3F1AnPzXJE0ywWqXTRkT5wSeVWYyo2O', 'Je suis Abdoulay Saleh Docteur en Science de la Medecine', '../uploads/users/Amazon.jpg', '2025-05-26 12:45:47', 32),
(94, 'Ngenda', 'Yves', 'yvesngenda@gmail.com', '$2y$10$pBPFJDS8GTaJh0bUFSdlRu2fSO00MqGTh36Ecuq/32HWZOcumm1ce', 'Je suis Yves ngenda l&amp;#039;un de pilier de l&amp;#039;academie française en afrique', '../uploads/users/Designer (6).jpeg', '2025-05-29 08:29:48', 28),
(95, 'shabani', 'nestor', 'nestorshabani06@gmail.com', '$2y$10$.g8XEj.u31tnFqkd1JJxNOhC9Su1Mq7DaPlZdC3tw2NwnavEWlxpS', 'Je suis un auteur', '../uploads/users/child-5706430_1280.jpg', '2025-05-29 11:42:57', 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_abonnement` (`id_abonne`,`id_auteur`),
  ADD KEY `id_auteur` (`id_auteur`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `histoires`
--
ALTER TABLE `histoires`
  ADD PRIMARY KEY (`id_histoire`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `categorieId` (`categorieId`);

--
-- Indexes for table `nationalite`
--
ALTER TABLE `nationalite`
  ADD PRIMARY KEY (`id_nationalite`);

--
-- Indexes for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`id_ouvrage`),
  ADD KEY `id_auteur` (`id_user`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_nationalite` (`id_nationalite`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `histoires`
--
ALTER TABLE `histoires`
  MODIFY `id_histoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nationalite`
--
ALTER TABLE `nationalite`
  MODIFY `id_nationalite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `id_ouvrage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abonnements`
--
ALTER TABLE `abonnements`
  ADD CONSTRAINT `abonnements_ibfk_1` FOREIGN KEY (`id_abonne`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnements_ibfk_2` FOREIGN KEY (`id_auteur`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `histoires`
--
ALTER TABLE `histoires`
  ADD CONSTRAINT `histoires_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `histoires_ibfk_2` FOREIGN KEY (`categorieId`) REFERENCES `categorie` (`id_categorie`);

--
-- Constraints for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `ouvrage_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `ouvrage_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_nationalite`) REFERENCES `nationalite` (`id_nationalite`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
