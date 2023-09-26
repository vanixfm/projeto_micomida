-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/09/2023 às 03:41
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
-- Banco de dados: `db_restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id_arq` int(4) NOT NULL,
  `url_arq` varchar(100) NOT NULL,
  `nome_arq` varchar(40) NOT NULL,
  `id_login` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `arquivos`
--

INSERT INTO `arquivos` (`id_arq`, `url_arq`, `nome_arq`, `id_login`) VALUES
(20, 'arquivos/7ffbc52458388eca77bd8bbc9d051c7d.jpg', 'Madero', 33),
(22, 'arquivos/d59580b5fddd54df1ba804e99ac7a9c2.jpg', 'cafe', 35),
(23, 'arquivos/ca05d04f35c4625d69ba3c73680a99e1.jpg', 'mad', 36),
(24, 'arquivos/7d553f995d940370bc361414272ba169.jpeg', 'dom', 37),
(25, 'arquivos/669c964a0be7ad856a5a268348e13f77.jpg', 'cad', 38),
(26, 'arquivos/f9307cc749a01d84e590971637bd760e.jpg', 'bur', 39),
(27, 'arquivos/1acf33a947f52ffd65fc0d1fe14a652a.jpg', 'chel', 40);

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avaliacao` int(4) NOT NULL,
  `id_restaurante` int(4) NOT NULL,
  `id_cliente` int(4) NOT NULL,
  `nota` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id_avaliacao`, `id_restaurante`, `id_cliente`, `nota`) VALUES
(1, 46, 15, 5),
(2, 47, 15, 2),
(3, 47, 15, 4),
(4, 49, 15, 2),
(5, 49, 15, 4),
(6, 51, 15, 3),
(7, 0, 0, 0),
(8, 48, 15, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(4) NOT NULL,
  `nm_cliente` varchar(40) NOT NULL,
  `dt_nasc_cliente` date NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `senha_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nm_cliente`, `dt_nasc_cliente`, `sexo`, `email_cliente`, `senha_cliente`) VALUES
