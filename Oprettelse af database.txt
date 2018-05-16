//Lav database kaldt 'SSPro' - herefter laves tabellen 'brugere':
CREATE TABLE `brugere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

//Herefter indsættes brugere ind i tabellen.
INSERT INTO `brugere` (`id`, `email`, `password`, `active`) VALUES
(1, 'admin@aau.dk', 'password', 1);

//Tabellen 'ordrer' laves.
CREATE TABLE `ordrer` (
  `kunde_ID` int(11) NOT NULL AUTO_INCREMENT,
  `kunde` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `d_date` date NOT NULL,
  `n_date` date DEFAULT NULL,
  `rute` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `str` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `antal` int(20) NOT NULL,
  `note` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY(kunde_ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

//Indsæt værdier ind i tabellen ordrer.
INSERT INTO `ordrer` (`kunde_ID`, `kunde`, `d_date`, `n_date`, `rute`, `str`, `antal`, `note`) VALUES
('', 'Studentersamfundet', '2018-05-01', '2018-06-30', 'Badehusvej', 'A4', 50, 'Beh&oslash;ves ikke.'),
('', 'AAU Karriere', '2018-05-01', '2018-06-30', 'Rute 1', 'A3', 50, ''),
('', 'Accenture', '2018-05-01', '2018-06-30', 'Rute 1', 'A3', 100, 'Distribueres kun i n&aelig;rheden af BSc. studerende.'),
('', 'Prosa', '2018-05-01', '2018-06-01', 'Rute 1', 'A5', 20, ''),
('', 'IDA Engineering', '2018-05-01', '2018-06-30', 'Rute 1', 'A4', 50, 'Begr&aelig;ns til hver anden tavle'),
('', 'Studentersamfundet', '2018-05-01', '2018-06-30', 'Rute 2', 'A4', 200, ''),
('', 'Studentersamfundet', '2018-04-14', '2018-06-14', 'Rute 3', 'A4', 100, ''),
('', 'AAU Karriere', '2018-05-01', '2018-06-30', 'Nyhavnsgade', 'A3', 20, ''),
('', 'IDA Engineering', '2018-05-01', '2018-06-30', 'Selma Lagerl&oslash;fs Vej (Cassiopeia)', 'A4', 15, '');

//Tabellen 'fejlmelding' laves.
CREATE TABLE `fejlmelding` (
  `fejl_ID` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `etage` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tavlenr` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `f_date` date NOT NULL,
  `note` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (fejl_ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

//Indsæt værdier ind i tabellen 'fejlmelding'.
INSERT INTO `fejlmelding` (`fejl_ID`, `adresse`, `etage`, `tavlenr`, `f_date`, `note`) VALUES
('', 'Badehusvej', '1', 'nr. 211', '2018-05-01', 'Stj&aring;let'),
('', 'Rendsburggade', '1', 'nr. 432', '2018-05-02', 'Udsat for h&aelig;rv&aelig;rk.'),
('', 'Kroghstr&aelig;de', '2', 'nr. 1', '2018-05-15', 'Beskadiget, mangler vedh&aelig;ng til ops&aelig;tning.');
