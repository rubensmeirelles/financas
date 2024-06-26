-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18/04/2024 às 21:11
-- Versão do servidor: 8.2.0
-- Versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `financas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome_categoria`, `tipo_id`) VALUES
(1, 'Compra à vista', 2),
(2, 'Compra parcelada', 2),
(3, 'Happy Hour', 2),
(4, 'Recebimento 13º', 1),
(5, 'Recebimento de salário', 1),
(6, 'Recebimento férias', 1),
(7, 'Recebimento Pix', 1),
(8, 'Supermercado', 2),
(9, 'Transferência Pix', 2),
(10, 'Vestuário', 2),
(11, 'Viagem', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `lancamentos`
--

DROP TABLE IF EXISTS `lancamentos`;
CREATE TABLE IF NOT EXISTS `lancamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conta` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_lancamento` date NOT NULL,
  `data_vencimento` date NOT NULL,
  `valor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opcao_lancamento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcelas` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153473 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Despejando dados para a tabela `lancamentos`
--

INSERT INTO `lancamentos` (`id`, `tipo`, `conta`, `data_lancamento`, `data_vencimento`, `valor`, `descricao`, `categoria`, `opcao_lancamento`, `parcelas`) VALUES
(2, 'Receita', '0', '2024-04-04', '2024-04-04', '4.800', 'Salário', 'Recebimento de salário', '', ''),
(3, 'Despesa', 'Banco do Brasil', '2024-04-09', '2024-05-04', '152', 'Compra tênis', 'Vestuário', 'C', '1'),
(4, 'Despesa', 'Nubank', '2024-04-09', '2024-05-12', '50', 'Compra carne', 'Supermercado', '', '1'),
(5, 'Despesa', 'Porto Seguro', '2024-04-10', '2024-05-10', '35', 'Lanche', 'Happy Hour', '', ''),
(6, 'Receita', 'Nubank', '2024-04-12', '2024-04-12', '69.000', 'Pix', 'Recebimento Pix', '', '0'),
(9, 'Despesa', 'Banco do Brasil', '2024-04-12', '2024-04-12', '35', 'Pix', 'Transferência Pix', 'C', ''),
(33, 'Despesa', 'Porto Seguro', '2024-04-17', '2024-04-17', '100', 'Compra ventilador', 'Compra à vista', 'D', ''),
(34, 'Despesa', 'Banco do Brasil', '2024-04-17', '2024-05-04', '100', 'Lanche', 'Happy Hour', 'D', '1/1'),
(153470, 'Despesa', 'Nubank', '2024-04-18', '2024-05-18', '23.333333333333', 'Compra de cinto', 'Vestuário', 'C', '1/3'),
(153471, 'Despesa', 'Nubank', '2024-04-18', '2024-06-18', '23.333333333333', 'Compra de cinto', 'Vestuário', 'C', '2/3'),
(153472, 'Despesa', 'Nubank', '2024-04-18', '2024-07-18', '23.34', 'Compra de cinto', 'Vestuário', 'C', '3/3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipos`
--

DROP TABLE IF EXISTS `tipos`;
CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Despejando dados para a tabela `tipos`
--

INSERT INTO `tipos` (`id`, `tipo`) VALUES
(1, 'Receita'),
(2, 'Despesa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
