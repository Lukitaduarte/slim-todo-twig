-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Ago-2017 às 19:37
-- Versão do servidor: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `color` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id`, `category_name`, `color`, `status`) VALUES
(1, 'Work', '#0000ff', 1),
(2, 'Recreation', '#ff8000', 1),
(3, 'Family', '#008000', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `reminder_hour` varchar(255) NOT NULL,
  `reminder_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reminder`
--

INSERT INTO `reminder` (`id`, `id_task`, `reminder_hour`, `reminder_text`) VALUES
(1, 2, '09:00', 'REMEEEEEENBER! 19H'),
(2, 4, '13:30', 'FINISH HIM!'),
(3, 4, '13:32', 'YEP COMPLETED!'),
(4, 5, '16:00', 'Local: Parque Ayrton Senna'),
(5, 5, '17:00', 'Change of time!!! '),
(6, 5, '17:00', 'Play postponed for another day');

-- --------------------------------------------------------

--
-- Estrutura da tabela `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `task_title` varchar(255) NOT NULL,
  `task_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `task`
--

INSERT INTO `task` (`id`, `id_category`, `task_title`, `task_date`, `status`) VALUES
(1, 3, 'Take the dog for a walk', '2017-08-17', 1),
(2, 1, 'Before interview', '2017-08-18', 1),
(4, 1, 'Create a To-do list for Before Company', '2017-08-20', 1),
(5, 2, 'Play Soccer', '2017-08-20', 1),
(6, 2, 'Play Video Game', '2017-08-21', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_task` (`id_task`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `reminder_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `task` (`id`);

--
-- Limitadores para a tabela `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
