-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Maio-2022 às 22:25
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estudoapi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `coments`
--

CREATE TABLE `coments` (
  `email` varchar(50) NOT NULL,
  `comentario` varchar(1000) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontos`
--

CREATE TABLE `pontos` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sobre` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pontos`
--

INSERT INTO `pontos` (`id`, `name`, `sobre`, `foto`) VALUES
(28, 'São Paulo', 'A mais famosa rua de comércio em São Paulo recebeu mais de um nome desde o século XIX, mas só entrou', '25demarço.jpeg'),
(29, 'Rio de Janeiro', 'O monumento Cristo Redentor é uma famosa estátua de Jesus Cristo localizada no Rio de Janeiro, no mo', 'CristoRed.jpeg'),
(30, 'Minas Gerais', 'A imponente Serra de São José, entre as cidades históricas de Tiradentes e de São João del Rei, em M', 'MG.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`numero`);

--
-- Índices para tabela `pontos`
--
ALTER TABLE `pontos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `coments`
--
ALTER TABLE `coments`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pontos`
--
ALTER TABLE `pontos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
