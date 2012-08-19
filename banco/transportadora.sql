-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 19/08/2012 às 17h16min
-- Versão do Servidor: 5.5.24
-- Versão do PHP: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `transportadora`
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
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id_cliente`, `razao_social`, `nome_fantasia`, `tipo_cliente`, `cpf_cnpj`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `contato`, `sexo`, `email`, `site`, `inscricao_estadual`, `inscricao_municipal`, `data_cadastro`, `ativo`) VALUES
(22, 'cliente[nome_sacado]', 'cliente[nome_sacado]', 'PJ', 'cliente[cnpj_c', 'cliente[endereco_sacado]', '', NULL, '', 'cliente[municipio_sacado]', 'AC', 'cliente[', NULL, NULL, NULL, NULL, 'cliente[insc', NULL, '2012-08-05', 'S'),
(23, 'cliente[nome_sacado]', 'cliente[nome_sacado]', 'PJ', 'cliente[cnpj_c', 'cliente[endereco_sacado]', '', NULL, '', 'cliente[municipio_sacado]', 'AC', 'cliente[', NULL, NULL, NULL, NULL, 'cliente[insc', NULL, '2012-08-05', 'S'),
(24, 'cliente[nome_sacado]', 'cliente[nome_sacado]', 'PJ', 'cliente[cnpj_c', 'cliente[endereco_sacado]', '', NULL, '', 'cliente[municipio_sacado]', 'AC', 'cliente[', NULL, NULL, NULL, NULL, 'cliente[insc', NULL, '2012-08-05', 'S'),
(25, 'cliente[nome_sacado]', 'cliente[nome_sacado]', 'PJ', 'cliente[cnpj_c', 'cliente[endereco_sacado]', '', NULL, '', 'cliente[municipio_sacado]', 'AC', 'cliente[', NULL, NULL, NULL, NULL, 'cliente[insc', NULL, '2012-08-05', 'S'),
(26, 'cliente[nome_sacado]', 'cliente[nome_sacado]', 'PJ', 'cliente[cnpj_c', 'cliente[endereco_sacado]', '', NULL, '', 'cliente[municipio_sacado]', 'AC', 'cliente[', NULL, NULL, NULL, NULL, 'cliente[insc', NULL, '2012-08-05', 'S'),
(27, 'cliente[nome_sacado]', 'cliente[nome_sacado]', 'PJ', 'cliente[cnpj_c', 'cliente[endereco_sacado]', '', NULL, '', 'cliente[municipio_sacado]', 'AC', 'cliente[', NULL, NULL, NULL, NULL, 'cliente[insc', NULL, '2012-08-05', 'S'),
(28, 'cliente[nome_sacado]', 'cliente[nome_sacado]', 'PJ', 'cliente[cnpj_c', 'cliente[endereco_sacado]', '', NULL, '', 'cliente[municipio_sacado]', 'AC', '', NULL, NULL, NULL, NULL, 'cliente[insc', NULL, '2012-08-05', 'S'),
(29, 'cliente[nome_sacado]', 'cliente[nome_sacado]', 'PJ', 'cliente[cnpj_c', 'cliente[endereco_sacado]', '', NULL, '', 'cliente[municipio_sacado]', 'AC', '', NULL, NULL, NULL, NULL, 'cliente[insc', NULL, '2012-08-05', 'S'),
(30, 'cliente[nome_sacado]', 'cliente[nome_sacado]', 'PJ', 'cliente[cnpj_c', 'cliente[endereco_sacado]', '', NULL, '', 'cliente[municipio_sacado]', 'AC', '', NULL, NULL, NULL, NULL, 'cliente[insc', NULL, '2012-08-05', 'S'),
(31, 'Deyvison Rocha', 'Deyvison Rocha', 'PF', '231', '12131', '', NULL, '', '21', 'AC', '23132', NULL, NULL, NULL, NULL, '321321', NULL, '2012-08-05', 'S'),
(32, 'Deyvison Rocha', 'Deyvison Rocha', 'PF', '04842255455', 'Rua Tal', '', NULL, '', '45', 'AC', '52040020', NULL, NULL, NULL, NULL, '123132131', NULL, '2012-08-05', 'S');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `tb_fatura`
--

INSERT INTO `tb_fatura` (`id_fatura`, `id_cliente`, `valor_fatura`, `numero_fatura`, `valor_duplicata`, `numero_duplicata`, `data_vencimento`, `desconto`, `data_pagamento`, `condicoes_especiais`, `valor_total`, `data_cadastro`, `ativo`) VALUES
(19, 32, 150.00, '11', 150.00, '11', '2012-08-15', 0.00, '2012-08-29', 'Teste', 150.00, '2012-08-05', 'S');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `tb_fatura_item`
--

INSERT INTO `tb_fatura_item` (`id_fatura_item`, `id_fatura`, `descricao`, `data_execucao`, `nota_fiscal`, `valor`) VALUES
(14, 19, 'teste', '2012-08-22', '132', 150.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ordem_servico`
--

CREATE TABLE IF NOT EXISTS `tb_ordem_servico` (
  `id_ordem_servico` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_fatura` int(11) NOT NULL,
  `data_execucao` date DEFAULT NULL,
  `km_inicial` varchar(15) DEFAULT NULL,
  `km_final` varchar(15) DEFAULT NULL,
  `origem_endereco` varchar(255) DEFAULT NULL,
  `origem_cpf_cnpj` varchar(14) DEFAULT NULL,
  `origem_bairro` varchar(60) DEFAULT NULL,
  `origem_cidade` varchar(60) DEFAULT NULL,
  `origem_contato` varchar(60) DEFAULT NULL,
  `origem_uf` varchar(2) DEFAULT NULL,
  `origem_fone` varchar(60) DEFAULT NULL,
  `destino_endereco` varchar(255) DEFAULT NULL,
  `destino_cpf_cnpj` varchar(14) DEFAULT NULL,
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
  PRIMARY KEY (`id_ordem_servico`),
  KEY `fk_tb_ordem_servico_tb_cliente1` (`id_cliente`),
  KEY `fk_tb_ordem_servico_tb_fatura1` (`id_fatura`)
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

INSERT INTO `tb_uf` (`id_uf`, `sigla`, `descricao`, `capital`) VALUES
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

INSERT INTO `tb_usuario` (`id_usuario`, `nome`, `email`, `senha`, `ativo`) VALUES
(1, 'Deyvison Rocha', 'deyvison@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'S');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `tb_fatura`
--
ALTER TABLE `tb_fatura`
  ADD CONSTRAINT `fk_tb_fatura_1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON UPDATE NO ACTION;

--
-- Restrições para a tabela `tb_fatura_item`
--
ALTER TABLE `tb_fatura_item`
  ADD CONSTRAINT `tb_fatura_item_ibfk_1` FOREIGN KEY (`id_fatura`) REFERENCES `tb_fatura` (`id_fatura`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `tb_ordem_servico`
--
ALTER TABLE `tb_ordem_servico`
  ADD CONSTRAINT `fk_tb_ordem_servico_tb_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_ordem_servico_tb_fatura1` FOREIGN KEY (`id_fatura`) REFERENCES `tb_fatura` (`id_fatura`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
