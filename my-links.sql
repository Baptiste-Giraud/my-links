-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 27 sep. 2022 à 14:12
-- Version du serveur :  5.7.34
-- Version de PHP : 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `my-links`
--

-- --------------------------------------------------------

--
-- Structure de la table `background_theme_user`
--

CREATE TABLE `background_theme_user` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `slug` text NOT NULL,
  `file_path` text NOT NULL,
  `type` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `couleur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `id_user_follow` int(11) NOT NULL,
  `id_user_to_follow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `url` text NOT NULL,
  `type` text NOT NULL,
  `texte` text NOT NULL,
  `forme` int(11) DEFAULT NULL,
  `couleur_card` text NOT NULL,
  `effect` text NOT NULL,
  `text_color_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `page_parameter`
--

CREATE TABLE `page_parameter` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type_composition` text NOT NULL,
  `theme_id` int(11) NOT NULL,
  `color_page` text NOT NULL,
  `police` text NOT NULL,
  `views_count` text NOT NULL,
  `texte_color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recup_mdp`
--

CREATE TABLE `recup_mdp` (
  `id` int(11) NOT NULL,
  `code` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_media`
--

CREATE TABLE `type_media` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` text NOT NULL,
  `path_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_media`
--

INSERT INTO `type_media` (`id`, `id_user`, `type`, `path_img`) VALUES
(1, 6, 'logo', 'image_galery/1621278432.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` text NOT NULL,
  `email_user` text NOT NULL,
  `mdp_user` text NOT NULL,
  `nom_user` text NOT NULL,
  `prenom_user` text NOT NULL,
  `confirmkey` text NOT NULL,
  `uniqid` text NOT NULL,
  `path_img` text NOT NULL,
  `description` text NOT NULL,
  `confirme` text NOT NULL,
  `date_creation` date NOT NULL,
  `star_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `views_count_insert`
--

CREATE TABLE `views_count_insert` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `background_theme_user`
--
ALTER TABLE `background_theme_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_link_user` (`id_user`);

--
-- Index pour la table `page_parameter`
--
ALTER TABLE `page_parameter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_parameter_user_id` (`id_user`),
  ADD KEY `theme_id` (`theme_id`);

--
-- Index pour la table `recup_mdp`
--
ALTER TABLE `recup_mdp`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_media`
--
ALTER TABLE `type_media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `views_count_insert`
--
ALTER TABLE `views_count_insert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_useronuser` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `background_theme_user`
--
ALTER TABLE `background_theme_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `page_parameter`
--
ALTER TABLE `page_parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `recup_mdp`
--
ALTER TABLE `recup_mdp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_media`
--
ALTER TABLE `type_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `views_count_insert`
--
ALTER TABLE `views_count_insert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `id_link_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `page_parameter`
--
ALTER TABLE `page_parameter`
  ADD CONSTRAINT `page_parameter_user_id` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `theme_id` FOREIGN KEY (`theme_id`) REFERENCES `background_theme_user` (`id`);

--
-- Contraintes pour la table `views_count_insert`
--
ALTER TABLE `views_count_insert`
  ADD CONSTRAINT `id_useronuser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
