-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Mar 23, 2020 at 11:13 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd_pa_2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(11) NOT NULL,
  `notation` int(5) NOT NULL,
  `date` date NOT NULL,
  `texte` text NOT NULL,
  `local` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id_avis`, `notation`, `date`, `texte`, `local`, `user`) VALUES
(1, 5, '2020-03-03', 'Vraiment très beau lieux ', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `id_captcha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorie_local`
--

CREATE TABLE `categorie_local` (
  `id_categorie_local` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie_local`
--

INSERT INTO `categorie_local` (`id_categorie_local`, `type`) VALUES
(1, 'conference'),
(2, 'coworking');

-- --------------------------------------------------------

--
-- Table structure for table `categorie_user`
--

CREATE TABLE `categorie_user` (
  `id_categorie_user` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie_user`
--

INSERT INTO `categorie_user` (`id_categorie_user`, `type`) VALUES
(1, 'Bailleur'),
(2, 'Locataire'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

CREATE TABLE `connexion` (
  `id_connexion` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `tracking` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`id_connexion`, `date`, `id_user`, `tracking`) VALUES
(13, '2022-03-20 00:00:00', 4, NULL),
(14, '2022-03-20 00:00:00', 2, NULL),
(15, '2022-03-20 00:00:00', 3, NULL),
(16, '2022-03-20 00:00:00', 4, NULL),
(17, '2023-03-20 00:00:00', 4, NULL),
(18, '2023-03-20 00:00:00', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `id_facture` int(11) NOT NULL,
  `date` date NOT NULL,
  `tva` float NOT NULL,
  `montant` float NOT NULL,
  `reservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `taille` int(11) NOT NULL,
  `captcha` int(11) NOT NULL,
  `local` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `local`
--

CREATE TABLE `local` (
  `id_local` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `capacite` int(11) NOT NULL,
  `prix` float NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `local`
--

INSERT INTO `local` (`id_local`, `adresse`, `capacite`, `prix`, `user`) VALUES
(1, '108, rue Coste', 10, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `localcategorie`
--

CREATE TABLE `localcategorie` (
  `categorie_local` int(11) NOT NULL,
  `local` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `localcategorie`
--

INSERT INTO `localcategorie` (`categorie_local`, `local`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `materiel`
--

CREATE TABLE `materiel` (
  `id_materiel` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `quantité` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `reservation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `heure_debut` int(11) NOT NULL,
  `heure_fin` int(11) NOT NULL,
  `acompte` int(11) NOT NULL,
  `solde` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `date_debut`, `date_fin`, `heure_debut`, `heure_fin`, `acompte`, `solde`, `user`) VALUES
(1, '2020-03-02', '2020-03-04', 11, 12, 100, 200, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tarification`
--

CREATE TABLE `tarification` (
  `id_tarification` int(11) NOT NULL,
  `nombre_jours` int(11) NOT NULL,
  `heures` datetime NOT NULL,
  `montant_total` float NOT NULL,
  `reservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(120) NOT NULL,
  `categorie_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `prenom`, `nom`, `username`, `email`, `password`, `categorie_user`) VALUES
(2, 'Aristide', 'Fumo', 'ari1008', 'aristide@gmail.com', '$2y$10$E4ovSKnNxIHzJ0qDVfv/Je.JWgCnAlmCkaFjotPOSQK1c7vPe9rGG', 1),
(3, 'Remi', 'Fumo', 'remi', 'remi@gmail.com', '$2y$10$ogCEu2xPrVXi5AVa8n3tMOTiToY8fm1MBmbzomUcfZAm9AGMUYze6', 2),
(4, 'Florence', 'Fumo', 'demo', 'remi.fumo@free.fr', '$2y$10$guPGtiuLx3HIP8tG.qDWLObKWo6RLyxXFRs8syBDU4f3FLQJ87OJm', 3),
(5, 'Test', 'Test', 'test1001', 'test@test.com', '$2y$10$J0W3FcMr6cEmQQ5ZtOYh2OLaWd.BoFHXFYDQrzowT/PVxuu1xGLke', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `local` (`local`,`user`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`id_captcha`);

--
-- Indexes for table `categorie_local`
--
ALTER TABLE `categorie_local`
  ADD PRIMARY KEY (`id_categorie_local`);

--
-- Indexes for table `categorie_user`
--
ALTER TABLE `categorie_user`
  ADD PRIMARY KEY (`id_categorie_user`);

--
-- Indexes for table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id_connexion`),
  ADD KEY `tracking` (`tracking`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_facture`),
  ADD KEY `facture_ibfk_1` (`reservation`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD KEY `captcha` (`captcha`,`local`),
  ADD KEY `local` (`local`);

--
-- Indexes for table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_local`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `localcategorie`
--
ALTER TABLE `localcategorie`
  ADD PRIMARY KEY (`categorie_local`,`local`),
  ADD KEY `local` (`local`);

--
-- Indexes for table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`id_materiel`),
  ADD KEY `local` (`local`),
  ADD KEY `materiel_ibfk_2` (`reservation`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `tarification`
--
ALTER TABLE `tarification`
  ADD PRIMARY KEY (`id_tarification`),
  ADD KEY `reservation` (`reservation`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `categorie_user` (`categorie_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `id_captcha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorie_local`
--
ALTER TABLE `categorie_local`
  MODIFY `id_categorie_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorie_user`
--
ALTER TABLE `categorie_user`
  MODIFY `id_categorie_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id_connexion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id_materiel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tarification`
--
ALTER TABLE `tarification`
  MODIFY `id_tarification` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`local`) REFERENCES `local` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `connexion_ibfk_1` FOREIGN KEY (`tracking`) REFERENCES `tracking` (`id_tracking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `connexion_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`reservation`) REFERENCES `reservation` (`id_reservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`captcha`) REFERENCES `captcha` (`id_captcha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`local`) REFERENCES `local` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `local_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `localcategorie`
--
ALTER TABLE `localcategorie`
  ADD CONSTRAINT `localcategorie_ibfk_1` FOREIGN KEY (`categorie_local`) REFERENCES `categorie_local` (`id_categorie_local`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `localcategorie_ibfk_2` FOREIGN KEY (`local`) REFERENCES `local` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `materiel_ibfk_1` FOREIGN KEY (`local`) REFERENCES `local` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materiel_ibfk_2` FOREIGN KEY (`reservation`) REFERENCES `reservation` (`id_reservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tarification`
--
ALTER TABLE `tarification`
  ADD CONSTRAINT `tarification_ibfk_1` FOREIGN KEY (`reservation`) REFERENCES `reservation` (`id_reservation`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
