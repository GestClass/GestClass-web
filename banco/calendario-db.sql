-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 28-Nov-2019 às 21:09
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `calendario-db`
--
CREATE DATABASE IF NOT EXISTS `calendario-db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `calendario-db`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `color` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'IONIC', '#42A5F5', '2019-11-18 19:00:00', '2019-11-18 22:30:00'),
(2, 'Banco de dados ', '#4a148c', '2019-11-19 19:00:00', '2019-11-19 20:50:00'),
(3, 'Ingles', '#00695c', '2019-11-19 21:05:00', '2019-11-19 22:30:00'),
(4, 'Programacao WEB', '#00b8d4', '2019-11-20 19:00:00', '2019-11-20 22:30:00'),
(5, 'Planejamento de Trabalho de Conclusao de Curso', '#bf360c', '2019-11-21 19:00:00', '2019-11-21 20:50:00'),
(6, 'Internet e Protocolos', '#3e2723', '2019-11-21 21:05:00', '2019-11-21 22:30:00'),
(7, 'Desenvolvimento de sistemas', '#b71c1d', '2019-11-22 19:00:00', '2019-11-22 22:30:00'),
(8, 'Semana TCC e Trabalhos interdiciplinares', '#424242', '2019-11-25 19:30:00', '2019-11-29 22:30:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
