-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 04 mars 2022 à 21:09
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(2, 'Article 2', ' Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis neque quidem quo facilis rerum nulla molestias voluptatum architecto recusandae autem fugit sint iure non tenetur ipsam, quaerat saepe accusantium accusamus.', 2, 1, '2022-02-08 22:34:03'),
(4, 'article 3 changé', ' Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis neque quidem quo facilis rerum nulla molestias voluptatum architecto recusandae autem fugit sint iure non tenetur ipsam, quaerat saepe accusantium accusamus.', 2, 2, '2022-03-02 14:26:32'),
(5, 'jf&quot;dhpiazjs', 'fheozgfuiqzgfpzfhÃ®ozeqÃ¹pdzoehfgpzuu', 3, 1, '2022-02-09 23:27:06'),
(6, 'ouais', 'siasiauousoausoausoausoasa', 3, 1, '2022-02-09 23:28:25'),
(7, 'Les transformations de l&#039;ultime Ã©tape', 'Ouais effectivement c&#039;est bien ce que je me disais, c&#039;est cela et rien d&#039;autre', 3, 3, '2022-02-09 23:30:58');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Catégorie 1'),
(2, 'Catégorie 2'),
(3, 'Catégorie 3');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'salut salut ', 6, 3, '2022-03-02 14:02:41'),
(3, 'Voici venir les barbapapas', 7, 2, '2022-03-02 16:37:03'),
(4, 'Ah oui oui', 4, 2, '2022-03-02 16:42:54'),
(5, 'Aie aie aie', 7, 3, '2022-03-04 19:32:30'),
(8, 'ctyteuxiclvmbpicxwt&lt;rqe', 7, 3, '2022-03-04 20:04:22'),
(7, 'lalalalalalalala', 7, 3, '2022-03-04 20:02:32');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `droits` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `droits`) VALUES
(2, 'admin', '$2y$10$BdkzXDY0ZfYUNd5P.z38sufQgrIF8hmt3aCO2qkFrMGF1pXp5dKYO', 'sami.baroudi@laplateforme.io', 1337),
(3, 'sami', '$2y$10$X17sOgedSAd3aRdEJ1BI5.h5omKY3cOoZlwF2Dh4YkxlUB/p8dDbS', 'sami@test.com', 42),
(4, 'julien', '$2y$10$rZ2tfVwO/ohqkzRc5qM1SeS9rnbCyNQ29Yeiv9jur3nAg61G6KY0y', 'julien@test.com', 42);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
