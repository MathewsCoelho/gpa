-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Dez-2015 às 22:00
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gpa`
--

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` smallint(6) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `classificacao` enum('Aluno','Professor') DEFAULT NULL,
  `escolaridade` enum('Ensino Fundamental','Ensino Médio','Técnico','Ensino Superior','Pós-Graduação (Menstrado)','Pós-Graduação(Doutorado)','Pós-Graduação(Especialização)','Pós-Graduação(PHD)') DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `instituicao` varchar(100) DEFAULT NULL,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE IF NOT EXISTS `projeto` (
  `id_projeto` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome_projeto` varchar(19) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `status_projeto` enum('Em Andamento','Finalizado','Atrasado') DEFAULT NULL,
  `id_usuario` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_projeto`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE IF NOT EXISTS `tarefa` (
  `id_tarefa` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome_tarefa` varchar(19) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `status_tarefa` enum('Iniciada','Finalizada','Atrasada') DEFAULT NULL,
  `id_projeto` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_tarefa`),
  KEY `id_projeto` (`id_projeto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome_grupo` varchar(19) DEFAULT NULL,
  `id_usuario` smallint(6) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela 'convite'
--
CREATE TABLE IF NOT EXISTS `convite` (
  `id_convite` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_grupo` smallint(6) NOT NULL,
  `id_usuario` smallint(6) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_convite`),
  KEY `id_grupo` (`id_grupo`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela 'membro'
--
CREATE TABLE IF NOT EXISTS `membro` (
  `id_membro` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_grupo` smallint(6) NOT NULL,
  `id_usuario` smallint(6) DEFAULT NULL,
  `tipo` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_membro`),
  KEY `id_grupo` (`id_grupo`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `tarefa_ibfk_1` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id_projeto`);

--
-- Limitadores para a tabela `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `convite`
--
ALTER TABLE `convite`
  ADD CONSTRAINT `convite_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `convite_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);

--
-- Limitadores para a tabela `membro`
--
ALTER TABLE `membro`
  ADD CONSTRAINT `membro_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `membro_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
