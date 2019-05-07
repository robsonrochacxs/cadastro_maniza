-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 07/05/2019 às 23:05
-- Versão do servidor: 5.7.23
-- Versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Banco de dados: `manix`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `razao_social` varchar(55) NOT NULL,
  `fantasia` varchar(55) NOT NULL,
  `pessoa` enum('fisica','juridica') NOT NULL,
  `cpf` varchar(55) NOT NULL,
  `rg` varchar(55) NOT NULL,
  `cnpj` varchar(55) NOT NULL,
  `ie` varchar(55) NOT NULL,
  `criado_em` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes_contatos`
--

CREATE TABLE `clientes_contatos` (
  `id_cliente_contato` int(11) NOT NULL,
  `id_prospect` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `telefone` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `observacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `prospects`
--

CREATE TABLE `prospects` (
  `id_prospect` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `criado_em` datetime NOT NULL,
  `contato` varchar(55) NOT NULL,
  `telefone` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `prospects_contato`
--

CREATE TABLE `prospects_contato` (
  `id_prospect_contato` int(11) NOT NULL,
  `id_prospect` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `telefone` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `observacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `clientes_contatos`
--
ALTER TABLE `clientes_contatos`
  ADD PRIMARY KEY (`id_cliente_contato`);

--
-- Índices de tabela `prospects`
--
ALTER TABLE `prospects`
  ADD PRIMARY KEY (`id_prospect`);

--
-- Índices de tabela `prospects_contato`
--
ALTER TABLE `prospects_contato`
  ADD PRIMARY KEY (`id_prospect_contato`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes_contatos`
--
ALTER TABLE `clientes_contatos`
  MODIFY `id_cliente_contato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prospects`
--
ALTER TABLE `prospects`
  MODIFY `id_prospect` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prospects_contato`
--
ALTER TABLE `prospects_contato`
  MODIFY `id_prospect_contato` int(11) NOT NULL AUTO_INCREMENT;
