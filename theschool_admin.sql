-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 03 jan. 2018 à 17:45
-- Version du serveur :  5.7.20
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `theschool.admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admins`
--

CREATE TABLE `Admins` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Admins`
--

INSERT INTO `Admins` (`id`, `name`, `role`, `phone`, `email`, `password`, `image`) VALUES
(1, 'yaacov', 'owner', 549230032, 'yaacovayache@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '/image/files/image5.jpeg'),
(2, 'meir', 'manager', 585190195, 'meir.landau5@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '/image/files/image3%20%281%29.jpg'),
(3, 'chmouel', 'sales', 54225522, 'chmouelsitbon@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '/image/files/image6%20%281%29.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `image`) VALUES
(1, 'math', 'we will learm math', '/image/files/math.jpeg'),
(2, 'chemestry', 'we will learm chemestry', '/image/files/chemistry.jpg'),
(3, 'english', 'we will learm english', '/image/files/anglais.jpg'),
(6, 'economie', 'we learn economie', '/image/files/eco.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `studentCourse`
--

CREATE TABLE `studentCourse` (
  `studentId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `studentCourse`
--

INSERT INTO `studentCourse` (`studentId`, `courseId`) VALUES
(6, 2),
(6, 3),
(5, 1),
(5, 2),
(5, 3),
(5, 6),
(19, 3),
(19, 6),
(30, 2),
(30, 3),
(43, 2),
(1, 2),
(1, 3),
(1, 6),
(2, 1),
(2, 2),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`id`, `name`, `phone`, `email`, `image`) VALUES
(1, 'reyrey', 565767, 'joe@gmail.com', '/image/files/image1.jpg'),
(2, 'rob', 12134, 'rob@gmail.com', '/image/files/image3.jpg'),
(3, 'michael', 55668, 'michael@gmail.com', '/image/files/image6.jpeg'),
(5, 'babar', 354647, 'fsdfsadfs@dfsd.dfs', '/image/files/image1.jpg'),
(6, 'meymey', 45678, 'dgdgdg@ddhd.ddi', '/image/files/image6.jpeg'),
(19, 'yaacov cohen', 549230032, 'yaacovcohen@gmail.com', '/image/files/image3.jpg'),
(30, 'yaacov ayache', 549230032, 'yaacovayache@gmail.com', '/image/files/image1%20%281%29.jpg'),
(43, 'yaaco', 549230032, 'yaacovayache@gmail.com', '/image/files/image1%20%284%29.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `studentCourse`
--
ALTER TABLE `studentCourse`
  ADD KEY `studentId` (`studentId`),
  ADD KEY `courseId` (`courseId`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `studentCourse`
--
ALTER TABLE `studentCourse`
  ADD CONSTRAINT `fktocourseId` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fktostudentId` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
