-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.12-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela reservas.laboratorio
CREATE TABLE IF NOT EXISTS `laboratorio` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela reservas.laboratorio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `laboratorio` DISABLE KEYS */;
INSERT INTO `laboratorio` (`id`, `nome`, `tipo`) VALUES
	(1, 'Laboratório de informática', 'informatica'),
	(2, 'Laboratório de química', 'Química'),
	(3, 'Laboratório de Engenharia Elétrica', 'Engenharia');
/*!40000 ALTER TABLE `laboratorio` ENABLE KEYS */;

-- Copiando estrutura para tabela reservas.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `fk_solicitante` int(30) NOT NULL,
  `fk_laboratorio` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_solicitante` (`fk_solicitante`),
  KEY `fk_laboratorio` (`fk_laboratorio`),
  CONSTRAINT `fk_laboratorio` FOREIGN KEY (`fk_laboratorio`) REFERENCES `laboratorio` (`id`),
  CONSTRAINT `fk_solicitante` FOREIGN KEY (`fk_solicitante`) REFERENCES `solicitante` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela reservas.reserva: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Copiando estrutura para tabela reservas.solicitante
CREATE TABLE IF NOT EXISTS `solicitante` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telefone` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela reservas.solicitante: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitante` DISABLE KEYS */;
INSERT INTO `solicitante` (`id`, `nome`, `email`, `telefone`) VALUES
	(2, 'cadu', 'cadu@absistemas', 123),
	(3, 'ze', 'ze@absistemas.com.br', 789456);
/*!40000 ALTER TABLE `solicitante` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
