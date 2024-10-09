-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 09-Out-2024 às 11:55
-- Versão do servidor: 8.0.33-0ubuntu0.20.04.2
-- versão do PHP: 7.4.3-4ubuntu2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int NOT NULL,
  `fk_cpf` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fk_id_carrinho_produtos` int DEFAULT NULL,
  `estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `municipio` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `bairro` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rua` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `fk_cpf`, `fk_id_carrinho_produtos`, `estado`, `municipio`, `bairro`, `rua`, `numero`) VALUES
(1, '123.456.789-10', NULL, '12', '123', '123', '123', '123'),
(2, '123.456.789-10', NULL, '12', '123123', '123', '123', '123'),
(3, '123.456.789-10', NULL, '12', '123', '123', '123', '123'),
(4, '123.456.789-10', 4, '12', '123', '123', '123', '213'),
(5, '123.456.789-10', 5, '12', '12', '12', '1', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho_produtos`
--

CREATE TABLE `carrinho_produtos` (
  `id_carrinho_produtos` int NOT NULL,
  `fk_id_carrinho` int DEFAULT NULL,
  `fk_id_produto` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `carrinho_produtos`
--

INSERT INTO `carrinho_produtos` (`id_carrinho_produtos`, `fk_id_carrinho`, `fk_id_produto`) VALUES
(1, 1, NULL),
(2, 2, NULL),
(3, 3, NULL),
(4, 4, NULL),
(5, 5, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categorias` int NOT NULL,
  `opcoes_categorias` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `opcoes_categorias`) VALUES
(1, 'escolar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `senha` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `telefone`, `email`, `cep`, `senha`, `tipo`) VALUES
('123.123.123-12', '(12) 31231-2312', '111@gmail.com', '12312-312', '12345678', 0),
('123.456.789-10', '(40) 40404-0404', 'japa@gmail.com', '12345-678', '12345678', 1),
('321.231.232-11', '(12) 3121-3212', 'aaa@gmail.com', '31213-212', '12345678', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cores`
--

CREATE TABLE `cores` (
  `id_cores` int NOT NULL,
  `opcoes_cores` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cores`
--

INSERT INTO `cores` (`id_cores`, `opcoes_cores`) VALUES
(1, 'azul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id_historico` int NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_id_carrinho` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id_historico`, `data_hora`, `fk_id_carrinho`) VALUES
(1, '2024-10-09 14:40:22', 1),
(2, '2024-10-09 14:40:23', 1),
(3, '2024-10-09 14:42:46', 2),
(4, '2024-10-09 14:42:47', 2),
(5, '2024-10-09 14:44:59', 3),
(6, '2024-10-09 14:45:00', 3),
(7, '2024-10-09 14:49:29', 4),
(8, '2024-10-09 14:49:30', 4),
(9, '2024-10-09 14:53:18', 5),
(10, '2024-10-09 14:53:19', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int NOT NULL,
  `nome_produto` varchar(80) NOT NULL,
  `preco_produto` decimal(10,2) NOT NULL,
  `quantidade_produto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fk_id_cores` int DEFAULT NULL,
  `fk_id_categorias` int DEFAULT NULL,
  `imagem` varchar(225) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `preco_produto`, `quantidade_produto`, `fk_id_cores`, `fk_id_categorias`, `imagem`, `descricao`) VALUES
(1, '123', '123.00', '123', 1, 1, 'img/image-removebg-preview.png', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`),
  ADD KEY `pk_cpf` (`fk_cpf`),
  ADD KEY `fk_id_carrinho_produtos` (`fk_id_carrinho_produtos`);

--
-- Índices para tabela `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  ADD PRIMARY KEY (`id_carrinho_produtos`),
  ADD KEY `fk_id_carrinho` (`fk_id_carrinho`),
  ADD KEY `fk_id_produto` (`fk_id_produto`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categorias`),
  ADD UNIQUE KEY `opcoes_categorias` (`opcoes_categorias`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id_cores`),
  ADD UNIQUE KEY `opcoes_cores` (`opcoes_cores`);

--
-- Índices para tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id_historico`),
  ADD KEY `pk_id_carrinho` (`fk_id_carrinho`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `fk_id_cores` (`fk_id_cores`),
  ADD KEY `fk_id_categorias` (`fk_id_categorias`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  MODIFY `id_carrinho_produtos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categorias` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cores`
--
ALTER TABLE `cores`
  MODIFY `id_cores` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id_historico` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_id_carrinho_produtos` FOREIGN KEY (`fk_id_carrinho_produtos`) REFERENCES `carrinho_produtos` (`id_carrinho_produtos`),
  ADD CONSTRAINT `pk_cpf` FOREIGN KEY (`fk_cpf`) REFERENCES `cliente` (`cpf`);

--
-- Limitadores para a tabela `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  ADD CONSTRAINT `carrinho_produtos_ibfk_1` FOREIGN KEY (`fk_id_carrinho`) REFERENCES `carrinho` (`id_carrinho`),
  ADD CONSTRAINT `carrinho_produtos_ibfk_2` FOREIGN KEY (`fk_id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `pk_id_carrinho` FOREIGN KEY (`fk_id_carrinho`) REFERENCES `carrinho` (`id_carrinho`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `pk_id_categorias` FOREIGN KEY (`fk_id_categorias`) REFERENCES `categorias` (`id_categorias`),
  ADD CONSTRAINT `pk_id_cores` FOREIGN KEY (`fk_id_cores`) REFERENCES `cores` (`id_cores`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
