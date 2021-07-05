-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 05 juil. 2021 à 11:48
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `backoffice`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_titre` varchar(255) NOT NULL,
  `blog_auteur` varchar(255) NOT NULL,
  `blog_texte` longtext NOT NULL,
  `blog_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_titre`, `blog_auteur`, `blog_texte`, `blog_date`) VALUES
(6, 'Nicolas le plus bÃ´', 'williams', 'RÃ©diger votre message dans ce champs', '2021-06-30'),
(11, 'Jean-Baptiste', 'williams', 'JB', '2021-06-29'),
(12, 'Nathan le BG', 'williams', 'Nathan', '2021-06-29');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `idprojets` int(11) NOT NULL,
  `projets_title` varchar(245) NOT NULL,
  `projets_date_debut` date NOT NULL,
  `projets_date_fin` date DEFAULT NULL,
  `projets_context` longtext NOT NULL,
  `projets_specs` longtext NOT NULL,
  `projets_lien_github` longtext,
  `projets_lien_projet` longtext,
  `projets_image` varchar(255) DEFAULT NULL,
  `projets_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`idprojets`, `projets_title`, `projets_date_debut`, `projets_date_fin`, `projets_context`, `projets_specs`, `projets_lien_github`, `projets_lien_projet`, `projets_image`, `projets_logo`) VALUES
(31, 'Open-Entreprise', '2021-03-22', '2021-04-07', 'Premier projet d\'intÃ©gration Web. Cette landing page est une maquette figma, dÃ©ja faite, pour cette premiÃ¨re intÃ©gration, il nous a Ã©tÃ© demandÃ© de la recrÃ©er en HTML et CSS.  ', 'Pour intÃ©grer cette maquette figma, j\'ai utilisÃ© le framework \'Bootstrap\', permettant de prendre facilement en main les langages du WEB', 'https://github.com/WilliamsChazal/Open-Entreprise', 'https://williamsc.promo-68.codeur.online/Open-Entreprise/', 'capture-open-entreprise.PNG', 'open-entreprise-logo.png'),
(32, 'The Washingt\'Owl Post', '2021-04-12', '2021-05-09', 'The Washingt\'Owl Post est le premier projet en groupe que nous avons rÃ©alisÃ©. Ce site regroupe plusieurs articles sur les mÃ©tiers du numÃ©riques, qui ont Ã©tÃ© Ã©crits par les stagiaires de l\'ACS Dijon.', 'En binÃ´me, nous avons Ã©laborÃ© le Design du site. Nous voulions donner Ã  notre projet une apparence de journal papier. Nous avons donc dÃ©cidÃ© de la charte graphique, des typographies, ainsi que de l\'interface utilisateur, en suivant ce fil conducteur. Pour l\'intÃ©gration, il nous a Ã©tÃ© demandÃ© d\'utilisÃ© le Framework \'Boostrap\'. A cela s\'ajoute une utilisation du javascript pour la partie des \'flip-card\'.', 'https://github.com/WilliamsChazal/the-washingtowl-post', 'https://williamsc.promo-68.codeur.online/the-washingtowl-post/landingpage/index.php', 'capture-owl-post.PNG', 'logo-owl-post.png'),
(33, 'Blindness', '2021-05-25', '2021-06-04', 'Ce projet de groupe avait pour thÃ¨me l\'accessibilitÃ© numÃ©rique. L\'idÃ©e portÃ© par le site Blindness est d\'informer et de sensibiliser les utilisateurs sur les dÃ©ficiences visuels lors de l\'utilisation d\'outils numÃ©rique.', 'Ce projet Ã  nÃ©cessitÃ© l\'utilisation de plusieurs langages, le HTML et CSS, ainsi que du JavaScript ainsi que du PHP pour l\'intÃ©gration. La particularitÃ© de se site tient au fait qu\'il est entiÃ¨rement parcourable Ã  l\'audio. Le site Ã  donc Ã©tÃ© conÃ§us autour de cette fonctionnalitÃ©, de plus, nous avons utilisÃ© les balises \'aria label\' pour permettre la navigation au clavier.', 'https://github.com/WilliamsChazal/Blindness', 'https://williamsc.promo-68.codeur.online/Blindness/pages/', 'capture-blindness.PNG', 'logo-blindness.png'),
(36, 'test-projet', '2021-07-06', '2021-07-21', 'test', 'test', 'test', 'test', 'page-sport-1.png', 'gwendoline-matos-logo-noir.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'williamsc', 'w.chazal@codeur.online', '$2y$10$hkEoEYlJsbftUP3mQLs1Pu0dU3SV0p7QZ.jXz991IsdQXsljXmmKK'),
(7, 'williamsc', 'w.chazal@codeur.online', '$2y$10$PHgL.aN0jrvrCGHH15eV3utZ2ns9QBIOhXqjFM3dFD.VnjewAAKMK'),
(8, 'root', 'boris.debot@codeur.com', '$2y$10$O9bTl/Pi9jcXLtWbtgScdO9ru/t8BFc0BL7dyGQm2N1lbMCF.OEOS'),
(9, 'Etienne', 'etienne@codeur.com', '$2y$10$4MfUMKvkxuNHJxJdubUfCe99rwYuC7gtrJxckyoV1HP1Lwpk3uKIe'),
(11, 'boris', 'boris.debot@codeur.com', '$2y$10$ws0uo2BMKYbzE9A8wiPkN.AUY1fvrcCRr97/VWb5IMbzrbXSaaS4a'),
(12, 'jean-baptise', 'jb@druet.com', '$2y$10$dBSdoy6LjMZgk9mK7ZJ0O.xFBM0i8IbsVTbGjv/glIIRDldwx2CPS'),
(13, 'williams', 'w.chazal@codeur.online', '$2y$10$6TqPDqXIOu47s4U3Gd9f.uCEH8qL1cF3lJMGGR557PYrMyUWW9UWC'),
(14, 'williams', 'wchazal26@gmail.com', '$2y$10$UWFki5ACJic4DFLqxPnYyOmrxqIzUwNuJkHpOlhEX2q8Scce1RL.a'),
(15, 'boris', 'b.debot@codeur.online', '$2y$10$7BcQWW2sAP4lBX1N0Emwpu86n/oJ6EQZ5.vMjdIZzHyZ5hFEODosO');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`idprojets`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `idprojets` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
