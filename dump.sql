-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mar 15 Novembre 2016 à 14:17
-- Version du serveur :  5.5.53-0ubuntu0.14.04.1
-- Version de PHP :  5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `dwblog`
--

-- --------------------------------------------------------
CREATE DATABASE dwblog;
USE dwblog;
--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `public_name` tinytext NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `author`
--

INSERT INTO `author` (`id`, `username`, `public_name`, `email`, `password`) VALUES
(1, 'admin', 'Le grand maître du blog', 'd@djyp.me', '2a7447762dd886b4fd61ae9ee6b9552a'),
(5, 'djyp', 'le gars qui tape vite', 'd@djyp.me', '2a7447762dd886b4fd61ae9ee6b9552a');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(2, 'Fastfood', 'Ã‡a c\'est pas de la cuisine'),
(4, 'Parkour', ''),
(5, 'WoW', ''),
(6, 'Metal', 'Ã‡a parle de musique metal parce que c\'est cool et Ã§a sonne bien.'),
(7, 'J\'adore mon chat', 'Il est trop mignon mon petit bout de bonheur');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `post_id` mediumint(8) UNSIGNED NOT NULL,
  `commentor` varchar(30) NOT NULL,
  `comment_date` datetime NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `commentor`, `comment_date`, `content`) VALUES
(1, 16, 'djyp', '2016-10-26 16:06:58', 'coucoue, ton article est nul'),
(2, 16, 'djyp', '2016-10-26 16:28:10', 'coucoue, ton article est nul'),
(3, 16, 'djyp', '2016-11-04 12:33:07', ''),
(4, 16, 'djyp', '2016-11-04 12:35:01', 'jai faim !!!!!!');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` tinytext NOT NULL,
  `publication_date` datetime NOT NULL,
  `content` mediumtext NOT NULL,
  `author_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `title`, `publication_date`, `content`, `author_id`) VALUES
(7, 'nouvel article', '2016-10-20 16:46:38', 'fmsljfdmlkjsdlmvksjbvlskh', 1),
(8, 'titre', '2016-10-21 13:56:20', 'mon article', 2),
(9, 'nouvel article trop bien', '2016-10-21 14:08:17', 'je met du texte pour le plaisir de taper du texte', 5),
(10, 'Article 1', '2016-10-21 16:51:25', 'Saraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.\r\n\r\n', 5),
(11, 'Article 2', '2016-10-21 16:51:32', 'Saraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.\r\n\r\n', 5),
(12, 'Article 3', '2016-10-21 16:51:40', 'Saraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.\r\n\r\n', 5),
(13, 'Article 4', '2016-10-21 16:51:47', 'Saraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.\r\n\r\n', 5),
(14, 'Artcle 42', '2016-10-21 16:52:00', 'Saraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.\r\n\r\n', 5),
(15, 'Article 51', '2016-10-21 16:52:32', 'Saraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.\r\n\r\n', 5),
(16, 'Article 69', '2016-10-21 16:52:49', 'Saraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.\r\n\r\n', 5),
(17, 'Article 33', '2016-10-21 16:52:59', 'Saraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.\r\n\r\n', 5),
(18, 'Arfilkel 99', '2016-10-21 16:53:28', 'Saraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.\r\n\r\n', 5),
(19, 'Pouet', '2016-10-21 16:54:43', 'Saraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.\r\n\r\n', 5),
(20, 'Pouet pouet', '2016-10-21 16:54:51', 'Saraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.\r\n\r\n', 5),
(46, 'encore un, pour voir', '2016-11-08 16:57:18', 'gnÃ©', 5),
(47, 'C\'est fois c\'est la bonne', '2016-11-08 16:58:20', 'Ã‡a marche mÃªme avec des apostrophes !!', 5);

-- --------------------------------------------------------

--
-- Structure de la table `post_category`
--

CREATE TABLE `post_category` (
  `post_id` mediumint(8) UNSIGNED NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `post_category`
--

INSERT INTO `post_category` (`post_id`, `category_id`) VALUES
(7, 4),
(7, 6),
(9, 2),
(9, 4),
(9, 5),
(9, 6),
(10, 4),
(11, 6),
(12, 6),
(12, 7),
(13, 2),
(14, 4),
(14, 5),
(15, 5),
(16, 2),
(16, 4),
(16, 5),
(17, 4),
(17, 5),
(18, 6),
(20, 2),
(21, 2),
(21, 7),
(22, 4),
(22, 6),
(44, 7),
(45, 6),
(46, 6),
(47, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`post_id`,`category_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;