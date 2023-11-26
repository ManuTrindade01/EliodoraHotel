-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2023 às 00:20
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

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
-- Estrutura da tabela `consumo`
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
-- Extraindo dados da tabela `consumo`
--

INSERT INTO `consumo` (`id`, `quantidadeProduto`, `data`, `hora`, `id_reserva`, `id_produto`) VALUES
(0, 10, '2023-09-07', '19:48:44', NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `dataNascimento` date NOT NULL,
  `genero` varchar(1) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numeroEndereco` int(11) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `confirma` varchar(100) NOT NULL,
  `dataAdmissao` date NOT NULL,
  `salario` double(11,2) NOT NULL,
  `cargo` int(1) NOT NULL,
  `horarioEntrada` time NOT NULL,
  `horarioSaida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `status`, `nome`, `cpf`, `dataNascimento`, `genero`, `estado`, `cidade`, `bairro`, `endereco`, `numeroEndereco`, `cep`, `email`, `telefone`, `senha`, `confirma`, `dataAdmissao`, `salario`, `cargo`, `horarioEntrada`, `horarioSaida`) VALUES
(27, 1, 'Emanuely Trindade', '081.674.089-57', '2005-06-01', 'F', 'PR', 'Cafezal do Sul', 'Centro', 'Rua Argentina', 561, '87565-000', 'manuifpr@gmail.com', '(44) 96543-4567', '1234', '0', '2023-10-01', 2000.00, 1, '08:00:00', '17:00:00'),
(43, 1, 'Sandra Maria dos Santos Trindade', '021.972.939-58', '1975-09-26', 'F', 'PR', 'Cafezal do Sul', 'Centro', 'Rua Argentina', 654, '87565-000', 'sandramanulucas@gmail.com', '(44) 97386-4782', '123456', '123456', '0067-05-31', 5000.00, 2, '08:10:00', '15:00:00'),
(44, 1, 'Sandra Maria dos Santos Trindade', '081.674.089-57', '2000-09-01', 'F', 'PR', 'Cafezal do Sul', 'Guaiporã', 'Rua Getúlio Vargas', 876, '87567-000', 'sandramanulucas@gmail.com', '(44) 97386-478', '123456', '123456', '2000-07-09', 5000.00, 2, '09:09:00', '16:00:00'),
(45, 1, 'Sandra Maria dos Santos Trindade', '081.674.089-57', '2005-06-01', 'F', 'PR', 'Cafezal do Sul', 'Guaiporã', 'Rua Getúlio Vargas', 7654, '87567-000', 'sandramanulucas@gmail.com', '(44) 97386-478', '123456', '123456', '2023-06-01', 5000.00, 1, '07:07:00', '01:01:00'),
(46, 1, 'Sandra Maria dos Santos Trindade', '081.674.089-57', '2005-06-01', 'F', 'PR', 'Cafezal do Sul', 'Guaiporã', 'Rua Getúlio Vargas', 7654, '87567-000', 'sandramanulucas@gmail.com', '(44) 97386-478', '123456', '123456', '2023-06-01', 5000.00, 1, '07:07:00', '01:01:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospede`
--

CREATE TABLE `hospede` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `dataNascimento` date NOT NULL,
  `genero` varchar(1) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numeroEndereco` int(11) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `contatoEmergencia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `hospede`
--

INSERT INTO `hospede` (`id`, `nome`, `cpf`, `dataNascimento`, `genero`, `estado`, `cidade`, `bairro`, `endereco`, `numeroEndereco`, `cep`, `email`, `telefone`, `contatoEmergencia`) VALUES
(1, 'Tereza Manuela da Luz', '780.367.190-02', '1931-11-30', 'F', 'PR', 'Iporã', 'Centro', 'Rua das Flores', 1022, '87560-000', 'tereza@gmail.com', '(43) 97846-3286', '(22) 93274-8377'),
(2, 'Maria Francisca de Souza Trindade', '943.413.600-86', '1924-06-01', 'F', 'PR', 'Umuarama', 'Zona III', 'Rua das Flores', 9876, '87502-000', 'francisca@gmail.com', '(43) 97846-3286', '(22) 93274-8377'),
(3, 'Maria Pereira de Azevedo ', '947.667.245-50', '1930-08-28', 'F', 'PR', 'Cafezal do Sul', 'Centro', 'Rua Rio Grande do Norte', 764, '87565-000', 'maria@gmail.com', '(22) 96666-6633', '(33) 93335-3465'),
(4, 'Maria Amélia de Jesus', '947.667.245-50', '1906-01-01', 'F', 'SE', 'Itabaiana', 'Centro', 'Rua Amélia', 986, '49500-970', 'amelia@gmail.com', '(44) 96767-8687', '(44) 98673-2673'),
(7, 'Marcela Aimee Alves ', '133.325.989-10', '2005-11-16', 'F', 'PR', 'Cruzeiro do Oeste', 'Sul Brasileira 1 ', 'Rua Timoneira ', 245, '87400-000', 'aimee@gmail.com', '(44) 99833-6792', ''),
(8, 'Sandra Maria dos Santos Trindade', '081.674.089-57', '2005-06-01', 'F', 'PR', 'Cafezal do Sul', 'Centro', 'Rua Getúlio Vargas', 654, '87565-000', 'manuifpr@gmail.com', '', ''),
(9, 'Sandra Maria dos Santos Trindade', '081.674.089-57', '2005-06-01', 'F', 'PR', 'Cafezal do Sul', 'Centro', 'Rua Getúlio Vargas', 654, '87565-000', 'manuifpr@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `marca`
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
-- Estrutura da tabela `produto`
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
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `quantidade`, `valorUnitario`, `id_consumo`, `id_tipo`, `id_marca`) VALUES
(2, 'Refrigerante', 100, 10, NULL, NULL, NULL),
(3, 'Chocolate', 200, 10, NULL, NULL, NULL),
(4, 'nome', 100, 2, NULL, 1, 1),
(5, 'Garrafa 1L', 10, 5, NULL, 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE `quarto` (
  `id` int(11) NOT NULL,
  `status` varchar(3) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo` varchar(8) NOT NULL,
  `capacidade` int(45) NOT NULL,
  `valorDiaria` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`id`, `status`, `numero`, `tipo`, `capacidade`, `valorDiaria`) VALUES
(1, '', 1, 'Solteiro', 3, 120.00),
(2, '', 2, 'Casal', 4, 200.00),
(3, '', 3, 'Solteiro', 2, 120.00),
(4, '', 4, 'Casal', 4, 120.00),
(5, '', 1, 'casal', 1, 233.00),
(6, '', 1, 'casal', 1, 233.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `dataEntrada` date NOT NULL,
  `dataSaida` date NOT NULL,
  `valorTotalReserva` double(11,2) NOT NULL,
  `quantHospede` int(1) NOT NULL,
  `observacao` varchar(200) NOT NULL,
  `id_hospede` int(11) DEFAULT NULL,
  `id_quarto` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `datacadastro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id`, `status`, `dataEntrada`, `dataSaida`, `valorTotalReserva`, `quantHospede`, `observacao`, `id_hospede`, `id_quarto`, `id_funcionario`, `datacadastro`) VALUES
(2, 3, '2023-11-12', '2023-11-13', 120.00, 1, '', 3, 3, NULL, '2023-11-23 08:42:39'),
(3, 1, '2023-11-23', '2023-11-24', 120.00, 1, '', 3, 3, NULL, '2023-11-23 09:09:44'),
(4, 1, '2023-12-20', '2024-02-20', 7440.00, 1, '', 7, 3, NULL, '2023-11-24 16:47:23'),
(5, 2, '2023-11-25', '2023-11-25', 120.00, 1, '', 7, 3, NULL, '2023-11-25 17:05:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipo`
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
-- Índices para tabela `consumo`
--
ALTER TABLE `consumo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consumo_reserva` (`id_reserva`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `hospede`
--
ALTER TABLE `hospede`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_consumo` (`id_consumo`),
  ADD KEY `produto_tipo` (`id_tipo`),
  ADD KEY `produto_marca` (`id_marca`);

--
-- Índices para tabela `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserva_funcionario` (`id_funcionario`),
  ADD KEY `reserva_hospede` (`id_hospede`),
  ADD KEY `reserva_quarto` (`id_quarto`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `hospede`
--
ALTER TABLE `hospede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `consumo`
--
ALTER TABLE `consumo`
  ADD CONSTRAINT `consumo_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `consumo_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `produto_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `reserva_hospede` FOREIGN KEY (`id_hospede`) REFERENCES `hospede` (`id`),
  ADD CONSTRAINT `reserva_quarto` FOREIGN KEY (`id_quarto`) REFERENCES `quarto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
