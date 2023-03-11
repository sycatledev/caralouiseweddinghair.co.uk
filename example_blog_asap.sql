-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2023 at 03:58 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asap`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_slug` varchar(128) NOT NULL,
  `article_title` text NOT NULL,
  `article_content` longtext NOT NULL,
  `article_categories` json DEFAULT NULL,
  `article_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_visibility` varchar(10) NOT NULL DEFAULT 'private'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_slug`, `article_title`, `article_content`, `article_categories`, `article_date`, `article_visibility`) VALUES
(4, 'why-you-need-to-digitize-your-business', 'Why you need to digitize your business', '[{\"title\":\"The Benefits of Digitizing Your Business\",\"text\":\"Digitizing your business involves using digital technologies to streamline processes, improve efficiency, and enhance the customer experience. There are a number of benefits to digitizing your business, including increased productivity, improved customer satisfaction, and reduced costs.</br>By digitizing processes, businesses can automate many routine tasks, freeing up time for employees to focus on more complex and creative work. This can improve productivity and reduce errors, resulting in cost savings and improved efficiency. Additionally, digitization can improve the customer experience by making it easier and more convenient for customers to interact with your business. This can include offering online ordering and payment options, as well as personalized recommendations based on customer data.\"}, {\"title\": \"Overcoming the Challenges of Digitizing Your Business\", \"text\": \"While there are many benefits to digitizing your business, there are also a number of challenges that must be overcome. One of the biggest challenges is integrating digital technologies into existing business processes and systems. This requires careful planning and coordination to ensure that new technologies are properly integrated with existing workflows and systems.</br>Another challenge is ensuring that employees have the skills and training needed to work with new technologies. This requires investing in employee training and development programs, as well as providing ongoing support and resources to help employees adapt to new technologies. Additionally, businesses need to ensure that they have the necessary infrastructure and security measures in place to support digital technologies, including robust cybersecurity measures to protect against cyber threats. By overcoming these challenges, businesses can reap the benefits of digitization and stay competitive in an increasingly digital world.\"}]', '[1, 2, 4]', '2023-04-14 11:47:52', 'public'),
(5, 'what-will-artificial-intelligence-change-in-the-world', 'What artificial intelligence will change in the world', '[{\"title\":\"Artificial Intelligence and the Future of Work\",\"text\":\"Artificial intelligence (AI) is already transforming the world of work, and its impact is only going to increase in the coming years. As AI becomes more advanced and more ubiquitous, it is expected to transform the way we work, the jobs that are available, and the skills that are in demand. AI will automate many routine tasks, allowing workers to focus on more complex and creative work.</br>However, it will also eliminate some jobs entirely, particularly those that involve routine tasks or can be easily automated. This means that workers will need to adapt to new roles and develop new skills to stay competitive in the job market. Companies will need to invest in reskilling and upskilling their workforce to ensure that they have the skills needed to thrive in the AI-powered economy.\"}, {\"title\": \"The Ethical Implications of Artificial Intelligence\", \"text\": \"While AI has the potential to transform our world for the better, it also raises a number of ethical concerns. As AI becomes more advanced and more autonomous, there is a risk that it could make decisions that are harmful to humans or society as a whole. There are also concerns about bias in AI algorithms, which could perpetuate discrimination and inequality. To address these concerns, there is a need for ethical guidelines and regulations that ensure that AI is developed and deployed in a responsible and ethical manner. This includes ensuring that AI is transparent, accountable, and respectful of human rights. It also requires collaboration between governments, industry, and civil society to ensure that AI is used for the benefit of all. As we continue to develop and deploy AI, it is important that we do so in a way that is mindful of the ethical implications and that ensures that the benefits of AI are shared equitably.\"}]', '[1, 2, 4]', '2023-03-30 11:47:52', 'public'),
(6, 'the-challenges-of-cybersecurity', 'The challenges of cybersecurity', '[{\"title\":\"The Growing Importance of Cybersecurity\",\"text\":\"s more and more of our lives move online, cybersecurity has become an increasingly important issue. Cyberattacks can have devastating consequences, ranging from financial loss to reputational damage and even physical harm. As a result, individuals and organizations alike need to take steps to protect themselves from cyber threats.</br>One of the biggest challenges of cybersecurity is staying ahead of evolving threats. Hackers and other malicious actors are constantly developing new tactics and techniques to breach security systems, which means that cybersecurity professionals need to be constantly vigilant and adaptable. This requires ongoing investment in cybersecurity measures, as well as a commitment to training and development for cybersecurity professionals. Additionally, collaboration between different organizations and government agencies is critical to ensure that cybersecurity threats can be detected and addressed quickly and effectively.\"}, {\"title\": \"Balancing Security and Privacy in Cybersecurity\", \"text\": \"While cybersecurity is essential for protecting against cyber threats, it can also raise concerns about privacy. As organizations collect and store more and more data, there is a risk that this data could be misused or breached. This has led to a growing debate about how to balance the need for security with the need for privacy.</br>One solution is to adopt a \'privacy by design\' approach, where privacy considerations are integrated into the development of cybersecurity measures from the outset. This can include measures such as data minimization, where only the minimum amount of data necessary is collected and stored, as well as encryption and other security measures that protect data from unauthorized access. Additionally, organizations need to be transparent about their data collection and use practices, and ensure that individuals have control over their own data. Balancing security and privacy requires a nuanced approach that takes into account the specific risks and threats faced by each organization, as well as the rights and expectations of individuals.\"}]', '[1, 2, 4]', '2023-02-28 12:47:52', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(4) NOT NULL,
  `category_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Artificial Intelligence'),
(2, 'Business'),
(3, 'Cybersecurity'),
(4, 'Web');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
