-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2014 at 10:07 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sisuneb`
--
CREATE DATABASE IF NOT EXISTS `sisuneb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sisuneb`;


--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `datanasc` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `datanasc`, `email`, `senha`) VALUES
(2, 'Maria Ribeiro', '20/09/1982', 'teste@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Raimuda', '15/08/1984', 'rai@teste.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Lilica Pereira de Morais', '20/09/2013', 'lilica@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Carlos Wagner', '20/09/1982', 'teste@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'Italo Rezende', '15/08/1984', 'teste@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'Carlos Wagner', '20/09/1982', 'wagner30023@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'Carlos Wagner', '20/09/1982', 'teste@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'Carlos Wagner', '20/09/1982', 'teste@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'Italo Rezende', '20/09/1982', 'teste@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'Carlos Wagner', '20/09/1982', 'root@teste.net', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
