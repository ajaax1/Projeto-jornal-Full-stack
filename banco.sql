-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Dez-2023 às 15:18
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `paragraphs1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `paragraphs2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `paragraphs3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `paragraphs4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `paragraphs5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `paragraphs6` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` date NOT NULL,
  `hour` varchar(10) NOT NULL,
  `id_user` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `paragraphs1`, `paragraphs2`, `paragraphs3`, `paragraphs4`, `paragraphs5`, `paragraphs6`, `image`, `date`, `hour`, `id_user`) VALUES
(1, 'Create NewsCreate News Create NewsCreate NewsCreate NewsCreate NewsCreate NewsCreate News', 'create-newscreate-news-create-newscreate-newscreate-newscreate-newscreate-newscreate-news', 'Create News\r\n Create News\r\nCreate News\r\nCreate News\r\nCreate News\r\n', '', '', '', '', '', '../assets/img/Honda-Civic-LX-2020-Frente.jpg', '2023-12-04', '12:26 PM', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name2` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `createBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `updateBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_Email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `name2`, `password`, `email`, `createBy`, `updateBy`) VALUES
(1, 'Ruan', 'Higor', '$2y$10$.e0m1.t0BGzxKMTaHbqrmeN/UPyyhkWN2MbSSgHwQlGl3P87FukIO', 'ruanhigor123@gmail.com', '1', '1'),
(4, 'Ruan', 'Silva', '$2y$10$C5ik7oTnAf2UrXg8JpJzWe5wQoQkFaqGwtDg6CQlbny3l/bEmJl5S', 'ruan_higor2012@hotmail.com', '1', 'null');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
