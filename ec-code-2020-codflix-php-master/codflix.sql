-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 25, 2020 at 06:36 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `codflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Horreur'),
(3, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'in seconds'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `trailer_url` varchar(100) NOT NULL,
  `durée` varchar(255) DEFAULT NULL,
  `typeof` int(11) DEFAULT NULL,
  `saison` int(11) DEFAULT NULL,
  `episode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `genre_id`, `title`, `type`, `status`, `release_date`, `summary`, `trailer_url`, `durée`, `typeof`, `saison`, `episode`) VALUES
(1, 1, 'Fast & Furious 8', 'Action', 'VOD / streaming', '2017-04-12', 'Des rivages de Cuba aux rues de New York en passant par les plaines gelées de la mer arctique de Barrents, l\'équipe va sillonner le globe pour tenter d\'empêcher une anarchiste de déchaîner un chaos mondial et de ramener à la maison l\'homme qui a fait d\'eux une famille.', 'http://www.youtube.com/embed/eUpa_hwnxSA', '02h29', 1, NULL, NULL),
(2, 1, 'Sonic, le film', 'Action', 'VOD / Streaming', '2020-02-09', 'Les mésaventures de Sonic, alors qu\'il tente de naviguer dans la complexité de la vie sur Terre, aux côtés de son nouveau meilleur ami, Tom Wachowski, un humain. Sonic et Tom unissent leurs forces pour tenter d\'empêcher le terrible Dr. Robotnik de capturer Sonic, ce dernier souhaitant utiliser son immense pouvoir pour dominer le monde.', 'http://www.youtube.com/embed/IKauPzXtrf4', '01h40', 1, NULL, NULL),
(3, 1, 'Les Indestructibles 2', 'Action / Aventure', 'VOD / Streaming', '2018-06-05', 'Hélène se retrouve sur le devant de la scène et laisse à Bob le soin de mener à bien les mille et une missions de la vie quotidienne et de s\'occuper de Violette, Flèche et de bébé Jack-Jack. C\'est un changement de rythme difficile pour la famille d\'autant que personne ne mesure réellement l\'étendue des incroyables pouvoirs du petit dernier. Lorsqu\'un nouvel ennemi fait surface, les familles et Frozone vont devoir s\'allier comme jamais pour déjouer son plan machiavélique.', 'http://www.youtube.com/embed/ULGYGyXgprg', '02h05', 1, NULL, NULL),
(4, 3, 'The 100', 'Action', 'En cours', '2014-03-19', 'Après une apocalypse nucléaire, les 318 survivants se réfugient dans des stations spatiales et parviennent à y vivre et à se reproduire, atteignant le nombre de 4000 ; 97 ans plus tard, une centaine de jeunes délinquants redescendent sur Terre.', 'http://www.youtube.com/embed/YIx4nbTSV_Q', 'Environ 40 minutes', 2, 1, 1),
(5, 2, 'Ça : Le Film', 'Horreur', 'VOD / streaming', '2017-09-05', 'À Derry, dans le Maine, sept gamins ayant du mal à s\'intégrer se sont regroupés au sein du Club des Ratés. Rejetés par leurs camarades, ils sont les cibles favorites des gros durs de l\'école. Ils ont aussi en commun d\'avoir éprouvé leur plus grande terreur face à un terrible prédateur métamorphe qu\'ils appellent Ça.', 'http://www.youtube.com/embed/Tw3yT-qAbvc', '02h15', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `serie`
--

CREATE TABLE `serie` (
  `id` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  `saison` int(2) NOT NULL,
  `episode` int(3) NOT NULL,
  `title` varchar(55) NOT NULL,
  `summary` longtext NOT NULL,
  `url` varchar(100) NOT NULL,
  `date_sortie` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serie`
--

INSERT INTO `serie` (`id`, `id_serie`, `saison`, `episode`, `title`, `summary`, `url`, `date_sortie`) VALUES
(1, 4, 1, 1, 'The 100', 'Après une apocalypse nucléaire, les 318 survivants se réfugient dans des stations spatiales et parviennent à y vivre et à se reproduire, atteignant le nombre de 4000 ; 97 ans plus tard, une centaine de jeunes délinquants redescendent sur Terre.', 'http://www.youtube.com/embed/YIx4nbTSV_Q', '2014-03-19'),
(2, 4, 2, 1, 'The 100', 'Des survivants de l\'apocalypse qui ne sont pas en mesure de survivre aux radiations terrestres et vivent confinés dans les montagnes. Pour survivre, ils capturent des terriens et les vident de leur sang pour se le transfuser.', 'http://www.youtube.com/embed/OSKl4yuLQ6M\"', '2014-10-24'),
(3, 4, 2, 2, 'The 100', 'Jaha se retrouve seul sur l\'Arche et décide de mettre fin à ses jours. Mais après avoir coupé l\'alimentation électrique, il entend des cris de bébé. Il retrouve l\'enfant, change d\'avis et décide de rejoindre la Terre. Sur le point de partir, il s\'aperçoit que le bébé n\'est qu\'une hallucination due au manque d\'oxygène.', 'http://www.youtube.com/embed/IW7_ZzFZF-o', '2014-10-29'),
(4, 4, 1, 2, 'The 100', 'Après avoir réussi à survivre à ses blessures, le chancelier apprend la supposée mort de son fils. Le conseil de l\'Arche commence à débattre du fait que plus de 200 personnes devront être tuées pour que l\'Arche puisse survivre encore six mois. Lors d\'un vote du conseil, le vote est serré et le chancelier s\'abstient. Cette action ne condamnera pas 200, mais 300 personnes à être abattues dans dix jours, à moins qu\'Abigail découvre un moyen de contacter la surface. Au milieu de cela, Raven, une mécanicienne zéro-gravité, découvre que 100 personnes ont été envoyés sur la Terre (un secret pour la population de l\'Arche), et est recrutée par Abigail afin de réparer une capsule de largage pour transmettre au sol.', 'http://www.youtube.com/embed/ia1Fbg96vL0', '2014-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Film'),
(2, 'Serie');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'riri@gmail.com', '123'),
(2, 'test@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(3, 'riri@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(5, 'hugo@gmail.com', '5'),
(6, 'melec@gmail.com', '6'),
(7, 'panpan@gmail.com', '1234'),
(8, 'toto@gmail.com', '1234567'),
(9, 'titi@gmail.com', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918'),
(10, 'boubou@gmail.com', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918'),
(13, 'test1@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(14, 'coding@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_fk_user_id` (`user_id`),
  ADD KEY `favorites_media_id_fk_media_id` (`media_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_fk_media_id` (`user_id`),
  ADD KEY `history_media_id_fk_media_id` (`media_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_genre_id_fk_genre_id` (`genre_id`) USING BTREE,
  ADD KEY `media_type_fk_type` (`type`) USING BTREE,
  ADD KEY `media_type_id_fk_type_id` (`typeof`);

--
-- Indexes for table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serie_id_serie_fk_id_serie` (`id_serie`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_media_id_fk_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_user_id_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_genre_id_b1257088_fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `media_type_id_fk_type_id` FOREIGN KEY (`typeof`) REFERENCES `type` (`id`);

--
-- Constraints for table `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `serie_id_serie_fk_media_id` FOREIGN KEY (`id_serie`) REFERENCES `media` (`id`) ON DELETE CASCADE;
