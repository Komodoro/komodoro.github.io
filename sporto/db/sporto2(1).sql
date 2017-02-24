-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Fev-2017 às 13:42
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sporto2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acos`
--

CREATE TABLE `acos` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) UNSIGNED DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, '', NULL, 'controllers', 1, 4),
(2, 1, '', NULL, 'Events', 2, 3),
(3, NULL, '', NULL, 'admin', 5, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aros`
--

CREATE TABLE `aros` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) UNSIGNED DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, '', 1, 2),
(2, NULL, 'Group', 2, '', 3, 4),
(3, NULL, 'Group', 3, '', 5, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(10) UNSIGNED NOT NULL,
  `aro_id` int(10) UNSIGNED NOT NULL,
  `aco_id` int(10) UNSIGNED NOT NULL,
  `_create` char(2) NOT NULL DEFAULT '0',
  `_read` char(2) NOT NULL DEFAULT '0',
  `_update` char(2) NOT NULL DEFAULT '0',
  `_delete` char(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 3, '1', '1', '1', '1'),
(2, 1, 2, '1', '1', '1', '1'),
(3, 2, 3, '-1', '-1', '-1', '-1'),
(4, 2, 2, '1', '1', '1', '1'),
(5, 3, 3, '-1', '-1', '-1', '-1'),
(6, 3, 2, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Football', 'football'),
(2, 'Basketball', 'basketball'),
(3, 'Tenis', 'tenis'),
(4, 'Running', 'running'),
(5, 'Trail', 'trail'),
(6, 'Cycling', 'cycling'),
(7, 'Handebol', 'andebol'),
(8, 'Hokey', 'hokey'),
(9, 'Mixed Martial Arts', 'MMA'),
(10, 'Swimming', 'swimming'),
(11, 'Voleyball', 'voleyball'),
(12, 'Outro', 'outro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `countries`
--

CREATE TABLE `countries` (
  `id` int(4) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`) VALUES
(1, 'Afghanistan', 'afghanistan'),
(2, 'Åland Islands', 'aland-islands'),
(3, 'Albania', 'albania'),
(4, 'Algeria', 'algeria'),
(5, 'American Samoa', 'american-samoa'),
(6, 'Andorra', 'andorra'),
(7, 'Angola', 'angola'),
(8, 'Anguilla', 'anguilla'),
(9, 'Antarctica', 'antarctica'),
(10, 'Antigua and Barbuda', 'antigua-and-barbuda'),
(11, 'Argentina', 'argentina'),
(12, 'Armenia', 'armenia'),
(13, 'Aruba', 'aruba'),
(14, 'Australia', 'australia'),
(15, 'Austria', 'austria'),
(16, 'Azerbaijan', 'azerbaijan'),
(17, 'Bahamas', 'bahamas'),
(18, 'Bahrain', 'bahrain'),
(19, 'Bangladesh', 'bangladesh'),
(20, 'Barbados', 'barbados'),
(21, 'Belarus', 'belarus'),
(22, 'Belgium', 'belgium'),
(23, 'Belize', 'belize'),
(24, 'Benin', 'benin'),
(25, 'Bermuda', 'bermuda'),
(26, 'Bhutan', 'bhutan'),
(27, 'Bolivia, Plurinational State of', 'bolivia-plurinational-state-of'),
(28, 'Bosnia and Herzegovina', 'bosnia-and-herzegovina'),
(29, 'Botswana', 'botswana'),
(30, 'Bouvet Island', 'bouvet-island'),
(31, 'Brazil', 'brazil'),
(32, 'British Indian Ocean Territory', 'british-indian-ocean-territory'),
(33, 'Brunei Darussalam', 'brunei-darussalam'),
(34, 'Bulgaria', 'bulgaria'),
(35, 'Burkina Faso', 'burkina-faso'),
(36, 'Burundi', 'burundi'),
(37, 'Cambodia', 'cambodia'),
(38, 'Cameroon', 'cameroon'),
(39, 'Canada', 'canada'),
(40, 'Cape Verde', 'cape-verde'),
(41, 'Cayman Islands', 'cayman-islands'),
(42, 'Central African Republic', 'central-african-republic'),
(43, 'Chad', 'chad'),
(44, 'Chile', 'chile'),
(45, 'China', 'china'),
(46, 'Christmas Island', 'christmas-island'),
(47, 'Cocos (Keeling) Islands', 'cocos-keeling-islands'),
(48, 'Colombia', 'colombia'),
(49, 'Comoros', 'comoros'),
(50, 'Congo', 'congo'),
(51, 'Congo, The Democratic Republic of the', 'congo-the-democratic-republic-of-the'),
(52, 'Cook Islands', 'cook-islands'),
(53, 'Costa Rica', 'costa-rica'),
(54, 'Côte D''Ivoire', 'cote-d-ivoire'),
(55, 'Croatia', 'croatia'),
(56, 'Cuba', 'cuba'),
(57, 'Cyprus', 'cyprus'),
(58, 'Czech Republic', 'czech-republic'),
(59, 'Denmark', 'denmark'),
(60, 'Djibouti', 'djibouti'),
(61, 'Dominica', 'dominica'),
(62, 'Dominican Republic', 'dominican-republic'),
(63, 'Ecuador', 'ecuador'),
(64, 'Egypt', 'egypt'),
(65, 'El Salvador', 'el-salvador'),
(66, 'Equatorial Guinea', 'equatorial-guinea'),
(67, 'Eritrea', 'eritrea'),
(68, 'Estonia', 'estonia'),
(69, 'Ethiopia', 'ethiopia'),
(70, 'Falkland Islands (Malvinas)', 'falkland-islands-malvinas'),
(71, 'Faroe Islands', 'faroe-islands'),
(72, 'Fiji', 'fiji'),
(73, 'Finland', 'finland'),
(74, 'France', 'france'),
(75, 'French Guiana', 'french-guiana'),
(76, 'French Polynesia', 'french-polynesia'),
(77, 'French Southern Territories', 'french-southern-territories'),
(78, 'Gabon', 'gabon'),
(79, 'Gambia', 'gambia'),
(80, 'Georgia', 'georgia'),
(81, 'Germany', 'germany'),
(82, 'Ghana', 'ghana'),
(83, 'Gibraltar', 'gibraltar'),
(84, 'Greece', 'greece'),
(85, 'Greenland', 'greenland'),
(86, 'Grenada', 'grenada'),
(87, 'Guadeloupe', 'guadeloupe'),
(88, 'Guam', 'guam'),
(89, 'Guatemala', 'guatemala'),
(90, 'Guernsey', 'guernsey'),
(91, 'Guinea', 'guinea'),
(92, 'Guinea-Bissau', 'guinea-bissau'),
(93, 'Guyana', 'guyana'),
(94, 'Haiti', 'haiti'),
(95, 'Heard Island and Mcdonald Islands', 'heard-island-and-mcdonald-islands'),
(96, 'Holy See (Vatican City State)', 'holy-see-vatican-city-state'),
(97, 'Honduras', 'honduras'),
(98, 'Hong Kong', 'hong-kong'),
(99, 'Hungary', 'hungary'),
(100, 'Iceland', 'iceland'),
(101, 'India', 'india'),
(102, 'Indonesia', 'indonesia'),
(103, 'Iran, Islamic Republic of', 'iran-islamic-republic-of'),
(104, 'Iraq', 'iraq'),
(105, 'Ireland', 'ireland'),
(106, 'Isle of Man', 'isle-of-man'),
(107, 'Israel', 'israel'),
(108, 'Italy', 'italy'),
(109, 'Jamaica', 'jamaica'),
(110, 'Japan', 'japan'),
(111, 'Jersey', 'jersey'),
(112, 'Jordan', 'jordan'),
(113, 'Kazakhstan', 'kazakhstan'),
(114, 'Kenya', 'kenya'),
(115, 'Kiribati', 'kiribati'),
(116, 'Korea, Democratic People''s Republic of', 'korea-democratic-people-s-republic-of'),
(117, 'Korea, Republic of', 'korea-republic-of'),
(118, 'Kuwait', 'kuwait'),
(119, 'Kyrgyzstan', 'kyrgyzstan'),
(120, 'Lao People''s Democratic Republic', 'lao-people-s-democratic-republic'),
(121, 'Latvia', 'latvia'),
(122, 'Lebanon', 'lebanon'),
(123, 'Lesotho', 'lesotho'),
(124, 'Liberia', 'liberia'),
(125, 'Libya', 'libya'),
(126, 'Liechtenstein', 'liechtenstein'),
(127, 'Lithuania', 'lithuania'),
(128, 'Luxembourg', 'luxembourg'),
(129, 'Macao', 'macao'),
(130, 'Macedonia, The Former Yugoslav Republic of', 'macedonia-the-former-yugoslav-republic-of'),
(131, 'Madagascar', 'madagascar'),
(132, 'Malawi', 'malawi'),
(133, 'Malaysia', 'malaysia'),
(134, 'Maldives', 'maldives'),
(135, 'Mali', 'mali'),
(136, 'Malta', 'malta'),
(137, 'Marshall Islands', 'marshall-islands'),
(138, 'Martinique', 'martinique'),
(139, 'Mauritania', 'mauritania'),
(140, 'Mauritius', 'mauritius'),
(141, 'Mayotte', 'mayotte'),
(142, 'Mexico', 'mexico'),
(143, 'Micronesia, Federated States of', 'micronesia-federated-states-of'),
(144, 'Moldova, Republic of', 'moldova-republic-of'),
(145, 'Monaco', 'monaco'),
(146, 'Mongolia', 'mongolia'),
(147, 'Montenegro', 'montenegro'),
(148, 'Montserrat', 'montserrat'),
(149, 'Morocco', 'morocco'),
(150, 'Mozambique', 'mozambique'),
(151, 'Myanmar', 'myanmar'),
(152, 'Namibia', 'namibia'),
(153, 'Nauru', 'nauru'),
(154, 'Nepal', 'nepal'),
(155, 'Netherlands', 'netherlands'),
(156, 'New Caledonia', 'new-caledonia'),
(157, 'New Zealand', 'new-zealand'),
(158, 'Nicaragua', 'nicaragua'),
(159, 'Niger', 'niger'),
(160, 'Nigeria', 'nigeria'),
(161, 'Niue', 'niue'),
(162, 'Norfolk Island', 'norfolk-island'),
(163, 'Northern Mariana Islands', 'northern-mariana-islands'),
(164, 'Norway', 'norway'),
(165, 'Oman', 'oman'),
(166, 'Pakistan', 'pakistan'),
(167, 'Palau', 'palau'),
(168, 'Palestinian Territory, Occupied', 'palestinian-territory-occupied'),
(169, 'Panama', 'panama'),
(170, 'Papua New Guinea', 'papua-new-guinea'),
(171, 'Paraguay', 'paraguay'),
(172, 'Peru', 'peru'),
(173, 'Philippines', 'philippines'),
(174, 'Pitcairn', 'pitcairn'),
(175, 'Poland', 'poland'),
(176, 'Portugal', 'portugal'),
(177, 'Puerto Rico', 'puerto-rico'),
(178, 'Qatar', 'qatar'),
(179, 'Réunion', 'reunion'),
(180, 'Romania', 'romania'),
(181, 'Russian Federation', 'russian-federation'),
(182, 'Rwanda', 'rwanda'),
(183, 'Saint Barthélemy', 'saint-barthelemy'),
(184, 'Saint Helena, Ascension and Tristan da Cunha', 'saint-helena-ascension-and-tristan-da-cunha'),
(185, 'Saint Kitts and Nevis', 'saint-kitts-and-nevis'),
(186, 'Saint Lucia', 'saint-lucia'),
(187, 'Saint Martin (French part)', 'saint-martin-french-part'),
(188, 'Saint Pierre and Miquelon', 'saint-pierre-and-miquelon'),
(189, 'Saint Vincent and the Grenadines', 'saint-vincent-and-the-grenadines'),
(190, 'Samoa', 'samoa'),
(191, 'San Marino', 'san-marino'),
(192, 'Sao Tome and Principe', 'sao-tome-and-principe'),
(193, 'Saudi Arabia', 'saudi-arabia'),
(194, 'Senegal', 'senegal'),
(195, 'Serbia', 'serbia'),
(196, 'Seychelles', 'seychelles'),
(197, 'Sierra Leone', 'sierra-leone'),
(198, 'Singapore', 'singapore'),
(199, 'Sint Maarten (Dutch part)', 'sint-maarten-dutch-part'),
(200, 'Slovakia', 'slovakia'),
(201, 'Slovenia', 'slovenia'),
(202, 'Solomon Islands', 'solomon-islands'),
(203, 'Somalia', 'somalia'),
(204, 'South Africa', 'south-africa'),
(205, 'South Georgia and The South Sandwich Islands', 'south-georgia-and-the-south-sandwich-islands'),
(206, 'Spain', 'spain'),
(207, 'Sri Lanka', 'sri-lanka'),
(208, 'Sudan', 'sudan'),
(209, 'Suriname', 'suriname'),
(210, 'Svalbard and Jan Mayen', 'svalbard-and-jan-mayen'),
(211, 'Swaziland', 'swaziland'),
(212, 'Sweden', 'sweden'),
(213, 'Switzerland', 'switzerland'),
(214, 'Syrian Arab Republic', 'syrian-arab-republic'),
(215, 'Taiwan, Province of China', 'taiwan-province-of-china'),
(216, 'Tajikistan', 'tajikistan'),
(217, 'Tanzania, United Republic of', 'tanzania-united-republic-of'),
(218, 'Thailand', 'thailand'),
(219, 'Timor-Leste', 'timor-leste'),
(220, 'Togo', 'togo'),
(221, 'Tokelau', 'tokelau'),
(222, 'Tonga', 'tonga'),
(223, 'Trinidad and Tobago', 'trinidad-and-tobago'),
(224, 'Tunisia', 'tunisia'),
(225, 'Turkey', 'turkey'),
(226, 'Turkmenistan', 'turkmenistan'),
(227, 'Turks and Caicos Islands', 'turks-and-caicos-islands'),
(228, 'Tuvalu', 'tuvalu'),
(229, 'Uganda', 'uganda'),
(230, 'Ukraine', 'ukraine'),
(231, 'United Arab Emirates', 'united-arab-emirates'),
(232, 'United Kingdom', 'united-kingdom'),
(233, 'United States', 'united-states'),
(234, 'United States Minor Outlying Islands', 'united-states-minor-outlying-islands'),
(235, 'Uruguay', 'uruguay'),
(236, 'Uzbekistan', 'uzbekistan'),
(237, 'Vanuatu', 'vanuatu'),
(238, 'Venezuela, Bolivarian Republic of', 'venezuela-bolivarian-republic-of'),
(239, 'Viet Nam', 'viet-nam'),
(240, 'Virgin Islands, British', 'virgin-islands-british'),
(241, 'Virgin Islands, U.S.', 'virgin-islands-u-s'),
(242, 'Wallis and Futuna', 'wallis-and-futuna'),
(243, 'Western Sahara', 'western-sahara'),
(244, 'Yemen', 'yemen'),
(245, 'Zambia', 'zambia'),
(246, 'Zimbabwe', 'zimbabwe'),
(247, 'Kosovo', 'kosovo'),
(248, 'Bonaire, Sint Eustatius and Saba', 'bonaire-sint-eustatius-and-saba'),
(249, 'Curaçao', 'curacao'),
(250, 'South Sudan', 'south-sudan');

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `venue_id` int(11) NOT NULL,
  `repeat_parent` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `web` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `promoted` tinyint(1) NOT NULL DEFAULT '0',
  `promoted_in_category` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CONFIRMED',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `events_tags`
--

CREATE TABLE `events_tags` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `events_users`
--

CREATE TABLE `events_users` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Guests', '2016-02-16 17:33:21', '2016-02-15 15:00:00'),
(2, 'User', NULL, NULL),
(3, 'Event Managers', '2016-02-16 17:33:21', '2016-02-15 15:00:00'),
(5, 'Administrators', '2016-02-16 17:33:21', '2016-02-15 15:00:00'),
(6, 'Super User', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'googleMapKey', ''),
(2, 'appName', 'Evento'),
(3, 'appSlogan', 'your upcoming events'),
(4, 'adminEmail', 'admin@example.com'),
(5, 'systemEmail', 'system@example.com'),
(7, 'language', 'eng'),
(8, 'weekStart', 'monday'),
(9, 'htmlTop', ''),
(10, 'htmlBottom', ''),
(11, 'guestsCanAddEvents', '1'),
(12, 'validateEmails', '0'),
(13, 'moderateEvents', '0'),
(14, 'timeZone', ''),
(15, 'country_id', ''),
(16, 'city_name', ''),
(17, 'adminAddsUsers', '0'),
(18, 'timeFormat', '12'),
(19, 'adminVenues', '0'),
(20, 'dateFormat', 'd/m/Y'),
(21, 'recaptchaPublicKey', ''),
(22, 'recaptchaPrivateKey', ''),
(23, 'disableComments', '0'),
(24, 'disablePhotos', '0'),
(25, 'disableAttendees', '0'),
(26, 'theme', 'Evento'),
(27, 'facebookAppId', ''),
(28, 'facebookSecret', ''),
(29, 'paypalAPIUsername', ''),
(30, 'paypalAPIPassword', ''),
(31, 'paypalAPISignature', ''),
(32, 'paypalCurrency', ''),
(33, 'paypalAddEventPrice', ''),
(34, 'paypalAPISandbox', ''),
(35, 'twitterAccount', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `facebook_id` int(11) DEFAULT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `username` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alter_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(60) COLLATE utf8_unicode_ci DEFAULT 'user_photo.jpg',
  `notification` tinyint(1) NOT NULL DEFAULT '1',
  `salt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `confirmcode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `validation_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `validation_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `users_ip` varchar(200) collate utf8_unicode_ci DEFAULT NULL,
  `banned` int(1) NOT NULL default '0',
  `ckey` varchar(220) collate utf8_unicode_ci NOT NULL default '',
  `ctime` varchar(220) collate utf8_unicode_ci NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  `approved` int(1) NOT NULL default '0',
  `md5_id` varchar(200) collate latin1_general_ci NOT NULL default '',
  `activation_code` int(10) NOT NULL default '0',
  `address` varchar(200) collate latin1_general_ci NOT NULL,
  `country` varchar(200) collate latin1_general_ci NOT NULL default '',
  UNIQUE KEY `email` (`email`),
  FULLTEXT KEY `idx_search` (`name`,`email`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=55 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `city_id`, `group_id`, `facebook_id`, `name`, `phone_number`, `username`, `password`, `email`, `alter_email`, `slug`, `website`, `photo`, `notification`, `salt`, `confirmcode`, `validation_code`, `validation_date`, `active`, `created`, `modified`, `users_ip`, `banned`, `ckey`, `ctime`, `date`, `approved`, `md5_id`, `activation_code`, `address`,`country`) VALUES
(4, NULL, 5, NULL, NULL, '', 'admin', 'admin', 'admin@admin.com', NULL, 'admin', NULL, 'user_photo.jpg', 1, '', NULL, NULL, NULL, 1, '2017-02-05 17:54:34', '2017-02-05 17:54:34', NULL, 0, '', '', '', 1, '', '', '', ''),
(2, NULL, 3, NULL, NULL, '', 'test', '86c3a185acea2fc8f39313bf395e2469fc30c173', 'test@test.com', NULL, 'test', NULL, 'user_photo.jpg', 1, '', NULL, NULL, NULL, 1, '2017-02-05 19:12:42', '2017-02-05 19:12:42',NULL, 0, '', '', '', 1, '', '', '', ''),
(3, NULL, NULL, NULL, 'lol', '', 'lol', 'OLn4qO0/M9vfJtM5iuEzptRhrvtlZTkwZDA1M2Zk', 'lol@lol.com', NULL, '', NULL, 'user_photo.jpg', 1, 'ee90d053fd', 'y', NULL, NULL, 1, NULL, NULL, NULL, 0, '', '', '', 1, '', '', '', ''),
(68, NULL, 5, NULL, 'ig', '', 'ig', '/HZXoFh8C9BJQorlbNWxS489yqVjNzhjODc3YWMz', 'j_diniz1@msn.com', NULL, '', NULL, 'user_photo.jpg', 1, 'c78c877ac3', 'y', NULL, NULL, 1, '2017-02-10 12:16:13', '2017-02-10 12:16:13', NULL, 0, '', '', '', 1, '', '', '', ''),
(6, NULL, NULL, NULL, 'pedro', '', 'ui', 'nuHHrVEq+jasKrnNN4nGv7MzOb1iMmJlMmM5NmQz', 'ui@ui.com', NULL, '', NULL, 'user_photo.jpg', 1, 'b2be2c96d3', '84c1cbe06226b13c43f6f9bb888e7425', NULL, NULL, 1, NULL, NULL, NULL, 0, '', '', '', 1, '', '', '', ''),
(7, NULL, 3, NULL, 'pedro', '', 'ai', '9LPXSBJXR8tRG20R/FCaOi/2WjNmY2Q2NDM0NWMy', 'ai@ai.com', NULL, '', NULL, 'user_photo.jpg', 1, 'fcd64345c2', '4fa44b1a9b14dc3493a6800886ab3369', NULL, NULL, 1, '2017-02-06 16:59:58', '2017-02-06 16:59:58', NULL, 0, '', '', '', 1, '', '', '', ''),
(8, NULL, 3, NULL, 'yah', '', 'yah', '/ErY9TcQv2eA2YgXyBZA/A2oV9AyZWVkMzMzZGI2', 'yah@yah.com', NULL, '', NULL, 'user_photo.jpg', 1, '2eed333db6', '11d5c33bbc4a1e10b7fed3a78f561d15', NULL, NULL, 1, '2017-02-06 17:30:29', '2017-02-06 17:30:29', NULL, 0, '', '', '', 1, '', '', '', ''),
(69, NULL, 2, NULL, 'jose', '', 'jose', '5Sv4Lt3DvEeiux/2B0iKElA+BpZmNDBjMjJmMmRj', 'ig082389@ispgaya.pt', NULL, '', NULL, 'user_photo.jpg', 1, 'f40c22f2dc', 'y', NULL, NULL, 1, '2017-02-10 12:35:49', '2017-02-10 12:35:49', NULL, 0, '', '', '', 1, '', '', '', ''),
(70, NULL, 6, NULL, NULL, '', 'superuser', 'superuser', 'super@super.com', NULL, 'superuser', NULL, 'user_photo.jpg', 1, '', NULL, NULL, NULL, 1, '2017-02-05 17:54:34', '2017-02-05 17:54:34', NULL, 0, '', '', '', 1, '', '', '', '');							

-- --------------------------------------------------------

--
-- Estrutura da tabela `venues`
--

CREATE TABLE `venues` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_acos_lft_rght` (`lft`,`rght`),
  ADD KEY `idx_acos_alias` (`alias`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_aros_lft_rght` (`lft`,`rght`),
  ADD KEY `idx_aros_alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_aco_id` (`aco_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `start_date` (`start_date`),
  ADD KEY `venue_id` (`venue_id`);

--
-- Indexes for table `events_tags`
--
ALTER TABLE `events_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `events_users`
--
ALTER TABLE `events_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events_tags`
--
ALTER TABLE `events_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events_users`
--
ALTER TABLE `events_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
