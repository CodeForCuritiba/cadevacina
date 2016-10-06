-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 29-Set-2016 às 02:59
-- Versão do servidor: 5.6.28
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `vacina`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadVacinas`
--

CREATE TABLE `cadVacinas` (
  `id` int(11) NOT NULL,
  `DataCadastro` varchar(45) DEFAULT NULL,
  `NomeContato` varchar(45) DEFAULT NULL,
  `Endereco` text,
  `EmailOrigem` varchar(45) DEFAULT NULL,
  `NomeVacina` varchar(45) DEFAULT NULL,
  `DataValidade` varchar(45) DEFAULT NULL,
  `NumTelefone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadVacinas`
--
ALTER TABLE `cadVacinas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadVacinas`
--
ALTER TABLE `cadVacinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;