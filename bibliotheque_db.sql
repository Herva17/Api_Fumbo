-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 12:00 PM
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
(8, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `histoires`
--

CREATE TABLE `histoires` (
  `id_histoire` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `categorie` varchar(100) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `personnages_principaux` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `histoire` longtext DEFAULT NULL,
  `image_couverture` varchar(255) DEFAULT NULL,
  `date_creation` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `histoires`
--

INSERT INTO `histoires` (`id_histoire`, `id_user`, `categorie`, `titre`, `personnages_principaux`, `description`, `histoire`, `image_couverture`, `date_creation`) VALUES
(1, 84, 'drame', 'Le Mystère de la Baie de Maputo', 'hervé, thierry, josue', 'l&#039;histoire parle de la description de la region maputu , une region dramatique', 'Par un bel après-midi ensoleillé, Hervé, Josué et Thierry arrivèrent dans la région de Maputo pour y passer leurs vacances. Tous trois passionnés d’aventure, ils décidèrent de loger près de la baie, dans un petit lodge fait de bois et de chaume, non loin de l’océan Indien.\n\nUn matin, alors qu’ils se promenaient sur la plage, Josué aperçut une vieille bouteille à moitié enfouie dans le sable. À l’intérieur, un parchemin enroulé. Intrigués, ils ouvrirent le message : une carte rudimentaire avec une croix rouge, indiquant un endroit dans les mangroves de Catembe, juste de l’autre côté de la baie.\n\n— &quot;Un trésor ? Ou juste une blague ?&quot;, demanda Thierry, sceptique.\n\n— &quot;Il n’y a qu’un seul moyen de le savoir !&quot;, répondit Hervé avec un sourire malicieux.\n\nLe lendemain, armés d’un petit canot à moteur, d’eau et de leur courage, ils traversèrent la baie. Après des heures à marcher dans la boue et éviter les moustiques, ils atteignirent enfin l’endroit indiqué. Sous un vieux manguier, ils creusèrent… et trouvèrent une boîte métallique rouillée.\n\nÀ l’intérieur, pas d’or, mais des lettres, des photos et un vieux journal intime d’un marin portugais du XIXe siècle, racontant ses voyages, ses regrets, et son amour pour une femme mozambicaine qu’il n’a jamais pu épouser.\n\n— &quot;C’est encore mieux qu’un trésor,&quot; murmura Josué, touché par l’histoire.\n\nIls ramenèrent les documents à Maputo et les confièrent au musée d’histoire locale. Leur découverte fit les gros titres, et les trois amis furent invités à raconter leur aventure à la télévision.\n\nDepuis ce jour, Hervé, Josué et Thierry sont surnommés &quot;les explorateurs de la baie de Maputo&quot;, et ils savent qu’il n’est pas toujours nécessaire de chercher de l’or pour vivre une grande aventure.', '../uploads/histoires/maputo.png', '2025-05-19 12:19:11');

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
(20, 'Congolaise', '../fumbo_Images/nationalites/about2.jpg'),
(21, 'Congolaise', '../fumbo_Images/nationalites/about2.jpg'),
(22, 'Chinoise', '../fumbo_Images/nationalites/CHOISIR.PNG');

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
(16, 'Mon comportement, Ma richesse : L&amp;#039;attitude et l&amp;#039;aptitude :', 92, 8, '2025', '../uploads/ouvrages/ChatGPT Image May 23, 2025, 11_44_43 AM.png', 'Français', '9067', 'Ce livre explore la puissance du comportement humain dans la construction de la réussite personnelle et collective. À travers une réflexion profonde sur l’attitude et l’aptitude, il montre que la véritable richesse ne réside pas uniquement dans les posses', 'PDF', 2, '../uploads/fichiers/L\'atitude et l\'aptitude.pdf', '&quot;Développement personnel&quot;', '2025-05-23 09:49:46');

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
(85, 'PUTINE', 'jojo', 'jojoputine@gmail.com', '$2y$10$XMFEE1AnmB4LMToplQPNiuPJaikuMoUQzbkQ93/3X4/FfS2XZIeBm', 'Je suis Putine un frére trés Serieux', './uploads/users/Ab1.PNG', '2025-05-08 12:11:41', 22),
(86, 'Byemba', 'Julien', 'byembajulien@gmail.com', '$2y$10$l3rANyJN23det1mE9OYxse9SYnf3Rrl3uGkBXzEmYyAkpzo0NaraO', 'Je suis Jean Biemba le fils du pionnier BIEMBA', '../uploads/users/Capture.PNG', '2025-05-08 12:28:28', 21),
(87, 'Geremie', 'Soudril', 'geremiesoudril@gmail.com', '$2y$10$Iamho.ojiv1rDJeSUDSG/OjNyteYR09blIcV6OIKB18MjMQg/e7MS', 'Je suis Geremie Soudril', '../uploads/users/Ab3.PNG', '2025-05-10 12:01:07', 22),
(88, 'riguen', 'KATEKA', 'kateka@gmail.com', '$2y$10$wEEapg9I58/LiPwcCTiCD.DsNJVrAOq3OmJox3Wv4HJ1Nu.EK4Ox2', 'PLEUR', '../uploads/users/Ab1.PNG', '2025-05-12 14:13:38', 21),
(89, 'Dupont', 'Stanley', 'dupont@gmail.com', '$2y$10$9BZVlCKNcdTrtNtqP1tYOeWvYhL8GVo3G6NJQ5AHNSNzxXwbcesle', 'Je suis dupont', '../uploads/users/Ab1.PNG', '2025-05-14 08:28:56', 21),
(90, 'Byamungu', 'Julien', 'julienbyamungu@gmail.com', '$2y$10$kYlUWqHaEUQqVNwOaTTwPu8DvIMYRNeuMFAI8/0WiBusktH3ILDFG', 'Je suis Julien Byamungu', '../uploads/users/Capture.PNG', '2025-05-14 08:40:40', 22),
(91, 'KITUMAINI', 'Jean', 'kitumainijean@gmail.com', '$2y$10$nUlG3KUghUazNFQrTe/f5unt79yTP218izUC49qZ8iVaxkwAqmmr6', 'Passionné par la lettre j&#039;ai eu ma maitrise en français', '../uploads/users/WhatsApp Image 2024-09-12 à 20.27.55_58a1916c.jpg', '2025-05-22 08:19:31', 21),
(92, 'IRAGI', 'Hervé', 'herveiragi@gmail.com', '$2y$10$qZjn1GV/j/pPAG93NaBzcuLu.RiqR/FVFeGIY0jtTMGlmvKaOcyoW', 'Hervé IRAGI est un ingénieur logiciel passionné par l’innovation technologique et son impact dans le domaine de l’éducation. Spécialisé dans le développement de solutions numériques éducatives, il met ses compétences au service de projets qui favorisent l’apprentissage, l’autonomie et le développement personnel des jeunes.  Guidé par une vision claire : celle d’un monde où la technologie devient un levier d’épanouissement et d’accès au savoir, Hervé conçoit des outils interactifs et accessibles, pensés pour transformer positivement les parcours éducatifs. Son engagement dépasse la technique : il œuvre avec conviction pour une éducation plus inclusive, adaptée aux besoins des nouvelles générations.', '../uploads/users/WhatsApp Image 2024-09-20 à 13.48.08_4c94da1a.jpg', '2025-05-23 09:25:02', 21);

--
-- Indexes for dumped tables
--

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
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `histoires`
--
ALTER TABLE `histoires`
  MODIFY `id_histoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nationalite`
--
ALTER TABLE `nationalite`
  MODIFY `id_nationalite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `id_ouvrage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histoires`
--
ALTER TABLE `histoires`
  ADD CONSTRAINT `histoires_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

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
