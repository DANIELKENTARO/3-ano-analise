-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/11/2024 às 13:17
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
(41, '123.123.123-12', 43, 'PR', 'Cascavel', 'centro', 'avenida Brasil', '2084');

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
(43, 41, NULL);

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

--
-- Despejando dados para a tabela `historico`
--

INSERT INTO `historico` (`id_historico`, `data_hora`, `fk_id_carrinho`) VALUES
(3, '2024-11-07 12:01:26', 41);

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
  `descricao` text NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `preco_produto`, `quantidade_produto`, `fk_id_cores`, `fk_id_categorias`, `imagem`, `descricao`, `cpf`) VALUES
(101, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(102, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(103, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(104, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(105, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(106, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(107, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(108, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(109, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(110, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(111, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(112, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(113, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(114, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(115, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(116, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(117, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(118, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(119, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(120, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(121, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(122, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(123, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(124, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(125, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(126, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(127, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(128, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(129, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(130, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(131, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(132, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(133, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(134, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(135, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(136, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(137, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(138, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(139, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(140, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(141, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(142, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(143, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '321.231.232-11'),
(144, 'lápis', 2.50, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '123.456.789-10'),
(145, 'lápis', 123.00, '123', 2, 2, 'img/Sem título.png', 'lápis escolar', '123.456.789-10'),
(146, 'bozo', 7872.00, '1', 2, 2, 'img/caminhoneiro4.jpg', 'oeo', '887.438.870-43');

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
  ADD KEY `fk_id_categorias` (`fk_id_categorias`),
  ADD KEY `fk_produto_cliente` (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  MODIFY `id_carrinho_produtos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

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
  ADD CONSTRAINT `fk_produto_cliente` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`),
  ADD CONSTRAINT `pk_id_categorias` FOREIGN KEY (`fk_id_categorias`) REFERENCES `categorias` (`id_categorias`),
  ADD CONSTRAINT `pk_id_cores` FOREIGN KEY (`fk_id_cores`) REFERENCES `cores` (`id_cores`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
