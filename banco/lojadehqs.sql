-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Nov-2022 às 19:56
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lojadehqs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `hq`
--

CREATE TABLE `hq` (
  `id` int(10) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `ano` varchar(15) NOT NULL,
  `numdserie` varchar(15) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `ilust` varchar(50) NOT NULL,
  `editora` varchar(50) NOT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hq`
--

INSERT INTO `hq` (`id`, `nome`, `ano`, `numdserie`, `autor`, `ilust`, `editora`, `imagem`, `endereco`) VALUES
(1, 'Homem Aranha', '2005', '17', 'Cleityn', 'Gugu', 'Marvel', NULL, NULL),
(2, 'Homem De Ferro', '1998', '12', 'Thyaguin Game play', 'Leadrin do pagode ', 'Dc', NULL, NULL),
(5, 'vasco', '1998', '7', 'Thyaguin Game play', 'Leadrin do pagode ', 'Marvel', NULL, NULL),
(4, 'Super Man', '2000', '7', 'Thyaguin Game play', 'Leadrin do pagode ', 'Marvel', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hq`
--
ALTER TABLE `hq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hq`
--
ALTER TABLE `hq`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
