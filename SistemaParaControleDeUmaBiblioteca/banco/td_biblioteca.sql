-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jun 14, 2010 as 07:06 
-- Versão do Servidor: 5.1.41
-- Versão do PHP: 5.3.1

--
--
--
--
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `tb_biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acervo`
--

CREATE TABLE IF NOT EXISTS `acervo` (
  `id_acervo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_acervo` varchar(55) NOT NULL,
  `observacoes_acervo` text NOT NULL,
  `assuntos_acervo` text NOT NULL,
  `volume_acervo` varchar(40) NOT NULL,
  `serie_acervo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_acervo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `acervo`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `aquisicao`
--

CREATE TABLE IF NOT EXISTS `aquisicao` (
  `id_aquisicao` int(11) NOT NULL AUTO_INCREMENT,
  `id_acervo` int(11) NOT NULL,
  `id_tipo_aquisicao` int(11) NOT NULL,
  `data_aquisicao` date NOT NULL,
  `quantidade_aquisicao` int(11) NOT NULL,
  PRIMARY KEY (`id_aquisicao`),
  KEY `id_tipo_aquisicao` (`id_tipo_aquisicao`),
  KEY `id_acervo` (`id_acervo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `aquisicao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_autor` varchar(50) NOT NULL,
  `sitacao_autor` varchar(30) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `autor`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `autor_acervo`
--

CREATE TABLE IF NOT EXISTS `autor_acervo` (
  `id_autor` int(11) NOT NULL,
  `id_acervo` int(11) NOT NULL,
  PRIMARY KEY (`id_autor`,`id_acervo`),
  KEY `id_acervo` (`id_acervo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `autor_acervo`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE IF NOT EXISTS `emprestimo` (
  `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT,
  `id_item_acervo` int(11) NOT NULL,
  `id_usuario_emprestimo` int(11) NOT NULL,
  `data_emprestimo` date NOT NULL,
  `prazo_emprestimo` date NOT NULL,
  `data_devolucao` date NOT NULL,
  `renovacao_emprestimo` int(11) NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  KEY `id_item_acervo` (`id_item_acervo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `emprestimo`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `folheto`
--

CREATE TABLE IF NOT EXISTS `folheto` (
  `id_folheto` int(11) NOT NULL AUTO_INCREMENT,
  `id_acervo` int(11) NOT NULL,
  `edicao_folheto` varchar(54) NOT NULL,
  `idioma_folheto` varchar(54) NOT NULL,
  `imprenta_folheto` varchar(54) NOT NULL,
  `tipo_colecao_folheto` varchar(54) NOT NULL,
  PRIMARY KEY (`id_folheto`,`id_acervo`),
  KEY `id_acervo` (`id_acervo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `folheto`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `idioma`
--

CREATE TABLE IF NOT EXISTS `idioma` (
  `id_idioma` int(10) NOT NULL AUTO_INCREMENT,
  `idioma` varchar(21) NOT NULL,
  PRIMARY KEY (`id_idioma`),
  UNIQUE KEY `idioma` (`idioma`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `idioma`
--

INSERT INTO `idioma` (`id_idioma`, `idioma`) VALUES
(1, 'Inglês'),
(2, 'Português'),
(3, 'Espanhol'),
(4, 'Francês');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_acervo`
--

CREATE TABLE IF NOT EXISTS `item_acervo` (
  `id_item_acervo` int(11) NOT NULL,
  `id_aquisicao` int(11) NOT NULL,
  PRIMARY KEY (`id_item_acervo`),
  KEY `id_aquisicao` (`id_aquisicao`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item_acervo`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `id_livro` int(11) NOT NULL AUTO_INCREMENT,
  `id_acervo` int(11) NOT NULL,
  `edicao_livro` varchar(45) NOT NULL,
  `editora_livro` varchar(45) NOT NULL,
  `local_livro` varchar(45) NOT NULL,
  `ano_livro` date NOT NULL,
  `n_pagina_livro` int(11) NOT NULL,
  `colecao_livro` varchar(30) NOT NULL,
  `idioma_livro` varchar(30) NOT NULL,
  `isbn_livro` varchar(35) NOT NULL,
  `classificacao_livro` varchar(50) NOT NULL,
  PRIMARY KEY (`id_livro`,`id_acervo`),
  KEY `id_acervo` (`id_acervo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `livro`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `multa`
--

CREATE TABLE IF NOT EXISTS `multa` (
  `id_multa` int(11) NOT NULL AUTO_INCREMENT,
  `id_emprestimo` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `pagamento_multa` int(11) NOT NULL,
  PRIMARY KEY (`id_multa`),
  KEY `id_emprestimo` (`id_emprestimo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `multa`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `texto`
--

CREATE TABLE IF NOT EXISTS `texto` (
  `id_texto` int(11) NOT NULL AUTO_INCREMENT,
  `id_acervo` int(11) NOT NULL,
  `edicao_texto` varchar(21) NOT NULL,
  `idioma_texto` varchar(50) NOT NULL,
  `imprenta_texto` varchar(50) NOT NULL,
  `tipo_colecao_texto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_texto`,`id_acervo`),
  KEY `id_acervo` (`id_acervo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `texto`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_aquisicao`
--

CREATE TABLE IF NOT EXISTS `tipo_aquisicao` (
  `id_tipo_aquisicao` int(11) NOT NULL,
  `tipo_aquisicao` varchar(7) NOT NULL,
  `descricao_tipo_aquisicao` text NOT NULL,
  PRIMARY KEY (`id_tipo_aquisicao`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_aquisicao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_midia`
--

CREATE TABLE IF NOT EXISTS `tipo_midia` (
  `id_tipo_midia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao_tipo_midia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_midia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tipo_midia`
--

INSERT INTO `tipo_midia` (`id_tipo_midia`, `descricao_tipo_midia`) VALUES
(1, 'CD'),
(2, 'DVD'),
(3, 'Fita de Video');

-- --------------------------------------------------------

--
-- Estrutura da tabela `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `id_acervo` int(11) NOT NULL,
  `id_tipo_midia` int(10) unsigned NOT NULL,
  `cutter_video` varchar(12) NOT NULL,
  `cdd_video` varchar(25) NOT NULL,
  `idioma_video` varchar(25) NOT NULL,
  `local_video` varchar(35) NOT NULL,
  `editora_video` varchar(30) NOT NULL,
  `ano_video` date NOT NULL,
  `classificacao_video` varchar(25) NOT NULL,
  `tipo_colecao_video` varchar(20) NOT NULL,
  PRIMARY KEY (`id_video`,`id_acervo`),
  KEY `id_acervo` (`id_acervo`),
  KEY `id_tipo_midia` (`id_tipo_midia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `video`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
