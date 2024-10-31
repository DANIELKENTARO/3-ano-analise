-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/10/2024 às 14:36
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho_produtos`
--

CREATE TABLE `carrinho_produtos` (
  `id_carrinho_produtos` int(11) NOT NULL,
  `fk_id_carrinho` int(11) DEFAULT NULL,
  `fk_id_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'escolar');

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
(2, 'preto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico`
--

CREATE TABLE `historico` (
  `id_historico` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_id_carrinho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(49, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(50, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(51, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(52, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(53, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(54, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(55, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(56, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(57, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(58, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(59, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(60, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(61, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(62, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(63, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(64, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(65, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(66, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(67, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(68, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(69, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(70, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(71, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(72, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(73, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(74, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(75, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(76, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(77, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(78, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(79, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(80, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(81, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(82, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(83, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(84, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(85, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(86, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(87, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(88, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(89, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(90, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(91, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(92, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(93, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(94, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(95, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123'),
(96, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', '123');

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
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  MODIFY `id_carrinho_produtos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cores`
--
ALTER TABLE `cores`
  MODIFY `id_cores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

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
