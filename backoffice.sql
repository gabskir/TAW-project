-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Jun 2024 um 19:08
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `backoffice`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `authors` varchar(250) NOT NULL,
  `upvotes` int(11) NOT NULL DEFAULT 0,
  `pdf_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `articles`
--

INSERT INTO `articles` (`id`, `title`, `authors`, `upvotes`, `pdf_link`) VALUES
(1, 'Machine Learning Basics', 'Alice Smith, Bob Johnson', 120, 'article.pdf'),
(2, 'Advanced AI Techniques', 'Charlie Brown', 250, 'http://example.com/ai_techniques.pdf'),
(3, 'Introduction to Neural Networks', 'David Wilson', 98, 'http://example.com/neural_networks.pdf'),
(4, 'Deep Learning for Image Recognition', 'Eve Davis', 320, 'http://example.com/deep_learning.pdf'),
(5, 'Natural Language Processing', 'Frank Miller', 150, 'http://example.com/nlp.pdf'),
(6, 'Big Data Analytics', 'Grace Lee', 210, 'http://example.com/big_data.pdf'),
(7, 'Quantum Computing 101', 'Henry Kim', 80, 'http://example.com/quantum_computing.pdf'),
(8, 'Blockchain Technology', 'Ivy White', 300, 'http://example.com/blockchain.pdf'),
(9, 'Cybersecurity Essentials', 'Jack Green', 170, 'http://example.com/cybersecurity.pdf'),
(10, 'Internet of Things (IoT)', 'Karen Black', 140, 'http://example.com/iot.pdf'),
(11, 'Data Science for Beginners', 'Laura Martinez', 60, 'http://example.com/data_science.pdf'),
(12, 'Artificial Intelligence Ethics', 'Mike Anderson', 220, 'http://example.com/ai_ethics.pdf'),
(13, 'Augmented Reality Applications', 'Nina Perez', 180, 'http://example.com/ar_applications.pdf'),
(14, 'Robotics in Healthcare', 'Oscar Thomas', 110, 'http://example.com/robotics_healthcare.pdf'),
(15, 'Cloud Computing Fundamentals', 'Paul Walker', 200, 'http://example.com/cloud_computing.pdf'),
(16, 'Edge Computing', 'Quincy Hall', 90, 'http://example.com/edge_computing.pdf'),
(17, '5G Networks', 'Rachel Adams', 160, 'http://example.com/5g_networks.pdf'),
(18, 'Bioinformatics', 'Steve Clark', 130, 'http://example.com/bioinformatics.pdf'),
(19, 'Autonomous Vehicles', 'Tom Baker', 175, 'http://example.com/autonomous_vehicles.pdf'),
(20, 'Smart Cities', 'Uma Wilson', 85, 'http://example.com/smart_cities.pdf');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `full_title` varchar(255) DEFAULT NULL,
  `paragraph` text DEFAULT NULL,
  `publish_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `content`
--

