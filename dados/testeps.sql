-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Maio-2022 às 18:22
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testeps`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`) VALUES
(1, 'Samanta Salgado Maldonado'),
(2, 'Dr. Enzo Davi Padrão Filho'),
(3, 'Marco Dias Assunção Filho'),
(4, 'Sérgio Sanches Pontes Jr.'),
(5, 'Máximo Fabrício Souza Filho'),
(6, 'Guilherme Garcia Rico Neto'),
(7, 'Erik Emanuel Torres Sobrinho'),
(8, 'Téo Branco'),
(9, 'Cristian Saito Filho'),
(10, 'Dr. Fabrício Faro Colaço Sobrinho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteiner`
--

CREATE TABLE `conteiner` (
  `id_conteiner` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `numero` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conteiner`
--

INSERT INTO `conteiner` (`id_conteiner`, `id_cliente`, `id_tipo`, `id_status`, `id_categoria`, `numero`) VALUES
(1, 1, 1, 2, 1, 'GPEA5924623'),
(2, 2, 2, 2, 2, 'KXFT2923115'),
(3, 3, 1, 1, 1, 'YTET4384839'),
(4, 4, 2, 1, 2, 'EEPE1756848'),
(5, 5, 1, 1, 1, 'AAMY3642750'),
(6, 6, 2, 2, 2, 'WPNW5303153'),
(7, 7, 1, 2, 1, 'SJKS5288409'),
(8, 8, 2, 1, 2, 'CZUL7711911'),
(9, 9, 1, 1, 1, 'GSOT8699672'),
(10, 10, 2, 1, 2, 'MRBV8192235'),
(11, 1, 1, 1, 1, 'TEST1234567');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteiner_categoria`
--

CREATE TABLE `conteiner_categoria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conteiner_categoria`
--

INSERT INTO `conteiner_categoria` (`id`, `descricao`) VALUES
(1, 'Importação'),
(2, 'Exportação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteiner_status`
--

CREATE TABLE `conteiner_status` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conteiner_status`
--

INSERT INTO `conteiner_status` (`id`, `descricao`) VALUES
(1, 'Cheio'),
(2, 'Vazio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteiner_tipo`
--

CREATE TABLE `conteiner_tipo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conteiner_tipo`
--

INSERT INTO `conteiner_tipo` (`id`, `descricao`) VALUES
(1, '20'),
(2, '40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_conteiner` int(11) NOT NULL,
  `data_inicio` timestamp NULL DEFAULT NULL,
  `data_fim` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movimentacao`
--

INSERT INTO `movimentacao` (`id`, `id_tipo`, `id_conteiner`, `data_inicio`, `data_fim`) VALUES
(1, 3, 1, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(2, 1, 1, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(3, 3, 1, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(4, 4, 1, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(5, 7, 1, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(6, 2, 1, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(7, 6, 1, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(8, 5, 1, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(9, 6, 1, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(10, 5, 1, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(11, 3, 2, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(12, 2, 2, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(13, 7, 2, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(14, 1, 2, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(15, 1, 2, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(16, 6, 2, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(17, 6, 2, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(18, 5, 2, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(19, 7, 2, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(20, 6, 2, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(21, 2, 3, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(22, 2, 3, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(23, 5, 3, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(24, 2, 3, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(25, 5, 3, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(26, 3, 3, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(27, 1, 3, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(28, 4, 3, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(29, 5, 3, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(30, 5, 3, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(31, 1, 4, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(32, 1, 4, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(33, 3, 4, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(34, 7, 4, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(35, 4, 4, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(36, 1, 4, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(37, 3, 4, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(38, 4, 4, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(39, 5, 4, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(40, 7, 4, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(41, 4, 5, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(42, 6, 5, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(43, 6, 5, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(44, 2, 5, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(45, 4, 5, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(46, 5, 5, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(47, 7, 5, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(48, 7, 5, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(49, 5, 5, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(50, 7, 5, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(51, 2, 6, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(52, 4, 6, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(53, 2, 6, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(54, 1, 6, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(55, 7, 6, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(56, 6, 6, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(57, 4, 6, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(58, 7, 6, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(59, 5, 6, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(60, 4, 6, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(61, 5, 7, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(62, 6, 7, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(63, 2, 7, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(64, 3, 7, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(65, 3, 7, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(66, 7, 7, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(67, 7, 7, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(68, 4, 7, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(69, 5, 7, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(70, 7, 7, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(71, 4, 8, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(72, 6, 8, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(73, 6, 8, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(74, 2, 8, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(75, 3, 8, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(76, 4, 8, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(77, 6, 8, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(78, 6, 8, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(79, 4, 8, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(80, 7, 8, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(81, 1, 9, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(82, 5, 9, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(83, 7, 9, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(84, 2, 9, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(85, 3, 9, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(86, 3, 9, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(87, 4, 9, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(88, 3, 9, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(89, 3, 9, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(90, 7, 9, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(91, 1, 10, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(92, 6, 10, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(93, 4, 10, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(94, 4, 10, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(95, 6, 10, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(96, 6, 10, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(97, 6, 10, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(98, 6, 10, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(99, 5, 10, '2022-05-27 05:19:58', '2022-05-27 05:19:58'),
(100, 1, 10, '2022-05-27 05:19:58', '2022-05-27 05:19:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao_tipo`
--

CREATE TABLE `movimentacao_tipo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movimentacao_tipo`
--

INSERT INTO `movimentacao_tipo` (`id`, `descricao`) VALUES
(1, 'Embarque'),
(2, 'Descarga'),
(3, 'gate in'),
(4, 'gate out'),
(5, 'reposicionamento'),
(6, 'pesagem'),
(7, 'scanner');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `conteiner`
--
ALTER TABLE `conteiner`
  ADD PRIMARY KEY (`id_conteiner`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices para tabela `conteiner_categoria`
--
ALTER TABLE `conteiner_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `conteiner_status`
--
ALTER TABLE `conteiner_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `conteiner_tipo`
--
ALTER TABLE `conteiner_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_movimentacao` (`id_tipo`),
  ADD KEY `id_conteiner` (`id_conteiner`);

--
-- Índices para tabela `movimentacao_tipo`
--
ALTER TABLE `movimentacao_tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `conteiner`
--
ALTER TABLE `conteiner`
  MODIFY `id_conteiner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `conteiner_categoria`
--
ALTER TABLE `conteiner_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `conteiner_status`
--
ALTER TABLE `conteiner_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `conteiner_tipo`
--
ALTER TABLE `conteiner_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de tabela `movimentacao_tipo`
--
ALTER TABLE `movimentacao_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
