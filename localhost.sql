-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 26/04/2017 às 04:55
-- Versão do servidor: 5.7.17-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_news`
--
CREATE DATABASE IF NOT EXISTS `db_news` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_news`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_comments`
--

CREATE TABLE `tb_comments` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tb_comments`
--

INSERT INTO `tb_comments` (`id`, `news_id`, `user_id`, `comment`, `created_at`, `edited_at`) VALUES
(10, 15, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ip', '2017-04-26 04:23:43', NULL),
(11, 16, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ip', '2017-04-26 04:24:08', NULL),
(12, 16, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ip', '2017-04-26 04:24:12', NULL),
(13, 15, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ip', '2017-04-26 04:24:16', NULL),
(14, 16, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ip', '2017-04-26 04:24:21', NULL),
(15, 16, 9, 'Arise Arise Arise Arise Arise Arise Arise Arise Ar', '2017-04-26 04:25:30', NULL),
(16, 15, 9, 'Arise Arise Arise Arise Arise Arise Arise Arise Ar', '2017-04-26 04:25:33', NULL),
(17, 18, 9, 'Arise Arise Arise Arise Arise Arise Arise Arise Ar', '2017-04-26 04:25:36', NULL),
(18, 15, 8, 'Jason Jason Jason Jason Jason Jason Jason Jason ', '2017-04-26 04:26:12', NULL),
(19, 16, 8, 'Jason Jason Jason Jason Jason Jason Jason Jason ', '2017-04-26 04:26:16', NULL),
(20, 18, 8, 'Jason Jason Jason Jason Jason Jason Jason Jason ', '2017-04-26 04:26:18', NULL),
(21, 19, 8, 'Jason Jason Jason Jason Jason Jason Jason Jason ', '2017-04-26 04:26:20', NULL),
(22, 18, 8, 'Jason Jason Jason Jason Jason Jason Jason Jason ', '2017-04-26 04:26:22', NULL),
(23, 19, 7, 'Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Alla', '2017-04-26 04:26:50', NULL),
(24, 18, 7, 'Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Alla', '2017-04-26 04:26:53', NULL),
(25, 16, 7, 'Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Alla', '2017-04-26 04:26:58', NULL),
(26, 15, 7, 'Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Alla', '2017-04-26 04:27:02', NULL),
(27, 24, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ip', '2017-04-26 04:28:28', NULL),
(28, 21, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ip', '2017-04-26 04:28:31', NULL),
(30, 24, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ip', '2017-04-26 04:28:51', NULL),
(31, 23, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ip', '2017-04-26 04:28:54', NULL),
(32, 22, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ip', '2017-04-26 04:28:58', NULL),
(33, 23, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ip', '2017-04-26 04:29:01', NULL),
(34, 25, 8, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2017-04-26 04:54:55', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_news`
--

CREATE TABLE `tb_news` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tb_news`
--

INSERT INTO `tb_news` (`id`, `user_id`, `title`, `description`, `created_at`, `edited_at`) VALUES
(15, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ipsum vestibulum metus suscipit pharetra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean elementum augue augue, aliquam vestibulum dui ultricies in. Nunc posuere lorem sed nunc cursus posuere. Quisque malesuada volutpat velit, tincidunt tincidunt enim malesuada a. Proin semper nisl vitae lorem molestie aliquet. Sed et faucibus nisl, non porttitor dolor', '2017-04-26 04:23:26', NULL),
(16, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ipsum vestibulum metus suscipit pharetra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean elementum augue augue, aliquam vestibulum dui ultricies in. Nunc posuere lorem sed nunc cursus posuere. Quisque malesuada volutpat velit, tincidunt tincidunt enim malesuada a. Proin semper nisl vitae lorem molestie aliquet. Sed et faucibus nisl, non porttitor dolor', '2017-04-26 04:24:02', NULL),
(18, 9, 'Arise Arise Arise Arise Arise Arise Arise Arise Ar', 'Arise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise Ar', '2017-04-26 04:25:22', NULL),
(19, 8, 'Jason Jason Jason Jason Jason Jason Jason Jason ', 'Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Sexta Feira 13 Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Jason Ja', '2017-04-26 04:26:06', '2017-04-26 04:33:45'),
(20, 7, 'Allan Allan Allan Allan Allan Allan Allan Allan Al', 'Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan AllaAllan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan AllaAllan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan AllaAllan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan AllaAllan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Alla', '2017-04-26 04:27:16', NULL),
(21, 7, 'Allan Allan Allan Allan Allan Allan Allan Allan Al', 'Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan AllaAllan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan AllaAllan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan AllaAllan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan AllaAllan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Alla', '2017-04-26 04:27:21', NULL),
(22, 7, 'Allan Allan Allan Allan Allan Allan Allan Allan Al', 'Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan AllaAllan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan AllaAllan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan AllaAllan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan AllaAllan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Allan Alla', '2017-04-26 04:27:26', NULL),
(23, 9, 'Arise Arise Arise Arise Arise Arise Arise Arise Ar', 'Arise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise ArArise Arise Arise Arise Arise Arise Arise Arise Ar', '2017-04-26 04:27:53', NULL),
(24, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ipsum vestibulum metus suscipit pharetra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean elementum augue augue, aliquam vestibulum dui ultricies in. Nunc posuere lorem sed nunc cursus posuere. Quisque malesuada volutpat velit, tincidunt tincidunt enim malesuada a. Proin semper nisl vitae lorem molestie aliquet. Sed et faucibus nisl, non porttitor dolor', '2017-04-26 04:28:06', NULL),
(25, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et sagittis lorem. Maecenas eget ipsum vestibulum metus suscipit pharetra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean elementum augue augue, aliquam vestibulum dui ultricies in. Nunc posuere lorem sed nunc cursus posuere. Quisque malesuada volutpat velit, tincidunt tincidunt enim malesuada a. Proin semper nisl vitae lorem molestie aliquet. Sed et faucibus nisl, non porttitor dolor', '2017-04-26 04:28:44', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `tb_users`
--

INSERT INTO `tb_users` (`id`, `first_name`, `last_name`, `username`, `password`, `avatar`) VALUES
(7, 'Allan', 'Viana', 'allan', 'allan', NULL),
(8, 'Jason', 'Sobreiro', 'jason', 'jason', NULL),
(9, 'Sarise', 'Kamanda', 'arise', 'arise', NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_comments_fk0` (`news_id`),
  ADD KEY `tb_comments_fk1` (`user_id`);

--
-- Índices de tabela `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_news_fk0` (`user_id`);

--
-- Índices de tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de tabela `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD CONSTRAINT `tb_comments_fk0` FOREIGN KEY (`news_id`) REFERENCES `tb_news` (`id`),
  ADD CONSTRAINT `tb_comments_fk1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`);

--
-- Restrições para tabelas `tb_news`
--
ALTER TABLE `tb_news`
  ADD CONSTRAINT `tb_news_fk0` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
