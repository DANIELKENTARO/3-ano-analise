-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/10/2024 às 16:11
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `daniel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `fk_cpf` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fk_id_carrinho_produtos` int(11) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `municipio` varchar(30) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `rua` varchar(70) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `fk_cpf`, `fk_id_carrinho_produtos`, `estado`, `municipio`, `bairro`, `rua`, `numero`) VALUES
(1, '123.456.789-10', NULL, '12', '123', '123', '123', '123'),
(2, '123.456.789-10', NULL, '12', '123123', '123', '123', '123'),
(3, '123.456.789-10', NULL, '12', '123', '123', '123', '123'),
(4, '123.456.789-10', 4, '12', '123', '123', '123', '213'),
(5, '123.456.789-10', 5, '12', '12', '12', '1', '2'),
(6, '123.123.123-12', 6, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(7, '123.123.123-12', 7, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(8, '123.123.123-12', 8, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(9, '123.123.123-12', 9, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(10, '123.123.123-12', 10, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(11, '123.123.123-12', 11, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(12, '321.231.232-11', 12, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(13, '321.231.232-11', 13, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(14, '321.231.232-11', 14, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(15, '321.231.232-11', 15, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(16, '321.231.232-11', 16, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(17, '123.456.789-10', 17, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(18, '123.456.789-10', 18, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(19, '123.456.789-10', 19, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(20, '123.456.789-10', 20, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(21, '123.456.789-10', 21, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(22, '123.456.789-10', 24, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(23, '123.456.789-10', 25, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(24, '123.456.789-10', 26, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(25, '123.456.789-10', 27, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(26, '123.456.789-10', 28, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(27, '123.456.789-10', 29, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(28, '123.456.789-10', 30, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(29, '123.456.789-10', 31, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(30, '123.456.789-10', 32, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(31, '123.456.789-10', 33, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(32, '123.456.789-10', 34, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(33, '123.123.123-12', 35, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(34, '123.456.789-10', 36, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043'),
(35, '123.123.123-12', 37, 'pr', 'cascavel', 'centro', 'avenida brasil', '1043');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho_produtos`
--

CREATE TABLE `carrinho_produtos` (
  `id_carrinho_produtos` int(11) NOT NULL,
  `fk_id_carrinho` int(11) DEFAULT NULL,
  `fk_id_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carrinho_produtos`
--

INSERT INTO `carrinho_produtos` (`id_carrinho_produtos`, `fk_id_carrinho`, `fk_id_produto`) VALUES
(1, 1, NULL),
(2, 2, NULL),
(3, 3, NULL),
(4, 4, NULL),
(5, 5, NULL),
(6, 6, NULL),
(7, 7, NULL),
(8, 8, NULL),
(9, 9, NULL),
(10, 10, NULL),
(11, 11, NULL),
(12, 12, NULL),
(13, 13, NULL),
(14, 14, NULL),
(15, 15, NULL),
(16, 16, NULL),
(17, 17, NULL),
(18, 18, NULL),
(19, 19, NULL),
(20, 20, NULL),
(21, 21, NULL),
(24, 22, NULL),
(25, 23, NULL),
(26, 24, NULL),
(27, 25, NULL),
(28, 26, NULL),
(29, 27, NULL),
(30, 28, NULL),
(31, 29, NULL),
(32, 30, NULL),
(33, 31, NULL),
(34, 32, NULL),
(35, 33, NULL),
(36, 34, NULL),
(37, 35, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categorias` int(11) NOT NULL,
  `opcoes_categorias` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `opcoes_categorias`) VALUES
(1, 'escolar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `telefone`, `email`, `cep`, `senha`, `tipo`) VALUES
('123.123.123-12', '(12) 31231-2312', '111@gmail.com', '12312-312', '12345678', 0),
('123.456.789-10', '(40) 40404-0404', 'japa@gmail.com', '12345-678', '12345678', 1),
('321.231.232-11', '(12) 3121-3212', 'aaa@gmail.com', '31213-212', '12345678', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cores`
--

CREATE TABLE `cores` (
  `id_cores` int(11) NOT NULL,
  `opcoes_cores` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `cores`
--

INSERT INTO `cores` (`id_cores`, `opcoes_cores`) VALUES
(1, 'azul');

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico`
--

CREATE TABLE `historico` (
  `id_historico` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_id_carrinho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `historico`
--

INSERT INTO `historico` (`id_historico`, `data_hora`, `fk_id_carrinho`) VALUES
(1, '2024-10-30 14:57:02', 30),
(2, '2024-10-30 14:57:02', 30),
(3, '2024-10-30 15:00:07', 31),
(4, '2024-10-30 15:00:08', 31),
(5, '2024-10-30 15:04:29', 32),
(6, '2024-10-30 15:04:29', 32),
(7, '2024-10-30 15:04:45', 33),
(8, '2024-10-30 15:04:46', 33),
(9, '2024-10-30 15:09:45', 34),
(10, '2024-10-30 15:10:45', 35);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(80) NOT NULL,
  `preco_produto` decimal(10,2) NOT NULL,
  `quantidade_produto` varchar(100) NOT NULL,
  `fk_id_cores` int(11) DEFAULT NULL,
  `fk_id_categorias` int(11) DEFAULT NULL,
  `imagem` varchar(225) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `preco_produto`, `quantidade_produto`, `fk_id_cores`, `fk_id_categorias`, `imagem`, `descricao`) VALUES
(1, '123', 123.00, '123', 1, 1, 'img/image-removebg-preview.png', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`),
  ADD KEY `pk_cpf` (`fk_cpf`),
  ADD KEY `fk_id_carrinho_produtos` (`fk_id_carrinho_produtos`);

--
-- Índices de tabela `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  ADD PRIMARY KEY (`id_carrinho_produtos`),
  ADD KEY `fk_id_carrinho` (`fk_id_carrinho`),
  ADD KEY `fk_id_produto` (`fk_id_produto`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categorias`),
  ADD UNIQUE KEY `opcoes_categorias` (`opcoes_categorias`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id_cores`),
  ADD UNIQUE KEY `opcoes_cores` (`opcoes_cores`);

--
-- Índices de tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id_historico`),
  ADD KEY `pk_id_carrinho` (`fk_id_carrinho`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `fk_id_cores` (`fk_id_cores`),
  ADD KEY `fk_id_categorias` (`fk_id_categorias`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  MODIFY `id_carrinho_produtos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cores`
--
ALTER TABLE `cores`
  MODIFY `id_cores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_id_carrinho_produtos` FOREIGN KEY (`fk_id_carrinho_produtos`) REFERENCES `carrinho_produtos` (`id_carrinho_produtos`),
  ADD CONSTRAINT `pk_cpf` FOREIGN KEY (`fk_cpf`) REFERENCES `cliente` (`cpf`);

--
-- Restrições para tabelas `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  ADD CONSTRAINT `carrinho_produtos_ibfk_1` FOREIGN KEY (`fk_id_carrinho`) REFERENCES `carrinho` (`id_carrinho`),
  ADD CONSTRAINT `carrinho_produtos_ibfk_2` FOREIGN KEY (`fk_id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Restrições para tabelas `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `pk_id_carrinho` FOREIGN KEY (`fk_id_carrinho`) REFERENCES `carrinho` (`id_carrinho`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `pk_id_categorias` FOREIGN KEY (`fk_id_categorias`) REFERENCES `categorias` (`id_categorias`),
  ADD CONSTRAINT `pk_id_cores` FOREIGN KEY (`fk_id_cores`) REFERENCES `cores` (`id_cores`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
