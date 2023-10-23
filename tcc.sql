-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/10/2023 às 17:15
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--
CREATE DATABASE IF NOT EXISTS `tcc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tcc`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `consumo`
--

CREATE TABLE `consumo` (
  `id` int(11) NOT NULL,
  `quantidadeProduto` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `id_reserva` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consumo`
--

INSERT INTO `consumo` (`id`, `quantidadeProduto`, `data`, `hora`, `id_reserva`, `id_produto`) VALUES
(0, 10, '2023-09-07', '19:48:44', NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `status` varchar(3) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `dataNascimento` date NOT NULL,
  `genero` varchar(1) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numeroEndereco` int(11) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `confirma` varchar(100) NOT NULL,
  `dataAdmissao` date NOT NULL,
  `salario` double NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `horarioEntrada` time NOT NULL,
  `horarioSaida` time NOT NULL,
  `dataDemissao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `status`, `nome`, `cpf`, `dataNascimento`, `genero`, `estado`, `cidade`, `endereco`, `numeroEndereco`, `cep`, `email`, `telefone`, `senha`, `confirma`, `dataAdmissao`, `salario`, `cargo`, `horarioEntrada`, `horarioSaida`, `dataDemissao`) VALUES
(27, 'Sim', 'Emanuely Trindade', '081.674.089-57', '2005-06-01', 'F', 'Selecione Estado', 'Selecione Cidade', 'Rua Argentina', 561, '87565-000', 'manuifpr@gmail.com', '(44) 96543-4567', '1234', '0', '2023-10-01', 4, 'Gerente', '08:00:00', '17:00:00', NULL),
(32, '', 'dfoghjcx frydtghh', '081.674.089-57', '2005-04-05', 'F', 'ES', 'Afonso Cláudio', 'ertyu', 554, '45676-543', 'manuifpr@gmail.com', '(44) 98765-4321', '123456', '123456', '0065-05-04', 4.567, 'Recepção', '05:06:00', '05:06:00', NULL),
(33, '', 'Ana Paula ', '735.312.370-20', '2005-09-28', 'F', 'PR', 'Cruzeiro do Oeste', 'Rua das Oliveiras', 654, '87400-000', 'anapaula@gmail.com', '(44) 98765-4321', '123456', '123456', '0001-01-01', 4.567, 'Recepção', '14:00:00', '23:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `hospede`
--

CREATE TABLE `hospede` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `dataNascimento` date NOT NULL,
  `genero` varchar(1) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numeroEndereco` int(11) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `contatoEmergencia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `hospede`
--

INSERT INTO `hospede` (`id`, `nome`, `cpf`, `dataNascimento`, `genero`, `estado`, `cidade`, `endereco`, `numeroEndereco`, `cep`, `email`, `telefone`, `contatoEmergencia`) VALUES
(51, 'Francisca da Silva', '628.332.410-03', '2001-04-23', 'F', 'MS', 'Água Clara', 'Contancia', 34567, '45676-543', 'xica@gmail.com', '(44) 98767-6567', '(44) 98765-4345'),
(52, 'Maria das Graças ', '533.779.870-70', '2002-02-01', 'F', 'BA', 'Abaíra', 'Contancia', 23456, '23456-321', 'cont@gmail.com', '(44) 96543-4567', '(44) 93456-5434'),
(53, 'Sandra Maria ', '540.223.360-80', '2000-10-01', 'F', 'MG', 'Abadia dos Dourados', 'Contancia', 765, '34567-654', 'sandra@gmail.com', '(44) 98767-6567', '(44) 93456-5434'),
(54, 'Lucas Manoel dos Santos Trindade', '392.336.480-60', '2001-10-24', 'S', 'Selecione Estado', 'Selecione Cidade', 'Rua Argentina', 561, '87565-000', 'lucas@gmail.com', '(44) 98787-6545', '(44) 97756-5454'),
(55, 'dfoghjcx frydtghh', '081.674.089-57', '2005-06-01', 'S', 'RN', 'Acari', 'ertyu', 45, '45676-543', 'manuifpr@gmail.com', '(44) 98765-4321', '(44) 98765-4345');

-- --------------------------------------------------------

--
-- Estrutura para tabela `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marca`
--

INSERT INTO `marca` (`id`, `nome`) VALUES
(1, 'rtyui'),
(2, 'Prompt Keeps'),
(3, 'Coca-Cola'),
(4, 'Cristal'),
(5, 'Tampico'),
(6, 'Garoto'),
(7, 'Doritos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorUnitario` double NOT NULL,
  `id_consumo` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `quantidade`, `valorUnitario`, `id_consumo`, `id_tipo`, `id_marca`) VALUES
