
-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(10) CHARACTER SET latin1 NOT NULL,
  `title` int(60) NOT NULL,
  `author` varchar(60) CHARACTER SET latin1 NOT NULL,
  `publisher` varchar(60) CHARACTER SET latin1 NOT NULL,
  `publication_year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `request_date` datetime NOT NULL,
  `response_data` datetime NOT NULL,
  `return_history` datetime NOT NULL,
  `status` varchar(7) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_job_number` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `secret_answer` varchar(40) NOT NULL,
  `secret_question` varchar(40) NOT NULL,
  `phonenumber_number` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department_num` int(60) NOT NULL,
  `college_num` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_job_number` (`user_job_number`),
  UNIQUE KEY `user_name` (`email`),
  UNIQUE KEY `phonenumber_number` (`phonenumber_number`),
  KEY `user_job_number_2` (`user_job_number`),
  KEY `role_id` (`role_id`),
  KEY `role_id_2` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


SET NAMES utf8mb4;

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `id` int(11) unsigned NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2017-12-03 08:56:08