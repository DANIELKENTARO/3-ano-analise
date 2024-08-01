-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jun-2024 às 16:00
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daniel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `pk_cpf` varchar(14) CHARACTER SET utf8mb4 DEFAULT NULL,
  `pk_id_produto` int(11) DEFAULT NULL,
  `estado` varchar(2) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `rua` varchar(70) NOT NULL,
  `numero` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categorias` int(11) NOT NULL,
  `opcoes_categorias` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `opcoes_categorias`) VALUES
(1, 'casual'),
(2, 'escolar'),
(3, 'escritório'),
(4, 'recreativo'),
(5, 'brinquedos'),
(6, 'relaxante'),
(7, 'formal'),
(8, 'formatura'),
(9, 'celular'),
(10, 'computadores'),
(11, 'componentes eletronicos'),
(12, 'pneus'),
(13, 'carros'),
(14, 'meme'),
(15, 'filmes'),
(16, 'séries'),
(17, 'televisões'),
(18, 'eletronico'),
(19, 'pelucia'),
(20, 'caro'),
(21, 'barato'),
(22, 'cameras'),
(23, 'colorido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `senha` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `telefone`, `email`, `cep`, `senha`) VALUES
('111.111.111-11', '(11) 11111-1111', '111@gmail.com', '11111-111', '11111111'),
('123.456.789-15', '(58) 49938-0223', 'aaa@gmail.com', '12345-678', '11111111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cores`
--

CREATE TABLE `cores` (
  `id_cores` int(11) NOT NULL,
  `opcoes_cores` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cores`
--

INSERT INTO `cores` (`id_cores`, `opcoes_cores`) VALUES
(1, 'azul'),
(2, 'amarelo'),
(3, 'branco'),
(4, 'bege'),
(5, 'preto'),
(6, 'vermelho'),
(7, 'marrom');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id_historico` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` varchar(9) NOT NULL,
  `pk_id_carrinho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(80) NOT NULL,
  `preco_produto` varchar(13) NOT NULL,
  `quantidade_produto` varchar(999) NOT NULL,
  `pk_id_cores` int(11) DEFAULT NULL,
  `pk_id_categorias` int(11) NOT NULL,
  `imagem` blob NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`),
  ADD KEY `pk_id_produto` (`pk_id_produto`),
  ADD KEY `pk_cpf` (`pk_cpf`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categorias`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id_cores`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id_historico`),
  ADD KEY `pk_id_carrinho` (`pk_id_carrinho`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `pk_id_cores` (`pk_id_cores`),
  ADD KEY `pk_id_categorias` (`pk_id_categorias`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cores`
--
ALTER TABLE `cores`
  MODIFY `id_cores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `pk_cpf` FOREIGN KEY (`pk_cpf`) REFERENCES `cliente` (`cpf`),
  ADD CONSTRAINT `pk_id_produto` FOREIGN KEY (`pk_id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `pk_id_carrinho` FOREIGN KEY (`pk_id_carrinho`) REFERENCES `carrinho` (`id_carrinho`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `pk_id_categorias` FOREIGN KEY (`pk_id_categorias`) REFERENCES `categorias` (`id_categorias`),
  ADD CONSTRAINT `pk_id_cores` FOREIGN KEY (`pk_id_cores`) REFERENCES `cores` (`id_cores`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