INSERT INTO `content` (`id`, `full_title`, `paragraph`, `publish_date`) VALUES
(1, 'Machine Learning Basics', 'Machine learning is a branch of artificial intelligence (AI) and computer science which focuses on the use of data and algorithms to imitate the way that humans learn, gradually improving its accuracy.', '2024-01-15 10:00:00'),
(2, 'Advanced AI Techniques', 'Advanced AI techniques involve the use of complex algorithms and models to solve intricate problems and improve decision-making processes.', '2024-02-20 11:30:00'),
(3, 'Introduction to Neural Networks', 'Neural networks are a series of algorithms that mimic the operations of a human brain to recognize relationships between vast amounts of data.', '2024-03-05 09:45:00'),
(4, 'Deep Learning for Image Recognition', 'Deep learning is a subset of machine learning where artificial neural networks, algorithms inspired by the human brain, learn from large amounts of data.', '2024-03-22 14:20:00'),
(5, 'Natural Language Processing', 'Natural Language Processing (NLP) is a field of artificial intelligence that gives machines the ability to read, understand, and derive meaning from human languages.', '2024-04-10 16:00:00'),
(6, 'Big Data Analytics', 'Big Data analytics is the process of examining large and varied data sets to uncover hidden patterns, unknown correlations, market trends, and other useful information.', '2024-04-18 13:40:00'),
(7, 'Quantum Computing 101', 'Quantum computing is a type of computation that harnesses the collective properties of quantum states, such as superposition, interference, and entanglement, to perform calculations.', '2024-05-01 10:50:00'),
(8, 'Blockchain Technology', 'Blockchain is a decentralized ledger of all transactions across a network that allows data to be stored globally on thousands of servers while letting anyone on the network see everyone else’s entries in real-time.', '2024-05-15 09:30:00'),
(9, 'Cybersecurity Essentials', 'Cybersecurity is the practice of protecting systems, networks, and programs from digital attacks which are usually aimed at accessing, changing, or destroying sensitive information.', '2024-06-05 12:15:00'),
(10, 'Internet of Things (IoT)', 'The Internet of Things (IoT) describes the network of physical objects—“things”—that are embedded with sensors, software, and other technologies for the purpose of connecting and exchanging data with other devices and systems over the internet.', '2024-06-20 11:00:00'),
(11, 'Data Science for Beginners', 'Data science is an inter-disciplinary field that uses scientific methods, processes, algorithms and systems to extract knowledge and insights from structured and unstructured data.', '2024-07-10 10:25:00'),
(12, 'Artificial Intelligence Ethics', 'AI ethics is a system of moral principles and techniques intended to inform the development and responsible use of artificial intelligence technologies.', '2024-07-25 14:55:00'),
(13, 'Augmented Reality Applications', 'Augmented reality (AR) is an interactive experience of a real-world environment where the objects that reside in the real world are enhanced by computer-generated perceptual information.', '2024-08-05 15:30:00'),
(14, 'Robotics in Healthcare', 'Robotics in healthcare refers to the use of robots in various medical applications such as surgery, therapy, and patient care to improve efficiency and outcomes.', '2024-08-18 09:40:00'),
(15, 'Cloud Computing Fundamentals', 'Cloud computing is the delivery of different services through the Internet, including data storage, servers, databases, networking, and software.', '2024-09-05 10:00:00'),
(16, 'Edge Computing', 'Edge computing is a distributed computing paradigm that brings computation and data storage closer to the location where it is needed to improve response times and save bandwidth.', '2024-09-20 11:45:00'),
(17, '5G Networks', '5G is the fifth generation technology standard for broadband cellular networks, which cellular phone companies began deploying worldwide in 2019, and is the planned successor to the 4G networks.', '2024-10-05 09:50:00'),
(18, 'Bioinformatics', 'Bioinformatics is an interdisciplinary field that develops methods and software tools for understanding biological data, especially when the data sets are large and complex.', '2024-10-20 14:10:00'),
(19, 'Autonomous Vehicles', 'An autonomous vehicle is a vehicle capable of sensing its environment and operating without human involvement.', '2024-11-05 16:30:00'),
(20, 'Smart Cities', 'Smart cities use information and communication technologies (ICT) to enhance the quality and performance of urban services such as energy, transportation, and utilities to reduce resource consumption, wastage, and overall costs.', '2024-11-20 12:20:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `content_area`
--

CREATE TABLE `content_area` (
  `case_id` int(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `paragraph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `content_area`
--

INSERT INTO `content_area` (`case_id`, `title`, `paragraph`) VALUES
(1, 'Welcome to our Conference App', 'Fell free to explore our page!'),
(2, 'Location', 'The Location of our Conference is in the Tagus River this year'),
(3, 'Other Information', 'We have very much additoonal Information');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `asked_at` datetime DEFAULT current_timestamp(),
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tracks`
--

INSERT INTO `tracks` (`id`, `name`, `description`) VALUES
(1, 'Machine Learning Basics', 'A comprehensive introduction to the fundamental concepts of machine learning, covering algorithms, models, and practical applications.'),
(2, 'Advanced AI Techniques', 'An in-depth exploration of advanced artificial intelligence techniques including reinforcement learning, deep learning, and neural networks.'),
(3, 'Introduction to Neural Networks', 'Learn the basics of neural networks, including their structure, function, and applications in various fields such as image and speech recognition.'),
(4, 'Deep Learning for Image Recognition', 'A specialized course on deep learning techniques used for image recognition, including convolutional neural networks and transfer learning.'),
(5, 'Natural Language Processing', 'An introduction to natural language processing (NLP), focusing on techniques for understanding and generating human language using machine learning.'),
(6, 'Big Data Analytics', 'Discover the tools and techniques used for big data analytics, including Hadoop, Spark, and data visualization methods.'),
(7, 'Quantum Computing 101', 'A beginner-friendly course on quantum computing principles, including qubits, quantum gates, and quantum algorithms.'),
(8, 'Blockchain Technology', 'Understand the fundamentals of blockchain technology, its applications, and its impact on industries such as finance, healthcare, and supply chain.'),
(9, 'Cybersecurity Essentials', 'An essential course on cybersecurity principles, covering threat identification, risk management, and best practices for securing digital systems.'),
(10, 'Internet of Things (IoT)', 'Explore the concepts and technologies behind the Internet of Things (IoT), including device connectivity, data communication, and real-world applications.'),
(11, 'Data Science for Beginners', 'A foundational course in data science, covering data analysis, visualization, and basic machine learning techniques using popular tools like Python and R.'),
(12, 'Artificial Intelligence Ethics', 'Examine the ethical considerations and societal impacts of artificial intelligence, including privacy, bias, and the future of work.'),
(13, 'Augmented Reality Applications', 'Learn about augmented reality (AR) technology and its applications in various fields, including gaming, education, and healthcare.'),
(14, 'Robotics in Healthcare', 'A course focused on the use of robotics in healthcare, including surgical robots, rehabilitation robots, and assistive devices.'),
(15, 'Cloud Computing Fundamentals', 'Understand the basics of cloud computing, including service models, deployment models, and key providers like AWS, Azure, and Google Cloud.'),
(16, 'Edge Computing', 'Learn about edge computing principles, where data processing occurs closer to the data source to reduce latency and improve efficiency.'),
(17, '5G Networks', 'An introduction to 5G technology, its architecture, benefits, and potential applications in areas like autonomous vehicles and smart cities.'),
(18, 'Bioinformatics', 'Explore the field of bioinformatics, which combines biology, computer science, and information technology to analyze biological data.'),
(19, 'Autonomous Vehicles', 'A detailed look at the technology behind autonomous vehicles, including sensors, machine learning algorithms, and navigation systems.'),
(20, 'Smart Cities', 'Understand the concept of smart cities, where information and communication technologies are used to enhance urban living through improved services and reduced resource consumption.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `upvotes`
--

CREATE TABLE `upvotes` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `content_area`
--
ALTER TABLE `content_area`
  ADD PRIMARY KEY (`case_id`);

--
-- Indizes für die Tabelle `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articles` (`article_id`);

--
-- Indizes für die Tabelle `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `upvotes`
--
ALTER TABLE `upvotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `content_area`
--
ALTER TABLE `content_area`
  MODIFY `case_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `upvotes`
--
ALTER TABLE `upvotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `fk_article` FOREIGN KEY (`id`) REFERENCES `articles` (`id`);

--
-- Constraints der Tabelle `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_articles` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Constraints der Tabelle `upvotes`
--
ALTER TABLE `upvotes`
  ADD CONSTRAINT `upvotes_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
