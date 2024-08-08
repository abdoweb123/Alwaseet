-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2024 at 09:00 AM
-- Server version: 10.6.18-MariaDB
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alwaseetlinebh_malhofy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$Oi/SmfVyEmvpe63tuDwq0e.lBzJ63GltWA2EdNFvyiFUHKOH8dmOq', '2023-12-07 10:45:11', '2023-12-07 10:45:11'),
(2, 'SAYED ALAA', 'WLDC.BH973@GMAIL.COM', '$2y$10$dYED38u8gQmGM7/9VRJa3ueShQ5.zs/8vcU.6noSl7zlUCx4uSVHW', '2024-01-01 07:54:16', '2024-06-11 23:05:42'),
(3, 'sallam', 'admin@gmail.com', '$2a$10$UMQcTMEgKdpA5ZGQnrPPPePLT5zeUrKMr4hSF2IOrnkvFcP7zoJdq', '2024-01-01 07:54:16', '2024-06-11 23:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title_ar`, `title_en`, `image`, `created_at`, `updated_at`) VALUES
(65, NULL, 'هيئة المعلومات والحكومة الإلكترونية', 'Information & eGovernment Authority', '/storage/categories/1709218304_8980.webp', '2024-02-29 15:51:44', '2024-02-29 15:51:44'),
(66, NULL, 'هيئة تنظيم سوق العمل', 'Labour Market Regulatory Authority', '/storage/categories/1709218419_4373.webp', '2024-02-29 15:53:39', '2024-02-29 15:53:39'),
(67, NULL, ' وزارة الصناعة والتجارة', 'Ministry of Industry and Commerce', '/storage/categories/1709218482_3705.webp', '2024-02-29 15:54:42', '2024-02-29 15:54:42'),
(68, NULL, 'هيئة الكهرباء والماء', 'Electricity and Water Authority', '/storage/categories/1709218566_1647.webp', '2024-02-29 15:56:06', '2024-02-29 15:56:06'),
(69, NULL, 'الهيئة العامة للتأمين الاجتماعي', 'Social Insurance Organization', '/storage/categories/1709218637_6675.webp', '2024-02-29 15:57:17', '2024-02-29 15:57:17'),
(70, NULL, 'وزارة شؤون البلديات والزراعة', 'Ministry of Municipalities Affairs and Agriculture', '/storage/categories/1709218983_3003.webp', '2024-02-29 16:03:03', '2024-02-29 16:03:03'),
(71, NULL, 'وزارة التنمية الاجتماعية', 'Ministry of Social Development', '/storage/categories/1709219068_1895.webp', '2024-02-29 16:04:28', '2024-02-29 16:04:28'),
(72, NULL, 'غرفة تجارة وصناعة البحرين ', 'Bahrain Chamber of Commerce and Industry ', '/storage/categories/1709219167_9728.webp', '2024-02-29 16:06:07', '2024-02-29 16:06:07'),
(73, NULL, 'وزارة الإسكان والتخطيط العمراني', 'Ministry of Housing and Urban Planning', '/storage/categories/1709219293_2511.webp', '2024-02-29 16:08:13', '2024-02-29 16:08:13'),
(74, NULL, 'وزارة العدل والشؤون الإسلامية والأوقاف', 'Ministry of Justice, Islamic Affairs and Waqf', '/storage/categories/1709219389_6066.webp', '2024-02-29 16:09:49', '2024-02-29 16:09:49'),
(78, 66, 'الخدمات لصاحب العمل', 'Employer Services Guide', NULL, '2024-03-22 17:35:41', '2024-03-22 17:35:41'),
(79, 69, 'الخدمات الإلكترونية لأصحاب الأعمال', 'ESERVICES FOR EMPLOYERS', NULL, '2024-05-01 14:32:14', '2024-05-01 14:32:14'),
(80, NULL, 'وزارة الداخلية - شؤون الجنسية والجوازات والإقامة', 'Ministry of Interior - Nationality, Passports and Residence Affairs', '/storage/categories/1717747578_7260.webp', '2024-06-07 08:06:18', '2024-06-07 08:06:18'),
(81, 80, 'الإقامة', 'RESIDENCE PERMIT', NULL, '2024-06-07 08:09:53', '2024-06-07 08:09:53'),
(82, NULL, 'وزارة الداخلية - الإدارة العامة للمرور', 'Ministry of Interior - General Directorate of Traffic', '/storage/categories/1718189214_7761.webp', '2024-06-12 10:46:54', '2024-06-12 10:46:54'),
(83, 82, 'خدمات مدرسة تدريب السياقة', 'Driving School Services', NULL, '2024-06-12 10:51:44', '2024-06-12 10:51:44'),
(84, NULL, 'خط الوسيط لتخليص المعاملات', 'ALWASEET LINE DOCUMENTS CLEARANCE', '/storage/categories/1718237354_9026.webp', '2024-06-13 00:09:14', '2024-06-13 00:09:14'),
(85, 84, 'خدمات خط الوسيط', 'ALWASEET LINE SERVICES ', NULL, '2024-06-13 00:11:09', '2024-06-13 00:14:07'),
(86, NULL, 'المؤسسة الملكية للأعمال الانسانية', 'Royal Humanitarian Foundation', '/storage/categories/1719069265_7975.webp', '2024-06-22 15:14:25', '2024-06-22 15:14:25'),
(87, 86, 'المساعدات الإنسانية', ' Humanitarian Aid', NULL, '2024-06-22 15:16:32', '2024-06-22 15:16:32'),
(88, NULL, 'نامين المركبات', 'Motor Insurance', '/storage/categories/1722893742_1402.webp', '2024-08-05 21:35:42', '2024-08-05 21:35:42'),
(89, 88, 'تحويل التامين بعد البيع', 'After-sales insurance transfer', NULL, '2024-08-05 21:36:42', '2024-08-05 21:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `address`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(82, 'Michalak Aleksandra', 'barreiromartin36@gmail.com', '83944876531', NULL, 'We are willing to fund your Business/Project', 'Greetings. \r\n \r\nRef: Business/Project Funding. \r\n \r\nMy name is Michalak Aleksandra, a financial consultant and business facilitator; I represent a financial consulting firm and we have reputable investors that are expanding their global presence by investing in viable businesses and projects across the globe. They are currently providing financial support to both companies and individuals for business and project expansion through debt financing. \r\n \r\nKindly contact me if you are seeking for funding to expand or invest into your business or project, we will be excited to work with you; please use the following email to reach me, michaleksandra.consult@gmail.com \r\n \r\nIf you are not interested, you may give a referral to anyone that might need this opportunity and you will receive a commission from us otherwise ignore the message. \r\n \r\nRegards, \r\nMichalak Aleksandra', '2024-06-14 12:10:23', '2024-06-14 12:10:23'),
(83, 'John Kuykendall', 'loyd.kuykendall@outlook.com', '077 6181 3014', NULL, 'To the alwaseet-line-bh.com Administrator!', 'If you are reading this message, That means my marketing is working. I can make your ad message reach 5 million sites in the same manner for just $50. It\'s the most affordable way to market your business or services. Contact me by email virgo.t3@gmail.com or skype me at live:.cid.dbb061d1dcb9127a', '2024-06-17 23:41:27', '2024-06-17 23:41:27'),
(84, 'Mike Arthurs', 'peterHord@gmail.com', '81821326694', NULL, 'Whitehat SEO for alwaseet-line-bh.com', 'Hi there \r\n \r\nI have just took an in depth look on your  alwaseet-line-bh.com for  the current search visibility and saw that your website could use a boost. \r\n \r\nWe will increase your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digital-x-press.co/unbeatable-seo/ \r\n \r\nRegards \r\nMike Arthurs\r\n \r\nDigital X SEO Experts \r\nhttps://www.digital-x-press.co/whatsapp-us/', '2024-06-18 21:33:25', '2024-06-18 21:33:25'),
(85, 'Emily Jones', 'emilyjones2250@gmail.com', '3347434550', NULL, 'Grow your Youtube channel', 'Hi there,\r\n\r\nWe run a YouTube growth service, which increases your number of subscribers both safely and practically.\r\n\r\nWe go beyond just subscriber numbers. We focus on attracting viewers genuinely interested in your niche, leading to long-term engagement with your content. Our approach leverages optimization, community building, and content promotion for sustainable growth, not quick fixes. Additionally, a dedicated team analyzes your channel and creates a personalized plan to unlock your full potential, all without relying on bots.\r\n\r\nOur packages start from just $60 (USD) per month.\r\n\r\nWould this be of interest?\r\n\r\nKind Regards,\r\nEmily\r\n\r\nUnsubscribe: https://removeme.click/yt/unsubscribe.php?d=alwaseet-line-bh.com', '2024-06-22 19:52:43', '2024-06-22 19:52:43'),
(86, 'Mike Martin', 'mikefluoni@gmail.com', '83624957646', NULL, 'NEW: Semrush Backlinks', 'Good Day \r\n \r\nThis is Mike Martin\r\n \r\nLet me show you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nThe new Semrush Backlinks, which will make your alwaseet-line-bh.com SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictlydigital.co/semrush-backlinks/ \r\n \r\nCheap and effective \r\nTry it anytime soon \r\n \r\nRegards \r\nMike Martin\r\n https://www.strictlydigital.co/whatsapp-us/', '2024-06-24 14:39:50', '2024-06-24 14:39:50'),
(87, 'Johan Fourie', 'johan@pcxgroup.com', '7826737526', NULL, 'An app for your business', 'Hello alwaseet-line-bh.com\r\n\r\nWe noticed your website alwaseet-line-bh.com doesn\'t have a Mobile App for iOS and Android.\r\n\r\nWe are building Android and iOS Apps for $99 each a combo deal of $149 for both\r\n\r\nYou can get a free preview on PCXLeads or email us back and we will send you a mockup for your apps.\r\n\r\nThis promo is valid till end of June 2024.\r\n\r\nRegards,\r\nPCXLeads', '2024-06-27 13:40:40', '2024-06-27 13:40:40'),
(88, 'MeganOptor', '84xrumer1@farironalds.com', '81827525789', NULL, 'casinos in ohio', 'Playing at our online casino offers endless entertainment and the chance to win big. With a vast selection of games, exciting bonuses, and a secure environment, there\'s no better place to enjoy the thrill of casino gaming. Join us today and experience the ultimate online casino adventure. \r\nBy choosing to play online casino games with us, you\'re not only opting for fun and excitement but also for a safe and rewarding gaming experience. Don\'t wait any longer – dive into the world of <a href=https://usacasinohub.com/reviews/>gambling online game</a> and start your journey to success now.', '2024-06-28 12:32:31', '2024-06-28 12:32:31'),
(89, 'Damien Logue', 'damien.logue@gmail.com', '4855314353', NULL, 'Free Business Data', 'Want Free business data?\r\n\r\nUsage:\r\n\r\nhttps://leadsbox.biz\r\n\r\n(Lawyers in New york for example)\r\n\r\n71 Million business records in 202 countries\r\n\r\nUpdated Daily\r\n\r\nCompany Name\r\ncountryCode\r\ncountryName\r\nstate\r\ncounty\r\ncity\r\nstreet\r\npostalCode\r\nbuilding\r\nlat\r\nlng\r\nCategory\r\nSecondary Category\r\nPersonal contacts\r\nPhones\r\nFax\r\nEmails\r\nReviews\r\nopening hours\r\n\r\nand more\r\n\r\nLeadsBox.biz', '2024-06-28 18:58:00', '2024-06-28 18:58:00'),
(90, 'Caroldom', 'salo@farironalds.com', '86742991737', NULL, 'casino games slots free wolf run', 'Don\'t wait any longer to experience the thrill of online slots. Join our <a href=https://usacasinohub.com/slots/>slot games that pay real money usa</a> today and embark on an adventure filled with fun, excitement, and endless opportunities to win. With our wide selection of games, generous bonuses, and secure environment, there\'s no better place to play. Sign up now and start spinning the reels for your chance to hit the jackpot!', '2024-06-28 21:06:25', '2024-06-28 21:06:25'),
(91, 'MeganOptor', '84xrumer2@farironalds.com', '84128887334', NULL, 'online blackjack tables', 'Blackjack is not just a game of luck; it\'s a thrilling challenge that can be mastered with the right strategy. Imagine the excitement of hitting 21 and beating the dealer with confidence. Whether you\'re a novice or an experienced player, learning <a href=https://usacasinohub.com/blackjack/>blackjack chart</a> can transform your gaming experience and lead to significant wins. Don\'t miss out on the opportunity to improve your skills and enjoy the rewards. Start playing blackjack today and take the first step towards becoming a pro!', '2024-06-30 09:50:39', '2024-06-30 09:50:39'),
(92, 'Laurienaw', '20xrumer1@farironalds.com', '87432941977', NULL, 'online poker real money app', 'Ready to experience the excitement of video poker? Join our <a href=https://usacasinohub.com/video-poker/>online poker for money in florida</a> and start playing today. Whether you’re a novice or a seasoned poker player, our video poker games offer something for everyone. Embrace the challenge, apply your strategy, and enjoy the thrill of winning.', '2024-06-30 10:24:06', '2024-06-30 10:24:06'),
(93, 'Darlenerog', '34xrumer1@farironalds.com', '81147344969', NULL, 'live dealer gambling sites', 'Step into the thrilling world of <a href=https://usacasinohub.com/slots/>live dealer gambling sites ranking</a>, where every card you draw could be the key to victory! Whether you\'re a seasoned player or a newcomer, our online blackjack tables offer endless excitement and the chance to master your skills. Join us now and experience the ultimate blackjack adventure!', '2024-06-30 12:44:15', '2024-06-30 12:44:15'),
(94, 'Gay Kovar', 'gay.kovar@googlemail.com', '699962037', NULL, 'Hi alwaseet-line-bh.com Administrator.', 'Are you still looking at getting your website done/ completed? Contact e.solus@gmail.com', '2024-07-02 03:36:40', '2024-07-02 03:36:40'),
(95, 'Mike Young', 'mikefluoni@gmail.com', '86422242926', NULL, 'Collaboration request', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.monkey-seo.org/affiliates/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Young\r\n \r\nMonkey Digital \r\nhttps://www.monkey-seo.org/whatsapp-affiliates/', '2024-07-02 04:51:42', '2024-07-02 04:51:42'),
(96, 'Melisafuell', '34xrumer2@farironalds.com', '84455829742', NULL, 'blackjack online for money', 'Step into the thrilling world of <a href=https://usacasinohub.com/roulette/>online blackjack gambling</a>, where every card you draw could be the key to victory! Whether you\'re a seasoned player or a newcomer, our online blackjack tables offer endless excitement and the chance to master your skills. Join us now and experience the ultimate blackjack adventure!', '2024-07-02 12:41:51', '2024-07-02 12:41:51'),
(97, 'Ken Burnette', 'kenp2024@aol.com', '3999705862', NULL, 'Just found this site', 'Was just browsing the site and was impressed the layout. Nicely design and great user experience. Just had to drop a message, have a great day! 8dfds87a', '2024-07-02 17:28:56', '2024-07-02 17:28:56'),
(98, 'SylviaBal', '20xrumer2@farironalds.com', '81657194634', NULL, 'roulette chat', 'Roulette is more than just a game of chance; it\'s a captivating experience that offers endless possibilities. Imagine the rush of placing your bet on red or black and watching the wheel spin in anticipation. Whether you\'re a beginner or a seasoned player, roulette promises excitement and the chance to win big. Embrace the challenge, learn the strategies, and enjoy the thrill of this iconic casino game. Start your journey with <a href=https://usacasinohub.com/roulette/>online roulette australia</a> today and let the excitement of the wheel propel you towards unforgettable wins!', '2024-07-03 14:42:15', '2024-07-03 14:42:15'),
(99, 'Mike Nash', 'mikeHord@gmail.com', '89586671321', NULL, 'Social ads country traffic', 'Hello, \r\n \r\nHey, I\'m Mike from Monkey Digital. We offer a highly popular service that costs only 10$ per 5000 social ads visits. \r\n \r\nMore info:  \r\nhttps://www.monkey-seo.com/get-started/ \r\n \r\nTracking will be sent the same day, the advertisement goes live within a few hours, effective and cheap marketing, try it out, it will be worth every penny. \r\n \r\nRegards \r\nMonkey Digital \r\nhttps://www.monkey-seo.com/whatsapp-us/', '2024-07-06 02:58:29', '2024-07-06 02:58:29'),
(100, 'Mike Baker', 'mikeHord@gmail.com', '87174711281', NULL, 'Increase rankings with a SEO friendly web design', 'Hi there \r\nI just checked alwaseet-line-bh.com ranks and am sorry to bring this up, but it lacks in many areas. \r\n \r\nUnfortunately, building a bunch of links won\'t solve the issue in this case, and a more comprehensive strategy is required. Google has undergone significant changes over the past year, making it nearly impossible to compete for favorable rankings without a well-designed website. \r\n \r\nWe recommend a search engine-friendly website layout to resolve all issues and propel your site to the top. \r\n \r\nYou can check more details here: https://www.speed-seo.org/web-design/ \r\n \r\nThanks for your consideration \r\nMike Baker\r\nSpeed Designs \r\nhttps://www.speed-seo.org/whatsapp-us/', '2024-07-07 06:39:13', '2024-07-07 06:39:13'),
(101, 'James Dundalli', 'jane.dundalli@googlemail.com', '267445668', NULL, 'Dear alwaseet-line-bh.com Admin!', 'Are you still looking at getting your website\'s SEO done? Contact Now intrug@gmail.com', '2024-07-08 16:06:04', '2024-07-08 16:06:04'),
(102, 'CompanyRegistar.org', 'gunter.bridget@gmail.com', '612164795', NULL, 'Your domain alwaseet-line-bh.com is listed in a few directories.', 'Hi \r\n\r\nI see your online property is only listed in 12 out of 2421 directories\r\n\r\nThis will severely impact your page rank, the more increased directories your company is listed in, globally or locally, the more back links you have and the better you rank in Bing, Yahoo, Google. \r\n\r\nNever has it been easier to promote your domain alwaseet-line-bh.com\r\n\r\nJust a few inputs and our system willl do the rest. \r\n\r\nNo more fretting about email verification, CAPTCHAs or manual link building.\r\n\r\nWeve automed all that we could have to make submitting your site a breeze.\r\n\r\nSee your site on the first page.\r\n\r\nWe will register your online property to thousands of directories and give you a full report on the status of each listing. Although we have created an automated system to a large extent, some of the registries may require manual approval which could cause a slight delay. \r\n\r\nMaking your life simpler \r\n\r\nhttps://CompanyRegistar.org', '2024-07-09 17:14:27', '2024-07-09 17:14:27'),
(103, 'Sam Jenks', 'karine.jenks@gmail.com', '3734622776', NULL, '24/7 Live Chat = More Sales & Happy Customers', 'Hey,\r\n\r\nCustomers want answers now. Don\'t lose leads with offline messages!\r\n\r\nLive chat boosts sales & loyalty. 44% of consumers love it!\r\n\r\nOpen247 provides:\r\n\r\n* Expert agents (24/7!)\r\n* Brand ambassadors\r\n* Cost-effective solution\r\n\r\nBenefits:\r\n\r\n* More conversions (capture hot leads!)\r\n* Happier customers (fast, friendly support)\r\n* Less work for you (focus on core business)\r\n\r\nGet a free quote! Email me now at open247chat@gmail.com \r\nWe\'ll customize a plan to fit your budget.\r\n\r\nP.S. Get 30 Days Free Trial Now!!', '2024-07-09 22:25:01', '2024-07-09 22:25:01'),
(104, 'Lina Pelensky', 'lina.pelensky@yahoo.com', '671134027', NULL, 'Hello alwaseet-line-bh.com Webmaster.', 'Are you looking for a capable financial company to fund your business project?\r\n\r\nwe are here to provide you with the best solution for your business growth. we provide the  most suitable business loan package to meet your need.                           \r\nemail me here.                                                                                             \r\ninfo@financeworldwidehk.com                                                                                             \r\n                                                                                              \r\n                                                                                          \r\n                                      \r\n                                      \r\nBest regards,\r\nLaura Cha.\r\nCustomer Service Representative', '2024-07-10 00:28:23', '2024-07-10 00:28:23'),
(105, 'AmandaWaipsea', 'amandaShedly3@gmail.com', '86891233311', NULL, 'يا عشيق, جاهز للحب?', 'يا حبيبي, تريد التسكع? -  https://rb.gy/7rnhss?maypen', '2024-07-11 16:27:50', '2024-07-11 16:27:50'),
(106, 'AmandaWaipseb', 'amandaShedlyc@gmail.com', '81126454234', NULL, 'يا عشيق, جاهز للحب?', 'يا حبيبي, تريد التسكع? -  https://rb.gy/7rnhss?maypen', '2024-07-14 02:58:28', '2024-07-14 02:58:28'),
(107, 'AmandaWaipse2', 'amandaShedlyb@gmail.com', '87882225213', NULL, 'يا عشيق, جاهز للحب?', 'يا حبيبي, تريد التسكع? -  http://surl.li/ulebc?Hoapsug', '2024-07-15 09:24:41', '2024-07-15 09:24:41'),
(108, 'Erin Mortlock', 'mortlock.erin28@outlook.com', '4533306', NULL, 'LeadsMax.biz shutting down', 'Hello,\r\n\r\nIt is with sad regret that after 12 years, LeadsMax.biz is shutting down.\r\n\r\nWe have made all our databases available on our website.\r\n\r\n25 Million companies\r\n527 Million People\r\n\r\nLeadsMax.biz', '2024-07-15 17:14:43', '2024-07-15 17:14:43'),
(109, 'Joanna Riggs', 'joannariggs278@gmail.com', '518052651', NULL, 'Video Promotion for your website', 'Hi,\r\n\r\nI just visited alwaseet-line-bh.com and wondered if you\'d ever thought about having an engaging video to explain what you do?\r\n\r\nOur prices start from just $195.\r\n\r\nLet me know if you\'re interested in seeing samples of our previous work.\r\n\r\nRegards,\r\nJoanna\r\n\r\nUnsubscribe: https://removeme.click/ev/unsubscribe.php?d=alwaseet-line-bh.com', '2024-07-15 18:26:42', '2024-07-15 18:26:42'),
(110, 'Mike Wainwright', 'peterHord@gmail.com', '88118491979', NULL, 'Whitehat SEO for alwaseet-line-bh.com', 'Hi there \r\n \r\nI have just checked  alwaseet-line-bh.com for its SEO Trend and saw that your website could use a boost. \r\n \r\nWe will improve your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nRegards \r\nMike Wainwright\r\n \r\nDigital X SEO Experts \r\nhttps://www.digital-x-press.com/whatsapp-us/', '2024-07-16 09:54:17', '2024-07-16 09:54:17'),
(111, 'Klaus Reinhardt', 'reinhardt.klaus@gmail.com', '749069391', NULL, 'Dear alwaseet-line-bh.com Webmaster!', 'Your website is a direct reflection of your company.\r\n \r\nIf it\'s outdated, broken, lacks features or just needs to be updated, it directly affects how your customers perceive the rest of your business MUCH MORE THAN YOU THINK.\r\n\r\nWhy pay $50+ per hour for web development work, \r\nwhen you can get higher quality results AT LESS THAN HALF THE COST? \r\n\r\nWe are a FULL SERVICE, USA managed web development agency offering wholesale pricing.\r\n\r\nNo job too big or small. Test us out to see our value.\r\n\r\nUse the link in my signature, for a quick turn around quote.\r\n\r\n\r\n\r\nKristine Avocet\r\nSenior Web Specialist \r\nFusion Web Experts  \r\n186 Daniel Island Drive \r\nDaniel Island, SC 29492 \r\nwww.fusionwebexperts.tech', '2024-07-16 19:49:11', '2024-07-16 19:49:11'),
(112, 'AmandaWaipse1', 'amandaShedly1@gmail.com', '83465261955', NULL, 'يا عشيق, جاهز للحب?', 'يا حبيبي, تريد التسكع? -  https://rb.gy/7rnhss?maypen', '2024-07-18 06:18:19', '2024-07-18 06:18:19'),
(113, 'Basil Dransfield', 'basil.dransfield@gmail.com', '7621232687', NULL, 'To the alwaseet-line-bh.com Administrator.', 'If you are reading this message, That means my marketing is working. I can make your ad message reach 5 million sites in the same manner for just $50. It\'s the most affordable way to market your business or services. Contact me by email virgo.t3@gmail.com or skype me at live:.cid.dbb061d1dcb9127a\r\n\r\nP.S: Speical Offer - Only for 2 days - 10 Million Sites for the same money $50', '2024-07-18 20:58:06', '2024-07-18 20:58:06'),
(114, 'AmandaWaipsec', 'amandaShedly3@gmail.com', '83914977618', NULL, 'يا عشيق, جاهز للحب?', 'يا حبيبي, تريد التسكع? -  https://rb.gy/7rnhss?maypen', '2024-07-20 10:16:37', '2024-07-20 10:16:37'),
(115, 'Denise Rich', 'denise.rich@yahoo.com', '794709735', NULL, 'Hello alwaseet-line-bh.com Administrator.', 'Work From Home With This 100% FREE Training..., I Promise...You Will Never Look Back\r\n$500+ per day, TRUE -100% Free Training, go here:\r\n\r\nezwayto1000aday.com', '2024-07-20 22:05:45', '2024-07-20 22:05:45'),
(116, 'AmandaWaipsec', 'amandaShedlyb@gmail.com', '82388631171', NULL, 'يا عشيق, جاهز للحب?', 'يا حبيبي, تريد التسكع? -  https://is.gd/2xVU7z?Hoapsug', '2024-07-21 16:29:37', '2024-07-21 16:29:37'),
(117, 'AmandaWaipsec', 'amandaShedlyc@gmail.com', '85571728957', NULL, 'فتاة أحلامك تنتظر...', 'لا يمكن أن تنتظر لتظهر لك وقتا طيبا الليلة. -  https://rb.gy/7rnhss?maypen', '2024-07-23 09:27:13', '2024-07-23 09:27:13'),
(118, 'AmandaWaipse3', 'amandaShedlya@gmail.com', '89573249823', NULL, 'فتاة أحلامك تنتظر...', 'لا يمكن أن تنتظر لتظهر لك وقتا طيبا الليلة. -  https://goo.su/zARWg?Hoapsug', '2024-07-24 06:43:34', '2024-07-24 06:43:34'),
(119, 'Mike Cramer', 'mikefluoni@gmail.com', '88917768354', NULL, 'NEW: semrush backlinks available on sale', 'Hello \r\nThis is Mike Cramer\r\nfrom Strictly Digital \r\n \r\nLet me present to you our latest discovered from the SEO environment. \r\nWe have noticed that getting backlinks from websites that have high SEO metrics values doesn\'t always help, and in fact, what is more important is to have backlinks from sites that are actually ranking for many keywords. \r\n \r\nThus, we have built this service especially to meet these new discoveries and the results are astonishing. \r\n \r\nPlease check more details here: \r\nhttps://www.strictlyseonet.com/semrush-backlinks \r\n \r\n \r\n \r\nRegards, \r\nStrictly Digital SEO Team \r\n \r\nWhatsapp us for more details: \r\nhttps://www.strictlyseonet.com/whatsapp-us/', '2024-07-25 00:08:31', '2024-07-25 00:08:31'),
(120, 'AmandaWaipsea', 'amandaShedlyc@gmail.com', '82921328629', NULL, 'على استعداد ليلة البرية?)', 'لقد كنت شقي, تريد مساعدتي في ذلك?) -  https://goo.su/zARWg?Hoapsug', '2024-07-25 12:52:47', '2024-07-25 12:52:47'),
(121, 'Search Engine Index', 'ingeborg.bastyan@gmail.com', '7725400114', NULL, 'Add alwaseet-line-bh.com to Google Search Index!', 'Hello,\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now, please visit \r\n\r\nhttps://searchregister.info/', '2024-07-26 15:58:11', '2024-07-26 15:58:11'),
(122, 'Felicity Sauncho', 'felicitysauncho@gmail.com', '3570985158', NULL, 'YouTube Promotion: Grow your subscribers by 700-1500 each month', 'Hi there,\r\n\r\nWe run a Youtube growth service, where we can increase your subscriber count safely and practically. \r\n\r\n- Guaranteed: We guarantee to gain you 700-1500 new subscribers each month.\r\n- Real, human subscribers who subscribe because they are interested in your channel/videos.\r\n- Safe: All actions are done, without using any automated tasks / bots.\r\n\r\nOur price is just $60 (USD) per month and we can start immediately.\r\n\r\nIf you are interested then we can discuss further.\r\n\r\nKind Regards,\r\nFelicity', '2024-07-26 19:41:26', '2024-07-26 19:41:26'),
(123, 'AmandaWaipse1', 'amandaShedlya@gmail.com', '88554111911', NULL, 'فتاة أحلامك تنتظر...', 'لا يمكن أن تنتظر لتظهر لك وقتا طيبا الليلة. -  https://rb.gy/7rnhss?maypen', '2024-07-27 10:05:07', '2024-07-27 10:05:07'),
(124, 'LeadsMax.biz', 'huggins.lynwood@googlemail.com', '46015176', NULL, 'Dear alwaseet-line-bh.com Admin!', 'Hello from LeadsMax.biz!!\r\n\r\nWe are shutting down and have made all our data available for all the countries!\r\n\r\nCome check us out and search your business and consumer data for free\r\n\r\nLeadsMax.biz', '2024-07-27 19:57:01', '2024-07-27 19:57:01'),
(125, 'PillsNaw', 'iunskiygipertonik@gmail.com', '83388534448', NULL, 'Cialis, Viagra, Levitra - Trial ED Packb buy, discount!', 'Erectile dysfunction treatments available online from TruePills. \r\nDiscreet, next day delivery and lowest price guarantee. \r\n \r\nTrial ED Pack consists of the following ED drugs: \r\n \r\nViagra Active Ingredient: Sildenafil 100mg 5 pills \r\nCialis 20mg 5 pills \r\nLevitra 20mg 5 pills \r\n \r\nhttps://true-pill.top/', '2024-07-27 20:59:43', '2024-07-27 20:59:43'),
(126, 'AmandaWaipse3', 'amandaShedlyb@gmail.com', '87999162669', NULL, 'على استعداد ليلة البرية?)', 'لقد كنت شقي, تريد مساعدتي في ذلك?) -  https://rb.gy/7rnhss?maypen', '2024-07-28 09:45:12', '2024-07-28 09:45:12'),
(127, 'Indiana Champion de Crespigny', 'championdecrespigny.indiana@gmail.com', '480115439', NULL, 'To the alwaseet-line-bh.com Administrator!', 'Do you have big ideas and plans to update your website, but hate the outrageous fees that most agencies charge?\r\nWhy pay $50+ per hour for web development work, \r\nwhen you can get higher quality results AT LESS THAN HALF THE COST? \r\n\r\nWe are a FULL SERVICE, USA managed web development agency offering wholesale pricing.\r\n\r\nNo job too big or small. Test us out to see our value.\r\n\r\nUse the link in my signature, for a quick turn around quote.\r\n\r\n\r\n\r\nKristine Avocet\r\nSenior Web Specialist \r\nFusion Web Experts  \r\n186 Daniel Island Drive \r\nDaniel Island, SC 29492 \r\nwww.fusionwebexperts.tech', '2024-07-29 19:35:48', '2024-07-29 19:35:48'),
(128, 'AmandaWaipse3', 'amandaShedly3@gmail.com', '88856453284', NULL, 'فتاة أحلامك تنتظر...', 'لا يمكن أن تنتظر لتظهر لك وقتا طيبا الليلة. -  https://rb.gy/7rnhss?maypen', '2024-07-31 05:54:10', '2024-07-31 05:54:10'),
(129, 'Mike Lawman', 'mikeHord@gmail.com', '86593983149', NULL, 'Social ads country traffic', 'Hello, \r\n \r\nHey, I\'m Mike from Monkey Digital. We offer a highly popular service that costs only 10$ per 5000 social ads visits. \r\n \r\nMore info:  \r\nhttps://www.cyber-monkey.net/get-started/ \r\n \r\nTracking will be sent the same day, the advertisement goes live within a few hours, effective and cheap marketing, try it out, it will be worth every penny. \r\n \r\nRegards \r\nMonkey Digital \r\nhttps://www.cyber-monkey.net/whatsapp-us/', '2024-07-31 08:54:02', '2024-07-31 08:54:02'),
(130, 'Spring Finance LTD', 'harissalome37@gmail.com', '84126319794', NULL, 'Loan Finance', 'Hi, \r\n \r\nIs your company looking for short-term or long-term finance or debt consolidation? Our company offers finance with reasonable interest rates as low as 2.5% on the loan-to-value ratio. Contact us now via email at loan@cgcredits.com or WhatsApp  +44 7404911756 for  more information. Our commitment to solving financial problems is our utmost priority. \r\n \r\nThank you, \r\nSpring Finance LTD', '2024-07-31 13:26:06', '2024-07-31 13:26:06'),
(131, 'AmandaWaipse3', 'amandaShedly1@gmail.com', '83263977793', NULL, 'على استعداد ليلة البرية?)', 'لقد كنت شقي, تريد مساعدتي في ذلك?) -  https://rb.gy/7rnhss?maypen', '2024-08-01 02:16:32', '2024-08-01 02:16:32'),
(132, 'Mike Miers', 'mikeHord@gmail.com', '83575968568', NULL, 'Increase rankings with a SEO friendly web design', 'Hi there \r\nI just checked alwaseet-line-bh.com ranks and am sorry to bring this up, but it lacks in many areas. \r\n \r\nUnfortunately, building a bunch of links won\'t solve the issue in this case, and a more comprehensive strategy is required. Google has undergone significant changes over the past year, making it nearly impossible to compete for favorable rankings without a well-designed website. \r\n \r\nWe recommend a search engine-friendly website layout to resolve all issues and propel your site to the top. \r\n \r\nYou can check more details here: https://www.speedseo-digital.net/web-design/ \r\n \r\nThanks for your consideration \r\nMike Miers\r\nSpeed Designs \r\nhttps://www.speedseo-digital.net/whatapp-us/', '2024-08-01 05:00:08', '2024-08-01 05:00:08'),
(133, 'Tarah Clarkson', 'clarkson.tarah73@hotmail.com', '215688246', NULL, 'Meet Robin A.I.: Your All-in-One Virtual Assistant', 'Hi there,\r\n\r\nWe would like to introduce to you Robin AI, the world\'s first app that replaces your entire team with an AI assistant. This powerful tool generates human-like content, creates stunning designs, drives unlimited traffic, and more.\r\n\r\nGenerate Human-Like Content\r\nBuilds Professional Funnels\r\nDrive Thousands Of Clicks\r\n\r\nOnly $17.00 (normally $180)\r\n\r\nCheck out the features of Robin AI here: https://furtherinfo.org/robinai\r\n\r\nThanks for your time,\r\nTarah', '2024-08-02 06:33:20', '2024-08-02 06:33:20'),
(134, 'Mike Atcheson', 'mikefluoni@gmail.com', '82183767614', NULL, 'Collaboration request', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.cyber-monkey.net/JOIN-AFFILIATES/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Atcheson\r\n \r\nMonkey Digital \r\nhttps://www.cyber-monkey.net/whatsapp-affiliates/', '2024-08-02 10:03:49', '2024-08-02 10:03:49'),
(135, 'Shanel McLeay', 'morrismi1@outlook.com', '383233903', NULL, 'Dear alwaseet-line-bh.com Owner!', 'Dear alwaseet-line-bh.com owner or manager, \r\n\r\nCut your business or personal credit cards and loan payments in half. eliminate interest and reduce your debt by 50%. 100% guaranteed. The average customer saves $56,228 in unnecessary interest plus principal and 15 years in payoff time through our consolidation loan and debt consolidation programs. \r\n\r\nContact us at usdebtrelief.biz or email me at usdebt12@gmail.com I look forward to hearing from you, \r\n\r\nRey', '2024-08-03 15:43:11', '2024-08-03 15:43:11'),
(136, 'Thomasget', 'karinvallance@bigpond.com', '81367698966', NULL, 'FANTASTIC NEWS IPHONE 16 PRO MAX', 'Fantastic Prize: iPhone 16 Pro Max https://www.vectormediagroup.com/?URL=telegra.ph%2Fiphone-07-06-5%3F1696', '2024-08-04 05:24:53', '2024-08-04 05:24:53'),
(137, 'Thomasget', 'mohamedalilv@icloud.com', '86247644495', NULL, 'Get Ready iPhone 16 Pro Max', 'Amazing iPhone 16 Pro Max http://cta-redirect.ex.co/redirect?&web=https%3A%2F%2Ftelegra.ph%2Fiphone-07-06-5%3F6675', '2024-08-05 17:48:19', '2024-08-05 17:48:19'),
(138, '<span style=\"color: #ff6600;\"><strong>Riches within reach</strong></span> - https://hideuri.com/emwvyp', 'danapugg@gmail.com', '85472987566', NULL, '<span style=\"color: #ff6600;\"><strong>Treasure trove is close</strong></span> - https://hideuri.com/emwvyp', '<span style=\"color: #ff6600;\"><strong>Big win is near</strong></span> - https://hideuri.com/emwvyp', '2024-08-05 20:16:33', '2024-08-05 20:16:33'),
(139, 'Joanna Riggs', 'joannariggs278@gmail.com', '8641451320', NULL, 'Explainer Video for your website?', 'Hi,\r\n\r\nI just visited alwaseet-line-bh.com and wondered if you\'d ever thought about having an engaging video to explain what you do?\r\n\r\nWe have produced over 500 videos to date and work with both non-animated and animated formats:\r\n\r\nNon-animated example:\r\nhttps://www.youtube.com/watch?v=bA2DyChM4Oc\r\n\r\nAnimated example:\r\nhttps://www.youtube.com/watch?v=JG33_MgGjfc\r\n\r\nOur videos cost just $195 for a 30 second video ($239 for 60 seconds) and include a full script, voice-over and video.\r\n\r\nRegards,\r\nJoanna\r\n\r\nUnsubscribe: https://removeme.click/ev/unsubscribe.php?d=alwaseet-line-bh.com', '2024-08-06 11:34:46', '2024-08-06 11:34:46'),
(140, 'Lewisonelm', 'andre_nassif@icloud.com', '88743988483', NULL, 'FINAL REMINDER: CLAIM YOUR $50,000 CASH', 'TIME IS OF THE ESSENCE: CLAIM YOUR $50,000 NOW https://script.google.com/macros/s/AKfycby6cXXmCu0f17SDQITs9P0IzEyY3qLSLp8lllQPEenXwBG5wHckAOZkEzMhnfCgdGzk/exec', '2024-08-08 01:58:07', '2024-08-08 01:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_23_152249_create_contacts_table', 1),
(6, '2023_11_23_152302_create_categories_table', 1),
(7, '2023_11_23_152413_create_services_table', 1),
(8, '2023_11_26_125143_create_admins_table', 1),
(9, '2023_11_26_125822_create_settings_table', 1),
(10, '2023_12_11_091841_create_orders_table', 1),
(11, '2023_12_17_141215_create_slides_table', 1),
(12, '2024_02_01_132449_add_membership_to_table_users', 1),
(13, '2024_02_08_150749_add_request_status_to_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `worker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `order_number` varchar(255) DEFAULT NULL,
  `bla_name` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `request_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `desc_ar` text NOT NULL,
  `desc_en` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `price_for_users` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `price`, `price_for_users`, `created_at`, `updated_at`) VALUES
(228, 78, 'تسجيل منشأة جديدة', 'New Establishment Registration', 'تمكن هذه الخدمة المنشآت الجديدة من تسجيل سجلاتهم أو وحداتهم التجارية بهيئة تنظيم سوق العمل. وتمكن عملية التسجيل هذه المنشآت من تقديم، تجديد، أو إلغاء تصاريح عمل العمالة الأجنبية.', 'This service allows new establishments to register their commercial registrations or Units in LMRA to enable them to apply work permits for expatriates, to renew and cancel their work permits.', '10.000', '5.000', '2024-03-22 17:38:07', '2024-06-17 00:04:32'),
(229, 78, 'تحديث بيانات صاحب العمل ومنشأته في نظام الهيئة', 'Updating the Employer and the Establishments Details at LMRA', 'يتم تحديث بيانات صاحب العمل أو المنشأة بحسب المعلومات والمستندات المقدمة.', 'The details of the employer or his /her establishment are updated according to the information and documents provided.', '10.000', '5.000', '2024-03-22 17:40:18', '2024-08-06 18:13:59'),
(230, 78, 'تصريح عمل جديد', 'New Work Permit', 'من خلال هذه الخدمة، يمكن لأصحاب العمل تقديم طلب لإصدار تصريح العمل للعمال الأجانب ليتم تعيينهم على سجلاتهم التجارية.', 'Through this service, employers can submit a request for issuing a new work permit for expatriate employees to be hired on their commercial registrations', '10.000', '5.000', '2024-03-22 17:42:25', '2024-06-07 08:20:51'),
(231, 78, 'تجديد تصريح العمل', 'Work Permit Renewal', 'من خلال هذه الخدمة، يمكن لأصحاب العمل تقديم طلب لتجديد تصريح العمل قبل انتهاء صلاحيته. كما يمكن كذلك تجديد تصاريح الملتحقين بالعامل.\n\n', 'Through this service, employers can submit a request for renewing the employee\'s work permit before it expires. In case the employee has dependants, their permits will be renewed upon the employee\'s renewal.\n\n', '10.000', '5.000', '2024-03-22 17:43:51', '2024-08-06 18:13:40'),
(232, 78, 'إلغاء تصاريح العمل والملتحقين', 'Cancellation of Employment and Dependants Permits', 'من خلال هذه الخدمة، يمكن لأصحاب العمل التقدم بطلب لإلغاء تصريح العمل للعامل الأجنبي وتصاريح الإقامة للأشخاص الملتحقين (العائلة – الزوجة والأبناء حتى عمر 24 سنة).\n\n', 'Through this service, employers can apply for the cancellation employee\'s permit as well as his dependants (family - wife and children up to 24 years).\n\n', '10.000', '5.000', '2024-03-22 17:45:11', '2024-08-06 18:13:12'),
(233, 78, 'إصدار رخصة إقامة للملتحقين (الزوجة/الزوج/الأبناء)', 'Dependants Residency Permit (Wife/Husband/Children)', 'من خلال هذه الخدمة، يمكن لأصحاب العمل طلب إصدار تصاريح إقامة لأفراد العائلة المُلتحقين بالعمال الأجانب (الزوجة والأبناء حتى سن 24).', 'Through this service, employers can request the issuance of residence permits for their employees\' dependents (spouse and children up to the age of 24).\n\n', '10.000', '5.000', '2024-03-22 17:46:59', '2024-06-07 08:21:06'),
(234, 78, 'تصريح العمل للملتحقين', 'Work Approval for Dependants', 'الأزواج والأبناء البالغين الذين يحملون تأشيرات الملتحقين أو تأشيرات الدراسة لا يمكنهم العمل في مملكة البحرين إلا إذا قاموا بتغيير نوع التأشيرة إلى تصريح عمل. ومع ذلك، إذا رغب أحد الزوجين في العمل والبقاء على التأشيرة العائلية، يمكنهم التقدم بطلب للحصول على موافقة عمل للملتحقين وإذا تمت الموافقة، فسيتم منحهم تصريح عمل لتمكينهم من العمل والاحتفاظ بتأشيرة الملتحقين في نفس الوقت.', 'Spouses\' and grown-up children who are on family visa or students\' visa are not supposed to work in the Kingdom of Bahrain, unless they change the visa from family or student visa to a work permit. However, if one of the spouses\' wish to work and remain as a dependant on their family visa – they could apply for Work Approval for Dependants permit and if approved will be granted a work permit to enable them to work and keep their family permit at the same time.', '10.000', '5.000', '2024-03-22 17:48:36', '2024-06-07 08:21:30'),
(235, 78, 'تصريح العمل (لحاملي الإقامة الذهبية/ البلاتينية)', 'Work Permit (Golden/ Platinum Visa Holders)', 'من خلال هذه الخدمة، حاملي الإقامة الذهبية أو البلاتينية، الراغبين في العمل يمكنهم الحصول على تصريح عمل.', 'Through this service, Golden/Platinum Visa holders who wish to work can obtain a work permit.', '16.000', '8.000', '2024-03-22 17:50:07', '2024-05-01 09:16:29'),
(236, 78, 'تصريح العمل للمصرح لهم بالإقامة في مملكة البحرين', 'Work Permit for Expatriates Authorized to Reside in the Kingdom of Bahrain', 'من خلال هذه الخدمة، يمكن للعمالة الأجنبية الذين لم يتم إصدار تصاريح إقامتهم من خلال هيئة تنظيم سوق العمل ويرغبون في العمل، التقدم بطلب للحصول على تصريح عمل.', 'Through this service expatriate employees whose resident permits were not issued through LMRA and wish to work, can apply to obtain a work permit', '16.000', '8.000', '2024-03-22 17:51:21', '2024-05-01 09:16:50'),
(237, 78, 'انتقال العامل الأجنبي', 'Expatriate Employee Transfer', 'من خلال هذه الخدمة، يمكن للعمال الأجانب طلب الانتقال إلى صاحب عمل آخر دون الحاجة إلى إلغاء تصاريح العمل الخاصة بهم. ويمكن أن يتم الانتقال بموافقة أو دون موافقة صاحب العمل الحالي.\n\n', 'Through this service, expatriate employees can transfer to another employer without the need of canceling their existing work permit. The transfer can be done with or without the consent of the current employer.\n\n', '10.000', '5.000', '2024-03-22 17:52:45', '2024-06-17 00:03:00'),
(238, 78, 'تغيير المهنة', 'Change of Occupation', 'من خلال هذه الخدمة، يمكن للعمال الأجانب تغيير نوع المهنة الحالية دون الحاجة إلى إلغاء تصاريح العمل الخاصة بهم.', 'Through this service, employers can change the occupation of their expatriate employees without cancelling their work permits', '10.000', '5.000', '2024-03-22 17:54:15', '2024-08-06 18:12:12'),
(239, 78, 'إصدار أو تجديد تصريح العمل للبالغين 60 سنة فما فوق', 'New Work Permit or Renewal for Over 60', 'من خلال هذه الخدمة، يمكن لأصحاب العمل طلب الموافقة على إصدار أو تجديد تصريح العمل للعمال الأجانب الذين يبلغون من العمر 60 سنة أو أكثر.', 'Through this service, employers can request for the approval to issue or renew a work permit for expatriates who are over 60 years old.', '18.000', '9.000', '2024-03-22 17:55:14', '2024-05-01 09:17:59'),
(240, 78, 'إخطار عن ترك العامل الأجنبي للعمل', 'Expatriate Employee Absence From Work Notification', 'من خلال هذه الخدمة، يمكن لأصحاب العمل إبلاغ هيئة تنظيم سوق العمل إذا كان أي من موظفيها قد تغيب عن العمل لمدة 15 يوماً أو أكثر دون أي سبب أو مبرر.', 'Through this service, employers can notify LMRA if any of their employees has been absent from work for a period of 15 days or more without any justifiable reason.\n\n', '10.000', '5.000', '2024-03-22 17:56:20', '2024-06-17 00:03:12'),
(241, 78, 'رفع سقف تصاريح العمل', 'Work Permits Ceiling Increase', 'من خلال هذه الخدمة، يمكن لأصحاب العمل تقديم طلب لزيادة سقف عدد تصاريح العمل المسموح بها. زيادة الرخص في رفع السقف قد تصل إلى الرخصة السادسة أو إلى الرخصة العاشرة ويعتمد ذلك على أنشطة السجل.', 'Through this service, employers can request for increasing the ceiling number of work permits. The increase can be up to 6 or 10 work permits depends on the CR activity.\n\n', '15.000', '8.000', '2024-03-22 17:57:38', '2024-08-06 18:12:51'),
(242, 78, 'تقدير حجم العمل', 'Workload', 'أصحاب العمل المؤهلون للتقدم لهذه الخدمة هم أصحاب العمل الذين يمتلكون مؤسسات كبيرة وخاضعة لنظام البحرنة.', 'Employers who are eligible to apply through this service are the employers who own establishments that entered the Bahrainization zone.\n\n', '10.000', '5.000', '2024-03-22 17:59:00', '2024-06-17 00:03:55'),
(243, 78, 'آلية رفع الملاحظات الإدارية', 'Administrative Notices Removal Mechanism', 'تقوم إدارة التفتيش العمالي بإدراج الملاحظات الإدارية على القيد التجاري أو على الرقم الشخصي لصاحب العمل أو الشخص المخول أو العامل، وذلك بناء على الإجراءات التنظيمية أو نتائج الزيارات التفتيشية، وتتيح هذه الخدمة لصاحب العمل أو الشخص المخول أو العامل رفع الملاحظة الإدارية المدرجة بعد تقديم المستندات واستيفاء المتطلبات.\n\n', 'The Labour Inspection Directorate inserts administrative notices on the commercial registration or on the personal number of the employer, authorized person or worker, based on organizational procedures or results of inspection visits. This service allows the employer, authorized person or worker to raise the listed administrative notice after submitting documents and completing the requirements.\n\n', '10.000', '5.000', '2024-03-22 18:00:00', '2024-08-06 18:12:32'),
(244, 78, 'تحويل ملكية السجلات التجارية', 'Transfer Of Ownership Of Commercial Registrations', 'من خلال هذه الخدمة، في حال تحويل ملكية سجل تجاري وعند تسجيل السجل الجديد في نظام إدارة العاملة الوافدة يقر صاحب العمل بأنه على دراية بجميع الالتزامات القانونية، والمالية، والإدارية المستحقة والملزمة قانونًا للمؤسسة، ويتعهد بالالتزام بها. وعلية سيتم نقل تصاريح العمل الحالية من السجل التجاري القديم الى السجل التجاري الجديد حسب الاجراءات المعمول بها في هيئة تنظيم سوق العمل وفقًا لأحكام القانون.', 'Through this service in case of transfer of ownership for registrations and during registration of the new commercial registration via the Expatriate Management System the employer acknowledges that he/she is aware of all the legal, financial, and administrative obligations which are due and legally bound to the establishment, and undertakes to fulfill all these obligations, wherein the existing work permits will be transferred from the old commercial registration to the new commercial registration as per the applicable procedures in the Labour Market Regulatory Authority in accordance with the provisions of the law.', '20.000', '10.000', '2024-03-22 18:01:37', '2024-03-22 18:01:37'),
(245, 78, 'نية الانتقال', 'Intention to Transfer', 'من خلال هذه الخدمة، يمكن للعامل الأجنبي أن يعلن عن نية الانتقال إلى جهة عمل جديدة أو لتفادي نقله إلى سجل تجاري آخر دون اخطار، وبمجرد تقديم الإخطار، سيتم حظر صاحب العمل الحالي من تجديد تصريح العمل عند نهاية التصريح.\n\n', 'Through this service, an expatriate employee can announce his/her intention to change the employer or to prevent being moved to another Commercial Registration (CR) without notification. Once the notification is submitted, the current employer will be blocked from renewing the employee at the end of the work permit.\n\n', '10.000', '5.000', '2024-03-22 18:02:44', '2024-08-06 18:14:15'),
(246, 78, 'إضافة، حذف أو تفعيل الأشخاص مخولين', 'Add, Reactivate, or Remove an Authorized Person', 'تمكن هذه الخدمة صاحب العمل من إضافة أو تفعيل أو حذف أشخاص مخولين لإدارة المنشأة بالنيابة عن صاحب العمل حسب الصلاحية الممنوحة للمخول.', 'This service enables the employer to add, reactivate, or remove an authorized person to manage the business on behalf of the employer according to the given authority.', '10.000', '5.000', '2024-03-22 18:06:05', '2024-06-17 00:02:39'),
(247, 79, 'تفعيل المنشأة الكترونيا', 'E-SERVICES ACCOUNT ONLINE ACTIVATION', 'من خلال هذه الخدمة يمكن لصاحب العمل تفعيل حساب منشأته إلكترونيا وجميع فروعها إن وجدت، إما باستخدام رقم صاحب العمل أو رقم السجل التجاري، وبعد الانتهاء من عملية التفعيل يمكنه استخدام جميع الخدمات الإلكترونية المتاحة عبر الموقع.\n\n* يشترط التسجيل في المفتاح الإلكتروني لاستخدام هذه الخدمة.\n', 'This eServices enables you to activate your establishment and branches ( if any ) by using Employer Number or CR Number.\n\n* This eService requires an advanced eKey authentication provided by the Information and eGovernment Authority( IGA ).', '10.000', '5.000', '2024-05-01 14:33:46', '2024-08-06 18:14:59'),
(248, 79, 'صلاحية دخول اكثر من مستخدم', 'MAINTAIN USERS', 'تتوفر خاصية دخول أكثر من مستخدم إلى جميع منشآت القطاع العام بالإضافة إلى منشآت القطاع الخاص التي يفوق عدد موظفيها 50 موظف. وستوفر هذه الصلاحية وخدمة إدارة سجلات المستخدمين للمنشآت امكانية تعريف مستخدمين فرعيين لدخول البوابة الالكترونية.', 'This eService is available to those employers where number of employees are more than fifty. This eService provide user management functionality allowing to add/ edit/ delete maximum of 5 sub-users, where sub user access the eServices based on selected privileges.\n', '10.000', '5.000', '2024-05-01 14:36:38', '2024-08-06 18:15:12'),
(249, 79, 'عرض الفاتورة الحالية', 'VIEW CURRENT INVOICE', 'عند إصدار الفاتورة الشهرية للاشتراكات المستحقة يمكن لصاحب العمل الاطلاع على بيانات الفاتورة والتي تتكون من ملخص للفاتورة السابقة وتفاصيل اشتراكات الشهر الحالي وبيان أي غرامات أو فوائد قد تترتب على صاحب العمل، كما يمكن طباعة هذه الفاتورة الإلكترونية وكذلك استعراض تفاصيل مكوناتها، علاوة على ذلك تقوم الهيئة بإرسال رسائل إلكترونية تلقائية عن ملخص الفاتورة لصاحب العمل المعني ورسائل نصية قصيرة فور صدور الفواتير.', 'Once the monthly invoice is issued, the employer may view its details which consist of a summary of the previous invoice, current month contributions details, and fines or interest fees when applicable. The electronic invoice can be printed, and breakdown for its components may be viewed. In addition to that, the SIO sends monthly e-mails providing a summary for the current invoices, as well as SMS notifications once an invoice is issued.', '4.000', '2.000', '2024-05-01 14:38:06', '2024-05-01 14:38:06'),
(250, 79, 'عرض فاتورة الرعاية الصحية', 'VIEW HEALTH CARE FEES COLLECTION INVOICE', 'تمكنكم هذه الخدمة من الاطلاع على فاتورة الرعاية الصحية التي تصدرها الهيئة شهريا حسب القرار الوزاري رقم 29 لسنة 2014 بشأن تحديد وتنظيم الرعاية الصحية الأساسية لعمال المنشآت والذي بناء عليه تقوم الهيئة باصدار الفاتورة الشهرية لرسوم الرعاية الصحية عن البحرينيون المؤمن عليهم بمعدل 22 دينار وخمسائمة فلس سنويا لكل عامل بحريني وبالاضافة الى قيمة الرسوم السنوية التي تظهر في شهر يناير من كل عام، تحتوي الصفحة على ملخص عن فاتورة الشهر السابق وعن أي فروقات شهرية في الرسوم تكون نتيجة اضافة أو استبعاد المؤمن عليهم خلال العام.كما قد تظهر في الفاتورة اعفاء من وزارة الصحة عن الرسوم لفترة محددة وبنسبة محددة، حينها يظهر المبلغ المستحق للفترة والنسبة المتبقية فقط.', 'This eService allows to view the monthly invoice of the health care charges according to the ministerial order number 29 for the year 2014 of the determination and organization of primary health care for establishments and which accordingly SIO issues this monthly invoice of and collecting of these charges for Bahraini workers that is calculated as 22.500 BD per worker annually. In addition to the total annual charges that appears in the invoice of January, the page contains a summary on the previous month details and any differences occurs in monthly bases as result of the addition and termination of the workers during the year. Also the invoice might contains some exceptions by MOH for some period and some percentage, hence only the remaining amount due will show in the invoice.\n', '4.000', '2.000', '2024-05-01 14:39:34', '2024-08-06 18:15:32'),
(251, 79, 'لدفع الإلكتروني', 'ONLINE PAYMENT', 'تمكنك هذه الخدمة من سداد الاشتراكات التأمينية إلكترونياً بطريقة آمنة، وعند إتمام السداد بنجاح يتم تعديل رصيدكم الإلكتروني فوراً. هذه الخدمة متوفرة لبطاقات الصراف الآلي (ATM)ولمجموعه محددة من البنوك . كما يمكنكم الدفع ايضا باستخدام بطاقات الإئتمان .', 'This eService enables you to pay the monthly insurance contributions on-line securely. Your account balance will be immediately updated after a successful payment. This method is available for Credit Card and also for Debit Cards (ATM) and for selected banks.\n', '4.000', '2.000', '2024-05-01 14:40:47', '2024-08-06 18:15:45'),
(252, 79, 'كشف الحساب', 'ACCOUNT STATEMENT', 'تمكن هذه الخدمة صاحب العمل من الاطلاع على تفاصيل كشف الحساب الخاص به لدى الهيئة، والذي يوضح العمليات الحسابية المؤثرة في رصيده مثل عمليات السداد والفواتير الشهرية والإشعارات الدائنة والمدينة.\n', 'This service enables employers to view the statements of their accounts at the SIO. The statement illustrates all financial transactions that affect accounts balances like payment transactions, monthly invoices, and credit and debit notes.', '4.000', '2.000', '2024-05-01 14:42:01', '2024-08-06 18:16:08'),
(253, 79, 'كشف المؤمن عليهم', 'INSURED WORKERS LIST', 'قائمة كشف المؤمن عليهم تظهر سجلات العاملين لديكم واشتراكاتهم المسجلة لدى الهيئة العامة للتأمين الاجتماعي وتبين أي تغيير في حركة السجلات خلال العام من حذف وإضافة أوتعديل بيانات، ويمكن كذلك البحث عن سجل محدد، كما يمكن مطابقة سجلات العاملين مع سجلات الاشتراكات التي تظهر في الفاتورة الأخيرة، وتصدير قائمة كشف المؤمن عليهم في صيغة ملف إكسل. ويتم تحديث هذا الكشف يومياً بعد إتمام أي عملية.', 'The insured workers list shows all of your worker\'s records along with their contributions that are registered with the SIO. The list reflects any changes that have been made to these records during the year: additions, terminations, and amendments. A search feature for a specific record is also available. You may reconcile your employees records with the contribution records appearing in the current invoice, and export the list into an MS Excel file. This statement is updated daily.\n', '4.000', '2.000', '2024-05-01 14:43:41', '2024-05-01 14:43:41'),
(254, 79, 'الإضافة والإستبعاد الشهري', 'INSURED WORKERS LIST', 'عن طريق هذه الخدمة يمكنك استعراض قائمة بأسماء المضافين والمستبعدين من المؤمن عليهم حسب سجلات الهيئة وفقاً للفاتورة الحالية. ويمكنك الاطلاع على تفاصيل معاملات الإضافة والاستبعاد عند تحريك المؤشر فوق أي من السجلات، كذلك يمكنك البحث عن سجل موظف ما بالاسم أو الرقم الشخصي، أو تصدير هذه القائمة في ملف إكسل.\n', 'The insured workers list shows all of your worker\'s records along with their contributions that are registered with the SIO. The list reflects any changes that have been made to these records during the year: additions, terminations, and amendments. A search feature for a specific record is also available. You may reconcile your employees records with the contribution records appearing in the current invoice, and export the list into an MS Excel file. This statement is updated daily.\n', '10.000', '5.000', '2024-05-01 14:46:47', '2024-08-06 18:16:21'),
(255, 79, 'تفاصيل التسويات الشهرية', 'MONTHLY ADDITION AND TERMINATION', 'عن طريق هذه الخدمة يمكنك استعراض قائمة بالتعديلات الشهرية لسجلات المؤمن عليهم التي تؤثر في احتساب أو إعادة احتساب الاشتراكات التي تظهر في الفاتورة الحالية. ويمكنك الاطلاع على تفاصيل التعديلات عند تحريك المؤشر فوق أي من السجلات، كذلك يمكنك البحث عن سجل موظف ما بالاسم أو الرقم الشخصي،. أو تصدير هذه القائمة في ملف إكسل.', 'This service makes available to users a list of added and terminated insurees as per the SIO\'s records corresponding to the current invoice. It also helps you view the details of such transactions when the cursor is placed over a record. You can also search for an employee\'s record using either the name or the ID number. Moreover, this list can be exported into an MS Excel file.', '10.000', '5.000', '2024-05-01 14:48:40', '2024-05-01 14:48:40'),
(256, 79, 'تسجيل العمالة الوطنية', 'NATIONAL WORKER REGISTRATION', 'تتيح هذه الخدمة تسجيل العمالة الوطنية (البحرينيين والخليجيين) إلكترونياً في سجلات الهيئة. هذه الخدمة مربوطة بنظام وزارة العمل والجهاز المركزي للمعلومات والإحصاء، حيث تغنيكم عن الحضور الشخصي وتقديم الأوراق لدى وزارة العمل والهيئة، كما تمكنكم من متابعة الطلب إلكترونياً حتى نهايته. وترسل إخطارات بالبريد الإلكتروني عند غلق المعاملة.\n', 'This eService is to electronically register Bahraini and GCC nationals in the SIO\'s records with no need to personally attend and submit papers as it is integrated with the MOL and the CICO. You can also track the progress of registration transactions on-line until completion. In addition, an e-mail is sent when a transaction is concluded.Through this service, employers may view the progress of National and GCC Workers Registration Processes. They also may view the status and details of the records of the workers to be insured.\n', '10.000', '5.000', '2024-05-01 14:50:28', '2024-05-01 14:50:28'),
(257, 79, 'استبعاد العماله الوطنية', 'NATIONAL WORKER TERMINATION', 'تتيح هذه الخدمة استبعاد العمالة الوطنية (البحرينيين والخليجيين) إلكترونياًحيث تغنيكم عن الحضور الشخصي وتقديم الأوراق لدى الهيئة،كما تمكنكم من متابعة الطلب إلكترونياً حتى نهايته.وترسل إخطارات بالبريد الإلكتروني عند غلق المعاملة.\n', 'This eService is to electronically terminate Bahraini and GCC nationals with no need to personally attend and submit papers to SIO. You can also track the progress of the termination transactions online until completion. In addition, an e-mail is sent when a transaction is concluded.\n', '10.000', '5.000', '2024-05-01 14:51:32', '2024-05-01 14:51:32'),
(258, 79, 'التعديل السنوي للأجور', 'YEARLY UPDATE SALARIES', 'تُمَكِّن هذه الخدمة أصحاب الأعمال من القيام بالتحديث السنوي لبيانات العاملين لديهم من تفاصيل أجور ومسميات وظيفية إلكترونياً في سجلات الهيئة، ويمكن القيام بذلك باستخدام إحدى الخدمتين: الخدمة الأولى هي التحديث المباشر عن طريق البوابة الإلكترونية وتناسب المؤسسات الصغيرة، و الخدمة الثانية ، هي تحميل ملف الأجور المعدلة إلى موقع الهيئة وهي تناسب المؤسسات الكبيرة .\n', 'This service enables employers to electronically perform the yearly update of their employees\' details (salaries and job titles) in the SIO\'s records. The process can be completed using one of two services. The first service is direct update through the ePortal which suits establishments with limited numbers of employees The second service is Upload of Updated Salaries File and it is more suitable for establishments with larger numbers of employees.\n', '10.000', '5.000', '2024-05-01 14:52:38', '2024-08-06 18:16:36'),
(259, 79, 'احتساب المعاش التقاعدي', 'INSUREES PENSION CALCULATION', 'هذه الخدمة تحتسب المعاش التقاعدي المتوقع عند نهاية الخدمة للمؤمن عليهم العاملين في القطاع الخاص بناء على القوانين الخاصة باحتساب المعاش التقاعدي واعتمادا على البيانات الفعلية المسجلة لدى الهيئة، وتعرض هذه الخدمة المعاش التقاعدي المتوقع بتفاصيل احتسابه كما أنها تقترح تواريخ لطلب المعاش التقاعدي للحصول على أفضل قيمة للمعاش.\n', 'This service calculates the expected monthly pension amount for those who works or had worked in the private sector retirement based on Pension Laws and the actual insurance information registered at the SIO. This service displays the pension calculation details and suggested dates for retirement for best pension amount.\n', '6.000', '3.000', '2024-05-01 14:53:42', '2024-08-06 18:16:52'),
(260, 79, 'طلب صرف المعاش التقاعدي', 'REQUEST FOR PENSION', 'هذه الخدمة تمكنكم من طلب صرف المعاش إلكترونيا بعد استبعاد المؤمن عليه، حيث تغنيكم عن الحضور الشخصي وتقديم الأوراق لدى الهيئة. ويتم ذلك بعد اطلاع المؤمن عليه على المعاش التقاعدي المستحق عند إنهاء خدمته، وتحققه من جميع البيانات المسجلةالتي لها تأثير مباشر في احتساب المعاش التقاعدي والمكافأة. .\n', 'This eService allows submitting the pension request electronically after completion of service and is applicable to Bahraini nationals only. With help of this eService, there is no need to personally attend and submit papers to the SIO. .\n', '10.000', '5.000', '2024-05-01 14:54:52', '2024-05-01 14:54:52'),
(261, 79, 'بيـــان اشتراكـــات المؤمن عليهم', 'INSUREE CONTRIBUTION STATMENT', 'هذه الخدمة تمكن المؤمن عليه العامل في القطاع الخاص من استعراض بيان الاشتراكات المسجلة لدى الهيئة والمبنية على قيمة الأجر التأميني التي قام أصحاب الأعمال الذين عمل لديهم بتسجيلها في نظام الهيئة سواء للعمل الحالي أو عن الفترات السابقة، وذلك للتحقق من صحة هذه البيانات التي لها تأثير مباشر في احتساب المستحقات التأمينية والإبلاغ عن أي خطأ في صحة البيانات.\n', 'This service displays a statement of your salary at SIO that was registered by your employers for current job and during the previous years, so you can verify the salaries that was register and report any errors.\n\n', '4.000', '2.000', '2024-05-01 14:55:48', '2024-05-01 14:55:48'),
(262, 79, 'احتساب متوسط الأجر', 'AVARAGE SALARY CALCULATION', 'تقوم هذه الخدمة باحتساب الأجر الافتراضي لأي وظيفة بناءً على معطيات متعددة يحددها المستخدم، مثل المهنة والمؤهل الدراسي وسنوات الخبرة ونوع نشاط المؤسسة وحجمها، حيث يتم احتساب القيمة من متوسط الأجر للوظائف المطابقة مباشرة من قاعدة بيانات الهيئة والتي تعكس بيانات سوق العمل الحالية في مملكة البحرين.\n', 'This service allows to calculate a salary assumption for any applied job, based on selected parameters such as the job title, qualification, years of experience, employer activity and size of the company. Calculation depends on SIO’s database which reflects the current status of the labor market.\n', '4.000', '2.000', '2024-05-01 14:56:39', '2024-05-01 14:56:39'),
(263, 79, 'تحديث المسمى الوظيفي', 'UPDATE JOB TITLE', 'تمكنكم هذه الخدمة من تحديث المسميات الوظيفية الكترونيا للمؤمن عليهم المسجلين لديكم وفقا للقوانين المعمول بها في هذا الخصوص، هذه الخدمة متوفرة للمؤمن عليهم حاملين الجنسية البحرينية والخليجية فقط ولا تشمل الاجانب. .\n', 'This service allows you to update the job title for the insurees registered in your establishment in accordance with aplicable law,this service is only avaliable for bahraini nationality and GCC citizens insurees.\n', '6.000', '3.000', '2024-05-01 14:57:31', '2024-05-01 14:57:31'),
(264, 79, 'تسجيل اصابة العمل', 'REGISTER WORK ACCIDENT', 'تتيح خدمة تسجيل اصابات العمل لاصحاب الاعمال تقديم بلاغات الاصابة و تسجيل البدلات اليومية الكترونياً في سجلات الهيئة حيث تغني عن الحضور الشخصي و تقديم الأوراق والمستندات لدى الهيئة، كما تمكنكم من متابعة المعاملة الكترونياً حتى نهايتها.\n', 'The Worker accidents eService allow employers to register Work accidents and daily allowances in the SIO records with no need to personally attend and submit papers. You can also track the progress of worker accidents transactions on-line until completion.\n', '10.000', '5.000', '2024-05-01 14:58:56', '2024-05-01 14:58:56'),
(265, 81, 'طلب تجديد فترة السماح', 'Grace Period Renewal Request', 'تقديم طلب تجديد فترة السماح لرخص الإقامة الملغاة.\n\n', 'Submit a request to renew the grace period for cancelled residency permits.\n\n', '6.000', '3.000', '2024-06-07 08:12:29', '2024-06-07 08:18:25'),
(266, 83, 'طلب إصدار رخصة تعلم السياقة', 'Learner License Issuance Request', 'تقديم طلب إصدار رخصة تعلم السياقة ودفع الرسوم المطلوبة.', 'Submit a request to issue the learner license and pay the required fees.', '8.000', '4.000', '2024-06-12 10:53:14', '2024-06-12 10:53:14'),
(267, 83, 'حجز موعد امتحان السياقة', 'Book Driving Test Appointment', 'حجز موعد لامتحان السياقة.', 'Book an appointment for the driving test.', '2.000', '1.000', '2024-06-12 10:55:18', '2024-06-12 10:55:18'),
(268, 83, 'تجديد رخصة تعلم سياقة', 'Learner Driving License Renewal', 'تجديد رخص تعلم السياقة للمركبات الخاصة والدراجات النارية', 'Renew the learner driving license for private vehicles and motorcycles.', '6.000', '3.000', '2024-06-12 10:56:54', '2024-06-12 10:56:54'),
(269, 85, 'فتح حساب', 'OPEN ACCOUNT', 'فتح حساب', 'OPEN ACCOUNT', '1.000', '1.000', '2024-06-13 00:17:32', '2024-06-13 00:17:32'),
(270, 85, 'فتح عضوية شهر واحد (شركة)', '(company)Open one month membership', 'فتح عضوية شهر واحد (شركة) ', '(company)Open one month membership', '3.000', '3.000', '2024-06-13 00:25:20', '2024-06-13 00:32:26'),
(272, 85, 'فتح عضوية سنه واحدة (شركة)', '(company) Open a one-year membership', 'فتح عضوية سنه واحدة (شركة)', '(company) Open a one-year membership', '12.000', '12.000', '2024-06-13 00:29:53', '2024-06-13 00:47:29'),
(273, 85, 'فتح عضوية سنه واحدة (شخصية)', 'Open One Year Membership (Personal)', 'فتح عضوية سنه واحدة (شخصية)', 'Open One Year Membership (Personal)', '6.000', '6.000', '2024-06-13 00:35:32', '2024-06-13 00:35:32'),
(274, 78, 'فاتورة الشهرية هيئة تنظيم سوق العمل', ' Monthly Invoice LMRA', 'فاتورة الشهرية هيئة تنظيم سوق العمل', ' Monthly Invoice LMRA', '2.000', '1.000', '2024-06-13 23:08:34', '2024-08-06 18:11:46'),
(275, 85, 'فتح عضوية سنه واحدة (شركة)اكثر من سجل (يحدد من قبل خط الوسيط)', 'Open membership of one-year (company) more than one record (determined by the broker\'s line)', 'فتح عضوية سنه واحدة (شركة) اكثر من سجل (يحدد من قبل خط الوسيط)', 'Open membership of one-year (company) more than one record (determined by the broker\'s line)', '0.000', '0.000', '2024-06-16 01:57:06', '2024-06-16 02:02:48'),
(276, 87, 'المساعدة المعيشية', 'Cost of Living Assistance', 'تهدف إلى دعم الفئات المحتاجة من المواطنين البحرينيين وتخفيف الأعباء المعيشية عنهم، والمساهمة في تلبية احتياجاتهم ومتطلباتهم الحياتية الملحة، وذلك عن طريق صرف مساعدة مالية مقطوعة.', 'It aims to support needy segments of Bahraini citizens, ease their burden of living, and contribute to meeting their urgent life needs and requirements, through paying them a financial assistance...', '30.000', '15.000', '2024-06-22 15:18:03', '2024-06-22 15:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `type` enum('string','text','editor','image') DEFAULT NULL,
  `br` tinyint(1) NOT NULL DEFAULT 0,
  `hr` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `br`, `hr`, `created_at`, `updated_at`) VALUES
(5, 'title', 'Al Waseet', 'string', 0, 0, NULL, NULL),
(6, 'logo', '/storage/setting/1701959818_7456.webp', 'image', 0, 1, NULL, NULL),
(7, 'whatsapp', '97337900700+', 'string', 0, 0, NULL, NULL),
(8, 'youtube', 'https://www.google.com', 'string', 0, 0, NULL, NULL),
(9, 'facebook', 'https://www.facebook.com', 'string', 0, 0, NULL, NULL),
(10, 'instagram', 'https://www.instagram.com', 'string', 0, 1, NULL, NULL),
(11, 'about_us_image', '/storage/setting/1718960085_6990.webp', 'image', 1, 0, NULL, NULL),
(12, 'about_us_ar', 'خط الوسط للتخليص المعاملات', 'text', 0, 0, NULL, NULL),
(13, 'about_us_en', 'ALWASEET LINE DOCUMENTS CLEARANCE', 'text', 0, 1, NULL, NULL),
(14, 'footer_logo', '/storage/setting/1718960072_8173.webp', 'image', 1, 0, NULL, NULL),
(15, 'footer_paragraph_ar', 'وصف الفوتر بالعربية', 'text', 0, 0, NULL, NULL),
(16, 'footer_paragraph_en', 'Footer Description in En', 'text', 0, 1, NULL, NULL),
(17, 'google_map_link', 'https://www.google.com/maps/place/26%C2%B010\'00.5%22N+50%C2%B033\'43.2%22E/@26.1668056,50.562,17z/data=!3m1!4b1!4m4!3m3!8m2!3d26.1668056!4d50.562?entry=ttu', 'string', 0, 0, NULL, NULL),
(18, 'address', 'isa twon 806', 'string', 0, 0, NULL, NULL),
(19, 'email', 'WLDC.2025@GMAIL.COM', 'string', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `desc_ar` varchar(255) NOT NULL,
  `desc_en` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `image`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `link`, `created_at`, `updated_at`) VALUES
(6, '/storage/slides/1718959569_6767.webp', 'خط الوسيط لتخليص المعاملات', 'ALWASEET LINE DOCUMENTS CLEARANCE', 'المكاتب التي تعمل في مجال إعداد الوثائق ومستندات المعاملات ', 'Offices that work in the preparation and completion of documents, ', 'https://images.app.goo.gl/d5aPX8z3JBhV9bfC8', '2024-06-21 08:46:09', '2024-06-21 08:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `cpr` varchar(255) NOT NULL,
  `wallet` decimal(8,3) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number_months` int(11) DEFAULT NULL,
  `end_memebership` date DEFAULT NULL,
  `price_month` decimal(8,3) DEFAULT NULL,
  `total_price_month` decimal(8,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `is_verified`, `cpr`, `wallet`, `remember_token`, `created_at`, `updated_at`, `number_months`, `end_memebership`, `price_month`, `total_price_month`) VALUES
(170, 'علي سعد صقر هلال', 'alisaad@gmail.com', '33329451', NULL, '$2y$10$MpI.IL/LzdyeaHe8M5nnK.xt7jbGiZbX6jQwffUFbkrAIrLUX0om6', 1, '600003345', 0.000, NULL, '2024-08-07 18:39:25', '2024-08-07 18:39:25', NULL, NULL, NULL, NULL),
(171, 'FAHAD MOHAMED HASAN ALI RAABAN ALAZEMI', 'FAHAD.ALAZMI.3777@GMAIL.COM', '37776962', NULL, '$2y$10$3tnBc.UW.4xIUx1RWnKIxuUNcYKKC5OXQXE8fJx40iZhJblTR3966', 1, '880303387', 0.500, NULL, '2024-08-07 20:20:56', '2024-08-07 20:48:30', 1, '2024-09-07', 1.000, 1.000);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(9,3) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1-withdraw(سحب)\r\n2-deposit(إيداع)',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_id`, `amount`, `type`, `created_at`, `updated_at`) VALUES
(23, 171, 0.500, 2, '2024-08-07 23:48:30', '2024-08-07 23:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `personal_number` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `name`, `personal_number`, `passport_number`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(116, 'MOHAMMED NUR NABI A T M SHAMSUL ALAM ', '630723974', 'BX0709570 ', '0', 'A@A.COM', '2024-07-29 16:34:55', '2024-07-29 16:34:55'),
(117, 'BALAN PATINHARE THAZHEKUNIYIL S/O CHATHU PATINHARE THAZHEKUNIYIL ', '680579800', 'P8673952 ', '0', 'A@A.COM', '2024-07-29 16:35:57', '2024-07-29 16:35:57'),
(118, 'KUNHABDULLA MEETHALE VEETTIL S/O AMMAD', '750439769', 'U9646829', '0', 'A@A.COM', '2024-07-29 16:39:59', '2024-07-29 16:39:59'),
(119, 'RASHEED MEERATTIL S/O ASSAINAR MEERATTIL', '711139628', 'B6750657	', '0', 'A@A.COM', '2024-07-29 16:41:18', '2024-07-29 16:41:18'),
(120, 'FAIZAL CHEKKIPARAMBA S/O MAIKKOT MUHAMMAD', '791327736', 'R5048593', '0', 'A@A.COM', '2024-07-29 16:43:17', '2024-07-29 16:43:17'),
(121, 'BABAR SHAHZAD MUHAMMAD MANSHA', '911254382', 'TX5158081', '0', 'A@A.COM', '2024-07-29 16:45:14', '2024-07-29 16:45:14'),
(122, 'FIROZKHAN CHULLIKKULAVAN MOHAMMED S/O MOHAMMED', '841422338', 'P3696840', '0', 'A@A.COM', '2024-07-29 16:47:19', '2024-07-29 16:47:19'),
(123, 'MOHAMMED ASHARAF KARIMBIN THODI S/O ABDUL SALAM KARIMBIN THODI', '870294970', 'N2369767	', '0', 'A@A.COM', '2024-07-29 16:50:07', '2024-07-29 16:50:07'),
(124, 'UMMER FAZIL PATHARAKKAL S/O ISMAYIL PATHARAKKAL', '911334084', 'Y2352975', '0', 'A@A.COM', '2024-07-29 16:51:56', '2024-07-29 16:51:56'),
(125, 'GAMAL ABD ELHAMID ABD ELAZIZ EISSA ', '640911234', 'A34982688', '0', 'A@A.COM', '2024-07-29 17:14:58', '2024-07-29 17:14:58'),
(126, 'JAHANGIR ALAM RUHUL AMIN ', '840429550', 'BY0605394 ', '0', 'A@A.COM', '2024-07-29 17:16:07', '2024-07-29 17:16:07'),
(127, 'MOUSTAFA MOHAMED IBRAHIM ELNEFYAWY ', '751221040', 'A27181136 	', '0', 'A@A.COM', '2024-07-29 17:18:02', '2024-07-29 17:18:02'),
(128, 'ABDELFATTAH MOHAMED ABDELFATTAH EMAM ', '891129243', 'A35186202 ', '0', 'A@A.COM', '2024-07-29 17:19:06', '2024-07-29 17:19:06'),
(129, 'MOHAMED MOHAMED ABDELFATTAH EMAM ', '930928261', 'A33908830 ', '0', 'A@A.COM', '2024-07-29 17:22:34', '2024-07-29 17:22:34'),
(130, 'MUHAMMAD NAWAZ S/O MUHAMMAD SULTAN ', '040522954', 'HH9619611 ', '0', 'A@A.COM', '2024-07-29 17:30:07', '2024-07-29 17:30:07'),
(131, 'ZAKIR MUMTAZ S/O MUMTAZ ALI ', '930856481', 'BT0270141 ', '0', 'A@A.COM', '2024-07-29 17:30:52', '2024-07-29 17:30:52'),
(132, 'MUHAMMAD SALEEM S/O MUHAMMAD YOUSUF ', '960346155', 'MA5755791 ', '0', 'A@A.COM', '2024-07-29 17:32:17', '2024-07-29 17:32:17'),
(133, ' SHAMAIL AHMED KHAN S/O BABAR KHAN ', '981231799', 'EK4157551 ', '0', 'A@A.COM', '2024-07-29 17:32:59', '2024-07-29 17:32:59'),
(134, 'NRIPESH CHANDRA SEN NIRODH SEN ', '641016042', 'EE0929324 	', '0', 'A@A.COM', '2024-07-29 17:36:27', '2024-07-29 17:36:27'),
(135, 'AKASH BAROY JAGADISH BAROY ', '800655931', 'EG0630792 	', '0', 'A@A.COM', '2024-07-29 17:38:18', '2024-07-29 17:38:18'),
(136, 'NIRANJAN BARAI NITYA GOPAL BARAI ', '821361562', 'EH0701591 ', '0', 'A@A.COM', '2024-07-29 17:38:55', '2024-07-29 17:38:55'),
(137, ' RIPAN BAROI JAGADISH BAROI ', '860654540', 'EK0639843 ', '0', 'A@A.COM', '2024-07-29 17:39:41', '2024-07-29 17:39:41'),
(138, ' EHAB ABDELRAHMAN ABDELHAMED EISA ', '870697072', 'A33553428', '0', 'A@A.COM', '2024-07-29 17:40:50', '2024-07-29 17:40:50'),
(139, 'MOHAMED HESHAM ABOUELMAKAREM AWAD DEKHAIL ', '040421597', 'A31234064 ', '0', 'A@A.COM', '2024-07-29 17:41:57', '2024-07-29 17:41:57'),
(140, ' HARPREET SINGH S/O MANJIT SINGH ', '791117901', 'U0208016', '0', 'A@A.COM', '2024-07-29 17:43:32', '2024-07-29 17:43:32'),
(141, 'BALRAJ SINGH S/O JAGDEEP SINGH ', '040521591', 'W3031499 ', '0', 'A@A.COM', '2024-07-29 17:44:17', '2024-07-29 17:44:17'),
(142, 'KIRATPAL SINGH S/O JASWINDER SINGH ', '020925379', 'V1373468 ', '0', 'A@A.COM', '2024-07-29 17:45:01', '2024-07-29 17:45:01'),
(144, 'RIPON MONDAL S/O PALASH MONDAL', '950249050', 'Y8880293', '0', 'A@A.COM', '2024-08-07 19:03:57', '2024-08-07 19:03:57'),
(145, 'MUHAMMAD SHAHBAZ', '910535230', 'ZU5142602', '0', 'SHAHBAZPERDASI0@GMAIL.COM', '2024-08-07 21:48:13', '2024-08-07 21:48:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_service_id_foreign` (`service_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_category_id_foreign` (`category_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpr` (`cpr`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_users` (`user_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
