CREATE DATABASE todolist;

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `task` varchar(45) NOT NULL,
  `completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `todos` (`id`, `task`, `completed`) VALUES
(114, 'Task 1', 1),
(115, 'Task 2', 0);

ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
