-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para bombeiro
CREATE DATABASE IF NOT EXISTS `bombeiro` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bombeiro`;

-- Copiando estrutura para tabela bombeiro.agendamento
CREATE TABLE IF NOT EXISTS `agendamento` (
  `idAgendamento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idBombeiro` int(10) unsigned NOT NULL,
  `idUnidade` int(10) unsigned NOT NULL,
  `entrada` datetime DEFAULT NULL,
  `saida` datetime DEFAULT NULL,
  `duracao` datetime DEFAULT NULL,
  `infoAdicional` varchar(255) DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT NULL,
  `motivoRecusa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idAgendamento`,`idBombeiro`,`idUnidade`),
  KEY `idBombeiro` (`idBombeiro`),
  KEY `idUnidade` (`idUnidade`),
  CONSTRAINT `agendamento_ibfk_1` FOREIGN KEY (`idBombeiro`) REFERENCES `bombeiro` (`idBombeiro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `agendamento_ibfk_2` FOREIGN KEY (`idUnidade`) REFERENCES `unidade` (`idUnidade`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.agendamento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `agendamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendamento` ENABLE KEYS */;

-- Copiando estrutura para tabela bombeiro.bombeiro
CREATE TABLE IF NOT EXISTS `bombeiro` (
  `idBombeiro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idPessoa` int(10) unsigned NOT NULL,
  `idGraduacao` int(10) unsigned NOT NULL,
  `anoGraduacao` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idBombeiro`),
  KEY `idPessoa` (`idPessoa`),
  KEY `idGraduacao` (`idGraduacao`),
  CONSTRAINT `bombeiro_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `bombeiro_ibfk_2` FOREIGN KEY (`idGraduacao`) REFERENCES `graduacao` (`idGraduacao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.bombeiro: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `bombeiro` DISABLE KEYS */;
/*!40000 ALTER TABLE `bombeiro` ENABLE KEYS */;

-- Copiando estrutura para tabela bombeiro.cursos
CREATE TABLE IF NOT EXISTS `cursos` (
  `idCursos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idBombeiro` int(10) unsigned NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCursos`),
  KEY `idBombeiro` (`idBombeiro`),
  CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`idBombeiro`) REFERENCES `bombeiro` (`idBombeiro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.cursos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;

-- Copiando estrutura para tabela bombeiro.endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `idEndereco` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `endereco` varchar(100) DEFAULT NULL,
  `pontoRelevancia` varchar(100) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEndereco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.endereco: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;

-- Copiando estrutura para tabela bombeiro.graduacao
CREATE TABLE IF NOT EXISTS `graduacao` (
  `idGraduacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sequencia` int(10) unsigned DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idGraduacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.graduacao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `graduacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `graduacao` ENABLE KEYS */;

-- Copiando estrutura para tabela bombeiro.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(50) DEFAULT NULL,
  `LINK` varchar(50) DEFAULT NULL,
  `ICONE` varchar(50) DEFAULT NULL,
  `ORDEM` int(10) DEFAULT NULL,
  `LEVEL` int(10) DEFAULT NULL,
  `PARENT` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_menu_menu` (`PARENT`),
  CONSTRAINT `FK_menu_menu` FOREIGN KEY (`PARENT`) REFERENCES `menu` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.menu: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`ID`, `DESCRICAO`, `LINK`, `ICONE`, `ORDEM`, `LEVEL`, `PARENT`) VALUES
	(1, 'Menu', '#', NULL, 0, 0, NULL),
	(2, 'Dashboard', '/dashboard/', 'fa fa-fw fa-dashboard', 1, 1, 1),
	(3, 'Menu', '/menu/list.php', 'fa fa-sitemap', 2, 1, 1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Copiando estrutura para tabela bombeiro.organizacao
CREATE TABLE IF NOT EXISTS `organizacao` (
  `idOrganizacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idOrganizacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.organizacao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `organizacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `organizacao` ENABLE KEYS */;

-- Copiando estrutura para tabela bombeiro.pessoa
CREATE TABLE IF NOT EXISTS `pessoa` (
  `idPessoa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idTipoPessoa` int(10) unsigned NOT NULL,
  `idEndereco` int(10) unsigned NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `nomeGuerra` varchar(100) DEFAULT NULL,
  `rg` varchar(9) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `dtNascimento` datetime DEFAULT NULL,
  `cns` varchar(20) DEFAULT NULL,
  `alergias` varchar(255) DEFAULT NULL,
  `seguroVida` tinyint(1) DEFAULT NULL,
  `planoSaude` varchar(255) DEFAULT NULL,
  `inativo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idPessoa`),
  KEY `idEndereco` (`idEndereco`),
  KEY `idTipoPessoa` (`idTipoPessoa`),
  CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`idEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pessoa_ibfk_2` FOREIGN KEY (`idTipoPessoa`) REFERENCES `tipopessoa` (`idTipoPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.pessoa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;

-- Copiando estrutura para tabela bombeiro.telefone
CREATE TABLE IF NOT EXISTS `telefone` (
  `idTelefone` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ddd` int(10) unsigned DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idTelefone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.telefone: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefone` ENABLE KEYS */;

-- Copiando estrutura para tabela bombeiro.telefonespessoa
CREATE TABLE IF NOT EXISTS `telefonespessoa` (
  `idTelefone` int(10) unsigned NOT NULL,
  `idPessoa` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idTelefone`,`idPessoa`),
  KEY `idPessoa` (`idPessoa`),
  CONSTRAINT `telefonespessoa_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `telefonespessoa_ibfk_2` FOREIGN KEY (`idTelefone`) REFERENCES `telefone` (`idTelefone`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.telefonespessoa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `telefonespessoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefonespessoa` ENABLE KEYS */;

-- Copiando estrutura para tabela bombeiro.tipopessoa
CREATE TABLE IF NOT EXISTS `tipopessoa` (
  `idTipoPessoa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  `nivelPermissao` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idTipoPessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.tipopessoa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipopessoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipopessoa` ENABLE KEYS */;

-- Copiando estrutura para tabela bombeiro.unidade
CREATE TABLE IF NOT EXISTS `unidade` (
  `idUnidade` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idEndereco` int(10) unsigned NOT NULL,
  `idOrganizacao` int(10) unsigned NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `minEscala` time DEFAULT NULL,
  `maxEscala` time DEFAULT NULL,
  PRIMARY KEY (`idUnidade`),
  KEY `idEndereco` (`idEndereco`),
  KEY `idOrganizacao` (`idOrganizacao`),
  CONSTRAINT `unidade_ibfk_1` FOREIGN KEY (`idEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `unidade_ibfk_2` FOREIGN KEY (`idOrganizacao`) REFERENCES `organizacao` (`idOrganizacao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.unidade: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `unidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `unidade` ENABLE KEYS */;

-- Copiando estrutura para tabela bombeiro.vagasunidade
CREATE TABLE IF NOT EXISTS `vagasunidade` (
  `idUnidade` int(10) unsigned NOT NULL,
  `idTipoPessoa` int(10) unsigned NOT NULL,
  `quantidade` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idUnidade`,`idTipoPessoa`),
  KEY `idTipoPessoa` (`idTipoPessoa`),
  CONSTRAINT `vagasunidade_ibfk_1` FOREIGN KEY (`idUnidade`) REFERENCES `unidade` (`idUnidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vagasunidade_ibfk_2` FOREIGN KEY (`idTipoPessoa`) REFERENCES `tipopessoa` (`idTipoPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bombeiro.vagasunidade: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vagasunidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `vagasunidade` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
