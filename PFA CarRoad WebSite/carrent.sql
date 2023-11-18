--
--la creation du base de donner 
--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agence_de_loyer_auto`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'admin1', 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda'), /* password: admin1 */
(2, 'admin2', 'admin2@gmail.com', 'c84258e9c39059a89ab77d846ddab909'); /* password: admin2 */ 

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `id_agence` int(11) NOT NULL,
  `pseudo_ag` tinytext NOT NULL,
  `nom_agence` tinytext NOT NULL,
  `mail_ag` tinytext NOT NULL,
  `tel_ag` text NOT NULL,
  `adress_agence` tinytext NOT NULL,
  `dmd` varchar(32) NOT NULL,
  `pwd_ag` longtext NOT NULL,
  `id_admin_ag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`id_agence`, `pseudo_ag`, `nom_agence`, `mail_ag`, `tel_ag`, `adress_agence`, `dmd`, `pwd_ag`, `id_admin_ag`) VALUES
(1, 'agence1', 'AymenAuto', 'agence1@gmail.com', '54330607', 'Avenue Habib Bourguiba – BP 95- 9100 Sidi Bouzid', '', 'd1d3b2545eedc747c4835da8574f5f5e', 0), -- password: agence1 --
(2, 'agence2', 'RentAuto', 'agence2@gmail.com', '55455444', 'Lotissement Jelleli, Immeuble El Amine, 3éme étage – 9100 Sidi Bouzid', 'Accepter', '84fefc788a533d4b95dc7559b699fc55', 1), -- password: agence2 --
(3, 'agence3', 'SassiAuto', 'agence2@gmail.com', '52445541', '13 hamam bourguiba Soukra', 'Accepter', 'd4613e716b81b0c2d958aa27d506d3d0', 2); -- password: agence3 --

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `pseudo_c` tinytext NOT NULL,
  `nom_c` tinytext NOT NULL,
  `prenom_c` tinytext NOT NULL,
  `email_c` tinytext NOT NULL,
  `numtel_c` tinytext NOT NULL,
  `pwd` longtext NOT NULL,
  `id_admin_cl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `pseudo_c`, `nom_c`, `prenom_c`, `email_c`, `numtel_c`, `pwd`, `id_admin_cl`) VALUES
(1, 'Aymen', 'Samoudi', 'Aymen', 'aymen@gmail.com', '54330607', '31f11e387577c8d06c9d1b1ade4c4c32', 1), -- password: ayemn --
(2, 'Ahmed', 'Amri', 'Ahmed', 'ahmed@gmail.com', '54330607', '9193ce3b31332b03f7d8af056c692b84', 2); -- password: ahmed --

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

CREATE TABLE `voitures` (
  `id_voiture` int(11) NOT NULL,
  `marque` tinytext NOT NULL,
  `description` tinytext NOT NULL,
  `immat` tinytext NOT NULL,
  `prix_parj` tinytext NOT NULL,
  `genre` varchar(64) NOT NULL,
  `img` varchar(200) NOT NULL,
  `statut` varchar(21) NOT NULL,
  `id_agence_voit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `voitures`
--

INSERT INTO `voitures` (`id_voiture`, `marque`, `description`, `immat`, `prix_parj`, `genre`, `img`, `statut`, `id_agence_voit`) VALUES
(1, 'Audi A3 Limousine', 'Audi A3 Limousine 4 Portes, 2.0 TDI Design Luxe S Tronic 6', '201 Tun 5411', '80', 'Intermediaire', 'Imageuploads/car1.jpg', 'Occupee', 1),
(2, 'RANGE ROVER', "RANGE ROVER SPORT 4 Portes, ompose de deux écrans tactiles 10'' haute définition. Utilisez Touch Pro Duo avec l'affichage tête haute et le tableau de bord virtuel afin de consulter et d'interagir simultanément avec plusieurs fonctionnalités.", '201 Tun 5452', '60', 'Premium', 'Imageuploads/car2.jpg', 'Occupee', 1),
(3, 'AUDI RS6', 'AUDI RS6 4 porte, TFSI 560 QUATTRO TIPTRONIC', '205 Tun 6544', '80', 'Economique', 'Imageuploads/car3.jpg', 'Libre', 2),
(4, 'Peugeot 3008', 'Peugeot 3008 5 Porte, 1.5 BLUEHDI 130 S&S 7CV ALLURE EAT8', '170 Tun 5477', '65', 'Economique', 'Imageuploads/car4.jpg', 'Libre', 3),
(5, 'Renault', 'Renault clio Familliale', '203 Tun 5441', '70', 'Intermediaire', 'Imageuploads/car5.jpg', 'Libre', 3),
(6, 'CHEVROLET', "CHEVROLET CORVETTE C8 6.2 V8 482 3LT", '201 Tun 5452', '60', 'Premium', 'Imageuploads/car6.jpg', 'Libre', 1);


-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reser` int(11) NOT NULL,
  `date_de_depart` date NOT NULL,
  `nbjour` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reser`, `date_de_depart`, `nbjour`, `id_client`) VALUES
(1, '2022-04-19', 2, 1),
(2, '2022-04-22', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id_contrat` int(11) NOT NULL,
  `date_ret` date NOT NULL,
  `total_prix` double NOT NULL,
  `statut_op` varchar(32) NOT NULL,
  `id_reser` int(11) NOT NULL,
  `id_voiture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`id_contrat`, `date_ret`, `total_prix`, `statut_op`, `id_reser`, `id_voiture`) VALUES
(1, '2022-04-19', 144, 'En attent', 1, 1),
(2, '2022-04-22', 300, 'Accepter', 2, 3);


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idUsers`);

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id_agence`),
  ADD KEY `id_admin_ag` (`id_admin_ag`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `id_admin_cl` (`id_admin_cl`);

--
-- Index pour la table `voitures`
--
ALTER TABLE `voitures`
  ADD PRIMARY KEY (`id_voiture`),
  ADD KEY `id_agence_voit` (`id_agence_voit`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reser`),
  ADD KEY `id_client_l` (`id_client`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id_contrat`),
  ADD KEY `id_client_transact` (`id_reser`),
  ADD KEY `id_voiture_transact` (`id_voiture`);


--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `id_agence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;


--
-- AUTO_INCREMENT pour la table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `id_voiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id_contrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
