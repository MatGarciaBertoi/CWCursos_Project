-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 08:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forms_satisfacao`
--

-- --------------------------------------------------------

--
-- Table structure for table `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `experiencia` enum('novo','intermediario','avancado') NOT NULL,
  `experiencia_rating` enum('excelente','bom','regular','ruim','muito-ruim') NOT NULL,
  `navegacao` enum('muito-facil','facil','neutro','dificil','muito-dificil') NOT NULL,
  `qualidade` enum('excelente','boa','regular','ruim','muito-ruim') NOT NULL,
  `atendimento` enum('sim','nao','nao-utilizei') NOT NULL,
  `tipo_curso` set('desenvolvimento','tecnologia','negocios','saude','arte','outros') NOT NULL,
  `tipo_curso_outros` varchar(255) DEFAULT NULL,
  `motivacoes` set('habilidades','carreira','certificacoes','passatempo','outros') NOT NULL,
  `motivacoes_outros` varchar(255) DEFAULT NULL,
  `tema_especifico` varchar(255) DEFAULT NULL,
  `recursos` set('conteudo','videoaulas','material','interatividade','certificacao','suporte','outros') NOT NULL,
  `recursos_outros` varchar(255) DEFAULT NULL,
  `sugestoes` text DEFAULT NULL,
  `comentarios` text DEFAULT NULL,
  `atualizacoes` enum('sim','nao') NOT NULL,
  `contato` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `respostas`
--

INSERT INTO `respostas` (`id`, `nome`, `email`, `experiencia`, `experiencia_rating`, `navegacao`, `qualidade`, `atendimento`, `tipo_curso`, `tipo_curso_outros`, `motivacoes`, `motivacoes_outros`, `tema_especifico`, `recursos`, `recursos_outros`, `sugestoes`, `comentarios`, `atualizacoes`, `contato`) VALUES
(1, 'Matheus Garcia Bertoi', 'matheusbertoi09@gmail.com', 'intermediario', 'excelente', 'facil', 'boa', 'nao-utilizei', 'negocios', '', 'carreira', '', 'Marketing', 'videoaulas', '', 'Não', 'Não há', 'nao', '11 988533778'),
(2, 'Matheus Pereira Beto', 'matheus.bertoi@gmail.com', 'intermediario', 'bom', 'facil', 'regular', 'nao-utilizei', 'outros', 'Tendências Futuras do Marketing Digital:', 'certificacoes', '', 'Construção de Marca e Identidade Visual', 'material', '', 'Melhorar o banco de dados.', 'Não.', 'nao', '(11) 91234 '),
(3, 'Matheus Junior', 'matheuscolab1605@gmail.com', 'avancado', 'excelente', 'neutro', 'boa', 'nao', '', '', 'passatempo', '', 'mkt7', 'suporte', '', 'N', 'Plataforma muito boa.', 'sim', '(11) 91234 3551'),
(4, 'Matheus Junior', 'matheuscolab1605@gmail.com', 'avancado', 'excelente', 'neutro', 'boa', 'nao', '', '', 'passatempo', '', 'mkt7', 'suporte', '', 'N', 'Plataforma muito boa.', 'sim', '(11) 91234 3551'),
(5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
