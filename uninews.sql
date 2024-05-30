-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 mai 2024 à 00:12
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `uninews`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'imen@gmail.com', 'imen202003');

-- --------------------------------------------------------

--
-- Structure de la table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `advertisement`
--

INSERT INTO `advertisement` (`id`, `photo`) VALUES
(16, 'Story Instagram Formation Professional Bleu (6).png'),
(17, 'Story Instagram Formation Professional Bleu (10).png'),
(18, 'Story Instagram Formation Professional Bleu (5).png'),
(19, 'Story Instagram Formation Professional Bleu (8).png'),
(20, 'Story Instagram Formation Professional Bleu (9).png'),
(21, 'Story Instagram Formation Professional Bleu (7).png');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `likec` varchar(200) NOT NULL,
  `idnews` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `dislike` int(255) NOT NULL,
  `raiting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `likec`, `idnews`, `iduser`, `dislike`, `raiting`) VALUES
(28, 'good', '2', 23, 59, 0, 0),
(30, 'well', '2', 23, 59, 0, 4),
(31, 'yes', '', 34, 59, 0, 5);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'imen', 'imen@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `time` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `cat` varchar(200) NOT NULL,
  `text` longtext NOT NULL,
  `URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `time`, `photo`, `cat`, `text`, `URL`) VALUES
(6, '5week', 'SQL.jpg', 'programming', 'SQL', 'http://courses/sql22//.com'),
(7, '8week', 'Digital Marketing.jpg', 'Marketing', 'DIGITAL MARKETING', 'http//marketing//cours/.com'),
(8, '30 h', 'English.jpg', 'language', 'ENGLISH COURSES', 'http//english//cours/.com'),
(9, '42 h', 'CS50 HARVARD UNIV.jpg', 'Education', 'CS 50', 'http//education//cours/.com');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `titlen` longtext NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `titlen`, `content`) VALUES
(23, 'Spring Graduation Ceremony', 'The university announced the schedule for its spring graduation ceremonies, highlighting students representing their respective colleges. Among the participating students are Megan and Mridhula. These events mark a significant milestone for graduating students as they celebrate their academic achievements.'),
(27, 'Awarding of Honorary Doctorates', '  The university will award honorary doctorates to distinguished individuals in business management, engineering, and humanitarian efforts, recognizing their significant contributions in their fields.'),
(30, 'Faculty Solidarity with Students', 'Faculty members joined students in protesting the university\'s investment policies and the arrest of student protesters. This solidarity highlights the active role faculty can play in supporting student activism and advocating for ethical investment practices within the university.'),
(31, 'Faculty Engagement in Climate Research', ' A climate scientist at the university provided insights into unusual weather patterns in California, contributing to public understanding of climate variability and its impacts.'),
(32, 'Internship Opportunities for Electrical Engineering Students', ' Announcement of summer internship opportunities for electrical engineering students at leading local companies in renewable energy and automation technologies. This internship provides students with a chance to apply concepts learned in classrooms to practical projects in the engineering industry.'),
(34, 'Competition for Computer Science Students', '   National competition announced for computer science students aimed at enhancing skills in data analysis and application development. The competition includes various categories such as interface design and artificial intelligence, providing students an opportunity to exchange knowledge and interact with the industry.'),
(35, 'Competition for Computer Science Students', '   National competition announced for computer science students aimed at enhancing skills in data analysis and application development. The competition includes various categories such as interface design and artificial intelligence, providing students an opportunity to exchange knowledge and interact with the industry.'),
(36, 'Competition for Computer Science Students', '   National competition announced for computer science students aimed at enhancing skills in data analysis and application development. The competition includes various categories such as interface design and artificial intelligence, providing students an opportunity to exchange knowledge and interact with the industry.');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `password`) VALUES
(59, 'imen', 'mourah', 'imen@gmail.com', '$2y$10$dbaE9QcDfHw72IPWripoq.6TsT4U36587bIBYMfOhAIWlg09n9.JC'),
(69, 'rahma', 'rahma', 'imen@gmail.com', '$2y$10$jJr7dm4eCmzQwHhwhukOfuvRZU6kVIw5wf.l2XTU2yxBxKZI4cmIG'),
(70, 'imen', 'mourah', 'imen@gmail.com', '$2y$10$gRBxSRjiUaa7wP7s6gcYFubeHk5flPKkwdCBYf4L5J2/vx/..0pAu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_comment` (`idnews`),
  ADD KEY `fl_user_comment` (`iduser`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_news_comment` FOREIGN KEY (`idnews`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fl_user_comment` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