(13, 'Vanessa Favero Mereles', '2024-06-11', 'feminino', 'VANESSAFAVEROM@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'mônica de moraes favero mereles', '2023-06-13', 'feminino', 'hanahhfeijo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(15, 'Carlos', '2023-06-15', 'masculino', 'carlos@email.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(4) NOT NULL,
  `id_restaurante` int(4) NOT NULL,
  `id_cliente` int(4) NOT NULL,
  `comentario` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(4) NOT NULL,
  `cep_end` int(20) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` int(10) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `id_login` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `cep_end`, `rua`, `numero`, `bairro`, `cidade`, `uf`, `id_login`) VALUES
(29, 81530, 'Avenida Nossa Senhora de Lourdes', 63, 'Jardim das Américas', 'Curitiba', 'PR', 29),
(30, 81530, 'Avenida Nossa Senhora de Lourdes', 63, 'Jardim das Américas', 'Curitiba', 'PR', 30),
(31, 81530, 'Avenida Nossa Senhora de Lourdes', 63, 'Jardim das Américas', 'Curitiba', 'PR', 31),
(32, 81530, 'Avenida Nossa Senhora de Lourdes', 63, 'Jardim das Américas', 'Curitiba', 'PR', 32),
(33, 81530, 'Avenida Nossa Senhora de Lourdes', 63, 'Jardim das Américas', 'Curitiba', 'PR', 33),
(34, 81530, 'Avenida Nossa Senhora de Lourdes', 63, 'Jardim das Américas', 'Curitiba', 'PR', 34),
(35, 80030, 'Rua Comendador Fontana', 229, 'Centro Cívico', 'Curitiba', 'PR', 35),
(36, 81530, 'Avenida Nossa Senhora de Lourdes', 63, 'Jardim das Américas', 'Curitiba', 'PR', 36),
(37, 80420, 'Avenida do Batel', 1280, 'Batel', 'Curitiba', 'PR', 37),
(38, 82600, 'Avenida José Gulin', 105, 'Bacacheri', 'Curitiba', 'PR', 38),
(39, 80250, 'Rua Brigadeiro Franco', 2300, 'Centro', 'Curitiba', 'PR', 39),
(40, 80530230, 'Rua Marechal Hermes', 113, 'Juvevê', 'Curitiba', 'PR', 40);

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(4) NOT NULL,
  `id_restaurante` int(4) NOT NULL,
  `dia_semana` varchar(15) NOT NULL,
  `horario_abertura` int(10) NOT NULL,
  `horario_fechamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `login_restaurante`
--

CREATE TABLE `login_restaurante` (
  `id_login` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login_restaurante`
--

INSERT INTO `login_restaurante` (`id_login`, `email`, `senha`) VALUES
(29, 'madero@email.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(35, 'viajante@email.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(36, 'madero@email.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(37, 'dominos@email.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(38, 'cadore@email.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(39, 'king@email.con', '81dc9bdb52d04dc20036dbd8313ed055'),
(40, 'chelsea@email.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estrutura para tabela `restaurante`
--

CREATE TABLE `restaurante` (
  `id_restaurante` int(4) NOT NULL,
  `nm_restaurante` varchar(100) NOT NULL,
  `telefone_restaurante` int(15) NOT NULL,
  `id_login_restaurante` int(4) NOT NULL,
  `id_endereco` int(4) NOT NULL,
  `rodizio` char(1) NOT NULL,
  `delivery` char(1) NOT NULL,
  `a_la_carte` char(1) NOT NULL,
  `insta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `restaurante`
--

INSERT INTO `restaurante` (`id_restaurante`, `nm_restaurante`, `telefone_restaurante`, `id_login_restaurante`, `id_endereco`, `rodizio`, `delivery`, `a_la_carte`, `insta`) VALUES
(45, 'Madero', 33330000, 34, 34, '1', '1', '1', 'https://www.instagram.com/maderobrasil/'),
(46, 'Café do Viajante', 33332222, 35, 35, '0', '1', '0', 'https://www.instagram.com/cafedoviajante/'),
(47, 'Madero', 33337777, 36, 36, '1', '1', '1', 'https://www.instagram.com/maderobrasil/'),
(48, 'Domino\'s Pizza', 33335555, 37, 37, '1', '1', '0', 'https://www.instagram.com/dominos/'),
(49, 'Ca\'dore Comida Descomplicada', 33334444, 38, 38, '1', '1', '1', 'https://www.instagram.com/cadorecuritiba/'),
(50, 'Burger King - Shopping Curitiba', 33331111, 39, 39, '1', '1', '0', 'https://www.instagram.com/burgerking/'),
(51, 'Chelsea Café', 33332222, 40, 40, '0', '1', '0', 'https://www.instagram.com/chelseaburger.br/');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipocomida`
--

CREATE TABLE `tipocomida` (
  `id_tipocomida` int(4) NOT NULL,
  `nm_tipocomida` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipocomida`
--

INSERT INTO `tipocomida` (`id_tipocomida`, `nm_tipocomida`) VALUES
(1, 'Fastfood'),
(2, 'Cafés'),
(3, 'Hambuguerias'),
(4, 'Pizzaria');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_restaurante`
--

CREATE TABLE `tipo_restaurante` (
  `id_tipo_restaurante` int(4) NOT NULL,
  `id_restaurante` int(4) NOT NULL,
  `id_tipocomida` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipo_restaurante`
--

INSERT INTO `tipo_restaurante` (`id_tipo_restaurante`, `id_restaurante`, `id_tipocomida`) VALUES
(18, 43, 3),
(20, 46, 2),
(21, 47, 3),
(22, 48, 4),
(23, 49, 1),
(24, 49, 3),
(25, 49, 4),
(26, 50, 1),
(27, 50, 3),
(28, 51, 2),
(29, 51, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id_arq`);

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices de tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Índices de tabela `login_restaurante`
--
ALTER TABLE `login_restaurante`
  ADD PRIMARY KEY (`id_login`);

--
-- Índices de tabela `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`id_restaurante`);

--
-- Índices de tabela `tipocomida`
--
ALTER TABLE `tipocomida`
  ADD PRIMARY KEY (`id_tipocomida`);

--
-- Índices de tabela `tipo_restaurante`
--
ALTER TABLE `tipo_restaurante`
  ADD PRIMARY KEY (`id_tipo_restaurante`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id_arq` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login_restaurante`
--
ALTER TABLE `login_restaurante`
  MODIFY `id_login` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `id_restaurante` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `tipocomida`
--
ALTER TABLE `tipocomida`
  MODIFY `id_tipocomida` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipo_restaurante`
--
ALTER TABLE `tipo_restaurante`
  MODIFY `id_tipo_restaurante` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
