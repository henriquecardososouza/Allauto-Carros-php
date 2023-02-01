-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Fev-2023 às 18:06
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `allauto_carros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Admin', 'a@admin', '$2y$10$/ESfXZk3HQ8f9z7WsAjm2e07ynswc81m6Y5uzYAjhTtgGp/bcy6TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `preco` varchar(50) NOT NULL,
  `image_slider` varchar(255) NOT NULL,
  `image_page_veiculos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `modelo`, `marca`, `preco`, `image_slider`, `image_page_veiculos`) VALUES
(1, 'BMW Série 5', 'BMW', 'R$ 450.950,00', 'img/products/1/slider.webp', 'img/products/1/page_veiculo.webp'),
(2, 'Mercedes Classe C', 'Mercedes Benz', 'R$ 359.900,00', 'img/products/2/slider.webp', 'img/products/2/page_veiculo.webp'),
(3, 'Volvo XC60', 'Volvo', 'R$ 465.950,00', 'img/products/3/slider.webp', 'img/products/3/page_veiculo.webp'),
(4, 'Corolla Cross 2023', 'Toyota', 'R$ 139.990,00', 'img/products/4/slider.webp', 'img/products/4/page_veiculo.webp'),
(5, 'Defender 130', 'Land Rover', 'R$ 900.000,00', 'img/products/5/slider.webp', 'img/products/5/page_veiculo.webp');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
