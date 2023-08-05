
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `highlights` text DEFAULT NULL,
  `contents` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `modules` text DEFAULT NULL,
  `enhanced_learning` text DEFAULT NULL,
  `credit_scheme` text DEFAULT NULL,
  `entry_requirements` text DEFAULT NULL,
  `fees_and_funding` text DEFAULT NULL,
  `faqs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `overview`, `highlights`, `contents`, `details`, `modules`, `enhanced_learning`, `credit_scheme`, `entry_requirements`, `fees_and_funding`, `faqs`) VALUES
(1, 'Data Science 101', 'An introductory course for Data Science...', 'Learn from expert instructors, work on real-world projects...', 'Module 1: Introduction to Data Science, Module 2: Statistics, ...', 'This course covers basic to intermediate concepts of data science...', 'Module 1, Module 2, ...', 'Interactive quizzes, hands-on projects, peer feedback...', '30', 'No previous knowledge required...', 'Tuition fee is $500...', 'Q: What is the duration of this course? A: It is a 6-months course...'),
(2, 'Python Programming', 'A comprehensive course on Python programming...', 'Master the fundamentals of Python, build real-world projects...', 'Module 1: Introduction to Python, Module 2: Control Statements, ...', 'This course covers all the essential aspects of Python programming...', 'Module 1, Module 2, ...', 'Interactive coding exercises, practical assignments, quizzes...', '30', 'Basic understanding of programming concepts...', 'Tuition fee is $400...', 'Q: Is this course suitable for beginners? A: Yes, this course is beginner-friendly...');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'syem', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
