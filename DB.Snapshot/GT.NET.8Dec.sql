-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2015 at 06:03 AM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grabtalent_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(11) NOT NULL DEFAULT '0',
  `admin_code` varchar(255) CHARACTER SET latin1 NOT NULL,
  `admin_email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `admin_password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `admin_firstname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `admin_lastname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `admin_phone` int(10) NOT NULL,
  `admin_isActive` varchar(2) CHARACTER SET latin1 NOT NULL,
  `admin_created_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `admin_created_date` datetime NOT NULL,
  `admin_last_modified_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `admin_last_modified_date` datetime NOT NULL,
  PRIMARY KEY (`admin_id`,`admin_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_code`, `admin_email`, `admin_password`, `admin_firstname`, `admin_lastname`, `admin_phone`, `admin_isActive`, `admin_created_by`, `admin_created_date`, `admin_last_modified_by`, `admin_last_modified_date`) VALUES
(0, '746c200f0268e282786814d6d2beff1bea4fb22cef4fcc7182189482f9970444', 'sunil.madana.kumar@gmail.com', 'a841674ba05f92576f87df361683a3f8', 'Sunil Kumar', 'Madana', 24392439, '1', '', '2015-06-18 09:06:45', '', '0000-00-00 00:00:00'),
(1, 'gYtpe4NBgYtpe4NBgYtpe4NBgYtpe4NBgYtpe4NBgYtpe4NBgYtpe4NBeft2', 'mbrown@grab-talent.com', 'a841674ba05f92576f87df361683a3f8', 'Marie', 'Brown', 84368436, '1', '', '2015-06-18 09:06:45', '', '0000-00-00 00:00:00'),
(2, 'OsOgGTjhOsOgGTjhOsOgGTjhOsOgGTjhOsOgGTjhOsOgGTjhOsOgGTjhasd', 'drundell@grab-talent.com', 'a841674ba05f92576f87df361683a3f8', 'David', 'Rundell', 85538553, '1', '', '2015-06-18 09:06:45', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_application`
--

CREATE TABLE IF NOT EXISTS `candidate_application` (
  `candidate_appln_ref_id` varchar(255) NOT NULL,
  `candidate_coderefs_id` varchar(255) NOT NULL,
  `candidate_email` varchar(255) NOT NULL,
  `candidate_appln_job_id` varchar(100) NOT NULL,
  `candidate_appln_stage` varchar(45) NOT NULL,
  `cand_appln_created_date` datetime NOT NULL,
  `cand_appln_last_modified_date` datetime NOT NULL,
  KEY `idx_applied_date` (`cand_appln_created_date`),
  KEY `idx_email` (`candidate_email`),
  KEY `candidate_appln_job_id` (`candidate_appln_job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate_application`
--

INSERT INTO `candidate_application` (`candidate_appln_ref_id`, `candidate_coderefs_id`, `candidate_email`, `candidate_appln_job_id`, `candidate_appln_stage`, `cand_appln_created_date`, `cand_appln_last_modified_date`) VALUES
('0815_563eef176c759', '0815_563eef176c796', 'kumarkarthi1985@gmail.com', 'JOB-1511-33423210', 'Application', '2015-11-10 04:11:27', '0000-00-00 00:00:00'),
('0815_563ec7122d63e', '0815_563ec7122d680', '42@lamoto.co.uk', 'JOB-1511-69063993', 'Placed', '2015-11-11 11:11:56', '2015-11-11 12:11:12'),
('0815_563ec7122d63e', '0815_563ec7122d680', '42@lamoto.co.uk', 'JOB-1511-17158914', 'Application', '2015-11-11 12:11:42', '0000-00-00 00:00:00'),
('1115_564332f9d97e4', 'DM1115_564332f9d9827', 'domtest22@lamoto.co.uk', 'JOB-1511-17158914', 'Offer', '2015-11-11 12:11:00', '0000-00-00 00:00:00'),
('1115_564332f9d97e4', 'DM1115_564332f9d9827', 'domtest22@lamoto.co.uk', 'JOB-1511-69063993', 'Application', '2015-11-11 12:11:49', '0000-00-00 00:00:00'),
('1115_564332f9d97e4', 'DM1115_564332f9d9827', 'domtest22@lamoto.co.uk', 'JOB-1511-82586504', 'Offer', '2015-11-11 01:11:58', '0000-00-00 00:00:00'),
('1915_564e032bf27a4', '1915_564e032bf2813', 'sunil.madana.kumar@gmail.com', 'JOB-1511-42637793', 'Application', '2015-11-19 06:11:41', '0000-00-00 00:00:00'),
('2315_5652cbbc71ab5', 'MB2315_5652cbbc71af9', 'mbrown@grab-talent.com', 'JOB-1511-42637793', 'Application', '2015-11-23 09:11:44', '0000-00-00 00:00:00'),
('2315_5652cbbc71ab5', 'MB2315_5652cbbc71af9', 'mbrown@grab-talent.com', 'JOB-1511-69063993', 'Application', '2015-11-23 09:11:47', '0000-00-00 00:00:00'),
('2315_5652cbbc71ab5', 'MB2315_5652cbbc71af9', 'mbrown@grab-talent.com', 'JOB-1511-76712760', 'Application', '2015-11-23 09:11:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_application_history`
--

CREATE TABLE IF NOT EXISTS `candidate_application_history` (
  `candidate_coderefs_id` varchar(45) DEFAULT NULL,
  `candidate_appln_job_id` varchar(100) DEFAULT NULL,
  `candidate_appln_prevstage` varchar(45) DEFAULT NULL,
  `candidate_appln_nextstage` varchar(45) DEFAULT NULL,
  `candidate_appln_change_by` varchar(255) DEFAULT NULL,
  `candidate_appln_change_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate_application_history`
--

INSERT INTO `candidate_application_history` (`candidate_coderefs_id`, `candidate_appln_job_id`, `candidate_appln_prevstage`, `candidate_appln_nextstage`, `candidate_appln_change_by`, `candidate_appln_change_date`) VALUES
('0815_563eef176c796', 'JOB-1511-69063993', 'Application', 'Shortlist', 'davidrundell99@gmail.com', '2015-11-08 06:11:34'),
('0815_563ec7122d680', 'JOB-1511-69063993', 'Application', 'Shortlist', 'davidrundell99@gmail.com', '2015-11-11 11:11:45'),
('0815_563ec7122d680', 'JOB-1511-69063993', 'Offer', 'Placed', 'davidrundell99@gmail.com', '2015-11-11 12:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_country`
--

CREATE TABLE IF NOT EXISTS `candidate_country` (
  `country_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `country_currency_code` varchar(4) CHARACTER SET latin1 DEFAULT NULL,
  `country_code` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `country_phone_code` varchar(6) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table is used to maintain all the country names of the candidate''s residence.';

--
-- Dumping data for table `candidate_country`
--

INSERT INTO `candidate_country` (`country_name`, `country_currency_code`, `country_code`, `country_phone_code`) VALUES
('Afghanistan', 'AFN', 'AF', '93'),
('Albania', 'ALL', 'AL', '355'),
('Algeria', 'DZD', 'DZ', '213'),
('American Samoa', 'USD', 'AS', '684'),
('Andorra', 'EUR', 'AD', '376'),
('Angola', 'AOA', 'AO', '244'),
('Anguilla', 'XCD', 'AI', '264(1)'),
('Antarctica', 'XCD', 'AQ', '672'),
('Antigua and Barbuda', 'XCD', 'AG', '268(1)'),
('Argentina', 'ARS', 'AR', '54'),
('Armenia', 'AMD', 'AM', '374'),
('Aruba', 'AWG', 'AW', '297'),
('Australia', 'AUD', 'AU', '61'),
('Austria', 'EUR', 'AT', '43'),
('Azerbaijan', 'AZN', 'AZ', '994'),
('Bahamas', 'BSD', 'BS', '242(1)'),
('Bahrain', 'BHD', 'BH', '973'),
('Bangladesh', 'BDT', 'BD', '880'),
('Barbados', 'BBD', 'BB', '246(1)'),
('Belarus', 'BYR', 'BY', '375'),
('Belgium', 'EUR', 'BE', '32'),
('Belize', 'BZD', 'BZ', '501'),
('Benin', 'XOF', 'BJ', '229'),
('Bermuda', 'BMD', 'BM', '441(1)'),
('Bhutan', 'BTN', 'BT', '975'),
('Bolivia', 'BOB', 'BO', '591'),
('Bosnia-Herzegovina', 'BAM', 'BA', '387'),
('Botswana', 'BWP', 'BW', '267'),
('Brazil', 'BRL', 'BR', '55'),
('Brunei Darussalam', 'BND', 'BN', '673'),
('Bulgaria', 'BGN', 'BG', '359'),
('Burkina Faso', 'XOF', 'BF', '226'),
('Burundi', 'BIF', 'BI', '257'),
('Cambodia', 'KHR', 'KH', '855'),
('Cameroon', 'XAF', 'CM', '237'),
('Canada', 'CAD', 'CA', '1'),
('Cape Verde', 'CVE', 'CV', '238'),
('Cayman Islands', 'KYD', 'KY', '345(1)'),
('Central African Republic', 'XAF', 'CF', '236'),
('Chad', 'XAF', 'TD', '235'),
('Chile', 'CLP', 'CL', '56'),
('China', 'CNY', 'CN', '86'),
('Christmas Island', 'AUD', 'CX', '61'),
('Cocos (Keeling) Islands', 'AUD', 'CC', '61'),
('Colombia', 'COP', 'CO', '57'),
('Comoros', 'KMF', 'KM', '269'),
('Congo', 'XAF', 'CG', '242'),
('Congo(Dem.Republic)', 'CDF', 'CD', '243'),
('Cook Islands', 'NZD', 'CK', '682'),
('Costa Rica', 'CRC', 'CR', '506'),
('Croatia', 'HRK', 'HR', '385'),
('Cuba', 'CUP', 'CU', '53'),
('Cyprus', 'EUR', 'CY', '357'),
('Czech Rep.', 'CZK', 'CZ', '420'),
('Denmark', 'DKK', 'DK', '45'),
('Djibouti', 'DJF', 'DJ', '253'),
('Dominica', 'XCD', 'DM', '767(1)'),
('Dominican Republic', 'DOP', 'DO', '809'),
('Ecuador', 'ECS', 'EC', '593'),
('Egypt', 'EGP', 'EG', '20'),
('El Salvador', 'SVC', 'SV', '503'),
('Equatorial Guinea', 'XAF', 'GQ', '240'),
('Eritrea', 'ERN', 'ER', '291'),
('Estonia', 'EUR', 'EE', '372'),
('Ethiopia', 'ETB', 'ET', '251'),
('Falkland Islands (Malvinas)', 'FKP', 'FK', '500'),
('Faroe Islands', 'DKK', 'FO', '298'),
('Fiji', 'FJD', 'FJ', '679'),
('Finland', 'EUR', 'FI', '358'),
('France', 'EUR', 'FR', '33'),
('French Guiana', 'EUR', 'GF', '594'),
('Gabon', 'XAF', 'GA', '241'),
('Gambia', 'GMD', 'GM', '220'),
('Georgia', 'GEL', 'GE', '995'),
('Germany', 'EUR', 'DE', '49'),
('Ghana', 'GHS', 'GH', '233'),
('Gibraltar', 'GIP', 'GI', '350'),
('Great Britain', 'GBP', 'GB', '44'),
('Greece', 'EUR', 'GR', '30'),
('Greenland', 'DKK', 'GL', '299'),
('Grenada', 'XCD', 'GD', '473(1)'),
('Guadeloupe (French)', 'EUR', 'GP', '590'),
('Guam (USA)', 'USD', 'GU', '671(1)'),
('Guatemala', 'QTQ', 'GT', '502'),
('Guinea', 'GNF', 'GN', '224'),
('Guinea Bissau', 'GWP', 'GW', '245'),
('Guyana', 'GYD', 'GY', '592'),
('Haiti', 'HTG', 'HT', '509'),
('Honduras', 'HNL', 'HN', '504'),
('Hong Kong', 'HKD', 'HK', '852'),
('Hungary', 'HUF', 'HU', '36'),
('Iceland', 'ISK', 'IS', '354'),
('India', 'INR', 'IN', '91'),
('Indonesia', 'IDR', 'ID', '62'),
('Iran', 'IRR', 'IR', '98'),
('Iraq', 'IQD', 'IQ', '964'),
('Ireland', 'EUR', 'IE', '353'),
('Israel', 'ILS', 'IL', '972'),
('Italy', 'EUR', 'IT', '39'),
('Ivory Coast', 'XOF', 'CI', '225'),
('Jamaica', 'JMD', 'JM', '876(1)'),
('Japan', 'JPY', 'JP', '81'),
('Jordan', 'JOD', 'JO', '962'),
('Kazakhstan', 'KZT', 'KZ', '7'),
('Kenya', 'KES', 'KE', '254'),
('Kiribati', 'AUD', 'KI', '686'),
('Korea-North', 'KPW', 'KP', '850'),
('Korea-South', 'KRW', 'KR', '82'),
('Kuwait', 'KWD', 'KW', '965'),
('Kyrgyzstan', 'KGS', 'KG', '996'),
('Laos', 'LAK', 'LA', '856'),
('Latvia', 'LVL', 'LV', '371'),
('Lebanon', 'LBP', 'LB', '961'),
('Lesotho', 'LSL', 'LS', '266'),
('Liberia', 'LRD', 'LR', '231'),
('Libya', 'LYD', 'LY', '218'),
('Liechtenstein', 'CHF', 'LI', '423'),
('Lithuania', 'LTL', 'LT', '370'),
('Luxembourg', 'EUR', 'LU', '352'),
('Macau', 'MOP', 'MO', '853'),
('Macedonia', 'MKD', 'MK', '389'),
('Madagascar', 'MGF', 'MG', '261'),
('Malawi', 'MWK', 'MW', '265'),
('Malaysia', 'MYR', 'MY', '60'),
('Maldives', 'MVR', 'MV', '960'),
('Mali', 'XOF', 'ML', '223'),
('Malta', 'EUR', 'MT', '356'),
('Marshall Islands', 'USD', 'MH', '692'),
('Martinique (French)', 'EUR', 'MQ', '596'),
('Mauritania', 'MRO', 'MR', '222'),
('Mauritius', 'MUR', 'MU', '230'),
('Mayotte', 'EUR', 'YT', '269'),
('Mexico', 'MXN', 'MX', '52'),
('Micronesia', 'USD', 'FM', '691'),
('Moldova', 'MDL', 'MD', '373'),
('Monaco', 'EUR', 'MC', '377'),
('Mongolia', 'MNT', 'MN', '976'),
('Montenegro', 'EUR', 'ME', '382'),
('Montserrat', 'XCD', 'MS', '664(1)'),
('Morocco', 'MAD', 'MA', '212'),
('Mozambique', 'MZN', 'MZ', '258'),
('Myanmar', 'MMK', 'MM', '95'),
('Namibia', 'NAD', 'NA', '264'),
('Nauru', 'AUD', 'NR', '674'),
('Nepal', 'NPR', 'NP', '977'),
('Netherlands', 'EUR', 'NL', '31'),
('Netherlands Antilles', 'ANG', 'AN', '599'),
('New Caledonia (French)', 'XPF', 'NC', '687'),
('New Zealand', 'NZD', 'NZ', '64'),
('Nicaragua', 'NIO', 'NI', '505'),
('Niger', 'XOF', 'NE', '227'),
('Nigeria', 'NGN', 'NG', '234'),
('Niue', 'NZD', 'NU', '683'),
('Norfolk Island', 'AUD', 'NF', '672'),
('Northern Mariana Islands', 'USD', 'MP', '670'),
('Norway', 'NOK', 'NO', '47'),
('Oman', 'OMR', 'OM', '968'),
('Pakistan', 'PKR', 'PK', '92'),
('Palau', 'USD', 'PW', '680'),
('Panama', 'PAB', 'PA', '507'),
('Papua New Guinea', 'PGK', 'PG', '675'),
('Paraguay', 'PYG', 'PY', '595'),
('Peru', 'PEN', 'PE', '51'),
('Philippines', 'PHP', 'PH', '63'),
('Poland', 'PLN', 'PL', '48'),
('Polynesia (French)', 'XPF', 'PF', '689'),
('Portugal', 'EUR', 'PT', '351'),
('Puerto Rico', 'USD', 'PR', '787(1)'),
('Qatar', 'QAR', 'QA', '974'),
('Reunion (French)', 'EUR', 'RE', '262'),
('Romania', 'RON', 'RO', '40'),
('Russia', 'RUB', 'RU', '7'),
('Rwanda', 'RWF', 'RW', '250'),
('Saint Helena', 'SHP', 'SH', '290'),
('Saint Kitts & Nevis Anguilla', 'XCD', 'KN', '869(1)'),
('Saint Lucia', 'XCD', 'LC', '758(1)'),
('Saint Pierre and Miquelon', 'EUR', 'PM', '508'),
('Saint Vincent & Grenadines', 'XCD', 'VC', '784(1)'),
('Samoa', 'WST', 'WS', '684'),
('San Marino', 'EUR', 'SM', '378'),
('Sao Tome and Principe', 'STD', 'ST', '239'),
('Saudi Arabia', 'SAR', 'SA', '966'),
('Senegal', 'XOF', 'SN', '221'),
('Serbia', 'RSD', 'RS', '381'),
('Seychelles', 'SCR', 'SC', '248'),
('Sierra Leone', 'SLL', 'SL', '232'),
('Singapore', 'SGD', 'SG', '65'),
('Slovakia', 'EUR', 'SK', '421'),
('Slovenia', 'EUR', 'SI', '386'),
('Solomon Islands', 'SBD', 'SB', '677'),
('Somalia', 'SOS', 'SO', '252'),
('South Africa', 'ZAR', 'ZA', '27'),
('Spain', 'EUR', 'ES', '34'),
('Sri Lanka', 'LKR', 'LK', '94'),
('Sudan', 'SDG', 'SD', '249'),
('Suriname', 'SRD', 'SR', '597'),
('Swaziland', 'SZL', 'SZ', '268'),
('Sweden', 'SEK', 'SE', '46'),
('Switzerland', 'CHF', 'CH', '41'),
('Syria', 'SYP', 'SY', '963'),
('Taiwan', 'TWD', 'TW', '886'),
('Tajikistan', 'TJS', 'TJ', '992'),
('Tanzania', 'TZS', 'TZ', '255'),
('Thailand', 'THB', 'TH', '66'),
('Togo', 'XOF', 'TG', '228'),
('Tokelau', 'NZD', 'TK', '690'),
('Tonga', 'TOP', 'TO', '676'),
('Trinidad and Tobago', 'TTD', 'TT', '868(1)'),
('Tunisia', 'TND', 'TN', '216'),
('Turkey', 'TRY', 'TR', '90'),
('Turkmenistan', 'TMT', 'TM', '993'),
('Turks and Caicos Islands', 'USD', 'TC', '649(1)'),
('Tuvalu', 'AUD', 'TV', '688'),
('U.K.', 'GBP', 'UK', '44'),
('Uganda', 'UGX', 'UG', '256'),
('Ukraine', 'UAH', 'UA', '380'),
('United Arab Emirates', 'AED', 'AE', '971'),
('Uruguay', 'UYU', 'UY', '598'),
('USA', 'USD', 'US', '1'),
('Uzbekistan', 'UZS', 'UZ', '998'),
('Vanuatu', 'VUV', 'VU', '678'),
('Vatican', 'EUR', 'VA', '39'),
('Venezuela', 'VEF', 'VE', '58'),
('Vietnam', 'VND', 'VN', '84'),
('Virgin Islands (British)', 'USD', 'VG', '284(1)'),
('Virgin Islands (USA)', 'USD', 'VI', '340(1)'),
('Wallis and Futuna Islands', 'XPF', 'WF', '681'),
('Yemen', 'YER', 'YE', '967'),
('Zambia', 'ZMW', 'ZM', '260'),
('Zimbabwe', 'ZWD', 'ZW', '263');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_education`
--

CREATE TABLE IF NOT EXISTS `candidate_education` (
  `candidate_ref_id` varchar(200) NOT NULL,
  `candidate_coderefs_id` varchar(45) CHARACTER SET latin1 NOT NULL,
  `candidate_email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `candidate_univ_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `candidate_degree` varchar(100) CHARACTER SET latin1 NOT NULL,
  `candidate_field_of_study` varchar(100) CHARACTER SET latin1 NOT NULL,
  `candidate_edu_startDt` date NOT NULL,
  `candidate_edu_endDt` date NOT NULL,
  KEY `fk_candEduc_refId_idx` (`candidate_ref_id`,`candidate_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate_education`
--

INSERT INTO `candidate_education` (`candidate_ref_id`, `candidate_coderefs_id`, `candidate_email`, `candidate_univ_name`, `candidate_degree`, `candidate_field_of_study`, `candidate_edu_startDt`, `candidate_edu_endDt`) VALUES
('2315_5652cbbc71ab5', '2315_5652cbbc71ab5-250116', 'mbrown@grab-talent.com', 'Cambridge', 'Master', 'Mathematics', '1993-01-01', '1996-01-01'),
('2315_5652cbbc71ab5', '2315_5652cbbc71ab5-475704', 'mbrown@grab-talent.com', 'Imperial College', 'Doctorate', 'Mathematics', '1996-01-01', '1999-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_employment`
--

CREATE TABLE IF NOT EXISTS `candidate_employment` (
  `candidate_ref_id` varchar(200) NOT NULL,
  `candidate_coderefs_id` varchar(45) NOT NULL,
  `candidate_email` varchar(100) NOT NULL,
  `candidate_emp_name` varchar(255) NOT NULL,
  `candidate_curr_designation` varchar(100) NOT NULL,
  `candidate_salary` int(100) NOT NULL,
  `candidate_emp_location` varchar(255) DEFAULT NULL,
  `candidate_responsibilities` varchar(255) DEFAULT NULL,
  `candidate_emp_startDt` date DEFAULT NULL,
  `candidate_curr_job` varchar(5) DEFAULT NULL,
  `candidate_emp_endDt` date DEFAULT NULL,
  KEY `idx_candidate_emp_name` (`candidate_emp_name`),
  KEY `idx_candidate_designation` (`candidate_curr_designation`),
  KEY `fk_candSignup_refId_idx` (`candidate_ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate_employment`
--

INSERT INTO `candidate_employment` (`candidate_ref_id`, `candidate_coderefs_id`, `candidate_email`, `candidate_emp_name`, `candidate_curr_designation`, `candidate_salary`, `candidate_emp_location`, `candidate_responsibilities`, `candidate_emp_startDt`, `candidate_curr_job`, `candidate_emp_endDt`) VALUES
('0815_563ec7122d63e', '0815_563ec7122d680', '42@lamoto.co.uk', '', '', 0, 'Singapore', NULL, '2015-11-08', 'true', '2015-11-08'),
('0815_563eef176c759', '0815_563eef176c796', 'dom+1@lamoto.co.uk', '', '', 0, 'Singapore', NULL, '2015-11-08', 'true', '2015-11-08'),
('1115_564332f9d97e4', 'DM1115_564332f9d9827', 'domtest22@lamoto.co.uk', '', '', 0, 'Singapore', NULL, '2015-11-11', 'true', '2015-11-11'),
('1815_564c62e3bc4b8', '1815_564c62e3bc4fc', 'dmorris@grab-talent.com', '', '', 0, 'Singapore', NULL, '2015-11-18', 'true', '2015-11-18'),
('1815_564c63557672c', '1815_564c63557676f', 'dmorris@grab-talent.com', '', '', 0, 'Singapore', NULL, '2015-11-18', 'true', '2015-11-18'),
('1815_564c65e10a485', '1815_564c65e10a4c2', 'davidrundell99@gmail.com', '', '', 0, 'Singapore', NULL, '2015-11-18', 'true', '2015-11-18'),
('1815_564c6848140cf', '1815_564c68481410c', 'dmorris@grab-talent.com', '', '', 0, 'Singapore', NULL, '2015-11-18', 'true', '2015-11-18'),
('1815_564c685f9fe81', '1815_564c685f9febe', 'davidrundell99@gmail.com', '', '', 0, 'Singapore', NULL, '2015-11-18', 'true', '2015-11-18'),
('2315_5652c932dcde3', '2315_5652c932dce23', 'drundell@grab-talent.com', '', '', 0, 'Singapore', NULL, '2015-11-23', 'true', '2015-11-23'),
('2315_5652cbbc71ab5', 'MB2315_5652cbbc71af9', 'mbrown@grab-talent.com', 'MMorgan Stanley', 'Head of structured rates', 25000, 'Hong Kong', NULL, '2015-11-23', 'true', '2015-11-23'),
('2315_5652cbbc71ab5', '2315_5652cbbc71ab5-196875', 'mbrown@grab-talent.com', 'Morgan Stanley', 'Executive Director', 15000, 'U.K.', NULL, '2009-11-01', '0', '2012-01-01'),
('3015_565c1ca2a234d', 'WS3015_565c1ca2a2378', 'jwsteyninsa@yahoo.com', 'Currently Available for a new international assignment', 'Freelance SAP Project manager', 0, 'Germany', NULL, '2015-11-30', 'true', '2015-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_interview`
--

CREATE TABLE IF NOT EXISTS `candidate_interview` (
  `candidate_IntvwId` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_IntvwCandidId` varchar(50) CHARACTER SET latin1 NOT NULL,
  `candidate_IntvwJobId` varchar(50) CHARACTER SET latin1 NOT NULL,
  `candidate_Pri_IntvwDateTime` varchar(255) CHARACTER SET latin1 NOT NULL,
  `candidate_Sec_IntvwDateTime` varchar(255) CHARACTER SET latin1 NOT NULL,
  `candidate_Pri_IntvwTimezone` varchar(255) CHARACTER SET latin1 NOT NULL,
  `candidate_Sec_IntvwTimezone` varchar(255) CHARACTER SET latin1 NOT NULL,
  `candidate_Pri_IntvwLocation` varchar(255) CHARACTER SET latin1 NOT NULL,
  `candidate_Sec_IntvwLocation` varchar(255) CHARACTER SET latin1 NOT NULL,
  `candidate_Interviewer_Primary` varchar(255) CHARACTER SET latin1 NOT NULL,
  `candidate_Interviewer_Secondary` varchar(255) CHARACTER SET latin1 NOT NULL,
  `candidate_email_address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Interview_email_sent` varchar(5) CHARACTER SET latin1 NOT NULL,
  `system_created_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `system_created_date` datetime NOT NULL,
  `system_last_modified_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `system_last_modified_date` datetime NOT NULL,
  PRIMARY KEY (`candidate_IntvwId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `candidate_interview`
--

INSERT INTO `candidate_interview` (`candidate_IntvwId`, `candidate_IntvwCandidId`, `candidate_IntvwJobId`, `candidate_Pri_IntvwDateTime`, `candidate_Sec_IntvwDateTime`, `candidate_Pri_IntvwTimezone`, `candidate_Sec_IntvwTimezone`, `candidate_Pri_IntvwLocation`, `candidate_Sec_IntvwLocation`, `candidate_Interviewer_Primary`, `candidate_Interviewer_Secondary`, `candidate_email_address`, `Interview_email_sent`, `system_created_by`, `system_created_date`, `system_last_modified_by`, `system_last_modified_date`) VALUES
(1, '0815_563eef176c796', 'JOB-1511-69063993', '2015-11-11 13:35 to 20:40', '', '(UTC+08:00) Kuala Lumpur, Singapore', '', 'Raffles Place office', '', 'Jenny', '', 'kumarkarthi1985@gmail.com', 'No', 'davidrundell99@gmail.com', '2015-11-08 07:11:44', '', '0000-00-00 00:00:00'),
(2, '0815_563ec7122d680', 'JOB-1511-69063993', '2015-11-12 12:30 to 15:00', '', '(UTC+08:00) Kuala Lumpur, Singapore', '', 'Raffles place', '', 'Jenny', '', '42@lamoto.co.uk', 'No', 'davidrundell99@gmail.com', '2015-11-11 11:11:13', '', '0000-00-00 00:00:00'),
(3, 'DM1115_564332f9d9827', 'JOB-1511-17158914', '2015-11-12 14:20 to 15:20', '', '(UTC\n\n+08:00) Beijing, Chongqing, Hong Kong SAR, Urumqi', '', 'Alexandra Road - Delta House', '', 'David Rundell', '', 'domtest22@lamoto.co.uk', 'No', 'dbolland@grab-talent.com', '2015-11-11 01:11:21', '', '0000-00-00 00:00:00'),
(4, 'DM1115_564332f9d9827', 'JOB-1511-82586504', '2015-11-12 01:30 to 02:55', '', '(UTC\n\n+08:00) Beijing, Chongqing, Hong Kong SAR, Urumqi', '', 'Delta House', '', 'D Rundell', '', 'domtest22@lamoto.co.uk', 'No', 'david.a.bolland@gmail.com', '2015-11-11 01:11:01', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_login`
--

CREATE TABLE IF NOT EXISTS `candidate_login` (
  `candidate_ref_id` varchar(200) NOT NULL,
  `candidate_code` varchar(255) CHARACTER SET latin1 NOT NULL,
  `candidate_email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `candidate_password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `system_created_date` datetime NOT NULL,
  `system_last_modified_date` datetime NOT NULL,
  PRIMARY KEY (`candidate_ref_id`,`candidate_email`),
  KEY `email_fk_idx` (`candidate_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate_login`
--

INSERT INTO `candidate_login` (`candidate_ref_id`, `candidate_code`, `candidate_email`, `candidate_password`, `system_created_date`, `system_last_modified_date`) VALUES
('0815_563ec7122d63e', '74ba6418877652fefa80a7aa248d1a1904c294ac5ec852c908d2974b77220a20', '42@lamoto.co.uk', '628631f07321b22d8c176c200c855e1b', '2015-11-08 00:00:00', '2015-11-11 12:59:01'),
('0815_563eef176c759', 'ac83493a0fa6cf65316b96d3c7b8d989dc449165ec843657130eda90040fcfbc', 'kumarkarthi1985@gmail.com', 'a841674ba05f92576f87df361683a3f8', '2015-11-08 00:00:00', '2015-11-08 08:42:36'),
('1115_564332f9d97e4', '9cfa1b5f740ad1e51c2e905a81f947b81b00561c4e17ccee9d022e377b75ef5e', 'domtest22@lamoto.co.uk', '628631f07321b22d8c176c200c855e1b', '2015-11-11 00:00:00', '2015-11-11 12:24:26'),
('1815_564c6848140cf', '9143657f14b15698d0d914891c0f23ba018a14c8fe1c33470cd767cd15b240b8', 'dmorris@grab-talent.com', '06261f5deb71df4bb4718f35784c0c7c', '2015-11-18 00:00:00', '0000-00-00 00:00:00'),
('1815_564c685f9fe81', '9f96a6b634ff4eed6b114e682c81f861efb88af4f2e886359e5784ff38ba085a', 'davidrundell99@gmail.com', '97fdb643687988bee344c3c2bf8f3797', '2015-11-18 00:00:00', '2015-11-18 12:05:19'),
('1915_564e018d0938e', '7f7e94fc85a87a30df92bdbd9c3621fa287a7a83c58a9fb920342330080d780d', 'sunil.madana.kumar+89@gmail.com', 'a841674ba05f92576f87df361683a3f8', '2015-11-19 00:00:00', '2015-11-19 17:28:21'),
('1915_564e032bf27a4', 'c4b15a680740ea164c805fe376a1cea457dedbd5c761ed64b58f95f3cebbb540', 'sunil.madana.kumar@gmail.com', 'd5731a0c2a98e59cb37971996086361c', '2015-11-19 00:00:00', '2015-11-19 17:32:57'),
('2315_5652c932dcde3', '5cf216e5f21a47a8e299d87c555ac387263d8dc223c5bd26dd21e9f6445ae939', 'drundell@grab-talent.com', '79067d3d930070490ceaeae50b157203', '2015-11-23 00:00:00', '0000-00-00 00:00:00'),
('2315_5652cbbc71ab5', 'b02546fd04f5562328b6b56bff41f511fa19af9be3c3b84193957d82f9925794', 'mbrown@grab-talent.com', 'a841674ba05f92576f87df361683a3f8', '2015-11-23 00:00:00', '2015-11-23 08:22:23'),
('3015_565c1ca2a234d', '4a3aac9b980086d5434202091387fd585d723c5abcc6c0a8a2dba1dc4bd259eb', 'jwsteyninsa@yahoo.com', '3fcad6c3512bed276e575669ca131d7e', '2015-11-30 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_offer`
--

CREATE TABLE IF NOT EXISTS `candidate_offer` (
  `candidate_OfferId` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_OfferCandidId` varchar(50) CHARACTER SET latin1 NOT NULL,
  `candidate_OfferJobId` varchar(50) CHARACTER SET latin1 NOT NULL,
  `candidate_OfferDateTime` varchar(255) CHARACTER SET latin1 NOT NULL,
  `candidate_email_address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Offer_email_sent` varchar(5) CHARACTER SET latin1 NOT NULL,
  `system_created_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `system_created_date` datetime NOT NULL,
  `system_last_modified_by` varchar(255) CHARACTER SET latin1 NOT NULL,
  `system_last_modified_date` datetime NOT NULL,
  PRIMARY KEY (`candidate_OfferId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `candidate_offer`
--

INSERT INTO `candidate_offer` (`candidate_OfferId`, `candidate_OfferCandidId`, `candidate_OfferJobId`, `candidate_OfferDateTime`, `candidate_email_address`, `Offer_email_sent`, `system_created_by`, `system_created_date`, `system_last_modified_by`, `system_last_modified_date`) VALUES
(1, '0815_563ec7122d680', 'JOB-1511-69063993', '2015-11-11 11:11:15', '42@lamoto.co.uk', 'No', 'davidrundell99@gmail.com', '2015-11-11 11:11:15', '', '0000-00-00 00:00:00'),
(2, '0815_563ec7122d680', 'JOB-1511-69063993', '2015-11-11 12:11:26', '42@lamoto.co.uk', 'No', 'davidrundell99@gmail.com', '2015-11-11 12:11:26', '', '0000-00-00 00:00:00'),
(3, 'DM1115_564332f9d9827', 'JOB-1511-17158914', '2015-11-11 01:11:34', 'domtest22@lamoto.co.uk', 'No', 'dbolland@grab-talent.com', '2015-11-11 01:11:34', '', '0000-00-00 00:00:00'),
(4, 'DM1115_564332f9d9827', 'JOB-1511-82586504', '2015-11-11 02:11:58', 'domtest22@lamoto.co.uk', 'No', 'david.a.bolland@gmail.com', '2015-11-11 02:11:58', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_references`
--

CREATE TABLE IF NOT EXISTS `candidate_references` (
  `candidate_ref_id` varchar(200) NOT NULL,
  `candidate_coderefs_id` varchar(45) NOT NULL,
  `candidate_ref_name` varchar(100) NOT NULL,
  `candidate_ref_company` varchar(255) NOT NULL,
  `candidate_ref_email` varchar(100) NOT NULL,
  `candidate_ref_contact` varchar(100) NOT NULL,
  KEY `fk_candCodeRef_id_idx` (`candidate_ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate_references`
--

INSERT INTO `candidate_references` (`candidate_ref_id`, `candidate_coderefs_id`, `candidate_ref_name`, `candidate_ref_company`, `candidate_ref_email`, `candidate_ref_contact`) VALUES
('2315_5652d22dc46fe', '2315_5652cbbc71ab5', 'Marie Brown', 'Windsor Royce', 'mbrown@windsor-royce.com', 'SG (+65)-82186225'),
('2315_5652d3f89ee7e', '2315_5652cbbc71ab5', 'Marie Brown', 'Windsor Royce', 'mbrown@windsor-royce.com', 'SG (+65)-82186225');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_signup`
--

CREATE TABLE IF NOT EXISTS `candidate_signup` (
  `candidate_ref_id` varchar(200) NOT NULL,
  `candidate_coderefs_id` varchar(45) NOT NULL,
  `candidate_profilepicurl` varchar(255) DEFAULT NULL,
  `candidate_firstname` varchar(255) DEFAULT NULL,
  `candidate_lastname` varchar(255) DEFAULT NULL,
  `candidate_email` varchar(255) NOT NULL,
  `candidate_phonecountrycode` varchar(8) NOT NULL,
  `candidate_phonenumber` double NOT NULL,
  `candidate_gender` varchar(7) DEFAULT NULL,
  `candidate_nationality` varchar(100) DEFAULT NULL,
  `brief_description` varchar(5000) DEFAULT NULL,
  `candidate_skills` varchar(3000) DEFAULT NULL,
  `candidate_total_experience` int(5) DEFAULT NULL,
  `candidate_exp_annualsalcode` varchar(5) DEFAULT NULL,
  `candidate_exp_annualsalary` int(100) DEFAULT NULL,
  `job_alert_agreement` varchar(5) DEFAULT NULL,
  `registration_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `resume_url` varchar(255) DEFAULT NULL,
  `video_resume_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`candidate_ref_id`,`candidate_email`),
  KEY `idx_created_date` (`created_date`),
  KEY `fk_candSignup_refId_idx` (`candidate_ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate_signup`
--

INSERT INTO `candidate_signup` (`candidate_ref_id`, `candidate_coderefs_id`, `candidate_profilepicurl`, `candidate_firstname`, `candidate_lastname`, `candidate_email`, `candidate_phonecountrycode`, `candidate_phonenumber`, `candidate_gender`, `candidate_nationality`, `brief_description`, `candidate_skills`, `candidate_total_experience`, `candidate_exp_annualsalcode`, `candidate_exp_annualsalary`, `job_alert_agreement`, `registration_date`, `created_date`, `resume_url`, `video_resume_url`) VALUES
('0815_563ec7122d63e', '0815_563ec7122d680', NULL, 'Dominic', 'Morris', '42@lamoto.co.uk', 'SG (+65)', 6592724977, '0', 'Singapore', '', 'FX,Intermediate,2;C++,Basic,1;Java,Intermediate,2;Equities,Intermediate,2;Equity,Basic,1;JavaScript,Basic,1;C#,Advanced,3;XML,Basic,1;DOM,Basic,1;SAX,Basic,1;ASP,Basic,1;VBScript,Basic,1', 0, '0', 0, 'on', '2015-11-08 03:11:50', '2015-11-08 03:11:50', '07a506109fbbe911728b30dfee467a95a2e369d6.docx', ''),
('0815_563eef176c759', '0815_563eef176c796', NULL, '', '', 'kumarkarthi1985@gmail.com', 'SG (+65)', 9272497, '0', 'Singapore', '', '', 0, '0', 0, 'on', '2015-11-08 06:11:35', '2015-11-08 06:11:35', 'f077657860cf9390c43de304a9a83d62bcc6f573.docx', ''),
('1115_564332f9d97e4', 'DM1115_564332f9d9827', NULL, 'Dominic', 'Morris', 'domtest22@lamoto.co.uk', 'SG (+65)', 6592724977, '0', 'Singapore', '', 'FX,Intermediate,2;C++,Basic,1;Java,Intermediate,2;Equities,Intermediate,2;Equity,Basic,1;JavaScript,Basic,1;C#,Advanced,3;XML,Basic,1;DOM,Basic,1;SAX,Basic,1;ASP,Basic,1;VBScript,Basic,1;C,Basic,3', 0, '0', 0, 'on', '2015-11-11 12:11:17', '2015-11-11 12:11:17', 'd8ad74b0201595caa392ca3bdc412dbca80304f6.docx', ''),
('1815_564c6848140cf', '1815_564c68481410c', NULL, '', '', 'dmorris@grab-talent.com', 'SG (+65)', 6593212641, '0', 'Singapore', '', 'java,Basic,1;excel,Intermediate,2', 0, '0', 0, 'on', '2015-11-18 12:11:08', '2015-11-18 12:11:08', 'b1c592f0daf0d78ab77065811fab5a10e23a8dc2.docx', ''),
('1815_564c685f9fe81', '1815_564c685f9febe', 'thumb_10156068_10204053238634732_3305992612496420684_n.jpg', '', '', 'davidrundell99@gmail.com', 'AD (+376', 6591154833, '0', 'Singapore', '', 'c++,Basic,1;java,Basic,1', 0, '0', 0, '0', '2015-11-18 12:11:31', '2015-11-18 12:11:31', 'd36102c8db85e2f66bd7ee7be0100db7de6b664a.docx', ''),
('1915_564e018d0938e', '1915_564e018d093d2', NULL, '', '', 'sunil.madana.kumar+89@gmail.com', 'SG (+65)', 98125013, '0', 'Singapore', '', 'access,Basic,1', 0, '0', 0, '0', '2015-11-19 05:11:21', '2015-11-19 05:11:21', '9eaf718c874270c4ebd02d4b7f66c5197618606c.docx', ''),
('1915_564e032bf27a4', '1915_564e032bf2813', NULL, 'Sunil Kumar', 'Madana', 'sunil.madana.kumar@gmail.com', 'SG (+65)', 6592782787, 'Male', 'Singapore', '', 'java,Basic,1;dom,Basic,1;word,Basic,1;excel,Basic,1;access,Basic,1', 10, '0', 0, '0', '2015-11-19 05:11:15', '2015-11-19 05:11:15', 'b35a78e65fadf491bc8d6df48c54956ece2984f1.docx', ''),
('2315_5652c86697d39', 'MB2315_5652c86697d95', NULL, 'Marie', 'Brown', 'mbrown@windsor-royce.com', 'SG (+65)', 82186225, 'Female', 'Singapore', '', '', 4, 'SGD', 4500, 'on', '2015-11-23 08:11:50', '2015-11-23 08:11:50', '4775685c2f80eb9f91bb7c2c20d20b88f61d6632.docx', ''),
('2315_5652c91f07f0e', '2315_5652c91f07f4b', NULL, '', '', 'mbrown@windsor-royce.com', 'SG (+65)', 6582186225, '0', 'Singapore', '', '', 0, '0', 0, 'on', '2015-11-23 08:11:55', '2015-11-23 08:11:55', '4775685c2f80eb9f91bb7c2c20d20b88f61d6632.docx', ''),
('2315_5652c932dcde3', '2315_5652c932dce23', NULL, '', '', 'drundell@grab-talent.com', 'SG (+65)', 91154833, '0', 'Singapore', '', 'equities,Intermediate,2;equity,Advanced,7;project management,Basic,1;dom,Basic,1', 0, '0', 0, '0', '2015-11-23 08:11:14', '2015-11-23 08:11:14', '3cbff1cc70baff69aaa73b70d0023a32a396c0b2.docx', ''),
('2315_5652cbbc71ab5', 'MB2315_5652cbbc71af9', 'thumb_Marie Brown.jpg', 'Marie', 'Brown', 'mbrown@grab-talent.com', 'SG (+65)', 82186225, 'Female', 'Singapore', '', 'java,Basic,1;dom,Intermediate,2', 20, '0', 0, 'on', '2015-11-23 08:11:04', '2015-11-23 08:11:04', 'f6c6dc1fba7ba4f10e611c563b1ac4db61d4d967.docx', ''),
('2315_5652d47dd96f6', 'RB2315_5652d47dd9739', NULL, 'Ryan', 'Brown', 'rbrown@grab-talent.com', 'SG (+65)', 90214544, 'Male', 'Singapore', 'asdtgsgdhnsdfgsdfbsfgsdfgsdfgsdfgsdfbxcvbxcvbx', '', 10, 'SGD', 3000, 'on', '2015-11-23 08:11:25', '2015-11-23 08:11:25', '5a492347cd5053698a5bfd5f7e41cd6f6f2957ed.docx', ''),
('3015_565c1ca2a234d', 'WS3015_565c1ca2a2378', NULL, 'Willie ', 'Steyn', 'jwsteyninsa@yahoo.com', 'DE (+49)', 27825759082, 'Male', 'Netherlands', '• SAP Project Manager - SAP FI and HCM ECC6 Certified. \n\n• Expertise in the Banking, Utilities, Mining, Defense, Consulting, Logistics, Insurance, FMCG, Technology, Manufacturing and Pharmaceutical Sectors, with multiple full life-cycle implementations for multinational, multicultural companies in EMEA.\n• PMBOK based Project Management Certificate in Information Technology Project Management.\n• Experienced Project Manager, with a proven track record, ensuring project delivery of core deliverables on time and to budget.\n• Overall management of internal and external stakeholders, business, external third party service suppliers, and offshore teams for global deployment projects.\n• Manage each process of the life-cycle, efficiently and to expectations, from the business analysis/ requirements/ Blue Print phase, through to Development/ Configuration, Quality assurance, financial funding, spending, forecasts, budgets, Data Migration, Operational readiness, Change Management, Business Processes, Cut-over and transition to support, on large-scale multi-country projects, with international blue chip companies, using PMBOK, Prince2 and ASAP methodology.\n• Familiar with the working cultures in Europe, Asia and Africa.\n• Manage multinational projects in The Netherlands, Belgium, Germany, The United Kingdom, Asia and South Africa.\n• Effective and positive team player known for contributing effective solutions as well as technical ability to deliver against milestones in a cost effective and fit oriented environment.\n', 'project management,Basic,1;dom,Advanced,3;asp,Basic,1;access,Basic,1', 20, '0', 0, 'on', '2015-11-30 09:11:38', '2015-11-30 09:11:38', '2516d5f045ea523b4ca65e6e9a0c27419f89ff66.docx', '');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_skills`
--

CREATE TABLE IF NOT EXISTS `candidate_skills` (
  `candidate_skill_ref_id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_ref_id` varchar(255) CHARACTER SET utf16 NOT NULL,
  `candidate_skill_name` varchar(255) CHARACTER SET utf16 NOT NULL,
  `candidate_skill_level` varchar(255) CHARACTER SET utf16 NOT NULL,
  `candidate_skill_rating` varchar(255) CHARACTER SET utf16 NOT NULL,
  `candidate_skill_created_date` datetime NOT NULL,
  PRIMARY KEY (`candidate_skill_ref_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `candidate_skills`
--

INSERT INTO `candidate_skills` (`candidate_skill_ref_id`, `candidate_ref_id`, `candidate_skill_name`, `candidate_skill_level`, `candidate_skill_rating`, `candidate_skill_created_date`) VALUES
(21, '1915_564e032bf27a4', 'word', 'Basic', '1', '2015-11-19 05:11:15'),
(15, '0815_563eef176c759', 'Java', 'Advanced', '5', '2015-11-13 06:11:37'),
(16, '0815_563ec7122d63e', 'c#', 'Intermediate', '2', '2015-11-18 11:11:21'),
(17, '0815_563ec7122d63e', 'basic', 'Intermediate', '3', '2015-11-18 11:11:15'),
(18, '1915_564e018d0938e', 'a', 'c', 'c', '2015-11-19 05:11:21'),
(19, '1915_564e032bf27a4', 'java', 'Basic', '1', '2015-11-19 05:11:15'),
(20, '1915_564e032bf27a4', 'dom', 'Basic', '1', '2015-11-19 05:11:15'),
(22, '1915_564e032bf27a4', 'excel', 'Basic', '1', '2015-11-19 05:11:15'),
(23, '1915_564e032bf27a4', 'access', 'Basic', '1', '2015-11-19 05:11:15'),
(24, '1915_564e018d0938e', 'java', 'Advanced', '5', '2015-11-19 06:11:52'),
(25, '2315_5652c932dcde3', 'equities', 'Intermediate', '2', '2015-11-23 08:11:14'),
(26, '2315_5652c932dcde3', 'equity', 'Advanced', '7', '2015-11-23 08:11:14'),
(27, '2315_5652c932dcde3', 'project management', 'Basic', '1', '2015-11-23 08:11:14'),
(28, '2315_5652c932dcde3', 'dom', 'Basic', '1', '2015-11-23 08:11:14'),
(29, '2315_5652cbbc71ab5', 'java', 'Basic', '1', '2015-11-23 08:11:04'),
(30, '2315_5652cbbc71ab5', 'dom', 'Intermediate', '2', '2015-11-23 08:11:04'),
(31, '0', 'c++', 'Advanced', '1', '2015-11-23 08:11:59'),
(32, '3015_565c1ca2a234d', 'project management', 'Basic', '1', '2015-11-30 09:11:38'),
(33, '3015_565c1ca2a234d', 'dom', 'Advanced', '3', '2015-11-30 09:11:38'),
(34, '3015_565c1ca2a234d', 'asp', 'Basic', '1', '2015-11-30 09:11:38'),
(35, '3015_565c1ca2a234d', 'access', 'Basic', '1', '2015-11-30 09:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_tblkeywordmatch`
--

CREATE TABLE IF NOT EXISTS `candidate_tblkeywordmatch` (
  `keyword_value` varchar(255) NOT NULL,
  `keyword_created_by` varchar(255) NOT NULL,
  `system_created_date` datetime NOT NULL,
  `keyword_last_modified_by` varchar(255) NOT NULL,
  `system_last_modified_date` datetime NOT NULL,
  `keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`keyword_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `candidate_tblkeywordmatch`
--

INSERT INTO `candidate_tblkeywordmatch` (`keyword_value`, `keyword_created_by`, `system_created_date`, `keyword_last_modified_by`, `system_last_modified_date`, `keyword_id`) VALUES
('FX', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 1),
('C++', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 2),
('Java', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 3),
('Linux', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 4),
('Equities', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 6),
('Equity', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 7),
('Project Management', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 8),
('Microsoft Office 2007', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 9),
('Windows 2003', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 10),
('HTML', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 12),
('jQuery', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 13),
('CSS', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 14),
('PHP', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 15),
('JavaScript', 'davidrundell@grab-talent.com', '2015-10-22 00:00:00', '', '0000-00-00 00:00:00', 16),
('C#', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 17),
('XML', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 18),
('DOM', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 19),
('SAX', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 20),
('ASP', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 21),
('DHTML', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 22),
('VBScript', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 23),
('Word', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 24),
('Excel', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 25),
('Access', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 26),
('Powerpoint', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00', 27);

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE IF NOT EXISTS `employers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employer_code` varchar(255) NOT NULL,
  `employer_name` varchar(50) NOT NULL,
  `employer_web_address` varchar(255) NOT NULL,
  `employer_phone` varchar(20) NOT NULL,
  `employer_fax` varchar(20) NOT NULL,
  `employer_address` varchar(255) NOT NULL,
  `employer_country` varchar(100) NOT NULL,
  `employer_description` varchar(5000) NOT NULL,
  `employer_contact_firstname` varchar(50) NOT NULL,
  `employer_contact_lastname` varchar(45) NOT NULL,
  `employer_contact_email` varchar(50) NOT NULL,
  `employer_logo_url` varchar(100) DEFAULT NULL,
  `employer_video_url` varchar(100) DEFAULT NULL,
  `employer_active` varchar(5) DEFAULT NULL,
  `employer_created_by` varchar(45) DEFAULT NULL,
  `employer_created_date` datetime NOT NULL,
  `employer_last_modified_by` varchar(45) DEFAULT NULL,
  `employer_last_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_created_date` (`employer_created_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `employer_code`, `employer_name`, `employer_web_address`, `employer_phone`, `employer_fax`, `employer_address`, `employer_country`, `employer_description`, `employer_contact_firstname`, `employer_contact_lastname`, `employer_contact_email`, `employer_logo_url`, `employer_video_url`, `employer_active`, `employer_created_by`, `employer_created_date`, `employer_last_modified_by`, `employer_last_modified_date`) VALUES
(1, 'EMP-1511-30332845', 'My Hero', 'google.com', '11111111', '222222222', 'Anywhere', 'Singapore', 'David B', 'David', 'Bolland', 'dbolland@grab-talent.com', '', '', 'Yes', 'drundell@grab-talent.com', '2015-11-08 02:11:58', '', '0000-00-00 00:00:00'),
(2, 'EMP-1511-33346441', 'TH', 'google.com', '11111', '22222', 'jsdjsddjsjd', 'Azerbaijan', 'dsfdfds', 'David', 'Rundell', 'davidrundell99@gmail.com', '', '', 'Yes', 'drundell@grab-talent.com', '2015-11-08 02:11:59', '', '0000-00-00 00:00:00'),
(3, 'EMP-1511-43116041', 'David B', 'jhjh', '111', '7777777', '14 Robinson Road, Singapore', 'Armenia', 'hfhgfhghfhgh', 'David', 'Bolland', 'david.a.bolland@gmail.com', '', '', 'Yes', 'drundell@grab-talent.com', '2015-11-11 01:11:03', '', '0000-00-00 00:00:00'),
(4, 'EMP-1511-79280699', 'Windsor Royce Pte Ltd', 'www.windsor-royce.com', '+6582186225', '+65123456', '14 Robinson Road\n#13-00 Far East Finance Building\nSingapore 048545', 'Singapore', 'Recruitment to recruitment company specialising in the selection and placement of recruitment industry professionals', 'Marie', 'Brown', 'mbrown@windsor-royce.com', '', '', 'Yes', 'mbrown@grab-talent.com', '2015-11-23 09:11:18', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employer_login`
--

CREATE TABLE IF NOT EXISTS `employer_login` (
  `employer_id` int(11) NOT NULL AUTO_INCREMENT,
  `employer_code` varchar(255) CHARACTER SET latin1 NOT NULL,
  `employer_email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `employer_password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `system_created_date` datetime NOT NULL,
  `system_modified_date` datetime NOT NULL,
  PRIMARY KEY (`employer_id`,`employer_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employer_login`
--

INSERT INTO `employer_login` (`employer_id`, `employer_code`, `employer_email`, `employer_password`, `system_created_date`, `system_modified_date`) VALUES
(1, 'daf3179cbb874198a714bef6aec00d10ef9fe79d4cd84d50c590dbe29a521ee9', 'dbolland@grab-talent.com', '910889042897c2e1eb67b35fc8a053ff', '2015-11-08 13:00:00', '2015-11-08 06:31:58'),
(2, '33a1d47f093cfd23512798f45fb9852dcdde5d47dadd4915330b571a4fa55035', 'davidrundell99@gmail.com', '97fdb643687988bee344c3c2bf8f3797', '2015-11-08 13:00:00', '2015-11-08 06:33:32'),
(3, '04da91739cbd8fbfdc50026aef7e361b9a80786dd302651bb6026031b4a0b143', 'david.a.bolland@gmail.com', 'a841674ba05f92576f87df361683a3f8', '0000-00-00 00:00:00', '2015-11-11 13:51:49'),
(4, 'c5503650f1288118479111301869a0883aaade867e7dabe44974765b33e4c840', 'mbrown@windsor-royce.com', 'a841674ba05f92576f87df361683a3f8', '0000-00-00 00:00:00', '2015-12-02 05:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `grabtalent_language`
--

CREATE TABLE IF NOT EXISTS `grabtalent_language` (
  `lang_id` varchar(255) NOT NULL,
  `lang_english` longtext,
  `lang_chinese` longtext,
  `lang_french` longtext,
  `language_modified_by` varchar(100) DEFAULT NULL,
  `language_modified_date` datetime DEFAULT NULL,
  UNIQUE KEY `lang_id_UNIQUE` (`lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grabtalent_language`
--

INSERT INTO `grabtalent_language` (`lang_id`, `lang_english`, `lang_chinese`, `lang_french`, `language_modified_by`, `language_modified_date`) VALUES
('about.aboutheading1', 'Features at a Glance', '功能概览', ' Aperçu des caractéristiques', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.aboutheading2', 'Gaps in the Recruitment Hiring Process', '&#22312;&#25307;&#32856;&#25307;&#32856;&#27969;&#31243;&#31354;&#30333;', 'Les lacunes dans le processus d&#39;embauche Recrutement', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.aboutheading3', 'Solutions Offered by Grab Talent', '&#35299;&#20915;&#26041;&#26696;&#25152;&#25552;&#20379;&#25235;&#26007;&#20154;&#25165;', 'Solutions Proposé par Grab Talent', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist1', 'Hiring Manager Management', '&#25307;&#32856;&#32463;&#29702;&#31649;&#29702;', 'Embauche de gestion Manager', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist2', 'Candidate Management', '&#20505;&#36873;&#31649;&#29702;', 'Candidate Management', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist2_1', 'Complex and Lengthy Hiring Process', '&#22797;&#26434;&#20887;&#38271;&#30340;&#25307;&#32856;&#27969;&#31243;', 'Processus d&#39;embauche longues et complexes', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist2_2', 'Too many personnel involved in the search and selection process', '&#21442;&#19982;&#23547;&#25214;&#21644;&#36873;&#25321;&#36807;&#31243;&#26377;&#22826;&#22810;&#30340;&#20154;&#21592;', 'Trop de personnel impliqué dans le processus de recherche et la sélection', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist2_3', 'Duplicate work', '&#37325;&#22797;&#30340;&#24037;&#20316;', 'la duplication du travail', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist2_4', 'Poor Quality of Applicants', '&#30003;&#35831;&#20154;&#30340;&#36136;&#37327;&#24046;', 'Mauvaise qualité des candidats', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist2_5', 'Costly Process', '&#26114;&#36149;&#30340;&#36807;&#31243;', 'processus coûteux', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist3', 'Job Management', '&#20316;&#19994;&#31649;&#29702;', 'Gestion des tâches', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist3_1', 'Smart candidate matching', '&#32874;&#26126;&#30340;&#20505;&#36873;&#21305;&#37197;', 'Intelligente de recherche de candidat', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist3_2', 'Candidate Management', '&#20505;&#36873;&#31649;&#29702;', 'Candidate Management', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist3_3', 'Job Management', '&#20316;&#19994;&#31649;&#29702;', 'Gestion des tâches', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist3_4', 'Live and on-demand Interview Capability', '&#30452;&#25773;&#21644;&#28857;&#25773;&#19987;&#35775;&#33021;&#21147;', 'En direct et sur demande Interview Capability', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist3_5', 'Fast, reliable and secure', '&#24555;&#36895;&#65292;&#21487;&#38752;&#65292;&#23433;&#20840;&#30340;', 'Rapide fiable et sécurisé', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist4', 'Smart Candidate matching', '&#32874;&#26126;&#30340;&#20505;&#36873;&#21305;&#37197;', 'Appariement du candidat à puce', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist5', 'Live and on-demand Interview Capability', '&#30452;&#25773;&#21644;&#28857;&#25773;&#19987;&#35775;&#33021;&#21147;', 'En direct et sur demande Interview Capability', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.featureslist6', '24/7 Hiring Portal', '&#36;&#25307;&#32856;&#38376;&#25143;&#32593;&#31449;', '24/7 embauche Portal', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.headercontent', 'Grab Talent is an online platform that enables clients and applicants to directly reach each other.  It achieves this by simplifying and automating the end-to-end process to lower client costs  and re-invent the talent acquisition experience.', '', '', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('about.heading', 'About Us', '关于我们', ' A propos de nous', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('applicantTrack.btnIntvwlabel', 'Confirm and prepare email', '&#30830;&#35748;&#24182;&#20934;&#22791;&#30005;&#23376;&#37038;&#20214;', 'Confirmer et préparer email', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('applicantTrack.btnlabel1', 'Move candidate to Shortlist Candidate', '&#31227;&#21160;&#20505;&#36873;&#20154;&#20837;&#22260;&#20505;&#36873;', 'Déplacez candidat Candidat à ma selection', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('applicantTrack.btnlabel2', 'Schedule Interview and send email to candidate for confirmation', '&#23433;&#25490;&#37319;&#35775;&#21644;&#21457;&#36865;&#30005;&#23376;&#37038;&#20214;&#32473;&#32771;&#29983;&#30830;&#35748;', 'Interview annexe et envoyer des courriels à la candidate pour la confirmation', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('applicantTrack.btnlabel2_1', 'Change candidate stage & Schedule Interview', '&#26356;&#25913;&#20505;&#36873;&#20154;&#38454;&#27573;&#21450;&#26085;&#31243;&#19987;&#35775;', 'Changer stade de candidat et annexe Interview', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('applicantTrack.btnlabel3', 'Send additional interview details (if applicable.)', '&#21457;&#36865;&#37319;&#35775;&#30340;&#20854;&#20182;&#35814;&#32454;&#20449;&#24687;&#65288;&#22914;&#36866;&#29992;&#65289;&#12290;', 'Envoyer détails de l''entrevue supplémentaires (le cas échéant.)', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('applicantTrack.btnlabel4', 'Move candidate to Offer stage & send Email', '将考生提供舞台和发送电子邮件', 'Déplacez candidat à offrir stade et envoyer des e-mail', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('applicantTrack.btnlabel5', 'Send Offer to candidate via email', '&#36890;&#36807;&#30005;&#23376;&#37038;&#20214;&#21457;&#36865;&#20248;&#24800;&#20505;&#36873;', 'Envoyer l''offre au candidat par courriel', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('applicantTrack.btnlabel6', 'Move candidate to Placed stage', '&#31227;&#21160;&#21040;&#20505;&#36873;&#25670;&#23454;&#20064;', 'Déplacez candidat à l''étape Placé', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('applicantTrack.btnlabelheading2_1', 'Interview Schedule', '&#38754;&#35797;&#23433;&#25490;', 'Interview Schedule', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('applicantTrack.stepcommentHeader', 'Please fill comments:', '&#35831;&#22635;&#20889;&#35780;&#35770;&#65306;', 'S''il vous plaît remplir commentaires:', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('applicantTrack.stepHeaderpopup', 'What do you want to do next?', '&#37027;&#20320;&#35201;&#24590;&#20040;&#20570;&#65311;', 'Que voulez-vous faire ensuite?', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('applicantTrack.stepHeaderpopupsubHead', 'Please select an action:', '&#35831;&#36873;&#25321;&#19968;&#20010;&#21160;&#20316;&#65306;', 'S''il vous plaît sélectionner une action:', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.academicdetails', 'Academic Details', '&#23398;&#26415;&#35814;&#24773;', 'Détails académiques', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.candidatereference', 'Candidate References', '&#32771;&#29983;&#21442;&#32771;', 'Références candidats', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.candidatereferencepopup', 'Add Candidate References', '&#21152;&#20837;&#20505;&#36873;&#21442;&#32771;', 'Ajouter des références de candidats', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.candidaterefheading1', 'Name', '&#21517;&#23383;', 'Nom', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.candidaterefheading2', 'Company', '&#20844;&#21496;', 'Société', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.candidaterefheading3', 'Email', '&#30005;&#23376;&#37038;&#20214;', 'Email', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.candidaterefheading4', 'Phone (If any.)', '&#30005;&#35805;&#65288;&#22914;&#26377;&#65289;&#12290;', 'Téléphone (le cas échéant.)', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.mypastapplication', 'My Past Applications', '&#25105;&#36807;&#21435;&#30340;&#24212;&#29992;', 'Mes Applications passées', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.mypastapplnheading1', 'Job Number', '&#25307;&#32856;&#20154;&#25976;', 'Numéro d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.mypastapplnheading2', 'Job Applied Date', '&#25307;&#32856;&#24212;&#29992;&#26085;&#26399;', 'Date de la demande d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.mypastapplnheading3', 'Job Posted Date', '&#25307;&#32856;&#21457;&#24067;&#26085;&#26399;', 'Job Date de publication', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.mypastapplnheading4', 'Client', '&#23458;&#25143;', 'Client', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.mypastapplnheading5', 'Stage reached', '&#33310;&#21488;&#36798;&#25104;', 'Etape', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.mypastapplnheading6', 'Last Updated Date', '&#26368;&#21518;&#26356;&#26032;&#26085;&#26399;', 'Derniere mise à jour', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.skills', 'Skills', '&#25216;&#33021;', 'Compétences', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.skilltblheading1', 'Skill Name', '&#25216;&#33021;&#21517;&#31216;', 'Nom de Skill', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.skilltblheading2', 'Skill Level', '&#25216;&#33021;&#31561;&#32423;', 'Niveau de compétence', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.skilltblheading3', 'Rating (Out of 5)', '&#35780;&#20998;&#1044613;&#20998;&#65289;', 'Note (sur 5)', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.skilltblheadingpopup', 'Add Skill', '&#21152;&#25216;&#33021;', 'Ajouter Skill', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.workexp', 'Work Experience', '&#24037;&#20316;&#32463;&#39564;', 'Expérience professionnelle', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.workexpCurrentjob', 'Current Job', '&#30070;&#21069;&#24037;&#20316;', 'Travail Actuel', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.workexptblheading1', 'Employer Name', '&#38599;&#20027;&#22995;&#21517;', 'Nom de l''employeur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.workexptblheading2', 'Designation', '&#31216;&#21495;', 'Désignation', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.workexptblheading3', 'Salary', '&#34218;&#27700;', 'Salaire', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.workexptblheading4', 'Country', '&#22269;&#23478;', 'Pays', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.workexptblheading5', 'Start Date', '&#24320;&#22987;&#26085;&#26399;', 'Date De Début', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.workexptblheading6', 'End Date', '&#32467;&#26463;&#26085;&#26399;', 'Date De Fin', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatedash.workexptblheadingpopup', 'Add Work Experience', '&#28155;&#21152;&#24037;&#20316;&#32463;&#39564;', 'Ajouter Expérience professionnelle', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatehome.forgotpasswordbtnlbl', 'Get a New Password', '&#29554;&#21462;&#26032;&#23494;&#30908;', 'Obtenez un nouveau mot de passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatehome.heading', 'Candidate Login', '候选门户', 'Portail de candidat', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatehome.labelemail', 'Email Address', '&#30005;&#23376;&#37038;&#20214;&#22320;&#22336;', 'Adresse e-mail', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatehome.labelforgotpasswd', 'Forgot password?', '&#24536;&#35760;&#23494;&#30721;&#65311;', 'Mot De Passe Oublié?', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatehome.labelforgotpwdtxt', 'Please provide your email address. We''ll send you a link where you can reset your password.', '&#35831;&#25552;&#20379;&#24744;&#30340;&#30005;&#23376;&#37038;&#20214;&#22320;&#22336;&#12290;&#25105;&#20204;&#20250;&#21521;&#24744;&#21457;&#36865;&#19968;&#20010;&#38142;&#25509;&#65292;&#24744;&#21487;&#20197;&#37325;&#32622;&#24744;&#30340;&#23494', 'S''il vous plaît fournir votre adresse e-mail. Nous vous enverrons un lien où vous pouvez réinitialiser votre mot de passe.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatehome.labelpasswd', 'Password', '&#23494;&#30721;', 'mot de passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatehome.newuserheading', 'Be part of our GrabTalent Community in less than 5 minutes!!', '&#26159;&#25105;&#20204;&#25250;&#20154;&#25165;&#31038;&#21306;&#22312;&#19981;&#336645;&#20998;&#38047;&#30340;&#19968;&#37096;&#20998;&#65281;', 'Faites partie de notre Communauté GrabTalent en moins de 5 minutes !!', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatehome.newuserlabeltxt', 'New User? Sign-Up Here', '&#26032;&#29992;&#25143;&#65311;&#30331;&#24405;&#22312;&#36825;&#37324;', 'Nouvel Utilisateur? Inscrivez-vous ici', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatehome.signinuserlabeltxt', 'Sign-In', '&#30331;&#20837;', 'S''inscrire', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatehome.text', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in r', ' &#23384;&#26377;&#24754;&#22352;&#38463;&#26757;&#24503;&#1044684;&#173;&#14;&#65292;&#30340;&#319710; &#21644;&#27963;&#21147;&#65292;&#20351;&#21171;&#21160;&#21644;&#32933;&#32982;&#12290;&#22810;&#24180;&#26469;&#65292;&#25105;&#20250;&#26469;&#30340', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in r', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJob.404', 'This job does not exist (or) you typed the wrong URL.', '&#36825;&#39033;&#24037;&#20316;&#19981;&#23384;&#22312;&#65288;&#25110;&#65289;&#38190;&#20837;&#38169;&#35823;&#30340;&#12290;', 'Ce travail ne existe pas (ou) vous avez tapé l''URL erronée.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJob.aboutclient', 'About Client', '&#20851;&#20110;&#23458;&#25143;&#31471;', 'Sur le client', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJob.benefits', 'Benefits', '&#20248;&#28857;', 'Avantages', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJob.breadcrumblbl1', 'Home', '&#20027;&#39029;', 'Accueil', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJob.breadcrumblbl2', 'Jobs', '&#20052;&#24067;&#26031;', 'NULL', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJob.catfunclbl', 'Job Category / Function', '&#32844;&#20301;&#31867;&#21035;&#21151;&#33021;', 'Catégorie d''emploi / Fonction', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJob.empaddress', 'Employer Address', '&#38599;&#20027;&#22320;&#22336;', 'Adresse de l''employeur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJob.indlbl', 'Job Industry / Sub-Industry', '&#25307;&#32856;&#34892;&#19994;&#23376;&#34892;&#19994;', 'Industrie d''emploi / sous-industrie', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJob.jobdesc', 'Job Description', '&#32844;&#20301;&#25551;&#36848;', 'Description de l''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJob.offerlbl1', 'Send Offer by email', '&#21457;&#36865;&#20248;&#24800;&#30005;&#23376;&#37038;&#20214;', 'Envoyer par email Offre', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJob.postDt', 'Posted on', '&#21457;&#34920;&#20110;', 'Posté le', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJob.salaryinfo', 'Monthly Salary', '月收入', 'Salaire mensuel', 'sunil.madana.kumar@gmail.com', '2015-11-07 21:58:00'),
('candidateJob.workhrs', 'Working Hours', '&#24037;&#20316;&#26102;&#38388;', 'Heures de travail', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJobs.btnlbl1', 'Apply', '&#36816;&#29992;', 'Appliquer', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJobs.btnlbl2', 'Applied', '&#24212;&#29992;&#30340;', 'Appliquée', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJobs.heading', 'All Posted jobs', '&#25152;&#26377;&#21457;&#24067;&#30340;&#24037;&#20316;', 'Tous les emplois Publié', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJobs.homenojobslbl', 'There are no jobs matching that your skills.', '&#26377;&#27809;&#26377;&#24037;&#20316;&#30456;&#21305;&#37197;&#65292;&#20320;&#30340;&#25216;&#33021;&#12290;', 'Il n''y a aucun emploi correspondant à ce que vos compétences.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJobs.hometablecol1', 'Job Number', '&#25307;&#32856;&#20154;&#25968;', 'Numéro d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJobs.hometablecol2', 'Job Title', '&#32844;&#31216;', 'Titre du poste', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJobs.hometablecol3', 'Salary', '&#34218;&#27700;', 'Salaire', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJobs.hometablecol4', 'Job Location', '&#24037;&#20316;&#22320;&#28857;', 'Situation d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJobs.hometablecol5', 'Job Industry', '&#25307;&#32856;&#34892;&#19994;', 'Industrie d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJobs.hometablecol6', 'One-Click Apply', '&#19968;&#38190;&#24335;&#24212;&#29992;', 'One-Click Appliquer', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateJobs.uploadresumelbl', 'Upload Resume to apply.', '&#19978;&#20256;&#31616;&#21382;&#30003;&#35831;&#12290;', 'Envoyer CV à appliquer.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatelogin.home', 'My Dashboard', '&#25105;&#30340;&#20736;&#34920;&#26495;', 'Mon Tableau De Bord', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatelogin.jobs', 'Jobs', '&#20052;&#24067;&#26031;', 'Offres d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatelogin.logout', 'Logout', '&#27880;&#38144;', 'Se Déconnecter', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatelogin.myprofile', 'My Account', '&#25105;&#30340;&#24115;&#25142;', 'Mon Compte', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.briefdescription', 'Brief Description', '&#31616;&#36848;', 'Brève Description', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.companyprofchgpwd', 'Change Password', '&#26356;&#25913;&#23494;&#30721;', 'Changer mot de passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.companyprofchgpwdlbl1', 'New Password', '&#26032;&#23494;&#30721;', 'Nouveau Mot De Passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.companyprofchgpwdlbl2', 'Confirm New Password', '&#30830;&#35748;&#26032;&#23494;&#30721;', 'Confirmer le nouveau mot de passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.companyprofresetBtn', 'Reset', '&#37325;&#32622;', 'Remettre', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.companyprofupdBtn', 'Update Profile', '&#26356;&#26032;&#20010;&#20154;&#36164;&#26009;', 'Mise à jour de profil', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.email', 'Email', '&#30005;&#23376;&#37038;&#20214;', 'Email', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.firstName', 'First Name', '&#21517;&#23383;', 'Prénom', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.lastName', 'Last Name', '&#22995;', 'Nom de famille', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.phonenumber', 'Phone Number', '&#30005;&#35805;&#21495;&#30721;', 'Numéro de téléphone', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.resumeUpd', 'Resume', '&#31616;&#21382;', 'Résumé', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.ResumeUploadBtn', 'Upload Resume', '&#19978;&#20659;&#31777;&#27511;', 'Déposez votre CV', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidateprofile.viewResumeBtn', 'View/Download Resume', '&#26597;&#30475;&#19979;&#36617;&#31777;&#27511;', 'Voir / Télécharger CV', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatereg.backbtnlink', 'Back to Login', ' &#36820;&#22238;&#21040;&#30331;&#24405;', 'Retour à Connexion', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatereg.buttonlabel', 'Register and continue', '&#27880;&#20876;&#24182;&#32487;&#32493;', 'Enregistrer et continuer', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatereg.confirmpassword', 'Confirm password', '&#30830;&#35748;&#23494;&#30721;', 'Confirmez Le Mot De Passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatereg.emailaddress', 'Email Address', '&#30005;&#23376;&#37038;&#20214;&#22320;&#22336;', 'Adresse e-mail', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatereg.heading', 'Grab Talent registration takes less than 5 minutes, just upload your *.docx resume and wait.', '抢人才注册时间不超过5分钟，只需上传你的*.DOCX恢复和等待。', 'Faire Talent inscription prend moins de 5 minutes, il suffit de télécharger votre * .docx reprendre et attendre.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatereg.password', 'password', '&#23494;&#30721;', 'mot de passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.addeducationbtnlbl', 'Add Education', '&#21152;&#20837;&#25945;&#32946;', 'Ajouter Education', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.addeducationpopupDtlbl1', 'Date', '&#26085;&#26399;', 'Date', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.addeducationpopupDtlbl2', 'Month', '&#26376;', 'Mois', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.addeducationpopupDtlbl3', 'Year', '&#24180;', 'Année', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.addeducationpopuplbl', 'Add Education Level', '&#21152;&#20837;&#25945;&#32946;&#27700;&#24179;', 'Ajouter Niveau', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.briefdescription', 'Brief Description', '&#31616;&#36848;', 'brève Description', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.countryofresidence', 'Country of Residence', '&#23621;&#20303;&#22269;&#23478;', 'Pays de résidence', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.currentemployer', 'Current Employer', '&#29616;&#22312;&#30340;&#38599;&#20027;', 'Employeur Actuel', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.currentmonthsalary', 'Current Monthly Salary', '&#30446;&#21069;&#26376;&#34218;', 'Salaire mensuel actuel', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.currentposition', 'Current Position', '&#24744;&#29616;&#22312;&#30340;&#20301;&#32622;', 'Position Actuelle', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.educationcolumn1', 'School/University', '&#23398;&#38498;&#22823;&#23398;', 'Ecole / Université', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.educationcolumn2', 'Education Level', '&#25945;&#32946;&#31243;&#24230;', 'Niveau D''Éducation', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.educationcolumn3', 'Field of Study', '&#30740;&#31350;&#39046;&#22495;', 'Domaine d''études', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.educationcolumn4', 'Start Date', '&#24320;&#22987;&#26085;&#26399;', 'date De Début', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.educationcolumn5', 'End Date', '&#32467;&#26463;&#26085;&#26399;', 'date De Fin', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.email', 'Email address', '&#30005;&#23376;&#37038;&#20214;&#22320;&#22336;', 'Adresse e-mail', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.employerlocation', 'Employer Location', '&#38599;&#20027;&#22320;&#28857;', 'Employeur Lieu', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.expectmonthsalary', 'Expected Monthly Salary', '&#26399;&#26395;&#26376;&#34218;', 'Salaire Mensuel Attendu', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.firstname', 'First Name', '&#21517;&#23383;', 'Prénom', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.gender', 'Gender', '&#24615;&#21035;', 'sexe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.genderoptn1', 'Male', '&#30007;', 'mâle', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.genderoptn2', 'Female', '&#22899;', 'féminin', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.header1', 'Personal Details', '&#20010;&#20154;&#36164;&#26009;', 'Details Personnels', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.header2', 'Work Experience', '&#24037;&#20316;&#32463;&#39564;', 'Expérience professionnelle', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.header3', 'Academic Details', '&#23398;&#26415;&#35814;&#24773;', 'Détails académiques', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.jobalertagreement', 'I wish to receive Job alerts from GrabTalent.', '&#25105;&#24819;&#20174;&#25250;&#20154;&#25165;&#25509;&#25910;&#20316;&#19994;&#35686;&#25253;&#12290;', 'Je souhaite recevoir des alertes de l''emploi à partir GrabTalent.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.lastname', 'Last Name', '&#22995;', 'nom de famille', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.mandatory', 'Mandatory', '&#24378;&#21046;&#24615;', 'obligatoire', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.name', 'Name', '&#21517;&#23383;', 'nom', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.nationality', 'Nationality', '&#22269;&#31821;', 'Nationalité', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.phonenumber', 'Phone Number', '&#30005;&#35805;&#21495;&#30721;', 'Numéro de téléphone', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.termsandcond', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in r', '&#34605; &#38785;&#39743; &#39012;&#39977;&#40398; &#35659;&#36688;&#37845; &#39444;&#39916;&#40324; &#28638;&#28642;&#29160; &#28915;&#29308; &#23911; &#25750;&#25777;&#26290; &#30615;&#31303;&#32269; &#24498; &#24404;&#25267; &#28887;&#29440; &#26290; &', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in r', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.termsandconditions', 'I agree to GrabTalent', '&#25105;&#21516;&#24847;&#25250;&#20154;&#25165;', 'Je suis d''accord Grab Talent', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.termsandconditionstxt', 'Terms & Conditions / Privacy Policy', '&#26465;&#27454;&#38544;&#31169;&#25919;&#31574;', 'Conditions générales de vente / Politique de confidentialité', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('candidatesignup.totyearsexperience', 'Total years of relevant work experience', '&#24635;&#22810;&#24180;&#30340;&#30456;&#20851;&#24037;&#20316;&#32463;&#39564;', 'Nombre total d''années d''expérience de travail pertinente', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.headercontent', 'Please leave us a message. We will respond to your enquiry shortly.', '&#24744;&#21487;&#20197;&#32473;&#25105;&#20204;&#30041;&#35328;&#65292;&#25105;&#20204;&#20250;&#23613;&#24555;&#32473;&#24744;&#23613;&#24555;&#12290;', 'Vous pouvez nous laisser un message et nous allons revenir à vous dès que possible.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.heading1', 'Contact Us', '&#32852;&#31995;&#25105;&#20204;', 'Appelez Nous', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label1', 'First Name', '&#21517;&#23383;', 'Prénom', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label1_1', 'Your First Name', '&#20320;&#30340;&#21517;&#23383;', 'Ton Prénom', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label2', 'Last Name', '&#22995;', 'nom de famille', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label2_1', 'Your Last Name', '&#24744;&#30340;&#22995;&#27663;', 'nom de famille', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label3', 'Email', '&#30005;&#23376;&#37038;&#20214;', 'Email', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label3_1', 'Your Email', '&#24744;&#30340;&#30005;&#23376;&#37038;&#20214;', 'Votre Email', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label4', 'Phone Number', '&#30005;&#35805;&#21495;&#30721;', 'Numéro de téléphone', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label4_1', 'Your Phone Number', '&#20320;&#30340;&#30005;&#35805;&#21495;&#30721;', 'Votre Numéro de téléphone', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label5', 'Reason for Contact', '&#32852;&#31995;&#21407;&#22240;', 'Motif du contact', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label5_1', 'Reason for Contact', '&#32852;&#31995;&#21407;&#22240;', 'Motif du contact', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label6', 'Message', '&#20449;&#24687;', 'Message', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label6_1', 'Enter your Message', '&#36755;&#20837;&#24744;&#30340;&#20449;&#24687;', 'Entrez votre message', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('contact.label7', 'Call Us at', '&#32852;&#31995;&#25105;&#20204;', 'Appelez-nous au', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('home.about', 'About', '&#20851;&#20110;&#25105;&#20204;', 'A Propos De Nous', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('home.contact', 'Contact', '&#32852;&#31995;', 'Contact', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('home.index', 'Home', '&#23478;', 'Home', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('home.jobseeker', 'Candidate', '候选人', 'Candidat', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('home.recruiter', 'Recruiter', '&#25307;&#32856;&#20154;&#21592;', 'Recruteur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterhome.forgotpasswordbtnlbl', 'Get a New Password', '&#29554;&#21462;&#26032;&#23494;&#30908;', 'Obtenez un nouveau mot de passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterhome.heading', 'Recruiter Portal', '&#25307;&#32856;&#20154;&#21592;&#38376;&#25143;', 'Portail recruteur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterhome.joblinksbutton', 'Jobs Menu', '&#20316;&#19994;&#33756;&#21333;', 'Offres d''emploi Menu', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterhome.labelemail', 'Email Address', '&#30005;&#23376;&#37038;&#20214;&#22320;&#22336;', 'Email Address', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterhome.labelforgotpasswd', 'Forgot password?', '&#24536;&#35760;&#23494;&#30721;&#65311;', 'Forgot password?', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterhome.labelforgotpwdtxt', 'Please provide your email address. We''ll send you a link where you can reset your password.', '&#35831;&#25552;&#20379;&#24744;&#30340;&#30005;&#23376;&#37038;&#20214;&#22320;&#22336;&#12290;&#25105;&#20204;&#20250;&#21521;&#24744;&#21457;&#36865;&#19968;&#20010;&#38142;&#25509;&#65292;&#24744;&#21487;&#20197;&#37325;&#32622;&#24744;&#30340;&#23494', 'S''il vous plaît fournir votre adresse e-mail. Nous vous enverrons un lien où vous pouvez réinitialiser votre mot de passe.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterhome.labelpasswd', 'Password', '&#23494;&#30721;', 'Password', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterhome.labelresetconfirmnewLblpwd', 'Confirm New Password', '&#30906;&#35469;&#26032;&#23494;&#30908;', 'Confirmer le nouveau mot de passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterhome.labelresetnewLblpwd', 'New Password', '&#26032;&#23494;&#30908;', 'Nouveau Mot De Passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterhome.labelresetpasstxt', 'To reset your password provide a new password.', '&#35201;&#37325;&#32622;&#23494;&#30908;&#65292;&#25552;&#20379;&#19968;&#20491;&#26032;&#30340;&#23494;&#30908;&#12290;', 'Pour réinitialiser votre mot de passe fournir un nouveau mot de passe.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterhome.labelresetpasswd', 'Change Password', '&#37325;&#35373;&#23494;&#30908;', 'Réinitialiser Le Mot De Passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterhome.labelresetpasswdbtnlbl', 'Save Password', '&#20445;&#23384;&#23494;&#30908;', 'Enregistrer Mot de passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterJob.404', 'This job does not exist (or) you typed the wrong URL.', '&#36825;&#39033;&#24037;&#20316;&#19981;&#23384;&#22312;&#65288;&#25110;&#65289;&#38190;&#20837;&#38169;&#35823;&#30340;&#12290;', 'Ce travail ne existe pas (ou) vous avez tapé l''URL erronée.', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('recruiterlogin.applicantTracking', 'Applicant Tracking', '&#30003;&#35831;&#20154;&#36319;&#36394;', 'Suivi des candidats', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applicantTrackinglbl', 'There are no job applications to track.', '&#26377;&#27809;&#26377;&#27714;&#32844;&#30003;&#35831;&#36319;&#36394;&#12290;', 'Il n''y a pas de demandes d''emploi à suivre.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnJobTrackhding', 'There are no applicants.', '&#26377;&#27809;&#26377;&#30003;&#35831;&#12290;', 'Il n''y a pas de candidats.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnTrackcol1', 'Job. Id', '&#20316;&#19994;&#12290;&#26631;&#35782;', 'Travail. Id', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnTrackcol10', 'Actions', '&#34892;&#21160;', 'Actions', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnTrackcol2', 'Job Title', '&#32844;&#20301;', 'Titre du poste', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnTrackcol3', 'Country', '&#22269;&#23478;', 'Pays', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnTrackcol4', 'Location', '&#31199;&#25151;', 'Emplacement', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnTrackcol5', 'Hiring Manager', '&#25307;&#32856;&#32463;&#29702;', 'Gestionnaire d''embauche', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnTrackcol6', 'HR/TA Contact', 'HR/TA &#32852;&#31995;', 'HR / TA Contactez', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnTrackcol7', 'No of Applicants', '&#27809;&#26377;&#30003;&#35831;&#20154;', 'Aucune des candidats', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnTrackcol8', 'Job Status', '&#20316;&#19994;&#29366;&#24577;', 'Statut d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnTrackcol9', 'Status Comments', '&#24773;&#20917;&#30340;&#24847;&#35265;', 'Situation Commentaires', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnTrackhding', 'Applicant Tracking System', '&#30003;&#35831;&#20154;&#36319;&#36394;&#31995;&#32479;', 'Système de suivi des candidats', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnViewcol1', 'Applicant Name', '&#30003;&#35831;&#20154;&#21517;&#31216;', 'Nom du demandeur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnViewcol2', 'Job Title', '&#32844;&#20301;', 'Titre du poste', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnViewcol3', 'Country', '&#22269;&#23478;', 'Pays', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnViewcol4', 'Location', '&#31199;&#25151;', 'Emplacement', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnViewcol5', 'View CV', '&#26597;&#30475;&#31616;&#21382;', 'Voir le CV', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnViewcol6', 'Applicant Status', '&#30003;&#35831;&#20154;&#29366;&#24577;', 'Statut du demandeur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnViewcol7', 'Status Comment', '&#22914;&#20309;&#29366;&#24577;', 'Statut Commentaire', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnViewcol8', 'Action', '&#34892;&#20026;', 'Action', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.applnViewhding', 'Applicant View', '&#30003;&#35831;&#26597;&#30475;', 'Voir le demandeur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.calendartxt', 'Calendar', '历', 'Calendrier', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('recruiterlogin.companyContactAddress', 'Employer Address', '&#38599;&#20027;&#22320;&#22336;', 'Adresse de l''employeur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.companyContactBriefDesc', 'About Employer', '&#20851;&#20110;&#38599;&#20027;', 'À propos de l''employeur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.companyContactEmail', 'Employer Contact Email', '&#38599;&#20027;&#32852;&#31995;&#30005;&#23376;&#37038;&#20214;', 'Employeur Contact Email', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.companyContactFname', 'Employer Contact First Name', '&#29992;&#20154;&#21333;&#20301;&#32852;&#31995;&#20154;&#21517;&#23383;', 'Employeur Prénom du contact', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.companyContactLname', 'Employer Contact Last Name', '&#38599;&#20027;&#32852;&#31995;&#22995;&#21517;', 'Employeur Contact Nom', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.companyFax', 'Fax', '&#20256;&#30495;', 'Fax', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.companyName', 'Employer Name', '&#38599;&#20027;&#22995;&#21517;', 'Nom de l''employeur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.companyphone', 'Phone Number:', '&#30005;&#35805;&#21495;&#30721;', 'Numéro de téléphone', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.companyprofchgpwd', 'Change Password', '&#26356;&#25913;&#23494;&#30721;', 'Changer mot de passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.companyprofile', 'Company Profile', '&#20844;&#21496;&#31616;&#20171;', 'Profil de l''entreprise', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.companyprofresetBtn', 'Reset', '&#37325;&#32622;', 'Remettre', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.companyprofupdBtn', 'Update Profile', '&#26356;&#26032;&#20010;&#20154;&#36164;&#26009;', 'Mise à jour de profil', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.companyURL', 'Web-Address', '&#32593;&#32476;&#22320;&#22336;', 'Adresse Web', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.createjob', 'Create Job', '&#21019;&#24314;&#24037;&#20316;', 'Créer Job', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.desiredskills', 'Desired Skills', '&#25152;&#38656;&#25216;&#33021;', 'Compétences souhaitées', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.editjob', 'Edit Job', '&#32232;&#36655;&#24037;&#20316;', 'Éditer Job', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.emailtemplate', 'Email Templates', '电子邮件模板', 'Email Templates', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('recruiterlogin.emailtemplate_1', 'Interview Template', '面试模板', 'Modèle de Interview', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('recruiterlogin.emailtemplate_1hdng', 'Create / Edit Interview Email Template', '创建/编辑专访电子邮件模板', 'Créer / Modifier Interview Modèle de courrier électronique', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('recruiterlogin.emailtemplate_1hdng_1', 'While creating template, please use the below legends in order to map candidate details', '在创建模板时，请使用以下的传说，以图候选人详细信息', 'Lors de la création modèle, s''il vous plaît utiliser les légendes ci-dessous afin de cartographier détails des candidats', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('recruiterlogin.emailtemplate_1subtxt', 'Use the below action button to create / edit interview templates that you have already created.', '使用下面的操作按钮来创建你已经创建/编辑采访模板。', 'Utilisez le bouton d''action ci-dessous pour créer / modifier des modèles d''entrevue que vous avez déjà créés.', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('recruiterlogin.emailtemplate_2', 'Offer Template', '报价模板', 'Offre Template', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('recruiterlogin.emailtemplate_2hdng', 'Create / Edit Offer Template', '创建/编辑报价模板', 'Créer / Modifier Offre Template', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('recruiterlogin.emailtemplate_2subtxt', 'Use the below action button to create / edit Offer templates that you have already created.', '使用下面的操作按钮来创建你已经创建/编辑要约模板。', 'Utilisez le bouton d''action ci-dessous pour créer / modifier offrent des modèles que vous avez déjà créés.', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('recruiterlogin.home', 'Home', '&#23478;', 'Home', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.homenojobslbl', 'There are no jobs created by you.', '&#26377;&#27809;&#26377;&#20320;&#25152;&#21019;&#36896;&#30340;&#23601;&#19994;&#23703;&#20301;&#12290;', 'Il n''y a pas d''emplois créés par vous.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.hometablecol1', 'Job Number', '&#25307;&#32856;&#20154;&#25968;', 'Numéro d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.hometablecol2', 'Job Title', '&#32844;&#31216;', 'Nom d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.hometablecol3', 'Salary', '&#34218;&#27700;', 'Salaire', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.hometablecol4', 'Job Location', '&#24037;&#20316;&#22320;&#28857;', 'Situation d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.hometablecol5', 'Job Industry', '&#25307;&#32856;&#34892;&#19994;', 'Industrie d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.hometablecol6', 'No.of Candidate Applications', '&#20505;&#36873;&#24212;&#29992;&#25968;&#37327;', 'Nombre de demandes de candidats', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.jobbenefits', 'Job Benefits', '&#24037;&#20316;&#31119;&#21033;', 'Avantages de l''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.jobcateg', 'Job Category', '&#32844;&#20301;&#31867;&#21035;', 'Catégorie D''Emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.jobdesc', 'Job Description', '&#32844;&#20301;&#25551;&#36848;', 'Description du poste', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.jobfunc', 'Job Function', '&#24037;&#20316;&#32844;&#33021;', 'Métiers', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.jobindustry', 'Job Industry', '&#25307;&#32856;&#34892;&#19994;', 'Industrie D''Emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.jobnumber', 'Job Number', '&#25307;&#32856;&#20154;&#25968;', 'Numéro d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.jobpublish', 'Publish Job', '&#30332;&#24067;&#24037;&#20316;', 'Diffusez à Job Seeker', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.jobsavedraft', 'Save as Draft', '&#20445;&#23384;&#28858;&#33609;&#31295;', 'Publier emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.jobsubindustry', 'Job Sub-Industry', '&#32844;&#20301;&#23376;&#34892;&#19994;', 'Travail Sous-industrie', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.jobtitle', 'Job Title', '&#32844;&#31216;', 'Titre du poste', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.jobupdatebuttonlabel', 'Update', '&#26356;&#26032;', 'Mettre à jour', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.jobworkinghours', 'Working Hours', '&#24037;&#20316;&#26178;&#38291;', 'Heures De Travail', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.logout', 'Logout', '&#27880;&#38144;', 'Se Déconnecter', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.mandatoryskills', 'Mandatory Skills', '&#24375;&#21046;&#24615;&#25216;&#33021;', 'Compétences obligatoires', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.maxmonthsalary', 'Max. Monthly Salary', '&#26368;&#22823;&#12290;&#24037;&#36164;', 'Max Salaire mensuel', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.minmonthsalary', 'Min. Monthly Salary', '最小。 月收入', 'Min. Salaire mensuel', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.priworklocationcity', 'Primary Work location City', '&#20027;&#35201;&#24037;&#20316;&#25152;&#22312;&#22320;&#30340;&#22478;&#24066;', 'Travail primaire Localisation de la ville', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.priworklocationctry', 'Primary Work location Country', '&#20027;&#35201;&#24037;&#20316;&#22320;&#28857;&#30340;&#22269;&#23478;', 'Travail primaire Emplacement Pays', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.registerbuttonlabel', 'Save Job', '&#20445;&#23384;&#24037;&#20316;', 'Sauvegarder annonce', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.salarypublish', 'Publish Salary', '发布工资', 'Alameda de Pu Belgique facile', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('recruiterlogin.settings', 'Settings', '&#35774;&#32622;', 'Paramètres', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.supportticket', 'Support Ticket', '&#25903;&#25345;&#31080;', 'Soutien billet', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.videointrotxt', 'Video Introduction', '&#35270;&#39057;&#20171;&#32461;', 'Introduction Vidéo', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('recruiterlogin.Welcometxt', 'Welcome', '&#27426;&#36814;', 'Bienvenue', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('signup_error.btnlbl1_1', 'Login using your credentials', '登录使用您的凭据', 'Connectez-vous en utilisant vos identifiants', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('signup_error.heading1_1', 'Your resume / email address look familiar to us!!', '你的简历/电子邮件地址看看我们熟悉的！', 'Votre CV / adresse e-mail semble familier pour nous !!', 'sunil.madana.kumar@gmail.com', '2015-11-04 00:00:00');
INSERT INTO `grabtalent_language` (`lang_id`, `lang_english`, `lang_chinese`, `lang_french`, `language_modified_by`, `language_modified_date`) VALUES
('signup_error.heading1_2', 'You already have an account with us. Please login with your existing account details.', '你已经有我们的帐户。请登录与您现有的帐户资料。', 'Vous avez déjà un compte chez nous. S''il vous plaît vous connecter avec vos informations de compte existantes.', 'sunil.madana.kumar@gmail.com', '2015-11-01 00:00:00'),
('signup_splash.btnlbl1_1', 'Login to Explore Opportunities', '登录寻找机会', 'Connectez-vous pour explorer les opportunités', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('signup_splash.heading1_1', 'Congratulations you are now part of the Grab Talent community.', '你恭喜现在抢人才社区的一部分。', 'Félicitations, vous font maintenant partie de la communauté Grab Talent.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('signup_splash.heading1_2', 'Please check the email address you used to register for login details. <br/> If you do not receive an email please contact support@grab-talent.com.', '请检查您用于注册登录信息的电子邮件地址。<BR/>如果您没有收到电子邮件，请联系support@grab-talent.com。', '\nS''il vous plaît vérifier l''adresse e-mail que vous avez utilisé pour vous inscrire pour les détails de connexion. <br/> Si vous ne recevez pas un e-mail s''il vous plaît contacter support@grab-talent.com.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminhome.blurblabel1', 'New Candidates!', '&#26032;&#30340;&#20505;&#36873;&#20154;&#65281;', 'Nouveaux candidats!', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminhome.blurblabel2', 'New Clients!', '&#26032;&#23458;&#25143;&#65281;', 'De nouveaux clients!', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminhome.blurblabel3', 'Total Jobs!', '&#20052;&#24067;&#26031;&#24635;&#65281;', 'Nombre d''emplois!', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminhome.blurblabel4', 'Support Tickets!', '&#25903;&#25345;&#38376;&#31080;&#65281;', 'Billets de soutien!', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminhome.heading', 'Administrator Login', '&#31649;&#29702;&#21729;&#30331;&#38520;', 'Login administrateur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminhome.labelemail', 'Email Address', '&#38651;&#23376;&#37109;&#20214;&#22320;&#22336;', 'Adresse e-mail', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminhome.labelpasswd', 'Password', '&#23494;&#30908;', 'Mot de passe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminhome.panel1', 'Jobs History Panel', '&#20316;&#19994;&#21382;&#21490;&#35760;&#24405;&#38754;&#26495;', 'Emploi Groupe Histoire', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminhome.panel2', 'Candidate History Panel', '&#20505;&#36873;&#21382;&#21490;&#35760;&#24405;&#38754;&#26495;', 'Candidat panneau Historique', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminhome.welcomeheader', 'Welcome back..', '&#27426;&#36814;&#22238;&#26469;', 'Nous saluons le retour..', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.candidateListerrorlbl', 'No candidates exist (or) you typed the wrong URL.', '无候选人存在（或）键入错误的URL。', 'Aucun candidat existent (ou) vous avez tapé l''URL erronée.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.candidateListheading', 'Candidate List', '候选名单', 'Liste Candidate', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.candidateListtblehdng1', 'Logo', '徽标', 'Logo', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.candidateListtblehdng2', 'Candidate Name', '候选人姓名', 'Nom du candidat', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.candidateListtblehdng3', 'Candidate Gender', '应聘者性别', 'Candidat Sexe', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.candidateListtblehdng4', 'Candidate Email', '候选人的电子邮件', 'Candidat Email', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.candidateListtblehdng5', 'Candidate Phone', '候选电话', 'Candidat t', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.candidateListtblehdng6', 'Candidate Nationality', '应聘者国籍', 'Candidat Nationalit', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.candidateListtblehdng7', 'Member Since.', '会员参加。', 'Membre depuis.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.createclientbutton', 'Create Client', '&#21109;&#24314;&#23458;&#25142;&#31471;', 'Créer client', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.dropdownpnl1bdytxt', 'This drop-down list items appear while creating a job. Click the button below for more actions.', '在创建工作这个下拉列表项出现。点击下面的按钮进行更多的操作。', 'Cette liste déroulantes éléments apparaissent tout en créant un emploi. Cliquez sur le bouton ci-dessous pour plus d''actions.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.dropdownpnl1hdng', 'Job category', '职位类别', 'Catégorie d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.dropdownpnl2hdng', 'Job Function', '工作职能', 'Fonction d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.dropdownpnl3hdng', 'Job Industry', '招聘行业', 'Industrie d''emploi', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.dropdownpnl4hdng', 'Job Sub-Industry', '职位子行业', 'Travail Sous-industrie', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.dropdownpnl5bdytxt', 'This drop-down list items appears in multiple areas.<br /><br />1) You can find this list while creating a new job. <br />2) Candidate will choose from this list while registering.<br /><br /> Click the button below for more actions.', '此下拉列表项出现在多个领域。<br/><br/>1）你可以找到这个名单，同时创造了新的工作。 <br/>2）考生从这个名单，而登记会选择。<br/><br/>点击下面的按钮进行更多的操作。', 'Cette liste déroulantes articles apparaît dans de multiples domaines. <br /> <br /> 1) Vous pouvez trouver cette liste tout en créant un nouvel emploi. <br /> 2) candidat choisir dans cette liste lors de l''enregistrement. <br /> <br /> Cliquez sur le bouton ci-dessous pour plus d''actions.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.dropdownpnl5hdng', 'Country List', '国家名单', 'Liste de Pays', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.dropdownpnl6bdytxt', 'These keywords play vital role for parsing candidate''s resume.. Click the button below for more actions.', '这些关键字玩解析应聘者的简历至关重要的作用。点击下面的按钮进行更多的操作。', 'Ces mots-clés jouent un rôle vital pour analyser le curriculum vitae du candidat .. Cliquez sur le bouton ci-dessous pour plus d''actions.', 'sunil.madana.kumar@gmail.com', '2015-10-25 23:53:00'),
('siteadminusers.dropdownpnl6hdng', 'CV Keywords', 'CV关键词', 'CV Mots-clés', 'sunil.madana.kumar@gmail.com', '2015-10-25 23:50:00'),
('siteadminusers.dropdownpnlbtnlbl', 'More Actions..', '更多操作..', 'Plus d''actions..', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.employerListerrorlbl', 'Employer does not exist (or) you typed the wrong URL.', '用人单位不存在（或）键入错误的URL。', 'Employeur ne existe pas (ou) vous avez tapé l''URL erronée.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.employerListheading', 'Employers / Client List', '雇主/客户名单', 'Les employeurs / Client List', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.employertblhdng1', 'Logo', '徽标', 'Logo', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.employertblhdng2', 'Employer Name', '雇主姓名', 'Nom de l''employeur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.employertblhdng3', 'Employer Web-site', '雇主Web网站', 'Site Web de l''employeur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.employertblhdng4', 'Employer Phone', '雇主电话', 'Téléphone de l''employeur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.employertblhdng5', 'Employer Fax', '雇主传真', 'Employeur Fax', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.employertblhdng6', 'Employer Country', '雇主国家', 'Employeur Pays', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.isActive', 'Save as Draft', '&#20445;&#23384;&#28858;&#33609;&#31295;', 'Enregistrer comme brouillon', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruiteraddress', 'Address', '&#22320;&#22336;', 'Adresse', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruitercontactemail', 'Client Contact Email', '&#23458;&#25142;&#32879;&#32363;&#38651;&#23376;&#37109;&#20214;', 'Contact Client Email', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruitercountry', 'Country', '&#22283;&#23478;', 'Pays', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruitercreate', 'Create Recruiter', '创建招聘', 'Créer recruteur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruiterdescription', 'Description', '&#25551;&#36848;', 'Description', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruiterfax', 'Fax', '&#20659;&#30495;', 'Fax', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruiterfirstname', 'Client Contact First Name', '&#23458;&#25142;&#32879;&#32363;&#20154;&#21517;&#23383;', 'Contact Client Prénom', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruiterlastname', 'Client Contact Last Name', '&#23458;&#25142;&#32879;&#32363;&#22995;', 'Contact Client Nom', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruiterlogourl', 'Client Logo', '&#23458;&#25142;&#24509;&#27161;', 'Logo du client', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruitername', 'Client Name', '&#23458;&#25142;&#31471;&#21517;&#31281;', 'Nom du client', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruiterphone', 'Phone', '&#38651;&#35441;', 'Téléphone', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruiterusername', 'Username', '&#29992;&#25142;&#21517;', 'Nom d''utilisateur', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruitervideo', 'Client Video', '&#23458;&#25142;&#31471;&#35222;&#38971;', 'Vidéo client', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.recruiterwebAddress', 'Web Address', '&#32178;&#22336;', 'Adresse Web', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.settingsbutton', 'Settings', '设置', 'Param', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.settingshdng', 'Menu Item List', '菜单项列表', 'Liste des menus de l''article', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.settingslabel1', 'Menu Item Change', '菜单项更改', 'Changement d''élément de menu', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.settingslabel2', 'Site Errors', '网站错误', 'Erreurs du site', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.settingslabel3', 'Drop-down Item Settings', '下拉项设置', 'Déroulant Elément Paramètres', 'sunil.madana.kumar@gmail.com', '2015-10-26 00:07:00'),
('siteadminusers.siteerrorhdng', 'Site Errors', '网站错误', 'Erreurs du site', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00'),
('siteadminusers.siteerrortxt', 'This page will show the /application/logs directory where all the site errors are registered. Click on the file link to download.', '这个页面将显示在这里注册的所有网站的错误/应用/ logs目录中。点击文件链接下载。', 'Cette page affiche le répertoire / applications / logs où toutes les erreurs de site sont des marques. Cliquez sur le lien de fichier à télécharger.', 'sunil.madana.kumar@gmail.com', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `grabtalent_template`
--

CREATE TABLE IF NOT EXISTS `grabtalent_template` (
  `grabtalent_templateid` int(11) NOT NULL AUTO_INCREMENT,
  `employer_code` varchar(255) NOT NULL,
  `employer_name` varchar(255) NOT NULL,
  `employer_contact_email` varchar(255) NOT NULL,
  `template_offer` longtext,
  `template_interview` longtext,
  `template_created_date` datetime DEFAULT NULL,
  `template_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`grabtalent_templateid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `grabtalent_template`
--

INSERT INTO `grabtalent_template` (`grabtalent_templateid`, `employer_code`, `employer_name`, `employer_contact_email`, `template_offer`, `template_interview`, `template_created_date`, `template_modified_date`) VALUES
(1, 'EMP-1511-33346441', 'TH', 'davidrundell99@gmail.com', '<ol><li>{job_title} - Job Title</li></ol>', 'Hi nbsp;{candidate_name} you have an interview for&nbsp;{job_title} at&nbsp;{interview_location}, time&nbsp;{interview_datetime}&nbsp;<div><br></div><div>Recruiter name&nbsp;<span>{employer_name}</span></div><div><span><br></span></div><div><span>email is&nbsp;</span><span>{employer_email}</span></div><div><span><br></span></div><div><span>Look forward to meeting you.</span></div><div><span><br></span></div><div><span><br></span></div>', '2015-11-08 07:11:32', '2015-11-11 01:11:39'),
(2, 'EMP-1511-30332845', 'My Hero', 'dbolland@grab-talent.com', '<ol><li>{job_title} - Job Title</li></ol>', 'Test template', '2015-11-11 01:11:34', '2015-11-11 01:11:39'),
(3, 'EMP-1511-43116041', 'David B', 'david.a.bolland@gmail.com', 'Hi {candidate_name},<br />Thanks for your application to {job_title}. We were impressed by your background and would like to invite you to interview at {interview_location} to tell you a little more about the position and get to know you better.<br/><br/>Please let me know which of the following times work for you, and I can send over a confirmation and details:<br/>{interview_datetime}<br/>Looking forward to meeting you,<br/>{employer_email}', 'Hi {candidate_name},<br />Thanks for your application to {job_title}. We were impressed by your background and would like to invite you to interview at {interview_location} to tell you a little more about the position and get to know you better.<br/><br/>Please let me know which of the following times work for you, and I can send over a confirmation and details:<br/>{interview_datetime}<br/>Looking forward to meeting you,<br/>{employer_email}', '2015-11-11 01:11:04', NULL),
(4, 'EMP-1511-79280699', 'Windsor Royce Pte Ltd', 'mbrown@windsor-royce.com', 'Hi {candidate_name},<br /><br />Thanks for your application to {job_title}. We were impressed by your background and would like to invite you to interview at {interview_location} to tell you a little more about the position and get to know you better.<br/><br/>Please let me know which of the following times work for you, and I can send over a confirmation and details:<br/><br />{interview_datetime}<br/><br />Looking forward to meeting you,<br/><br />{employer_email}<br/>+6582186225', 'Hi {candidate_name},<br /><br />Thanks for your application to {job_title}. We were impressed by your background and would like to invite you to interview at {interview_location} to tell you a little more about the position and get to know you better.<br/><br/>Please let me know which of the following times work for you, and I can send over a confirmation and details:<br/><br />{interview_datetime}<br/><br />Looking forward to meeting you,<br/><br />{employer_email}<br/>+6582186225', '2015-11-23 09:11:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grabtalent_timezone`
--

CREATE TABLE IF NOT EXISTS `grabtalent_timezone` (
  `timezone_id` varchar(45) NOT NULL,
  `timezone_name` varchar(255) NOT NULL,
  `timezone_utc` varchar(50) NOT NULL,
  `timezone_city` varchar(100) NOT NULL,
  PRIMARY KEY (`timezone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grabtalent_timezone`
--

INSERT INTO `grabtalent_timezone` (`timezone_id`, `timezone_name`, `timezone_utc`, `timezone_city`) VALUES
('1', 'Dateline Standard Time', 'UTC-12:00', 'International Date Line West'),
('10', 'Canada Central Standard Time', 'UTC-\r\n\r\n06:00', 'Saskatchewan'),
('11', 'Mexico Standard Time', 'UTC-06:00', 'Guadalajara, Mexico City, Monterrey'),
('12', 'Central America Standard Time', 'UTC-06:00', 'Central \r\n\r\nAmerica'),
('13', 'Eastern Standard Time', 'UTC-05:00', 'Eastern Time (US and Canada'),
('14', 'U.S. Eastern Standard Time', 'UTC-05:00', 'Indiana (East'),
('15', 'S.A. Pacific \r\n\r\nStandard Time', 'UTC-05:00', 'Bogota, Lima, Quito'),
('16', 'Atlantic Standard Time', 'UTC-04:00', 'Atlantic Time (Canada'),
('17', 'S.A. Western Standard Time', 'UTC-\r\n\r\n04:00', 'Caracas, La Paz'),
('18', 'Pacific S.A. Standard Time', 'UTC-04:00', 'Santiago'),
('19', 'E. South America Standard Time', 'UTC-03:00', 'Brasilia'),
('2', 'Samoa \r\n\r\nStandard Time', 'UTC-11:00', 'Midway Island, Samoa'),
('20', 'S.A. Eastern Standard Time', 'UTC-03:00', 'Buenos Aires, Georgetown'),
('21', 'Greenland Standard Time', 'UTC-\r\n\r\n03:00', 'Greenland'),
('22', 'Mid-Atlantic Standard Time', 'UTC-02:00', 'Mid-Atlantic'),
('23', 'Azores Standard Time', 'UTC-01:00', 'Azores'),
('24', 'Cape Verde Standard \r\n\r\nTime', 'UTC-01:00', 'Cape Verde Islands'),
('25', 'GMT Standard Time', 'UTC', 'Greenwich Mean Time: Dublin, Edinburgh, Lisbon, London'),
('26', 'Greenwich Standard \r\n\r\nTime', 'UTC', 'Casablanca, Monrovia'),
('27', 'Central Europe Standard Time', 'UTC+01:00', 'Belgrade, Bratislava, Budapest, Ljubljana, Prague'),
('28', 'Central European \r\n\r\nStandard Time', 'UTC+01:00', 'Sarajevo, Skopje, Warsaw, Zagreb'),
('29', 'Romance Standard Time', 'UTC+01:00', 'Brussels, Copenhagen, Madrid, Paris'),
('3', 'Hawaiian Standard \r\n\r\nTime', 'UTC-10:00', 'Hawaii'),
('30', 'W. Europe Standard Time', 'UTC+01:00', 'Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna'),
('31', 'W. Central Africa Standard \r\n\r\nTime', 'UTC+01:00', 'West Central Africa'),
('32', 'E. Europe Standard Time', 'UTC+02:00', 'Bucharest'),
('33', 'Egypt Standard Time', 'UTC+02:00', 'Cairo'),
('34', 'FLE Standard \r\n\r\nTime', 'UTC+02:00', 'Helsinki, Kiev, Riga, Sofia, Tallinn, Vilnius'),
('35', 'GTB Standard Time', 'UTC+02:00', 'Athens, Istanbul, Minsk'),
('36', 'Israel Standard Time', 'UTC\r\n\r\n+02:00', 'Jerusalem'),
('37', 'South Africa Standard Time', 'UTC+02:00', 'Harare, Pretoria'),
('38', 'Russian Standard Time', 'UTC+03:00', 'Moscow, St. Petersburg, \r\n\r\nVolgograd'),
('39', 'Arab Standard Time', 'UTC+03:00', 'Kuwait, Riyadh'),
('4', 'Alaskan Standard Time', 'UTC-09:00', 'Alaska'),
('40', 'E. Africa Standard Time', 'UTC\r\n\r\n+03:00', 'Nairobi'),
('41', 'Arabic Standard Time', 'UTC+03:00', 'Baghdad'),
('42', 'Arabian Standard Time', 'UTC+04:00', 'Abu Dhabi, Muscat'),
('43', 'Caucasus Standard \r\n\r\nTime', 'UTC+04:00', 'Baku, Tbilisi, Yerevan'),
('44', 'Ekaterinburg Standard Time', 'UTC+05:00', 'Ekaterinburg'),
('45', 'West Asia Standard Time', 'UTC+05:00', 'Islamabad, \r\n\r\nKarachi, Tashkent'),
('46', 'Central Asia Standard Time', 'UTC+06:00', 'Astana, Dhaka'),
('47', 'Sri Lanka Standard Time', 'UTC+06:00', 'Sri Jayawardenepura'),
('48', 'N. \r\n\r\nCentral Asia Standard Time', 'UTC+06:00', 'Almaty, Novosibirsk'),
('49', 'S.E. Asia Standard Time', 'UTC+07:00', 'Bangkok, Hanoi, Jakarta'),
('5', 'Pacific Standard \r\n\r\nTime', 'UTC-08:00', 'Pacific Time (US and Canada); Tijuana'),
('50', 'North Asia Standard Time', 'UTC+07:00', 'Krasnoyarsk'),
('51', 'China Standard Time', 'UTC\r\n\r\n+08:00', 'Beijing, Chongqing, Hong Kong SAR, Urumqi'),
('52', 'Singapore Standard Time', 'UTC+08:00', 'Kuala Lumpur, Singapore'),
('53', 'Taipei Standard Time', 'UTC\r\n\r\n+08:00', 'Taipei'),
('54', 'W. Australia Standard Time', 'UTC+08:00', 'Perth'),
('55', 'North Asia East Standard Time', 'UTC+08:00', 'Irkutsk, Ulaanbaatar'),
('56', 'Korea \r\n\r\nStandard Time', 'UTC+09:00', 'Seoul'),
('57', 'Tokyo Standard Time', 'UTC+09:00', 'Osaka, Sapporo, Tokyo'),
('58', 'Yakutsk Standard Time', 'UTC+09:00', 'Yakutsk'),
('59', 'A.U.S. \r\n\r\nEastern Standard Time', 'UTC+10:00', 'Canberra, Melbourne, Sydney'),
('6', 'Mountain Standard Time', 'UTC-07:00', 'Mountain Time (US and Canada'),
('60', 'E. Australia \r\n\r\nStandard Time', 'UTC+10:00', 'Brisbane'),
('61', 'Tasmania Standard Time', 'UTC+10:00', 'Hobart'),
('62', 'Vladivostok Standard Time', 'UTC+10:00', 'Vladivostok'),
('63', 'West \r\n\r\nPacific Standard Time', 'UTC+10:00', 'Guam, Port Moresby'),
('64', 'Central Pacific Standard Time', 'UTC+11:00', 'Magadan, Solomon Islands, New Caledonia'),
('65', 'Fiji \r\n\r\nIslands Standard Time', 'UTC+12:00', 'Fiji Islands, Kamchatka, Marshall Islands'),
('66', 'New Zealand Standard Time', 'UTC+12:00', 'Auckland, Wellington'),
('7', 'Mexico \r\n\r\nStandard Time 2', 'UTC-07:00', 'Chihuahua, La Paz, Mazatlan'),
('8', 'U.S. Mountain Standard Time', 'UTC-07:00', 'Arizona'),
('9', 'Central Standard Time', 'UTC-06:00', 'Central \r\n\r\nTime (US and Canada');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_number` varchar(20) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `job_salarydisplay` varchar(5) NOT NULL,
  `job_minsalary_currency` varchar(5) NOT NULL,
  `job_minmonth_salary` int(10) NOT NULL,
  `job_maxsalary_currency` varchar(5) NOT NULL,
  `job_maxmonth_salary` int(10) NOT NULL,
  `job_mandatory_skills` text NOT NULL,
  `job_primaryworklocation_country` varchar(100) NOT NULL,
  `job_primaryworklocation_city` varchar(30) NOT NULL,
  `job_hrcontactname` varchar(255) NOT NULL,
  `job_hrcontactemail` varchar(255) NOT NULL,
  `job_hiringmgrcontactname` varchar(255) NOT NULL,
  `job_hiringmgrcontactemail` varchar(200) NOT NULL,
  `job_category` varchar(100) NOT NULL,
  `job_function` varchar(100) NOT NULL,
  `job_industry` varchar(100) NOT NULL,
  `job_sub_industry` varchar(100) NOT NULL,
  `job_description` longtext NOT NULL,
  `job_benefits` varchar(100) DEFAULT NULL,
  `job_workinghours` varchar(100) DEFAULT NULL,
  `job_postdate` datetime DEFAULT NULL,
  `job_posted` varchar(5) NOT NULL,
  `job_created_by` varchar(255) NOT NULL,
  `job_created_date` datetime NOT NULL,
  `job_last_modified_by` varchar(255) DEFAULT NULL,
  `job_last_modified_date` datetime DEFAULT NULL,
  `job_view_count` int(11) NOT NULL DEFAULT '0',
  `job_active` varchar(45) NOT NULL,
  `job_video_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`job_number`),
  UNIQUE KEY `job_number_UNIQUE` (`job_number`),
  KEY `idx_newjobs` (`job_created_date`) USING BTREE,
  KEY `idx_featuredjobs` (`job_view_count`,`job_created_date`),
  KEY `idx_similar_jobs` (`job_number`,`job_function`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_number`, `job_title`, `job_salarydisplay`, `job_minsalary_currency`, `job_minmonth_salary`, `job_maxsalary_currency`, `job_maxmonth_salary`, `job_mandatory_skills`, `job_primaryworklocation_country`, `job_primaryworklocation_city`, `job_hrcontactname`, `job_hrcontactemail`, `job_hiringmgrcontactname`, `job_hiringmgrcontactemail`, `job_category`, `job_function`, `job_industry`, `job_sub_industry`, `job_description`, `job_benefits`, `job_workinghours`, `job_postdate`, `job_posted`, `job_created_by`, `job_created_date`, `job_last_modified_by`, `job_last_modified_date`, `job_view_count`, `job_active`, `job_video_url`) VALUES
('JOB-1511-17158914', 'C++ developer - ', 'yes', 'SGD', 8000, 'SGD', 9000, 'c++,fx, financial markets', 'Singapore', 'Singapore', 'David Bolland', 'dbolland@grab-talent.com', 'David Bolland', 'dbolland@grab-talent.com', 'Technology', 'Developer', 'Financial Services', 'Asset Management', 'C   developer required for leading banking client in Singapore. &amp;nbsp;', '', '9-6pm', '2015-11-11 12:11:23', 'on', 'dbolland@grab-talent.com', '2015-11-11 12:11:23', NULL, NULL, 0, 'Yes', NULL),
('JOB-1511-33423210', 'Unix System Administrator', 'yes', 'SGD', 6000, '0', 8000, 'unix, linux, administrator', 'Singapore', 'Singapore', 'David Bolland', 'dbolland@grab-talent.com', '', '', 'Technology', 'Technical Consultancy', 'Technology/Online', 'IT Consulting/SI', '\n                                    \n                                    Unix System Administrator for leading MNC based in Singapore                                                                        ', '', '9-6pm', '2015-11-08 05:11:41', 'on', 'dbolland@grab-talent.com', '2015-11-08 02:11:35', 'dbolland@grab-talent.com', '2015-11-08 05:11:41', 0, 'Yes', '0'),
('JOB-1511-40292678', 'Web Designer', 'yes', 'SGD', 2500, 'SGD', 4300, 'sales,web design', 'Singapore', 'Singapore', 'David Bolland', 'dbolland@grab-talent.com', 'David Rundell', 'drundell@grab-talent.com', 'Commodities', 'Customer \n\nService/Customer Support/Call Center', 'Consumer/Retail', 'Alcohol & Tobacco', 'Web Designer&amp;nbsp;Job Description2 years experience in Web and Graphics Design related field.Design, develop and provide ongoing maintenance of website and pagesDesign and manage regular email campaigns (EDM)Able to work independently and with positive attitudes. Can multi-tasks and work under pressure to meet deadlinesJob Requirements :At least 2 years of professional&amp;nbsp;web development experienceFluency in HTML5,CSS3 and JavascriptFamiliar with, to the ability to customise Joomia, Drupal and other CMS template for front end developmentFamiliar with DreamweaverKnowledge of Adobe indesign, Flash and creative design for print will be an advantageKnowledge of SEO, best practices for responsive web integration will be an advantage knowledge of Drupal 7.x administration and developmentBasic back-end maintenance such as monitoring payment gateways, registration database, report generating and web server/email server administration .', '', '', '0000-00-00 00:00:00', 'off', 'dbolland@grab-talent.com', '2015-11-08 04:11:52', NULL, NULL, 0, 'No', NULL),
('JOB-1511-42637793', 'Web Developer', 'yes', 'SGD', 234234, '0', 234234, 'HTML,CSS,Java,PHP,Joomla,Wordpress', 'Singapore', 'Singapore', 'David Bolland', 'dbolland@grab-talent.com', 'David Rundell', 'drundell@grab-talent.com', 'Technology', 'Developer', 'Services', 'Advertising/Marketing/PR', '\n                                    &lt;div&gt;&lt;strong&gt;Responsibilities &lt;/strong&gt;&lt;/div&gt;&lt;ul&gt;&lt;li&gt;Overall design, set up, develop and maintain websites&lt;/li&gt;&lt;li&gt;Write and maintain user documentation&lt;/li&gt;&lt;li&gt;Perform search engine optimization for websites&lt;/li&gt;&lt;li&gt;Engage in online marketing projects including search engine and social media marketing&lt;/li&gt;&lt;li&gt;Manage web development and online marketing projects for clients&lt;/li&gt;&lt;li&gt;Work with different stakeholders including clients, freelancers and vendors&lt;/li&gt;&lt;/ul&gt;&lt;div&gt;&amp;nbsp; &lt;/div&gt;&lt;div&gt;&lt;strong&gt;Requirements &lt;/strong&gt;&lt;/div&gt;&lt;ul&gt;&lt;li&gt;Min Diploma in IT/New Media/related fields preferred&lt;/li&gt;&lt;li&gt;At least 3 years of web development experience will be added advantage&lt;/li&gt;&lt;li&gt;Strong understanding of cross-browser compatibility, general web functions, and standards.&lt;/li&gt;&lt;li&gt;Deep expertise and hands on experience with Web Applications and programming languages such as PHP, JavaScript, SQL, CSS, HTML and API''s.&lt;/li&gt;&lt;li&gt;Be creative and have a good eye for design&lt;/li&gt;&lt;li&gt;Ability to deliver quality work fast, work independently and take initiative&lt;/li&gt;&lt;li&gt;Be professional and committed&lt;/li&gt;&lt;/ul&gt;                                    ', '', '', '2015-11-13 06:11:16', 'on', 'david.a.bolland@gmail.com', '2015-11-13 06:11:46', 'david.a.bolland@gmail.com', '2015-11-13 06:11:16', 0, 'Yes', '0'),
('JOB-1511-54260768', 'Account Manager - Web Hosting and Internet Services', 'yes', 'SGD', 4000, '0', 4500, 'web hosting,internet services,hosting,control panel', 'Singapore', 'Singapore', 'Bolland David', 'dbolland@grab-talent.com', 'Marie Brown', 'mbrown@grab-talent.com', 'Business Operations', 'Research & Development', 'Technology/Online', '--None--', '\n                                    \n                                    \n                                                                         An opportunity to manage a well established portfolio and develop the business in Southeast Asia.&lt;div&gt;&lt;b&gt;&lt;br&gt;&lt;/b&gt;&lt;/div&gt;&lt;div&gt;&lt;b&gt;Client Details&lt;/b&gt;&lt;/div&gt;&lt;div&gt;Our client is a global internet services provider with a major web hosting market share in Europe and the US. They are a global Infrastructure as a Service (IaaS) hosting provider serving a worldwide portfolio of corporations ranging from SMBs to enterprises. With offices in Hong Kong and Singapore they are expanding across Asia Pacific with the vision to be the market leader in the region. To facilitate the strong growth they are searching for a corporate Account Manager to develop the business in Singapore and Southeast Asia.&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;b&gt;Description&lt;/b&gt;&lt;/div&gt;&lt;div&gt;&lt;ul&gt;&lt;li&gt;&lt;span&gt;Report to the Managing Director&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span&gt;Develop and execute account plans to achieve business objectives and realize revenue from business relations&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span&gt;Respond adequately to customer queries and ensure timely and adequate internal communication and coordination&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span&gt;Achieve and exceed quarterly and annual revenue quotas on a consistent basis and implement sales tactics in order to meet assigned territory objectives&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span&gt;Follow up on leads proactively in order to make deals&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span&gt;Proactively identify and strategize ways to capture new critical accounts&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span&gt;Manage commercial activities such as issuing offers and negotiating and signing contracts&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span&gt;Participate in local networking events and strategically network through local companies and prospects to maintain and build your network&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;span&gt;&lt;b&gt;Profile&lt;/b&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;ul&gt;&lt;li&gt;&lt;span&gt;2-4 years experience in web hosting and internet services, preferably in an account management roleBachelor''s degree in Business Management, IT or a related fieldExcellent knowledge of the hosting landscape and data centers (service providers, manufacturers and technologies)Knowledge of operation systems, virtualization, network, switching, VPN, load balancing, firewalling and server technologyStrong consultative sales skills with the ability to establish account relationships at senior levelsAbility to build consistent new revenue pipelineDemonstrated business acumen an ability to position solution ROIResilient and driven to deliver high service levels for your clientsJob OfferWork for a global leader in the industry with strong technical support for their clients and product offerings. You will have good exposure to the region and senior management with a growing company that encourages and stimulates peoples growth and invests in personal development - they do not hire people just for a role but for a career.Click the Apply button below or contact Nellie Wartoft (Lic No: R1434826) for more information.&lt;/span&gt;&lt;br&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;                                                                                                            ', '', '', '0000-00-00 00:00:00', 'off', 'dbolland@grab-talent.com', '2015-11-08 04:11:10', 'dbolland@grab-talent.com', '2015-11-08 05:11:11', 0, 'No', '0'),
('JOB-1511-69063993', 'CIO Designate', 'no', 'SGD', 0, '0', 0, 'Databases,Programming,Financial Control,C++,Java', 'Singapore', 'Singapore', 'John', 'j@john.com', '', '', 'Internal IT', 'IT Manager/Director', 'Technology/Online', 'Social Gaming', '\n                                    \n                                    \n                                    Need to be able to fight fires and get coffee.                                                                                                            ', '', '', '2015-11-08 06:11:29', 'on', 'davidrundell99@gmail.com', '2015-11-08 03:11:04', 'davidrundell99@gmail.com', '2015-11-08 06:11:29', 0, 'Yes', '0'),
('JOB-1511-76712760', 'Developer - Web / Intranet', 'yes', 'SGD', 6000, 'SGD', 8000, 'java, oracle, c++', 'Singapore', 'Singapore', 'David Bolland', 'dbolland@grab-talent.com', 'David Bolland', 'dbolland@grab-talent.com', 'Technology', 'Developer', 'Financial Services', 'Asset Management', 'Developer required for further development work on internal intranet systems within the bank.', '', '9-5', '2015-11-18 11:11:49', 'on', 'dbolland@grab-talent.com', '2015-11-18 11:11:49', NULL, NULL, 0, 'Yes', NULL),
('JOB-1511-80997357', 'Marketing Manager', 'yes', 'SGD', 3400, 'SGD', 4300, 'digital,marketing', 'Singapore', 'Singapore', 'David Bolland', 'dbolland@grab-talent.com', 'David Rundell', 'drundell@grab-talent.com', 'Business Operations', 'Customer \n\nService/Customer Support/Call Center', 'Conglomerates', 'Conglomerates', 'ResponsibilitiesEnsure that Marketing Expenses and monthly Accruals are closely monitored and updated on a monthly basis.Responsible for completeness, accuracy and timeliness of expenses tracking to support the reporting processes.Preparation and compilation of Management and Regional reports as and when required.Work with insurance partners for insurance campaigns.Collaborate and coordinate with all relevant internal and external parties involved in campaign implementation, execution and operations.Manage phone/email inquiries and redemption requestsManage campaign invitations/redemption letters shopping/preparationTo assist in ad-HOC initiatives / projects as and when required by Management.Campaign ManagementDevelop and execute campaign to meet/exceed campaign KPI%u2019s.Working closely with internal/external stakeholders to drive targets.&amp;nbsp;To ensure that all campaigns are executed within planned timeline.Assist with the logistics/coordination with the pre / post Events and Roadshows launch&amp;nbsp;RequirementsMinimum Diploma/ Degree Holders with experience in managing insurance campaignsCertificate in CMFAS M5, M9, M9A, HI, M8, M8A, BCP, PGI, and CommGI are an advantageGood verbal and written communication and interpersonal skillsStrong Business acumen; Problem solving skillsSelf-motivated and independent', '', '', '0000-00-00 00:00:00', 'off', 'dbolland@grab-talent.com', '2015-11-08 04:11:00', NULL, NULL, 0, 'No', NULL),
('JOB-1511-82586504', 'Developer', 'yes', 'SGD', 2000, 'SGD', 3000, 'c', 'Singapore', 'Singapore', 'David Bolland', 'david.a.bolland@gmail.com', 'David Bolland', 'david.a.bolland@gmail.com', 'Technology', 'Datacenter/NOC Engineer', 'Financial Services', 'Asset Management', 'C Developer required for Banking client based in Singapore', '', '9-5', '2015-11-11 01:11:26', 'on', 'david.a.bolland@gmail.com', '2015-11-11 01:11:26', NULL, NULL, 0, 'Yes', NULL),
('JOB-1511-88024938', 'Technology Manager, Mobile and Web Platforms', 'yes', 'SGD', 4300, 'SGD', 5400, 'mobile,android,ios', 'Singapore', 'Singapore', 'David Bolland', 'dbolland@grab-talent.com', 'David Rundell', 'drundell@grab-talent.com', 'Business Operations', 'Factory Manager', 'Conglomerates', 'Conglomerates', 'Our client is a fun and dynamic multinational mass media and entertainment company looking for a Technology Manager for its Mobile and Web Platforms.This is a regional&amp;nbsp;role that will cover both mobile and web technologies and have the incumbent work with various groups within the organisation and external vendors to design and develop the organisation''s interactive mobile and web technology platforms.Responsibilities1. Consulting - business process engineering and business technology research2. Technology management - architecture3. Operational - Project management, vendor management4. Others - Technology budget management control, documentation, etc.&amp;nbsp;&amp;nbsp;Requirements- Experience owrking on content management and provisioning platforms (CMS, CDN, etc.)- Experience managing web platforms- Understanding data hosting, data networks, and security- Good communication and presentation skills- Project Management skills- Vendor management skillsSkills- HTML5, WAP, standard web technologies- J2EE application server or tomcat knowledge- Object oriented language- Internet protocols- Site flow design- Security knowledge- Unix administration skills-&amp;nbsp;Experience in mobile application&amp;nbsp;(android/ios', '', '', '0000-00-00 00:00:00', 'off', 'dbolland@grab-talent.com', '2015-11-08 04:11:06', NULL, NULL, 0, 'No', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE IF NOT EXISTS `job_category` (
  `job_category_name` varchar(80) NOT NULL,
  `job_category_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`job_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`job_category_name`, `job_category_id`) VALUES
('Executive', 1),
('Finance & Accounting', 2),
('Financial Services', 3),
('HR & GA', 4),
('Internal IT', 5),
('Legal & Compliance', 6),
('Marketing', 7),
('Technology', 8),
('Business Operations', 9),
('Healthcare R & D', 10),
('Consulting', 11),
('Engineering', 12),
('Real Estate', 13),
('Commodities', 14),
('Sales', 15);

-- --------------------------------------------------------

--
-- Table structure for table `job_function`
--

CREATE TABLE IF NOT EXISTS `job_function` (
  `job_function_name` varchar(80) NOT NULL,
  `job_category_id` varchar(80) NOT NULL,
  `job_function_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`job_function_id`),
  KEY `idx_job_category_id` (`job_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=194 ;

--
-- Dumping data for table `job_function`
--

INSERT INTO `job_function` (`job_function_name`, `job_category_id`, `job_function_id`) VALUES
('CEO/Country Manager/MD', '1', 1),
('GM', '1', 2),
('CFO', '1', 3),
('CTO', '1', 4),
('CIO (IT)', '1', 5),
('COO', '1', 6),
('CMO', '1', 7),
('CIO \r\n\r\n(Investment)', '1', 8),
('Accountant', '2', 9),
('Accounts Payable', '2', 10),
('Accounts Receivable', '2', 11),
('Audit & Risk', '2', 12),
('Business/Corporate/Strategic \r\n\r\nPlanning', '2', 13),
('Controller/Financial Control', '2', 14),
('Credit Control', '2', 15),
('Finance Director', '2', 16),
('Finance Manager', '2', 17),
('Finance & Management \r\n\r\nAccounting', '2', 18),
('Financial Planning & Analysis', '2', 19),
('Internal Audit', '2', 20),
('Investor Relations', '2', 21),
('Junior Accountant', '2', 22),
('M&A', '2', 23),
('Pricing', '2', 24),
('Product Control', '2', 25),
('Reporting', '2', 26),
('Taxation', '2', 27),
('Treasury & Corporate Finance', '2', 28),
('Banking & Finance - Asset \r\n\r\nManagement', '3', 29),
('Banking & Finance - Client Services', '3', 30),
('Banking & Finance - Finance Accounting', '3', 31),
('Banking & Finance - Fund Management', '3', 32),
('Banking & Finance - IT', '3', 33),
('Banking & Finance - Internal Audit', '3', 34),
('Banking & Finance - Operations', '3', 35),
('Banking & Finance - Origination', '3', 36),
('Banking & Finance - Private Banking', '3', 37),
('Banking & Finance - Research', '3', 38),
('Banking & Finance - Risk Management', '3', 39),
('Banking & Finance - \r\n\r\nTrading', '3', 40),
('Banking & Finance - M&A', '3', 41),
('Banking & Finance - Sales', '3', 42),
('Banking & Finance - Quant', '3', 43),
('Banking & Finance - Commercial \r\n\r\nBanking', '3', 44),
('Banking & Finance - PE / VC', '3', 45),
('Banking & Finance - Middle office', '3', 46),
('Banking & Finance - Back office', '3', 47),
('Banking & Finance - \r\n\r\nIBD Coverage', '3', 48),
('Banking & Finance - Prime Services', '3', 49),
('Banking & Finance - Structuring', '3', 50),
('Insurance - Actuary', '3', 51),
('Insurance - \r\n\r\nBroking', '3', 52),
('Insurance - Claims/Underwriting', '3', 53),
('Insurance - General', '3', 54),
('HR - Manager/Director', '4', 55),
('HR - Change Management', '4', 56),
('HR - \r\n\r\nGeneral', '4', 57),
('HR - Compensation & Benefits', '4', 58),
('HR - Administration', '4', 59),
('HR - Recruiting', '4', 60),
('HR - Payroll', '4', 61),
('HR - Information \r\n\r\nSystems', '4', 62),
('HR - Learning & Development/Training', '4', 63),
('Executive Assistant/Secretary', '4', 64),
('Office Manager/Administration Manager', '4', 65),
('General \r\n\r\nAdministration', '4', 66),
('Sales Support & Coodination', '4', 67),
('Translator/Interpretor', '4', 68),
('Receptionist/Switchboard', '4', 69),
('Technical Translator', '4', 70),
('IT Manager/Director', '5', 71),
('Server Administrator', '5', 72),
('Infrastructure/Network Engineer', '5', 73),
('Datacenter/NOC Engineer', '5', 74),
('IT \r\n\r\nSupport/Helpdesk', '5', 75),
('Lawyer - Bengoshi', '6', 76),
('Lawyer - Foreign-Qualified', '6', 77),
('Lawyer - Corporate Counsel', '6', 78),
('Contract Management', '6', 79),
('Legal - General', '6', 80),
('Paralegal', '6', 81),
('Compliance', '6', 82),
('Risk Management', '6', 83),
('Patent/Intellectual Property', '6', 84),
('Brand Manager', '7', 85),
('Art Director/Creative Director', '7', 86),
('Field Marketing', '7', 87),
('Product Designer', '7', 88),
('Marketing - General', '7', 89),
('Product Marketing', '7', 90),
('Media \r\n\r\nPlanner', '7', 91),
('PR/Corporate Communications', '7', 92),
('Trade Marketing', '7', 93),
('Merchandising Manager', '7', 94),
('Strategic Planner', '7', 95),
('Visual \r\n\r\nMerchandiser', '7', 96),
('Partner Management', '7', 97),
('Retail Manager/Director', '7', 98),
('Business/Commercial Director', '7', 99),
('Demand Planner', '7', 100),
('Sales \r\n\r\nPromotion', '7', 101),
('Market Research', '7', 102),
('Online Marketing', '7', 103),
('Pre-Sales/Technical Sales', '8', 104),
('Post Sales/Architect', '8', 105),
('Developer', '8', 106),
('Project Manager', '8', 107),
('Technical Consultancy', '8', 108),
('Technical Sales Support', '8', 109),
('Technical Account Manager', '8', 110),
('Engagement \r\n\r\nManager', '8', 111),
('Content Producer', '8', 112),
('Service Planner', '8', 113),
('Creative/Designer/Illustrator', '8', 114),
('Localization Engineer', '8', 115),
('Customer \r\n\r\nService/Customer Support/Call Center', '9', 116),
('SCM/Transport/Logistics', '9', 117),
('Shipping/Sales Coordinator', '9', 118),
('Procurement/Purchasing/Sourcing', '9', 119),
('Product Design', '9', 120),
('Quality Assurance/Quality Control/Inspection', '9', 121),
('Production/Manufacturing', '9', 122),
('Supplier Development', '9', 123),
('Production Control/Demand Planning', '9', 124),
('Research & Development', '9', 125),
('Project Management', '9', 126),
('Strategy', '9', 127),
('Health/Safety/Environment', '9', 128),
('Factory Manager', '9', 129),
('Biostatistics/Data Management', '10', 130),
('Business Development/Licensing', '10', 131),
('Clinical \r\n\r\nDevelopment', '10', 132),
('Drug Safety', '10', 133),
('Medical Affairs', '10', 134),
('Medical Writing', '10', 135),
('Non-Clinical', '10', 136),
('Regulatory Affairs', '10', 137),
('Research', '10', 138),
('QA/QC', '10', 139),
('Management/Strategic', '11', 140),
('HR', '11', 141),
('IT', '11', 142),
('Supply Chain', '11', 143),
('Environmental', '11', 144),
('Pre-Sales', '12', 145),
('Sales', '12', 146),
('Service', '12', 147),
('Application', '12', 148),
('Facility', '12', 149),
('Maintenance', '12', 150),
('Materials', '12', 151),
('R&D', '12', 152),
('Quality', '12', 153),
('Electrical', '12', 154),
('Electronics', '12', 155),
('Mechanical', '12', 156),
('Chemical', '12', 157),
('Instrument', '12', 158),
('Construction', '12', 159),
('Process', '12', 160),
('Failure Analysis', '12', 161),
('Test', '12', 162),
('Reliability', '12', 163),
('IC Design & Verification', '12', 164),
('Engineering Management', '12', 165),
('Piping', '12', 166),
('Commissioning', '12', 167),
('Acquisition', '13', 168),
('Asset Management', '13', 169),
('Fund \r\n\r\nManagement', '13', 170),
('Portfolio Management', '13', 171),
('Valuations / Appraisal', '13', 172),
('Disposition', '13', 173),
('Lending', '13', 174),
('Property \r\n\r\nManagement', '13', 175),
('Leasing / Brokerage / Sales', '13', 176),
('Tenant Representation', '13', 177),
('Facility Management', '13', 178),
('Construction / \r\n\r\nDevelopment', '13', 179),
('Architect / Design', '13', 180),
('Store Development', '13', 181),
('Commodity Risk Management', '14', 182),
('Commodity Trading', '14', 183),
('Commodity \r\n\r\nMiddle Office', '14', 184),
('Commodity Trade Support', '14', 185),
('Commodity Operations', '14', 186),
('Commodity Origination', '14', 187),
('Sales Manager/Director', '15', 188),
('Account Manager/Sales', '15', 189),
('Store Manager/Staff', '15', 190),
('Business Development', '15', 191),
('Medical Representative', '15', 192),
('Alliance \r\n\r\nManager', '15', 193);

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

CREATE TABLE IF NOT EXISTS `job_history` (
  `job_id` varchar(100) DEFAULT NULL,
  `job_prevstage` varchar(10) DEFAULT NULL,
  `job_nextstage` varchar(10) DEFAULT NULL,
  `job_status_comments` varchar(255) DEFAULT NULL,
  `job_status_modified_by` varchar(100) DEFAULT NULL,
  `job_status_modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_history`
--

INSERT INTO `job_history` (`job_id`, `job_prevstage`, `job_nextstage`, `job_status_comments`, `job_status_modified_by`, `job_status_modified_date`) VALUES
('JOB-1506-29287551', 'Yes', 'No', 'This is for testing...', 'mbrown@grab-talent.com', '2015-10-04 01:10:37'),
('JOB-1506-29287554', 'Yes', 'No', 'Job filled internally', 'mbrown@grab-talent.com', '2015-10-05 06:10:11'),
('JOB-1506-29287552', 'Yes', 'No', 'Hire freeze', 'mbrown@grab-talent.com', '2015-10-21 04:10:08'),
('JOB-1506-29287554', 'Yes', 'No', 'Test', 'mbrown@grab-talent.com', '2015-11-03 07:11:47'),
('JOB-1506-29287554', 'Yes', 'No', '', 'mbrown@grab-talent.com', '2015-11-03 07:11:28'),
('JOB-1506-29287554', 'Yes', 'No', 'Reopened', 'mbrown@grab-talent.com', '2015-11-03 07:11:40'),
('JOB-1511-20873257', 'Yes', 'No', '', 'mbrown@grab-talent.com', '2015-11-06 03:11:56'),
('JOB-1511-20873257', 'Yes', 'No', 'This is to test the job closing functionality.', 'mbrown@grab-talent.com', '2015-11-07 01:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `job_industry`
--

CREATE TABLE IF NOT EXISTS `job_industry` (
  `job_industry_name` varchar(80) NOT NULL,
  `job_industry_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`job_industry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `job_industry`
--

INSERT INTO `job_industry` (`job_industry_name`, `job_industry_id`) VALUES
('Financial Services', 1),
('Consumer/Retail', 2),
('Healthcare', 3),
('Services', 4),
('Technology/Online', 5),
('Industrial', 6),
('Energy', 7),
('Conglomerates', 8),
('Import/Export', 9);

-- --------------------------------------------------------

--
-- Table structure for table `job_skills`
--

CREATE TABLE IF NOT EXISTS `job_skills` (
  `job_ref_id` varchar(255) CHARACTER SET utf16 NOT NULL,
  `job_skill_name` varchar(255) CHARACTER SET utf16 NOT NULL,
  `job_skill_created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_skills`
--

INSERT INTO `job_skills` (`job_ref_id`, `job_skill_name`, `job_skill_created_date`) VALUES
('JOB-1511-76712760', ' c++', '2015-11-18 11:11:49'),
('JOB-1511-76712760', ' oracle', '2015-11-18 11:11:49'),
('JOB-1511-76712760', 'java', '2015-11-18 11:11:49'),
('JOB-1511-42637793', 'Wordpress', '2015-11-13 06:11:16'),
('JOB-1511-42637793', 'Joomla', '2015-11-13 06:11:16'),
('JOB-1511-42637793', 'PHP', '2015-11-13 06:11:16'),
('JOB-1511-42637793', 'Java', '2015-11-13 06:11:16'),
('JOB-1511-42637793', 'CSS', '2015-11-13 06:11:16'),
('JOB-1511-42637793', 'HTML', '2015-11-13 06:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `job_sub_industry`
--

CREATE TABLE IF NOT EXISTS `job_sub_industry` (
  `job_sub_industry_name` varchar(80) NOT NULL,
  `job_industry_id` int(11) NOT NULL,
  `job_sub_industry_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`job_sub_industry_id`),
  KEY `idx_job_industry_id` (`job_industry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `job_sub_industry`
--

INSERT INTO `job_sub_industry` (`job_sub_industry_name`, `job_industry_id`, `job_sub_industry_id`) VALUES
('Asset Management', 1, 1),
('Brokerage/Global Markets', 1, 2),
('Commercial Banking', 1, 3),
('Consumer Finance', 1, 4),
('Insurance', 1, 5),
('Private Equity & Hedge Fund', 1, 6),
('Real Estate', 1, 7),
('Servicer', 1, 8),
('Investment Banking', 1, 9),
('Private Wealth Management/Banking', 1, 10),
('Trust Banking', 1, 11),
('Financial Technology Vendor', 1, 12),
('Venture Capital', 1, 13),
('Lease', 1, 14),
('Luxury Goods', 2, 15),
('Apparel & Fashion', 2, 16),
('Sporting Goods & Outdoor', 2, 17),
('Watches & Jewelry', 2, 18),
('Food & Beverage', 2, 19),
('Alcohol & Tobacco', 2, 20),
('Cosmetics & Fragrances', 2, 21),
('Household/Kitchen', 2, 22),
('Furniture & \r\n\r\nInterior', 2, 23),
('Home Entertainment: Movies, Music', 2, 24),
('Automotive', 2, 25),
('Consumer Electronics', 2, 26),
('Toys', 2, 27),
('Optics & Eyewear', 2, 28),
('Retail: \r\n\r\nDepartment Stores, etc…', 2, 29),
('Multi-Level Marketing', 2, 30),
('Personal Care', 2, 31),
('TV Shopping & Mail Order', 2, 32),
('Animal Health', 3, 33),
('Biotechnology', 3, 34),
('Consultancy', 3, 35),
('Consumer Health', 3, 36),
('CRO', 3, 37),
('Diagnostics', 3, 38),
('Life Sciences', 3, 39),
('Medical Devices', 3, 40),
('Medical Publishing', 3, 41),
('Pharmaceuticals', 3, 42),
('Advertising/Marketing/PR', 4, 43),
('Air Services/Airlines', 4, 44),
('Broadcasting', 4, 45),
('Strategic Consulting', 4, 46),
('Education - \r\n\r\nGeneral', 4, 47),
('Training', 4, 48),
('Finance & Accounting Services', 4, 49),
('Hotel', 4, 50),
('Legal/Law Firm', 4, 51),
('Outsourcing', 4, 52),
('Railroad', 4, 53),
('Restaurants & \r\n\r\nFood Service', 4, 54),
('Security & Protection', 4, 55),
('Sporting Activities', 4, 56),
('Recruiting & Staffing', 4, 57),
('Travel/Car Rental', 4, 58),
('Wholesale & \r\n\r\nDistribution', 4, 59),
('NPO', 4, 60),
('Other Services', 4, 61),
('Enterprise Software', 5, 62),
('Enterprise Hardware', 5, 63),
('Storage', 5, 64),
('Networking', 5, 65),
('Telecommunications', 5, 66),
('IT Consulting/SI', 5, 67),
('Computer Hardware & Peripherals', 5, 68),
('Healthcare Systems', 5, 69),
('E-commerce', 5, 70),
('Digital \r\n\r\nAdvertising', 5, 71),
('Social Media Services', 5, 72),
('Social Gaming', 5, 73),
('Mobile/Wireless', 5, 74),
('Online B2C Services', 5, 75),
('Online Content', 5, 76),
('Aerospace & \r\n\r\nDefense', 6, 77),
('Automotive/Transport OEM', 6, 78),
('Automotive/Transport Parts', 6, 79),
('SCM/Transportation/Logistics/Cargo', 6, 80),
('Chemicals & Plastics', 6, 81),
('Electronics', 6, 82),
('Semiconductors/Embedded Systems', 6, 83),
('Environmental', 6, 84),
('Industrial Manufacturing', 6, 85),
('Construction', 6, 86),
('Metals & Mining', 6, 87),
('Building Products', 6, 88),
('Industrial Automation', 6, 89),
('Chip Card & Security', 6, 90),
('LED', 6, 91),
('Contract Manufacturing', 6, 92),
('Interconnect', 6, 93),
('Exploration, Production & Oil Field Services', 7, 94),
('Coal, Nuclear & Alternative Fuels', 7, 95),
('Refining And Marketing', 7, 96),
('Natural Gas Pipelines And Power \r\n\r\nGeneration - Regulated', 7, 97),
('Natural Gas Pipelines And Power Generation - Unregulated', 7, 98),
('Renewable Energy', 7, 99),
('Water Utilities', 7, 100),
('Conglomerates', 8, 101),
('Agricultural', 9, 102),
('General (shosya)', 9, 103),
('Electronic equipment', 9, 104),
('Electronic parts', 9, 105),
('Machinary', 9, 106),
('Chemical/Material', 9, 107),
('Garment', 9, 108),
('FMCG', 9, 109),
('Sundries', 9, 110),
('Food/Beverage', 9, 111),
('Medical/Parmaceutical', 9, 112);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
