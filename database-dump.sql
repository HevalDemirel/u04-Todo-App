-- Adminer 4.8.1 MySQL 5.5.5-10.4.32-MariaDB-1:10.4.32+maria~ubu2004 dump
/*
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `todo`;
CREATE TABLE `todo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `attgora` varchar(255) DEFAULT NULL,
  `klar` tinyint(1) DEFAULT 0,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `todo` (`ID`, `attgora`, `klar`, `datum`) VALUES
(5,	'hej',	0,	'2024-01-18 11:42:25');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1,	'Heval',	'hevalzzz@hotmail.com',	'$2y$10$Estv1cDilnR33CGimUhVRehZlFJM1AVtz158DfGg6cM3516gBhkvS'),
(2,	'dennis',	'dennisp3@hotmail.com',	'$2y$10$zFV4gRtZeBmWg0aV/MlHveZYnIulGNi/nKUNSJcXoCUA3gCENtBme'),
(3,	'Heval',	'hevallll@hotmail.com',	'$2y$10$XVdY1oYYSBCKZm6V8S3K5.1sRnrGNSwb7xDpUxCICYEyDXQ1S9Mvu'),
(4,	'havve dÃ¥',	'heval.demirel@chasacademy.se',	'$2y$10$T2PEvtKs1cwOaOsBQogIiuA3ltiNT2yMVlGwkZrkRTF4ypnETDuAS'),
(5,	'Daniel Fibonaci',	'Fibonaci@hotmail.com',	'$2y$10$Cyzaz9UPLYuOSOkXsSd2W.q/vApoNdpVlnw61.IepZvef19vNagkq');

-- 2024-01-18 12:03:52 */