-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Abr-2020 às 11:40
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mvc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `ID_EMPRESA` int(11) NOT NULL,
  `NOME` varchar(40) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `CNPJ` varchar(11) DEFAULT NULL,
  `TELEFONE` varchar(16) DEFAULT NULL,
  `TOTAL_INVESTIDO` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`ID_EMPRESA`, `NOME`, `EMAIL`, `CNPJ`, `TELEFONE`, `TOTAL_INVESTIDO`) VALUES
(1, 'Godoy Tec', 'godoytec@mail.com', '84.493.090/', '31(23)654-91-05', 150),
(2, 'Tec Guerra', 'tecguerra@mail.com', '88.611.547/', '68(08)249-31-68', 5000),
(3, 'Cinnamon', 'cinnamon@mail.com', '17.490.422/', '83(294)227-93-86', 60000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `investidor`
--

CREATE TABLE `investidor` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(40) NOT NULL,
  `PROFISSAO` varchar(40) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `CPF` varchar(11) NOT NULL,
  `TELEFONE` varchar(16) DEFAULT NULL,
  `SENHA` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `investidor`
--

INSERT INTO `investidor` (`ID`, `NOME`, `PROFISSAO`, `EMAIL`, `CPF`, `TELEFONE`, `SENHA`) VALUES
(1, 'pedro', 'engenheiro', 'phgodoy12@gmail.com', '333.333.333', '11 1111-1111', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'tester', 'tester', 'teste@gmail.com', '444.444.444', '12 3456-7890', '59d6c85363a25bdb5dc847c2e94a55b8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `investimento`
--

CREATE TABLE `investimento` (
  `COD_INVESTIMENTO` int(11) NOT NULL,
  `ID_INVESTIDOR` int(11) NOT NULL,
  `ID_EMPRESA` int(11) NOT NULL,
  `EMPRESA` varchar(40) DEFAULT NULL,
  `VLR_INVESTIDO` float DEFAULT NULL,
  `PARCELA` int(11) DEFAULT NULL,
  `VLR_PARCELA` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `investimento`
--

INSERT INTO `investimento` (`COD_INVESTIMENTO`, `ID_INVESTIDOR`, `ID_EMPRESA`, `EMPRESA`, `VLR_INVESTIDO`, `PARCELA`, `VLR_PARCELA`) VALUES
(13, 1, 1, 'Godoy Tec', 150, 24, 6.25),
(14, 1, 2, 'Tec Guerra', 100, 1, 100),
(15, 1, 3, 'Cinnamon', 500, 1, 500);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID_EMPRESA`);

--
-- Índices para tabela `investidor`
--
ALTER TABLE `investidor`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `investimento`
--
ALTER TABLE `investimento`
  ADD PRIMARY KEY (`COD_INVESTIMENTO`),
  ADD KEY `ID_INVESTIDOR` (`ID_INVESTIDOR`),
  ADD KEY `ID_EMPRESA` (`ID_EMPRESA`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `ID_EMPRESA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `investidor`
--
ALTER TABLE `investidor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `investimento`
--
ALTER TABLE `investimento`
  MODIFY `COD_INVESTIMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `investimento`
--
ALTER TABLE `investimento`
  ADD CONSTRAINT `investimento_ibfk_1` FOREIGN KEY (`ID_INVESTIDOR`) REFERENCES `investidor` (`ID`),
  ADD CONSTRAINT `investimento_ibfk_2` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `empresa` (`ID_EMPRESA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
