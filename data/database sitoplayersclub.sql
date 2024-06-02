-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.32-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database playersclub
CREATE DATABASE IF NOT EXISTS `playersclub` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `playersclub`;

-- Dump della struttura di tabella playersclub.articoli
CREATE TABLE IF NOT EXISTS `articoli` (
  `cod_articolo` int(11) NOT NULL AUTO_INCREMENT,
  `nomearticolo` char(50) DEFAULT NULL,
  `foto` char(50) DEFAULT NULL,
  `descrizione` char(225) DEFAULT NULL,
  `username` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cod_artista` int(11) DEFAULT NULL,
  `cod_carrello` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_articolo`),
  KEY `FK_articoli_carrello` (`cod_carrello`),
  KEY `FK_articoli_artista` (`cod_artista`),
  KEY `FK_articoli_utenti` (`username`),
  CONSTRAINT `FK_articoli_artista` FOREIGN KEY (`cod_artista`) REFERENCES `artista` (`cod_artista`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_articoli_carrello` FOREIGN KEY (`cod_carrello`) REFERENCES `carrello` (`cod_carrello`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_articoli_utenti` FOREIGN KEY (`username`) REFERENCES `utenti` (`username`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella playersclub.articoli: ~6 rows (circa)
REPLACE INTO `articoli` (`cod_articolo`, `nomearticolo`, `foto`, `descrizione`, `username`, `cod_artista`, `cod_carrello`) VALUES
	(1, 'Nostalgia', 'nostalgia.jpg', 'Nostalgia (export) è il quarto album in studio del rapper italiano Tony Boy, pubblicato il 23 febbraio 2024 dalla Warner Music Italy.', NULL, 1, 1),
	(2, 'I Nomi Del Diavolo', 'inomideldiavolo.jpg', 'I nomi del diavolo è il secondo album in studio del rapper italiano Kid Yugi, pubblicato il 1° marzo 2024 dalle etichette discografiche EMI Records e Universal Music Italia.', NULL, 5, 1),
	(3, 'Aspettando La Bella Vita', 'aspettando.jpg', 'Aspettando la bella vita è il primo album in studio del rapper italiano Artie 5ive, pubblicato il 20 luglio 2023 dalla etichetta discograficha Warner Music Italy.', NULL, 2, 1),
	(4, 'Identità', 'identita.png', 'Identità è il terzo album in studio del rapper italiano Nerissima Serpe, pubblicato il 30 novembre 2023 dalla Universal Music Italia.', NULL, 6, 1),
	(5, 'Gesù Bambino', 'gesubambino.jpg', 'Gesù Bambino è il secondo album in studio del rapper italiano Papa V, pubblicato il 7 ottobre 2022 dalla Sony Music Entertainment Italy.', NULL, 7, 1),
	(6, 'Mario II', 'marioII.jpg', 'Mario II è il secondo album in studio del rapper italiano Low-Red, pubblicato 20 aprile 2021 dalla Thaurus Publishing.', NULL, 3, NULL);

-- Dump della struttura di tabella playersclub.artista
CREATE TABLE IF NOT EXISTS `artista` (
  `cod_artista` int(11) NOT NULL AUTO_INCREMENT,
  `nomeartista` char(50) DEFAULT '0',
  PRIMARY KEY (`cod_artista`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella playersclub.artista: ~6 rows (circa)
REPLACE INTO `artista` (`cod_artista`, `nomeartista`) VALUES
	(1, 'Tony Boy'),
	(2, 'Artie 5ive'),
	(3, 'Low-Red'),
	(4, 'Digital Astro'),
	(5, 'Kid Yugi'),
	(6, 'Nerissima Serpe'),
	(7, 'Papa V');

-- Dump della struttura di tabella playersclub.carrello
CREATE TABLE IF NOT EXISTS `carrello` (
  `cod_carrello` int(11) NOT NULL,
  PRIMARY KEY (`cod_carrello`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella playersclub.carrello: ~1 rows (circa)
REPLACE INTO `carrello` (`cod_carrello`) VALUES
	(1);

-- Dump della struttura di tabella playersclub.utenti
CREATE TABLE IF NOT EXISTS `utenti` (
  `username` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `conferma` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nome` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cognome` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `telefono` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `comune` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `indirizzo` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tabella contenente i dati degli utenti';

-- Dump dei dati della tabella playersclub.utenti: ~1 rows (circa)
REPLACE INTO `utenti` (`username`, `password`, `conferma`, `nome`, `cognome`, `email`, `telefono`, `comune`, `indirizzo`) VALUES
	('a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
