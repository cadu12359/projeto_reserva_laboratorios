/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `laboratorio` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `lab_nome` varchar(100) DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `laboratorio` DISABLE KEYS */;
INSERT INTO `laboratorio` (`id`, `lab_nome`, `tipo`) VALUES
	(1, 'Laboratório de informática 1', 'informatica'),
	(2, 'Laboratório de informática 2', 'informatica'),
	(3, 'Laboratório de informática 3', 'informatica'),
	(4, 'Laboratório de química 1', 'Química'),
	(5, 'Laboratório de química 2', 'Química'),
	(6, 'Laboratório de química 3', 'Química'),
	(7, 'Laboratório de Engenharia Elétrica1', 'Engenharia'),
	(8, 'Laboratório de Engenharia Elétrica 2', 'Engenharia'),
	(9, 'Laboratório de Engenharia Elétrica 3', 'Engenharia');
/*!40000 ALTER TABLE `laboratorio` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `horaIni` time NOT NULL,
  `horaFin` time NOT NULL,
  `fk_usuario` int(30) NOT NULL,
  `fk_laboratorio` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_laboratorio` (`fk_laboratorio`),
  KEY `fk_usuario` (`fk_usuario`),
  CONSTRAINT `fk_laboratorio` FOREIGN KEY (`fk_laboratorio`) REFERENCES `laboratorio` (`id`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` (`id`, `data`, `horaIni`, `horaFin`, `fk_usuario`, `fk_laboratorio`) VALUES
	(1, '2018-10-24', '15:00:00', '16:00:00', 18, 2),
	(2, '2018-10-24', '15:00:00', '14:00:00', 33, 2),
	(3, '2018-10-24', '15:00:00', '14:00:00', 33, 2),
	(4, '2018-10-24', '15:00:00', '14:00:00', 33, 2),
	(5, '2018-10-24', '15:00:00', '14:00:00', 33, 2),
	(6, '2018-10-24', '15:00:00', '14:00:00', 33, 2),
	(7, '2018-10-24', '15:00:00', '14:00:00', 33, 2),
	(8, '2018-10-24', '15:00:00', '14:00:00', 33, 3),
	(9, '2018-10-24', '15:00:00', '18:00:00', 33, 3),
	(10, '2018-10-24', '15:00:00', '16:00:00', 33, 5),
	(11, '2018-10-24', '18:00:00', '16:00:00', 33, 2),
	(12, '2018-11-06', '08:00:00', '09:00:00', 33, 2),
	(13, '2018-11-16', '12:00:00', '14:00:00', 33, 3);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `email` text NOT NULL,
  `senha` varchar(200) NOT NULL,
  `nascimento` date NOT NULL,
  `matricula` int(200) NOT NULL,
  `telefone` int(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `nascimento`, `matricula`, `telefone`) VALUES
	(1, 'cadu', '', '128216032e1b3128effd0c004d2b13b1', '0000-00-00', 0, NULL),
	(2, 'teste', '', '698dc19d489c4e4db73e28a713eab07b', '0000-00-00', 0, NULL),
	(18, 'Carlos Eduardo Santos Lima', 'cadu@absistemas.com.brbr', '53fb367ca03c7ab2f1186a2ba74a55d5', '1998-05-06', 2010, 993819553),
	(31, 'Carlos Eduardo Santos Lima', 'cadu@absistemas.com.br', '53fb367ca03c7ab2f1186a2ba74a55d5', '1998-05-06', 1312, 13),
	(33, 'teste', 'teste@teste', '698dc19d489c4e4db73e28a713eab07b', '2018-05-02', 1, 1),
	(35, 'eduardo', 'eduardo12359@hotmail.com', '379ef4bd50c30e261ccfb18dfc626d9f', '1998-05-06', 13, 13);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
