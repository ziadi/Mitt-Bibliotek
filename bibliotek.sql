-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 13 jan 2014 kl 08:03
-- Serverversion: 5.5.31
-- PHP-version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `bibliotek`
--
CREATE DATABASE IF NOT EXISTS `bibliotek` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bibliotek`;

-- --------------------------------------------------------

--
-- Tabellstruktur `bocker`
--

CREATE TABLE IF NOT EXISTS `bocker` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `datum` date NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `visit` int(11) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `forfattare` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumpning av Data i tabell `bocker`
--

INSERT INTO `bocker` (`ID`, `titel`, `datum`, `kategori`, `visit`, `ISBN`, `forfattare`) VALUES
(22, 'Inferno', '2014-01-13', 'Deckare', 0, '9789174293807', 'Dan Brown'),
(23, 'DrÃ¶mmen fÃ¶rde dej vilse', '2014-01-10', 'Deckare', 4, '9789113026213', 'Anna Jansson'),
(24, 'En ond liten handling', '2014-01-08', 'Deckare', 0, '9789113032054', 'Elizabeth George'),
(25, 'Carmen och dÃ¶den', '2014-01-02', 'Deckare', 0, '9789137139821', 'Karin Fossum'),
(26, 'Svennis : min historia', '2013-11-05', 'Biografier', 5, '9789113052571', 'Sven-GÃ¶ran Eriksson, Stefan LÃ¶vgren'),
(27, 'Nelson Mandela : tolerans och ledarskap', '2012-03-20', 'Biografier', 0, '9789186297879', 'Sten Rylander'),
(28, 'Alex Ferguson My Autobiography', '2013-10-24', 'Biografier', 5, '9780340919392', 'Alex Ferguson'),
(29, 'Steve Jobs: The Exclusive Biography', '2011-10-24', 'Biografier', 0, '9781408703748', 'Walter Isaacson'),
(30, 'Nyckeln', '2013-11-15', 'Barn', 1, '9789129677812', 'Sara Bergmark Elfgren, Mats Strandberg'),
(31, 'Cykelmysteriet', '2013-09-30', 'Barn', 2, '9789163875298', 'Martin Widmark'),
(32, 'Head First PHP and MySQL', '2009-01-14', 'IT', 0, '9780596006303', 'Lynn Beighley, Michael Morrison'),
(33, ' PHP, MySQL, JavaScript and HTML5 All-in-One for Dummies', '2013-04-11', 'IT', 0, '9781118213704', 'Janet Valade'),
(34, 'Doktor SÃ¶mn', '2014-01-23', 'SkÃ¶nlitteratur', 0, '9789100139438', 'Stephen King'),
(35, 'Vargarna i Calla', '2009-02-13', 'SkÃ¶nlitteratur', 3, '9789170027765', 'Stephen King'),
(36, 'Attack on Titan: Volume 10', '2014-01-09', 'Tecknade', 3, '9781612626765', 'Hajime Isayama'),
(37, 'Arne Anka : utsikt frÃ¥n en svamp', '2013-10-31', 'Tecknade', 0, '9789175150253', 'Charlie Christensen');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
