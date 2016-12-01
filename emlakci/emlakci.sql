-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Ara 2016, 12:38:46
-- Sunucu sürümü: 5.6.15-log
-- PHP Sürümü: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `emlakci`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ev`
--

CREATE TABLE IF NOT EXISTS `ev` (
  `evNo` int(11) NOT NULL AUTO_INCREMENT,
  `oSayisi` tinyint(4) DEFAULT NULL,
  `eNo` int(11) DEFAULT NULL,
  `ucret` int(11) DEFAULT NULL,
  `adres` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`evNo`),
  KEY `eNo` (`eNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Tablo döküm verisi `ev`
--

INSERT INTO `ev` (`evNo`, `oSayisi`, `eNo`, `ucret`, `adres`) VALUES
(37, 7, 9, 3200, 'edremit gazicelal mahalles no 41 daire 6'),
(38, 3, 9, 1500, 'akçay ikizçay mah. 1041 sok.daire:7'),
(67, 4, 7, 550, 'akçay merkez mahallesi no:44 daire 3'),
(68, 3, 11, 500, 'edremit darsofa mahallesi no:43 daire 3'),
(69, 3, 9, 400, 'akçay yenimahalle no:63 daire:7\n'),
(70, 3, 9, 1000, 'akçay turban mah.vahit sok.no:44 daire:3'),
(73, 3, 9, 770, 'akçay merkezde no:44 daire:5'),
(74, 6, 9, 1500, 'akçay mah.veled sok no:77 daire:5'),
(79, 4, 7, 770, 'edremit sÄ±ÄŸÄ±rÃ¶nÃ¼ mah. no:77 daire:9'),
(82, 3, 7, 400, 'edremit darsofa mahallesi no:44 daire:6'),
(83, 4, 9, 600, 'burhaniye merkezde 3+1 '),
(84, 4, 7, 411, 'edremit gazicelal mah.no:66 daire:7'),
(85, 3, 7, 450, 'edremit tuzcumurat mah. 99 sok. no:44 daire:4'),
(86, 3, 7, 700, 'akcayda havuzlu site no:77 daire 10'),
(87, 2, 7, 1, 'akcay cemil temel mahallesi 66 sokak no:32 daire:5'),
(88, 3, 7, 600, 'akcay merkezde 3.kat kelepir daire');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `evtip`
--

CREATE TABLE IF NOT EXISTS `evtip` (
  `eNo` int(11) NOT NULL AUTO_INCREMENT,
  `eTip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`eNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `evtip`
--

INSERT INTO `evtip` (`eNo`, `eTip`) VALUES
(6, 'dubleks'),
(7, 'daire'),
(8, 'müstakil'),
(9, 'tribleks'),
(11, 'rezidans');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `insan`
--

CREATE TABLE IF NOT EXISTS `insan` (
  `kNo` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(50) DEFAULT NULL,
  `soyad` varchar(50) DEFAULT NULL,
  `telNo` varchar(13) DEFAULT NULL,
  `cinsiyet` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`kNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Tablo döküm verisi `insan`
--

INSERT INTO `insan` (`kNo`, `ad`, `soyad`, `telNo`, `cinsiyet`) VALUES
(1, 'mustafa', 'köstek', '05549935366', 1),
(6, 'veli ', 'candar', '02663845884', NULL),
(5, 'ali', 'haydar', '+905549935366', NULL),
(32, 'sansar', 'selim', '2165486854', NULL),
(30, 'ali', 'hÄ±yar', '02665478745', NULL),
(31, 'hayri', 'canbaz', '03126548547', NULL),
(29, 'ÅŸirzai', 'felek', '2663845744', NULL),
(28, 'vahit', 'birol', '02663574874', NULL),
(21, 'ahmet', 'mahmut', '3564585', NULL),
(33, 'veryansÄ±n', 'yÃ¼ce', '02663648565', NULL),
(34, 'tugaycan', 'kÃ¶stek', '05376638414', NULL),
(35, 'turan', 'Ã¼rkmez', '5548745487', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kira`
--

CREATE TABLE IF NOT EXISTS `kira` (
  `kiNo` int(11) NOT NULL AUTO_INCREMENT,
  `baslangic` datetime DEFAULT NULL,
  `bitis` datetime DEFAULT NULL,
  `evNo` int(11) DEFAULT NULL,
  `kNo` int(11) DEFAULT NULL,
  PRIMARY KEY (`kiNo`),
  KEY `evNo` (`evNo`),
  KEY `kNo` (`kNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Tablo döküm verisi `kira`
--

INSERT INTO `kira` (`kiNo`, `baslangic`, `bitis`, `evNo`, `kNo`) VALUES
(1, '2016-11-19 00:00:00', '2017-01-12 00:00:00', 38, 1),
(5, '2016-11-23 00:00:00', '2017-04-13 00:00:00', 67, 33),
(4, '2016-11-22 00:00:00', '2016-11-30 00:00:00', 69, 32),
(6, '2016-11-23 00:00:00', '2017-02-16 00:00:00', 86, 28),
(7, '2016-11-23 00:00:00', '2017-04-13 00:00:00', 37, 1),
(8, '2016-11-28 00:00:00', '2017-04-28 00:00:00', 87, 32),
(9, '2016-12-02 00:00:00', '2017-03-02 00:00:00', 88, 21);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sahip`
--

CREATE TABLE IF NOT EXISTS `sahip` (
  `sNo` int(11) NOT NULL AUTO_INCREMENT,
  `kNo` int(11) DEFAULT NULL,
  `evNo` int(11) DEFAULT NULL,
  PRIMARY KEY (`sNo`),
  KEY `evNo` (`evNo`),
  KEY `kNo` (`kNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Tablo döküm verisi `sahip`
--

INSERT INTO `sahip` (`sNo`, `kNo`, `evNo`) VALUES
(1, 26, 49),
(2, 5, 65),
(3, 21, 69),
(4, 28, 71),
(5, 1, 73),
(6, 6, 38),
(7, 21, 37),
(8, 1, 68),
(9, 28, 67),
(10, 21, 74),
(11, 29, 74),
(12, 6, 74),
(13, 1, 74),
(14, 5, 79),
(16, 32, 83),
(17, 31, 83),
(18, 30, 83),
(19, 32, 84),
(20, 29, 84),
(21, 28, 70),
(22, 33, 85),
(23, 32, 85),
(24, 31, 82),
(25, 34, 86),
(26, 29, 86),
(27, 34, 87),
(28, 35, 88);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