(2, 'Refrigerante', 100, 10, NULL, NULL, NULL),
(3, 'Chocolate', 200, 10, NULL, NULL, NULL),
(4, 'nome', 100, 2, NULL, 1, 1),
(5, 'Garrafa 1L', 10, 5, NULL, 3, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `quarto`
--

CREATE TABLE `quarto` (
  `id` int(11) NOT NULL,
  `status` varchar(3) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo` varchar(8) NOT NULL,
  `capacidade` int(45) NOT NULL,
  `valorDiaria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `quarto`
--

INSERT INTO `quarto` (`id`, `status`, `numero`, `tipo`, `capacidade`, `valorDiaria`) VALUES
(11, '', 11, 'Casal', 2, 200),
(12, '', 12, 'Solteiro', 1, 100);

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `status` varchar(3) NOT NULL,
  `dataEntrada` date NOT NULL,
  `dataSaida` date NOT NULL,
  `valorTotalReserva` double NOT NULL,
  `quantHospede` int(1) NOT NULL,
  `observacao` varchar(200) NOT NULL,
  `id_quarto` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `id_hospede` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reserva`
--

INSERT INTO `reserva` (`id`, `status`, `dataEntrada`, `dataSaida`, `valorTotalReserva`, `quantHospede`, `observacao`, `id_quarto`, `id_funcionario`, `id_hospede`) VALUES
(38, 'Sim', '2023-10-23', '2023-10-27', 2, 1, '', 11, NULL, 54),
(39, '', '2023-12-01', '2023-12-02', 220, 2, '', 12, NULL, 53),
(40, '', '0000-00-00', '0000-00-00', 0, 3, '', NULL, NULL, 51),
(41, '', '0000-00-00', '0000-00-00', 0, 3, '', NULL, NULL, 51),
(42, '', '0000-00-00', '0000-00-00', 0, 3, '', NULL, NULL, 51),
(43, '', '0000-00-00', '0000-00-00', 0, 2, '', NULL, NULL, 51),
(44, '', '0000-00-00', '0000-00-00', 0, 0, '', 11, NULL, NULL),
(46, '', '0000-00-00', '0000-00-00', 0, 0, '', 11, NULL, NULL),
(47, '', '0000-00-00', '0000-00-00', 0, 0, '', 11, NULL, NULL),
(48, '', '0000-00-00', '0000-00-00', 0, 0, '', 11, NULL, NULL),
(49, '', '0000-00-00', '0000-00-00', 0, 2, '', NULL, NULL, 55),
(50, '', '0000-00-00', '0000-00-00', 0, 2, '', NULL, NULL, 55),
(51, '', '0000-00-00', '0000-00-00', 0, 2, '', NULL, NULL, 54),
(52, '', '0000-00-00', '0000-00-00', 0, 2, '', NULL, NULL, 53),
(53, '', '0000-00-00', '0000-00-00', 0, 2, '', NULL, NULL, 53),
(54, '', '0000-00-00', '0000-00-00', 0, 0, '', 11, NULL, NULL),
(55, '', '0000-00-00', '0000-00-00', 0, 0, '', 11, NULL, NULL),
(56, '', '0000-00-00', '0000-00-00', 0, 0, '', NULL, NULL, 52),
(57, '', '0000-00-00', '0000-00-00', 0, 0, '', 11, NULL, NULL),
(58, '', '0000-00-00', '0000-00-00', 0, 1, 'a', NULL, NULL, 54);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`) VALUES
(1, 'Sabonete'),
(2, 'Chocolate'),
(3, 'Bebida'),
(5, 'Bebida'),
(6, 'Salgadinho');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consumo`
--
ALTER TABLE `consumo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consumo_reserva` (`id_reserva`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `hospede`
--
ALTER TABLE `hospede`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_consumo` (`id_consumo`),
  ADD KEY `produto_tipo` (`id_tipo`),
  ADD KEY `produto_marca` (`id_marca`);

--
-- Índices de tabela `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserva_funcionario` (`id_funcionario`),
  ADD KEY `reserva_hospede` (`id_hospede`),
  ADD KEY `reserva_quarto` (`id_quarto`);

--
-- Índices de tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `hospede`
--
ALTER TABLE `hospede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `quarto`
--
ALTER TABLE `quarto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consumo`
--
ALTER TABLE `consumo`
  ADD CONSTRAINT `consumo_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `consumo_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `produto_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`);

--
-- Restrições para tabelas `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `reserva_hospede` FOREIGN KEY (`id_hospede`) REFERENCES `hospede` (`id`),
  ADD CONSTRAINT `reserva_quarto` FOREIGN KEY (`id_quarto`) REFERENCES `quarto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
