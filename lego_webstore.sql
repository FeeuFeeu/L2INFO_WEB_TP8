-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2018 at 11:54 AM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lego_webstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `catégories`
--

CREATE TABLE `catégories` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catégories`
--

INSERT INTO `catégories` (`id`, `libelle`) VALUES
(1, 'Architecture'),
(2, 'Star Wars');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `naiss` date NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `description` text NOT NULL,
  `specificite` text NOT NULL,
  `img0` varchar(255) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `description`, `specificite`, `img0`, `img1`, `img2`, `img3`, `id_categorie`) VALUES
(1, 'New York', 44.99, 'Fêtez la diversité architecturale de New York avec ce modèle détaillé en\r\nbriques LEGO®. La collection LEGO® Architecture Skyline offre des modèles\r\nadaptés à l\'exposition à la maison et au bureau, et a été développée pour toutes\r\nles personnes qui s\'intéressent au voyage, à la création, à l\'histoire et à\r\nl\'architecture.\r\n\r\nChaque ensemble a une échelle adaptée pour donner une\r\nidée précise de la taille comparative de chaque structure, avec une\r\nreprésentation en couleurs réaliste. Cet ensemble comprend le Flatiron Building,\r\nle Chrysler Building, l\'Empire State Building, le One World Trade Center et la\r\nStatue de la Liberté, et un écriteau décoratif “New York”.', '				<li>Interprétation LEGO du paysage de New York.</li>\r\n				<li>Comprend le Flatiron Building, le Chrysler Building, l\'Empire State Building, le One World Trade Center et la Statue de la Liberté.</li>\r\n				<li>Inclut une plaque de base 4x32 avec un écriteau décoratif \"New York\".</li>\r\n				<li>Recréez les plus belles villes du monde avec la collection LEGO Architecture Skyline.</li>\r\n				<li>Mesure 26 cm de haut, 25 cm de large et 4 cm de profondeur.</li>', 'produit_newyork_0.jpeg', 'produit_newyork_1.jpeg', 'produit_newyork_2.jpeg', 'produit_newyork_3.jpeg', 1),
(2, 'Faucon Millenium', 799.99, 'Ce nouveau modèle LEGO® Star Wars Millennium Falcon est le plus grand et le\r\nplus détaillé jamais conçu. En réalité, avec ses 7 500 pièces, c’est tout\r\nsimplement l’un des plus grands modèles LEGO ! Cette fantastique version LEGO de\r\nl’inoubliable cargo Corellien de Han Solo présente les moindres détails dont\r\nrêvent tous les fans de Star Wars, quel que soit leur âge : d’innombrables\r\ndétails à l’extérieur, quatre canons laser supérieurs et inférieurs, des pieds\r\nd’atterrissage, une rampe d’embarquement qui s’abaisse et un cockpit avec toit\r\namovible pouvant accueillir 4 figurines. Chacune des plaques de la coque peut\r\nêtre retirée pour découvrir les innombrables détails du compartiment principal,\r\nle compartiment arrière et le poste d’artillerie. Ce superbe modèle présente\r\négalement des équipages et des radars interchangeables, ce qui permet aux fans\r\nd’opter pour les aventures LEGO Star Wars classiques avec Han, Leia, Chewbacca\r\net C-3PO ou de plonger dans l’univers de l’Episode VII et VIII avec les anciens\r\npersonnages Han, Rey, Finn et BB-8 !', '<li> - Inclut 4 figurines de l’équipage classique : Han Solo, Chewbacca, Princesse\r\n  Leia et C-3PO. Comprend également 3 figurines de l’Épisode VII/VIII : les\r\n  anciens personnages Han Solo, Rey et Finn. Figurines incluses : un droïde BB-8,\r\n  ainsi qu’un mynock et 2 Porgs à construire. </li>\r\n<li>- L’extérieur du modèle présente des panneaux de coque amovibles et\r\n  extrêmement détaillés, une rampe d’embarquement qui s’abaisse, un canon\r\n  dissimulé, un cockpit pouvant accueillir 4 figurines avec toit amovible, des\r\n  radars interchangeables (un rond et un rectangulaire), quatre canons laser\r\n  supérieurs et inférieurs et 7 pieds d’atterrissage. </li>\r\n<li>- Le compartiment principal contient des sièges, l’holojeu Dejarik, un casque\r\n  d’entraînement à distance au combat, un poste d’ingénierie avec un siège\r\n  miniature pivotant et une entrée avec passage. </li>\r\n<li>- Le compartiment arrière se compose de la salle des machines avec un\r\n  hyperdrive et une console, de 2 entrées, d’un compartiment dissimulé dans le\r\n  sol, de 2 trappes de capsule de sauvetage, d’une console d’ingénierie et d’une\r\n  échelle permettant d’accéder au poste d’artillerie.</li>\r\n<li>- Le poste d’artillerie présente un siège d’artilleur miniature et un panneau\r\n  de coque amovible avec quatre canons laser entièrement rotatifs. Quatre autres\r\n  canons laser sont également montés sur le dessous du modèle.</li>\r\n<li>- Ce modèle comprend 7 500 pièces.</li>', 'produit_millennium_falcon_0.jpeg', 'produit_millennium_falcon_1.jpeg', 'produit_millennium_falcon_2.jpeg', 'produit_millennium_falcon_3.jpeg', 2),
(3, 'Arc de Triomphe', 34.99, 'Capturez l’élégance architecturale de l’un des monuments les plus célèbres du\r\nmonde avec cette impressionnante interprétation LEGO® Architecture de l’Arc de\r\nTriomphe. Ce modèle détaillé reproduit fidèlement le célèbre monument\r\nemblématique de Paris, avec des piliers ornés de statues, des bas-reliefs\r\nsculpturaux et des couleurs subtiles qui ajoutent de la chaleur tout en\r\nsoulignant les lignes osées, les courbes et les contours du modèle. Il inclut\r\naussi une plaque dorée pour représenter la tombe du Soldat inconnu, une\r\ninterprétation LEGO de la flamme éternelle et une plaque avec un écriteau « Arc\r\nde Triomphe ». Ce modèle en briques LEGO a été conçu pour fournir une expérience\r\nde construction stimulante et gratifiante pour toutes les personnes qui\r\ns\'intéressent au voyage, à la création, à l\'histoire et à l\'architecture et est\r\nadapté à l\'exposition à la maison ou au bureau.', '- Interprétation LEGO® Architecture d\'un célèbre bâtiment architectural, l’Arc\r\n  de Triomphe.\r\n- Comprend des piliers ornés de statues, des bas-reliefs sculpturaux et des\r\n  couleurs subtiles qui ajoutent de la chaleur et de l’emphase aux lignes, aux\r\n  courbes et aux contours osés du modèle. Il inclut aussi une plaque dorée pour\r\n  représenter la tombe du Soldat inconnu et une interprétation LEGO à construire\r\n  de la flamme éternelle.\r\n- Inclut une plaque décorative avec un écriteau «Arc de Triomphe».\r\n- Livret inclus avec des détails sur la conception, l\'architecture et l\'histoire\r\n  du monument (en français et en anglais uniquement. Autres langues disponibles\r\n  en téléchargement sur LEGO.com/architecture/booklet).\r\n- La ligne de produits LEGO® Architecture célèbre le monde de l\'architecture par\r\n  le biais de la brique LEGO, pour toutes les personnes qui s\'intéressent à la\r\n  création, à l\'histoire et à l\'architecture.\r\n- Fournit une expérience de construction agréablement stimulante et gratifiante.\r\n- Mesure plus de 11 cm de haut, 14 cm de large et 9 cm de profondeur.', 'produit_arc_triomphe_0.jpeg', 'produit_arc_triomphe_1.jpeg', 'produit_arc_triomphe_2.jpeg', 'produit_arc_triomphe_3.jpeg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catégories`
--
ALTER TABLE `catégories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catégories`
--
ALTER TABLE `catégories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
