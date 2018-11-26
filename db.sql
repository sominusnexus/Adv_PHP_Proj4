SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Task`;
CREATE TABLE `Task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) NOT NULL,
  `created_by_user` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Task` (`id`, `description`, `created_by_user`) VALUES
(99,	'Finish this project',	'FuckBalls'),
(100,	'Drink Beer Tonight',	'Pippin'),
(101,	'Configure Raspberry Pi',	'Pippin'),
(102,	'Get Beer before 9:00 PM',	'Pippin'),
(103,	'Configure Raspberry Pi',	'Pippin'),
(104,	'Eat The Burritos',	'Pippin'),
(105,	'Test Task',	'Pippin'),
(106,	'Walk the Dog',	'Pippin'),
(107,	'Configure Raspberry Pi',	'Pippin'),
(108,	'Eat The Burritos',	'Pippin'),
(109,	'Drink Beer Tonight',	'Pippin');

DROP TABLE IF EXISTS `Task_Stats`;
CREATE TABLE `Task_Stats` (
  `username` varchar(250) NOT NULL,
  `Create` int(11) NOT NULL DEFAULT '0',
  `Read` int(11) NOT NULL DEFAULT '0',
  `ReadAll` int(11) NOT NULL DEFAULT '0',
  `Update` int(11) NOT NULL DEFAULT '0',
  `Delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Task_Stats` (`username`, `Create`, `Read`, `ReadAll`, `Update`, `Delete`) VALUES
('FuckBalls',	2,	0,	0,	0,	0),
('Pippin',	10,	0,	0,	0,	0);

DROP TABLE IF EXISTS `Task_User`;
CREATE TABLE `Task_User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Task_User` (`id`, `username`, `user_pass`, `created`) VALUES
(51,	'FuckBalls',	'$2y$10$s.NzqLpQek3spmCPM3yvIOCFC40sXZ.mc8roQbHwPbY9xBZtP4ETq',	'2018-11-25 14:42:46'),
(52,	'Pippin',	'$2y$10$e.koRPv0GV6drhAt8O1KZe2xiOcnuN1xTC53a1DrFtQbu1CMNlFO2',	'2018-11-25 14:47:50');