-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 05-Dez-2012 às 00:00
-- Versão do servidor: 5.5.28
-- versão do PHP: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `transportadora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(120) NOT NULL,
  `nome_fantasia` varchar(120) NOT NULL,
  `tipo_cliente` enum('PF','PJ') NOT NULL DEFAULT 'PJ',
  `cpf_cnpj` varchar(14) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(80) DEFAULT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `contato` varchar(45) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `site` varchar(120) DEFAULT NULL,
  `inscricao_estadual` varchar(12) DEFAULT NULL,
  `inscricao_municipal` varchar(18) DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S',
  `telefone1` varchar(15) DEFAULT NULL,
  `telefone2` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT IGNORE INTO `tb_cliente` (`id_cliente`, `razao_social`, `nome_fantasia`, `tipo_cliente`, `cpf_cnpj`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `contato`, `sexo`, `email`, `site`, `inscricao_estadual`, `inscricao_municipal`, `data_cadastro`, `ativo`, `telefone1`, `telefone2`) VALUES
(1, 'Deyvison Rocha', 'Deyvison Rocha', 'PF', '04842255455', 'Rua Doutor Machado', '', NULL, '', ' Recife', 'PE', '52040020', NULL, NULL, NULL, NULL, '123121', NULL, '2012-09-18', 'S', NULL, NULL),
(2, 'Rafael Henrique Albuquerque Alves', '', 'PF', '08234954423', 'Rua Rodrigues Sete,', '159', 'Casa', 'Parnamirim', 'Recife', 'PE', '52051230', '', 'M', 'rafael@transrocha.com', 'www.rafaelalves.com', '', '', '2012-11-21', 'S', '(81) 30393756', '(81) 9191-2648'),
(3, 'cia bras. de dist', '', 'PJ', '47.508.411/136', 'r jaguaribara,', '231', 'bl B', 'jd jordão', 'jaboatao', 'pe', '', 'kkkkkkkkkkkkkkkkkkkk', NULL, NULL, NULL, NULL, NULL, '0000-00-00', 'S', 'kkkkkkkkkkkkkkk', NULL),
(4, 'CIA BRAS. DE DIST', '', 'PJ', '47.508.411/136', 'R JAGUARIBARA', '231', 'BL B', 'JD PIEDADE', 'JABOATAO', 'PE', '', 'Sr. Marcelo', NULL, NULL, NULL, NULL, NULL, '0000-00-00', 'S', '81 - 3230-33333', NULL),
(5, 'cia bras. de dist', '', 'PJ', '47.508.411/136', 'r jaguaribara,', '231', 'bl B', 'jd jordão', 'jaboatao', 'pe', '', 'kkkkkkkkkkkkkkkkkkkk', NULL, NULL, NULL, NULL, NULL, '0000-00-00', 'S', 'kkkkkkkkkkkkkkk', NULL),
(6, 'CIA BRAS. DE DIST', '', 'PJ', '47.508.411/136', 'R JAGUARIBARA', '231', 'BL B', 'JD PIEDADE', 'JABOATAO', 'PE', '', 'Sr. Marcelo', NULL, NULL, NULL, NULL, NULL, '0000-00-00', 'S', '81 - 3230-33333', NULL),
(7, 'cia bras. de dist', '', 'PJ', '47.508.411/136', 'r jaguaribara,', '231', 'bl B', 'jd jordão', 'jaboatao', 'pe', '', 'kkkkkkkkkkkkkkkkkkkk', NULL, NULL, NULL, NULL, NULL, '0000-00-00', 'S', 'kkkkkkkkkkkkkkk', NULL),
(8, 'CIA BRAS. DE DIST', '', 'PJ', '47.508.411/136', 'R JAGUARIBARA', '231', 'BL B', 'JD PIEDADE', 'JABOATAO', 'PE', '', 'Sr. Marcelo', NULL, NULL, NULL, NULL, NULL, '0000-00-00', 'S', '81 - 3230-33333', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fatura`
--

