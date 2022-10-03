-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
<<<<<<< HEAD
-- Hôte : localhost:3306
-- Généré le : mer. 28 sep. 2022 à 16:58
-- Version du serveur :  10.2.44-MariaDB
-- Version de PHP : 7.4.30
=======
-- Hôte : localhost:8889
-- Généré le : ven. 30 sep. 2022 à 10:43
-- Version du serveur :  5.7.34
-- Version de PHP : 7.3.29
>>>>>>> dev

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gbatxnzb_my-linksdev`
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

--
-- Déchargement des données de la table `background_theme_user`
--

INSERT INTO `background_theme_user` (`id`, `label`, `slug`, `file_path`, `type`, `status`, `couleur`) VALUES
(1, 'template 1', 'template-1', '/asset/template/svg/template-1.svg', 'svg', 1, 'orange'),
(2, 'template 2', 'template-2', '/asset/template/svg/template-2.svg', 'svg', 1, 'orange'),
(3, 'template 3', 'template-3', '/asset/template/svg/template-3.svg', 'svg', 1, 'orange'),
(4, 'template 4', 'template-4', '/asset/template/svg/template-4.svg', 'svg', 1, 'orange'),
(5, 'template 5', 'template-5', '/asset/template/svg/template-5.svg', 'svg', 1, 'orange'),
(6, 'template 6', 'template-6', '/asset/template/svg/template-6.svg', 'svg', 1, 'orange'),
(7, 'template 7', 'template-7', '/asset/template/svg/template-7.svg', 'svg', 1, 'orange'),
<<<<<<< HEAD
(8, 'template 8', 'template-8', '/asset/template/svg/template-8.svg', 'svg', 1, 'orange');
=======
(8, 'template 8', 'template-8', '/asset/template/svg/template-8.svg', 'svg', 1, 'orange'),
(9, 'template 9', 'template-9', '/asset/template/svg/template-9.svg', 'svg', 1, 'orange'),
(10, 'template 10', 'template-10', '/asset/template/svg/template-10.svg', 'svg', 1, 'orange');
>>>>>>> dev

-- --------------------------------------------------------

--
-- Structure de la table `dashboard_parameters`
--

CREATE TABLE `dashboard_parameters` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `parameter` text NOT NULL
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
  `text_color_link` text NOT NULL,
<<<<<<< HEAD
  `icon` text DEFAULT NULL,
  `position` int(11) NOT NULL
=======
  `icon` text,
  `position` int(11) NOT NULL,
  `link_show` tinyint(1) NOT NULL DEFAULT '1',
  `date_start_show` datetime DEFAULT NULL,
  `date_finish_show` datetime DEFAULT NULL
>>>>>>> dev
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `link`
--

<<<<<<< HEAD
INSERT INTO `link` (`id`, `id_user`, `url`, `type`, `texte`, `forme`, `couleur_card`, `effect`, `text_color_link`, `icon`, `position`) VALUES
(5, 7, 'url', 'type', 'texte exemple', 1, '', 'effect', '', NULL, 1),
(6, 7, 'url', 'type', 'texte exemple 2', 1, '', 'effect', '', NULL, 2);
=======
INSERT INTO `link` (`id`, `id_user`, `url`, `type`, `texte`, `forme`, `couleur_card`, `effect`, `text_color_link`, `icon`, `position`, `link_show`, `date_start_show`, `date_finish_show`) VALUES
(5, 7, 'url', 'type', 'texte exemple', 1, '', 'effect', '', NULL, 1, 1, NULL, NULL),
(6, 7, 'url', 'type', 'texte exemple 2', 1, '', 'effect', '', NULL, 2, 1, '2022-09-30 00:00:00', '2022-09-30 23:59:59');
>>>>>>> dev

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

--
-- Déchargement des données de la table `page_parameter`
--

INSERT INTO `page_parameter` (`id`, `id_user`, `type_composition`, `theme_id`, `color_page`, `police`, `views_count`, `texte_color`) VALUES
<<<<<<< HEAD
(6, 7, 'bg-top', 1, '', '', '', 'rgb(255, 255, 255);');
=======
(6, 7, 'bg-full', 1, '', '', '', 'rgb(255, 255, 255);');
>>>>>>> dev

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
<<<<<<< HEAD
  `path_img` text DEFAULT NULL,
=======
  `token` text,
  `path_img` text,
>>>>>>> dev
  `description` text NOT NULL,
  `confirme` text NOT NULL,
  `date_creation` date NOT NULL,
  `star_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

<<<<<<< HEAD
INSERT INTO `user` (`id_user`, `name_user`, `email_user`, `mdp_user`, `nom_user`, `prenom_user`, `confirmkey`, `uniqid`, `path_img`, `description`, `confirme`, `date_creation`, `star_account`) VALUES
(7, 'edman', 'eddy.mahmoud@epitech.eu', '$2y$10$UwLTkpcUsZdbeO2VewkWf.gHahuqo5pr.TM7ZlqK.rOwKNRs92Y56', 'eddy', 'mhd', '24060532928566', '63330b062a93d', NULL, '', '', '2022-09-27', 0);
=======
INSERT INTO `user` (`id_user`, `name_user`, `email_user`, `mdp_user`, `nom_user`, `prenom_user`, `confirmkey`, `uniqid`, `token`, `path_img`, `description`, `confirme`, `date_creation`, `star_account`) VALUES
(7, 'edman', 'eddy.mahmoud@epitech.eu', '$2y$10$UwLTkpcUsZdbeO2VewkWf.gHahuqo5pr.TM7ZlqK.rOwKNRs92Y56', 'eddy', 'mhd', '24060532928566', '63330b062a93d', '', NULL, '', '', '2022-09-27', 0);
>>>>>>> dev

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
-- Déchargement des données de la table `views_count_insert`
--

INSERT INTO `views_count_insert` (`id`, `ip`, `date`, `id_user`) VALUES
(1, '::1', '2022-09-28', 7),
<<<<<<< HEAD
(2, '80.13.106.214', '2022-09-28', 7);
=======
(2, '80.13.106.214', '2022-09-28', 7),
(3, '81.65.135.109', '2022-09-28', 7),
(4, '81.65.135.109', '2022-09-29', 7),
(5, '::1', '2022-09-29', 7),
(6, '::1', '2022-09-30', 7);
>>>>>>> dev

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `background_theme_user`
--
ALTER TABLE `background_theme_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dashboard_parameters`
--
ALTER TABLE `dashboard_parameters`
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
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
>>>>>>> dev

--
-- AUTO_INCREMENT pour la table `dashboard_parameters`
--
ALTER TABLE `dashboard_parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `page_parameter`
--
ALTER TABLE `page_parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `views_count_insert`
--
ALTER TABLE `views_count_insert`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
>>>>>>> dev

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
