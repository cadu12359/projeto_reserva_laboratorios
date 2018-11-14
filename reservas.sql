-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.34-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando dados para a tabela reservas.laboratorio: ~9 rows (aproximadamente)
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

-- Copiando dados para a tabela reservas.reserva: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` (`id`, `data`, `horaIni`, `horaFin`, `fk_usuario`, `fk_laboratorio`) VALUES
	(1, '2018-10-29', '06:00:00', '07:00:00', 33, 4);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Copiando dados para a tabela reservas.solicitante: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitante` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitante` ENABLE KEYS */;

-- Copiando dados para a tabela reservas.usuario: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `nascimento`, `matricula`, `telefone`) VALUES
	(1, 'cadu', '', '128216032e1b3128effd0c004d2b13b1', '0000-00-00', 0, NULL),
	(4, 'teste', '', '698dc19d489c4e4db73e28a713eab07b', '0000-00-00', 0, NULL),
	(18, 'Carlos Eduardo Santos Lima', 'cadu@absistemas.com.brbr', '53fb367ca03c7ab2f1186a2ba74a55d5', '1998-05-06', 2010, 993819553),
	(19, 'ze pequeno', 'ze@ze', '98b456a0723fa616284a632d9d31821b', '1995-05-05', 1313213123, 12313),
	(31, 'Carlos Eduardo Santos Lima', 'cadu@absistemas.com.br', '53fb367ca03c7ab2f1186a2ba74a55d5', '1998-05-06', 1312, 13),
	(33, 'teste', 'teste@teste', '698dc19d489c4e4db73e28a713eab07b', '2018-05-02', 1, 1),
	(34, 'dudu', 'dudu@dudu', 'b247deafa97a5122eef246b489074c5d', '2000-05-05', 987, 987);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