CREATE TABLE IF NOT EXISTS `tb_fatura` (
  `id_fatura` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `valor_fatura` double(15,2) NOT NULL,
  `numero_fatura` varchar(45) NOT NULL,
  `valor_duplicata` double(15,2) NOT NULL,
  `numero_duplicata` varchar(45) NOT NULL,
  `data_vencimento` date NOT NULL,
  `desconto` double(15,2) NOT NULL,
  `data_pagamento` date NOT NULL,
  `condicoes_especiais` text,
  `valor_total` double(15,2) NOT NULL,
  `data_cadastro` date NOT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id_fatura`),
  KEY `fk_tb_fatura_1` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_fatura`
--

INSERT IGNORE INTO `tb_fatura` (`id_fatura`, `id_cliente`, `valor_fatura`, `numero_fatura`, `valor_duplicata`, `numero_duplicata`, `data_vencimento`, `desconto`, `data_pagamento`, `condicoes_especiais`, `valor_total`, `data_cadastro`, `ativo`) VALUES
(1, 1, 1000.00, '151451', 1000.00, '1', '2012-09-17', 10.00, '2012-09-18', 'Boleto', 1000.50, '2012-09-18', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fatura_item`
--

CREATE TABLE IF NOT EXISTS `tb_fatura_item` (
  `id_fatura_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_fatura` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `data_execucao` date NOT NULL,
  `nota_fiscal` varchar(45) NOT NULL,
  `valor` double(15,2) DEFAULT NULL,
  PRIMARY KEY (`id_fatura_item`),
  KEY `id_fatura` (`id_fatura`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_fatura_item`
--

INSERT IGNORE INTO `tb_fatura_item` (`id_fatura_item`, `id_fatura`, `descricao`, `data_execucao`, `nota_fiscal`, `valor`) VALUES
(1, 1, 'Mudança', '2012-09-14', '1231', 1000.50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ordem_servico`
--

CREATE TABLE IF NOT EXISTS `tb_ordem_servico` (
  `id_ordem_servico` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente_origem` int(11) NOT NULL,
  `id_cliente_destino` int(11) NOT NULL,
  `data_execucao` date DEFAULT NULL,
  `km_inicial` varchar(15) DEFAULT NULL,
  `km_final` varchar(15) DEFAULT NULL,
  `origem_endereco` varchar(255) DEFAULT NULL,
  `origem_cpf_cnpj` varchar(14) DEFAULT NULL,
  `origem_numero` varchar(10) DEFAULT NULL,
  `origem_complemento` varchar(60) DEFAULT NULL,
  `origem_bairro` varchar(60) DEFAULT NULL,
  `origem_cidade` varchar(60) DEFAULT NULL,
  `origem_contato` varchar(60) DEFAULT NULL,
  `origem_uf` varchar(2) DEFAULT NULL,
  `origem_fone` varchar(60) DEFAULT NULL,
  `destino_endereco` varchar(255) DEFAULT NULL,
  `destino_cpf_cnpj` varchar(14) DEFAULT NULL,
  `destino_numero` varchar(10) DEFAULT NULL,
  `destino_complemento` varchar(60) DEFAULT NULL,
  `destino_bairro` varchar(60) DEFAULT NULL,
  `destino_cidade` varchar(60) DEFAULT NULL,
  `destino_uf` varchar(2) DEFAULT NULL,
  `destino_fone` varchar(60) DEFAULT NULL,
  `titulo_servico` varchar(60) DEFAULT NULL,
  `descricao_servico` text,
  `valor_frete` double(15,2) DEFAULT NULL,
  `valor_seguro` double(15,2) DEFAULT NULL,
  `valor_imposto` double(15,2) DEFAULT NULL,
  `observacao` text,
  `valor_total` double(15,2) DEFAULT NULL,
  PRIMARY KEY (`id_ordem_servico`),
  KEY `fk_tb_ordem_servico_tb_cliente1` (`id_cliente_origem`),
  KEY `fk_tb_ordem_servico_tb_cliente2` (`id_cliente_destino`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_uf`
--

CREATE TABLE IF NOT EXISTS `tb_uf` (
  `id_uf` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(2) NOT NULL,
  `descricao` varchar(40) NOT NULL,
  `capital` varchar(40) NOT NULL,
  PRIMARY KEY (`id_uf`),
  UNIQUE KEY `sigla` (`sigla`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `tb_uf`
--

INSERT IGNORE INTO `tb_uf` (`id_uf`, `sigla`, `descricao`, `capital`) VALUES
(1, 'SP', 'São Paulo', 'São Paulo'),
(2, 'RJ', 'Rio de Janeiro', 'Rio de Janeiro'),
(3, 'MG', 'Minas Gerais', 'Belo Horizonte'),
(4, 'PR', 'Paraná', 'Curitiba'),
(5, 'RS', 'Rio Grande do Sul', 'Porto Alegre'),
(6, 'SC', 'Santa Catarina', 'Florianópolis'),
(7, 'ES', 'Espírito Santo', 'Vitória'),
(8, 'BA', 'Bahia', 'Salvador'),
(9, 'SE', 'Sergipe', 'Aracaju'),
(10, 'AL', 'Alagoas', 'Maceió'),
(11, 'PE', 'Pernambuco', 'Recife'),
(12, 'PB', 'Paraíba', 'João Pessoa'),
(13, 'RN', 'Rio Grande do Norte', 'Natal'),
(14, 'CE', 'Ceará', 'Fortaleza'),
(15, 'PI', 'Piauí', 'Teresina'),
(16, 'MA', 'Maranhão', 'São Luís'),
(17, 'PA', 'Pará', 'Belém'),
(18, 'AP', 'Amapá', 'Macapá'),
(19, 'AM', 'Amazonas', 'Manaus'),
(20, 'TO', 'Tocantins', 'Palmas'),
(21, 'RR', 'Roraima', 'Boa Vista'),
(22, 'RO', 'Rondônia', 'Porto Velho'),
(23, 'AC', 'Acre', 'Rio Branco'),
(24, 'MT', 'Mato Grosso', 'Cuiabá'),
(25, 'MS', 'Mato Grosso do Sul', 'Campo Grande'),
(26, 'GO', 'Goiás', 'Goiânia'),
(27, 'DF', 'Distrito Federal', 'Brasília');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT IGNORE INTO `tb_usuario` (`id_usuario`, `nome`, `email`, `senha`, `ativo`) VALUES
(1, 'Deyvison Rocha', 'deyvison@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'S');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_fatura`
--
ALTER TABLE `tb_fatura`
  ADD CONSTRAINT `fk_tb_fatura_1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_fatura_item`
--
ALTER TABLE `tb_fatura_item`
  ADD CONSTRAINT `tb_fatura_item_ibfk_1` FOREIGN KEY (`id_fatura`) REFERENCES `tb_fatura` (`id_fatura`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_ordem_servico`
--
ALTER TABLE `tb_ordem_servico`
  ADD CONSTRAINT `fk_tb_ordem_servico_tb_cliente1` FOREIGN KEY (`id_cliente_origem`) REFERENCES `tb_cliente` (`id_cliente`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_ordem_servico_tb_cliente2` FOREIGN KEY (`id_cliente_destino`) REFERENCES `tb_cliente` (`id_cliente`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
