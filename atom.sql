-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 11:21 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atom`
--

-- --------------------------------------------------------

--
-- Table structure for table `ai_responses`
--

CREATE TABLE `ai_responses` (
  `id` int NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ai_responses`
--

INSERT INTO `ai_responses` (`id`, `keyword`, `response`) VALUES
(1, 'SMR vs Big Power Plant', 'Sure thing! Imagine SMRs as the tiny, agile ninjas of the nuclear world, sneaking into remote areas and setting up shop with minimal fuss. They’re like the IKEA of reactors—compact, efficient, and ready to assemble. On the other hand, traditional big power plants are the sumo wrestlers—massive, powerful, and capable of generating a colossal amount of energy, but they take their sweet time to get ready for action. So, whether you need a quick ninja fix or a sumo powerhouse, there’s a reactor for every occasion! 🥷💪'),
(2, 'SMR cost?', 'Alright, let’s talk numbers! 💸\n\nSMRs are like the budget-friendly superheroes of the nuclear world. Their construction costs can range from $2,000 to $6,000 per kilowatt (kW)1. For example, the NuScale SMR project has seen its costs rise to around $9.3 billion for a 462 MW plant, translating to about $20,139 per kW2. So, while they might not be as cheap as a cup of coffee, they’re still a pretty good deal in the nuclear universe! ☕💥\n\nGot any more questions or need more details? 😄'),
(3, 'Types of SMR', 'Alright, let’s break it down! 🛠️\n\nPWRs: The classic rockstars, using water as coolant.\nHTGRs: The spicy reactors with helium coolant.\nMSRs: Smooth operators with molten salt.\nLMRs: Heavy metal reactors with liquid metal coolants.\nHope that helps! 😄'),
(4, 'Maintain SMR?', 'Maintaining an SMR is like keeping a high-tech gadget in top shape! 🛠️\n\n1. Preventive Maintenance: Regular check-ups to keep things running smoothly.\n2. Corrective Maintenance: Fixing any hiccups that pop up.\n3. Predictive Maintenance: Using data to predict and prevent future issues.\n\nIt\'s all about keeping that reactor happy and healthy! 😄'),
(5, 'advantages', 'SMRs are like the Swiss Army knives of the nuclear world! 🛠️\n\nLower Costs: They’re cheaper to build and maintain.\nFlexibility: Perfect for remote or small areas.\nScalability: Add more modules as needed.\nSafety: Enhanced safety features compared to older designs12.\nPretty nifty, right? 😄'),
(6, 'Safety Installation?', 'Installing an SMR is like setting up a high-tech fortress! 🏰\n\nPassive Safety Systems: Uses natural forces like gravity and convection—no need for fancy gadgets1.\nSimpler Design: Fewer moving parts mean fewer things to go wrong1.\nLower Core Power: Gives operators more time to react in emergencies1.\nModular Setup: Easy to transport and assemble, like a giant LEGO set2.\nSafety first, fun always! 😄'),
(7, 'Any Coolants?', 'Absolutely! SMRs have some cool coolants! ❄️\n\nLight Water: The classic, like a refreshing splash of H2O.\nGas: Helium or carbon dioxide, adding a breezy touch.\nLiquid Metal: Sodium or lead, like molten metal rockstars.\nMolten Salt: Smooth and flowing, like liquid gold.\nPretty cool, right? 😄'),
(8, 'Function of SMR turbine', 'The SMR turbine is like the rockstar of the power plant, turning steam into electricity! 🎸\n\nSteam In: High-pressure steam hits the turbine blades.\nSpin Time: The blades spin like a DJ at a party.\nElectricity Out: The spinning generates electricity, powering up everything from your lights to your gadgets1.\nRock on, little turbine! 😄'),
(9, 'Elements used in SMR', 'SMRs are like the ultimate ingredient mix for a nuclear recipe! 🧑‍🍳\n\nUranium-235: The main star, splitting atoms like a pro.\nCoolants: Water, helium, sodium, or molten salt to keep things chill.\nControl Rods: Boron or cadmium to keep the reaction in check.\nIt’s a nuclear chef’s dream! 😄'),
(10, 'Main Fissionable Nuclei', 'The main fissionable nuclei in SMRs are like the VIPs of the nuclear party! 🎉\n\nUranium-235: The headliner, splitting atoms like a pro.\nPlutonium-239: The backup star, ready to rock the stage.\nThese nuclei know how to bring the energy! 😄');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `content`, `image_url`, `link`, `created_at`) VALUES
(1, 'Topography and Terrain', 'The future of nuclear energy is poised to undergo significant transformations as the world faces....', 'The physical landscape of Myanmar presents both opportunities and challenges for the placement of small power reactors. The country’s diverse topography, including its mountains, rivers, valleys, and plains, must be carefully evaluated to determine the most suitable locations for reactor construction. These factors play a significant role in the operational efficiency and environmental impact of the reactors.\n\nMountainous regions, while offering natural protection and isolation, may present challenges in construction and infrastructure development. The rugged terrain could increase the cost and complexity of building reactors and related infrastructure. Conversely, valleys and plains may provide more accessible and stable ground for construction but could be closer to densely populated areas, requiring additional measures to ensure safety and minimize environmental impact.\n\nWater sources are another critical consideration in site selection. Proximity to rivers or other bodies of water can provide the necessary cooling resources for reactors, but it also requires careful planning to avoid potential contamination and ensure sustainable water management. The terrain must support the safe and efficient operation of the reactors, taking into account both natural hazards and the need for long-term stability.\n', 'img/a2.jpg', 'article1.html', '2024-08-14 16:47:29'),
(2, 'Proximity to Infrastructure', 'Small Modular Reactors (SMRs) represent a new frontier in the field of nuclear energy. ', 'The success of small power reactors depends heavily on their proximity to essential infrastructure. This includes transportation networks, water sources, and existing power grids, all of which are vital for the construction, operation, and maintenance of the reactors. Strategic site selection should prioritize locations where these infrastructures are already in place or can be easily developed.\n\nTransportation infrastructure, such as roads, railways, and ports, is crucial for the delivery of materials and equipment during the construction phase and for the ongoing supply of resources needed for reactor operation. Sites near established transportation routes can reduce logistics costs and improve the efficiency of supply chains.\n\nAccess to water is another critical factor. Reactors typically require large quantities of water for cooling, so proximity to a reliable water source is essential. The site should be chosen with consideration for sustainable water use, ensuring that the reactor’s needs do not negatively impact local communities or ecosystems.\n\nFinally, connection to the existing power grid is essential for the efficient distribution of electricity generated by the reactors. Sites that are closer to power lines or substations can reduce the need for additional infrastructure, lowering costs and minimizing the environmental footprint of the project. The integration of the reactors into the national grid should also be planned to enhance grid stability and support the overall energy strategy of the country.', 'img/a3.jpg', 'article2.html', '2024-08-14 16:47:29'),
(3, 'Time Dimension ', 'Exploring the role of nuclear energy in achieving a sustainable, low-carbon future.', 'In the context of developing small modular reactors (SMRs) in Myanmar, it is crucial to consider the time dimension of electricity consumption. Understanding the daily electricity usage patterns of major cities, such as Yangon, Mandalay, Mawlamyine, and Hpa Kant, provides valuable insights into how SMRs can effectively meet the energy needs of these urban centers. Each city\'s electricity consumption varies significantly, with Yangon utilizing approximately 1,440 MW, Mandalay 35 MW, Mawlamyine 60 MW, and Hpa Kant 50 MW per day. This information is vital for evaluating how SMRs can contribute to the overall energy supply.\n\nWith a capacity of 300 MW(e), each SMR can provide a substantial amount of electricity. However, the total daily demand in these cities far exceeds the output of a single reactor. For instance, Yangon’s demand alone is more than four times the capacity of one SMR, which indicates that multiple reactors would be necessary to meet the electricity needs of this city. Conversely, cities like Mandalay, Mawlamyine, and Hpa Kant have much lower daily consumption levels, suggesting that a single SMR could potentially fulfill their energy requirements.\n\nIn addition to assessing current demand, it is essential to analyze peak usage times throughout the day. Understanding when electricity consumption peaks can help optimize the operation of SMRs, ensuring they produce sufficient energy during high-demand periods while avoiding overproduction during low-demand times. This strategic approach allows for better integration of SMRs into the energy grid, enhancing overall efficiency and reliability.\n\nFurthermore, incorporating time as a dimension in energy planning emphasizes the importance of flexible and responsive energy solutions.', 'img/a4.jpg', 'article3.html', '2024-08-14 16:47:29'),
(4, 'Geographical Location', 'An in-depth analysis of how SMRs are shaping the future of energy production.', 'Building a small modular reactor (SMR) requires careful consideration of various geographical and environmental factors. Key considerations include:\n\n1. Site Safety and Stability: The site must be geologically stable to minimize risks from earthquakes, landslides, or subsidence. A thorough geological survey is needed to assess these risks.\n\n2. Proximity to Water Sources: SMRs often need a reliable source of water for cooling. The site should be near a body of water, such as a river, lake, or ocean, but also account for potential impacts on local ecosystems and water availability.\n\n3. Access and Logistics: Adequate transportation infrastructure is necessary for delivering construction materials, reactor components, and operational supplies. This includes roads, ports, or railways.\n\n4. Regulatory and Environmental Compliance: The site must comply with local, national, and international regulations regarding environmental protection, radiation safety, and nuclear oversight.\n\n5. Population Density: SMRs are typically designed with safety in mind, but it\'s still important to consider the distance from populated areas to minimize impact in case of an emergency and to address public concerns.\n\n6. Climate and Weather Conditions: The local climate can affect cooling systems and overall reactor efficiency. Extreme weather conditions, such as hurricanes or heavy snowfall, should be considered in the design and site selection.\n\n7. Availability of Skilled Workforce: Proximity to a skilled workforce for construction, operation, and maintenance of the reactor is also crucial.\n\nThese factors collectively ensure that the SMR operates safely and efficiently while minimizing environmental and social impacts.', 'img/a1.jpg', 'https://example.com/articles/smr-future', '2024-08-15 06:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `bio`, `created_at`) VALUES
(1, 'Alice Johnson', 'Alice Johnson is a nuclear physicist with over 20 years of experience in the field. She specializes in nuclear fusion research and has published numerous papers on the subject.', '2024-08-14 02:30:00'),
(2, 'Bob Smith', 'Bob Smith is an energy policy analyst with a focus on nuclear energy. He has worked on various projects related to energy efficiency and sustainability.', '2024-08-14 03:00:00'),
(3, 'Charlie Davis', 'Charlie Davis is a nuclear engineer with expertise in reactor design and safety. He has been involved in several high-profile projects in the nuclear energy sector.', '2024-08-14 03:30:00'),
(4, 'Dana Lee', 'Dana Lee is a journalist covering energy and environmental issues. Her work often focuses on the impact of energy policies on climate change.', '2024-08-14 04:00:00'),
(5, 'Eva Martin', 'Eva Martin is an academic researcher specializing in nuclear technology and its applications. She is a frequent speaker at international conferences on energy.', '2024-08-14 04:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `author_id`, `created_at`) VALUES
(11, 'Introduction to Nuclear Energy', 'Nuclear energy is a powerful source of energy that is created by nuclear reactions. It is used in nuclear power plants to generate electricity. This article provides an overview of nuclear energy, its advantages, and its challenges.', 1, '2024-08-14 03:30:00'),
(12, 'The History of Nuclear Power', 'The history of nuclear power dates back to the early 20th century. This article explores the development of nuclear technology, from its discovery to its use in power plants today.', 2, '2024-08-15 03:30:00'),
(13, 'Nuclear Fusion: The Future of Energy?', 'Nuclear fusion has long been considered the holy grail of energy production. This article discusses the potential of nuclear fusion as a future energy source, the challenges involved, and recent advancements in research.', 3, '2024-08-16 03:30:00'),
(14, 'The Pros and Cons of Nuclear Energy', 'Nuclear energy offers several benefits, including low greenhouse gas emissions and high energy output. However, it also comes with risks and challenges. This article examines the pros and cons of nuclear energy and its role in the future energy landscape.', 4, '2024-08-17 03:30:00'),
(15, 'Nuclear Energy and Climate Change', 'Nuclear energy has the potential to play a significant role in combating climate change. This article discusses how nuclear power can contribute to reducing carbon emissions and achieving climate goals.', 5, '2024-08-18 03:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Hackatom', 'A discussion forum for everyone interested in nuclear energy.', '2024-08-14 02:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `channel_id` int DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `channel_id`, `message`, `created_at`) VALUES
(1, 1, 1, 'Hello', '2024-08-14 02:46:12'),
(2, 2, 1, 'Hi', '2024-08-14 02:47:12'),
(3, 2, 1, 'I am interested in nuclear energy\n', '2024-08-14 02:47:53'),
(5, 3, 1, 'i\'m also interested in nuclear energy\n', '2024-08-14 02:49:47'),
(8, 1, 1, 'i can share my knowledge about this ', '2024-08-14 03:08:04'),
(9, 3, 1, 'ohh thank u', '2024-08-14 03:08:24'),
(10, 1, 1, 'u\'re welcom', '2024-08-14 03:15:02'),
(11, 3, 1, 'when will we start', '2024-08-14 03:15:32'),
(12, 1, 1, 'tomorrow', '2024-08-14 03:15:40'),
(13, 1, 1, 'hello', '2024-08-14 03:25:20'),
(14, 3, 1, 'hello', '2024-08-14 03:25:35'),
(15, 1, 1, 'hi', '2024-08-14 03:25:58'),
(16, 5, 1, 'hello\n', '2024-08-14 03:44:28'),
(17, 3, 1, 'hi', '2024-08-14 03:44:37'),
(18, 1, 1, 'hello', '2024-08-14 14:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `created_at`) VALUES
(1, 1, 'Exploring the advancements in small modular reactors (SMRs) and their potential impact on nuclear energy.', '2024-08-14 02:30:00'),
(2, 1, 'How SMRs could revolutionize energy production and contribute to sustainability.', '2024-08-14 03:00:00'),
(3, 2, 'The role of SMRs in reducing carbon emissions and improving energy efficiency.', '2024-08-14 03:15:00'),
(4, 2, 'Challenges and opportunities in the development of small modular reactors.', '2024-08-14 03:30:00'),
(5, 3, 'The safety aspects of SMRs compared to traditional nuclear reactors.', '2024-08-14 03:45:00'),
(6, 3, 'Economic implications of adopting SMRs in various countries.', '2024-08-13 04:00:00'),
(7, 4, 'The technological innovations driving the development of small modular reactors.', '2024-08-14 04:15:00'),
(8, 4, 'Public perception and acceptance of SMRs as a viable energy source.', '2024-08-14 04:30:00'),
(9, 5, 'Comparing the benefits of SMRs to other renewable energy sources.', '2024-08-14 04:45:00'),
(10, 5, 'Future trends and research areas in the field of small modular reactors.', '2024-08-14 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staticchart`
--

CREATE TABLE `staticchart` (
  `c_id` int NOT NULL,
  `cityname` varchar(50) NOT NULL,
  `d1` int NOT NULL,
  `d2` int NOT NULL,
  `d3` int NOT NULL,
  `d4` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staticchart`
--

INSERT INTO `staticchart` (`c_id`, `cityname`, `d1`, `d2`, `d3`, `d4`) VALUES
(1, 'Yangon', 50, 80, 60, 70),
(2, 'Mandalay', 30, 50, 40, 70),
(3, 'Hpa Kant', 50, 60, 60, 80),
(4, 'Mawlamyine', 70, 80, 60, 40);

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
--

CREATE TABLE `survey_responses` (
  `survey_id` int NOT NULL,
  `question_id` int NOT NULL,
  `dimension_id` int NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `survey_responses`
--

INSERT INTO `survey_responses` (`survey_id`, `question_id`, `dimension_id`, `answer`) VALUES
(113, 1, 1, 'Yangon'),
(114, 2, 1, 'Hpa Kant'),
(115, 3, 1, 'Mawlamyine'),
(116, 4, 1, 'Hpa Kant'),
(117, 5, 2, 'Yangon'),
(118, 6, 2, 'Mandalay'),
(119, 7, 2, 'Yangon'),
(120, 8, 2, 'Yangon'),
(121, 9, 3, 'Yangon'),
(122, 10, 3, 'Mandalay'),
(123, 11, 3, 'Yangon'),
(124, 12, 3, 'Mandalay'),
(125, 13, 4, 'Yangon'),
(126, 14, 4, 'Yangon'),
(127, 15, 4, 'Yangon'),
(128, 16, 4, 'Mandalay'),
(129, 1, 1, 'Yangon'),
(130, 2, 1, 'Mandalay'),
(131, 3, 1, 'Yangon'),
(132, 4, 1, 'Mandalay'),
(133, 5, 2, 'Yangon'),
(134, 6, 2, 'Mandalay'),
(135, 7, 2, 'Yangon'),
(136, 8, 2, 'Mandalay'),
(137, 9, 3, 'Yangon'),
(138, 10, 3, 'Mandalay'),
(139, 11, 3, 'Yangon'),
(140, 12, 3, 'Mandalay'),
(141, 13, 4, 'Yangon'),
(142, 14, 4, 'Mandalay'),
(143, 15, 4, 'Yangon'),
(144, 16, 4, 'Yangon');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'taylor', 'taylorswift@gmail.com', '$2y$10$TDxgED.rjiPgzyFC3tDfiu9CCLoB00Nc8kYsHGjtd5pPeZboNXIxy', '2024-08-14 02:20:21'),
(2, 'selena', 'selena@gmail.com', '$2y$10$lvbXrqsHXn05QOYr8fGZLOEmFlt7evEQz.FwFurzi9/UQxhyMzE.2', '2024-08-14 02:46:59'),
(3, 'harry', 'harry@gmail.com', '$2y$10$ShhCU7bxU3iak6MRCTm0tu0e9v.FtukJn0JhXQijc4eUV.O8q9IXu', '2024-08-14 02:48:49'),
(4, 'justin', 'justin@gmail.com', '$2y$10$nDJNhAbNBFCvIIk/2WW/eOpLmk.l1IGcltY61zYhyCHr4JPl7ugUK', '2024-08-14 03:43:19'),
(5, 'alex', 'alex@gmail.com', '$2y$10$lgmhJQKu2/ztqIPKAE.1zOcV8/BooYvMk7a9qi6ba5IpCJroNIZe2', '2024-08-14 03:44:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ai_responses`
--
ALTER TABLE `ai_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_author` (`author_id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `channel_id` (`channel_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `staticchart`
--
ALTER TABLE `staticchart`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ai_responses`
--
ALTER TABLE `ai_responses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staticchart`
--
ALTER TABLE `staticchart`
  MODIFY `c_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `survey_responses`
--
ALTER TABLE `survey_responses`
  MODIFY `survey_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `FK_author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
