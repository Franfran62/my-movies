-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 01 août 2022 à 09:34
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `my-movies`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `color`) VALUES
(1, 'Horreur', 'red '),
(2, 'Action ', 'skyblue'),
(3, 'Comédie', 'yellow');

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `release_date` date NOT NULL,
  `image_url` text,
  `director` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`id`, `title`, `description`, `release_date`, `image_url`, `director`, `category_id`, `user_id`) VALUES
(1, 'Rocker', 'Il y a vingt ans, Robert Fish Fishman, batteur du groupe Vesuvius, a été largué par ses collègues. Contraint d\'habiter chez sa soeur après avoir perdu son emploi, Fish voit sa chance tourner lorsque son neveu décide de le prendre dans son groupe, qui doit se produire au bal des finissants de son école secondaire. Croyant à une seconde chance de devenir célèbre, le batteur quadragénaire se lance dans l\'aventure avec enthousiasme.', '2008-08-20', 'https://m.media-amazon.com/images/I/61JAqdKcRsS._AC_SY679_.jpg', '', 3, ''),
(2, 'Rasta Rocket', 'Comment une équipe de la Jamaïque, après de multiples aventures, va participer à l\'épreuve de bobsleigh à quatre aux Jeux Olympiques d\'hiver de Calgary.', '1994-04-13', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRTwatjwwoF0ETrj0YEP5TdwRxD50CjO9eBFuoOnJR6ZC1wdHBX', 'Dawn Steel', 3, ''),
(3, 'Top Gun 2 : Maverick', 'Après plus de 30 ans de service en tant que l\'un des meilleurs aviateurs de la Marine, Pete Maverick Mitchell est à sa place, repoussant les limites en tant que pilote d\'essai courageux et esquivant l\'avancement de grade qui le mettrait à la terre. Entraînant de jeunes diplômés pour une mission spéciale, Maverick doit affronter les fantômes de son passé et ses peurs les plus profondes, aboutissant à une mission qui exige le sacrifice ultime de ceux qui choisissent de la piloter.', '2022-05-22', 'https://fr.web.img3.acsta.net/pictures/22/03/29/15/12/0827894.jpg', 'Joseph Kosinski', 3, ''),
(4, 'Bonjour', 'Saluuuut je suis le film, enfin askip', '2022-07-07', 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg', '', 1, '01f63f48-0f14-11ed-809f-5d8eb2d206a5'),
(6, 'HellloWorld', 'J\'ai finin j\'y crois pas ', '2022-07-01', '', 'moi-meme', 2, '01f63f48-0f14-11ed-809f-5d8eb2d206a5');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` varchar(36) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `username`) VALUES
('01f63f48-0f14-11ed-809f-5d8eb2d206a5', 'bonjour@mail.com', '$2y$10$0yyN8eYa4K1rroNx.9z3h.j84JFkrxp9CflHATRb7WjORRjTU4.pq', 'Franf'),
('0c8b6578-0f41-11ed-90c7-202970b437f7', 'Eao@ou.com', '$2y$10$l/TpN33anWZ0jGh8QlrGqu6vyXtphwEeMnkIMlCREkOZx3A79zJCi', 'Poup'),
('1d21a00c-0f1c-11ed-809f-5d8eb2d206a5', 'bonjour@gmail.com', '$2y$10$NDBw9tbs8XgrBz3fthlLnOnQeaieU3909FRUpS2sEGGA7lRXbgkri', 'Fran'),
('91112d36-0eb1-11ed-b47b-d6e8076a01c3', 'emilie.fruleux.ef@gmail.com', '$2y$10$m2iPNXko/hKLytvXV2zby.Jd61pGt.Xri7YMIf9GrUH2T81m.EK8e', 'Milie'),
('a4c2ee18-0f3e-11ed-90c7-202970b437f7', 'wahou@wow.com', '$2y$10$Qgpj22csLWT.lRquokEQcOAt6ObMn3V8k/MjZuDV9r3V1i6T32Gem', 'Bicyclette'),
('ae35aeda-0e86-11ed-832d-8572ac0927a9', 'francoiska_fr@icloud.com', '$2y$10$yto2X9.VZVrDFPi/sHmrmeX0NfWJtPbKgK/p.F4iQlczphD6SO81K', 'Franfran62'),
('bd2f059e-0f12-11ed-809f-5d8eb2d206a5', 'francoiska_fr@icloudd.com', '$2y$10$bjHhgvy.zTrH1etj4HvgGOlmm17.l4uvQIApvmlqD4rMSnXik.bAS', 'Franfran62'),
('d3ba423e-0e8a-11ed-832d-8572ac0927a9', 'Worldofwarcraft@gmail.com', '$2y$10$L7M66Q3xIGUYTPCP6W2zqe.m2zVQyGmQ.3rmLD4Y4u0b1.Ho0dOZW', 'Somnic');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
