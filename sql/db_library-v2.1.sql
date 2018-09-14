-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2017 at 01:01 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category`, `description`, `image_path`, `status`) VALUES
(1, ' 2920, vol 05 - Second Seed', 'Carlovac Townway', 'History', 'Narrates attempts on the life of Emperor Reman III and Turala\'s birth of a daughter.', 'upload/images/IMG_12-06-2017_1497262336.png', '2'),
(5, ' 2920, vol 04 - Rain\'s Hand', 'Carlovac Townway', 'Tales', 'Follows Sotha Sil and his initiates in their negotiation and dealings with Daedra following the destruction of Gilverdale by Molag Bal.', 'upload/images/IMG_12-06-2017_1497262284.png', '1'),
(6, '2920, First Seed, v3', 'Carlovac Townway', 'History', '	Details the disaster of the attempted Imperial invasion of Mournhold, Morrowind by Emperor Reman III.', 'upload/images/IMG_12-06-2017_1497262235.png', '2'),
(7, '2920, vol 02 - Sun\'s Dawn', 'Carlovac Townway', 'History', 'Details one of Sotha Sil\'s lessons, Turala\'s exile and Molag Bal arriving to Gilverdale, as well as Almalexia discovering the city\'s destruction.', 'upload/images/IMG_12-06-2017_1497262183.png', '1'),
(8, '16 Accords of Madness, v. VI', 'Anonymous', 'Tales', 'Hircine\'s Tale\r\nEver proud and boastful, Oblivion\'s Mad Prince stood one fifth day of mid year among the frigid peaks of Skyrim, and beckoned forth Hircine for parlay. The Huntsman God materialized, for this was his day, and the boldness of Sheogorath', 'upload/images/IMG_12-06-2017_1497261750.png', '1'),
(9, '16 Accords of Madness, v. IX', 'Anonymous', 'Tales', 'Vaermina\'s Tale Darius Shano found himself running as fast as he could. He had no idea what he was running from or towards, but he didn\'t care. The desire saturated his mind -- there was nothing in the world except flight. ', 'upload/images/IMG_12-06-2017_1497261845.png', '1'),
(10, '16 Accords of Madness, v. XII', 'Anonymous', 'Tales', 'Malacath\'s dealings with Sheogorath', 'upload/images/IMG_12-06-2017_1497261991.png', '1'),
(11, '2920, vol 01 - Morning Star', ' Carlovac Townway', 'History', '	First book in a series of books recounting the events surrounding the Empire during the last year of the First Era.', 'upload/images/IMG_12-06-2017_1497262082.png', '1'),
(12, '2920, MidYear, v6', 'Carlovac Townway', 'History', '	Details the events of the Battle of Ald Marak between Vivec\\\'s forces and the army of the Reman Empire.', 'upload/images/IMG_12-06-2017_1497262434.png', '1'),
(13, '2920, vol 07 - Sun\\\'s Height', 'Carlovac Townway', 'History', 'Details the events that began the Sacking of Black Gate and the inception of the Morag Tong\\\'s contract to assassinate Emperor Reman Cyrodiil III.', 'upload/images/IMG_12-06-2017_1497262472.png', '1'),
(14, '2920, vol 08 - Last Seed', 'Carlovac Townway', 'History', '	Details the events that lead to Juilek Cyrodiil\\\'s assassination, as well as the treaty between Cyrodiil and Morrowind that ended the 80 year-long war.', 'upload/images/IMG_12-06-2017_1497262531.png', '1'),
(15, 'A Dance in Fire, v1', 'Waughin Jarth', 'History', '	Account of Decumus Scotti\\\'s exploits during the war between Valenwood and Elsweyr.', 'upload/images/IMG_12-06-2017_1497262591.png', '1'),
(16, 'A Dance in Fire, v2', ' Waughin Jarth', 'History', 'Part two of Decumus Scotti\\\'s exploits during the war between Valenwood and Elsweyr.', 'upload/images/IMG_12-06-2017_1497262627.png', '1'),
(17, 'A Dance in Fire, v3', ' Waughin Jarth', 'History', 'Part three of Decumus Scotti\\\'s exploits during the war between Valenwood and Elsweyr.', 'upload/images/IMG_12-06-2017_1497262658.png', '1'),
(18, 'A Dance in Fire, Book IV', 'Waughin Jarth', 'History', '	Part four of Decumus Scotti\\\'s exploits during the war between Valenwood and Elsweyr.', 'upload/images/IMG_12-06-2017_1497262690.png', '1'),
(19, 'A Dance in Fire, Book V', 'Waughin Jarth', 'History', 'Part five of Decumus Scotti\'s exploits during the war between Valenwood and Elsweyr.', 'upload/images/IMG_12-06-2017_1497264208.png', '1'),
(20, 'A Dance in Fire, Book VI', ' Waughin Jarth', 'History', 'Part six of Decumus Scotti\'s exploits during the war between Valenwood and Elsweyr.', 'upload/images/IMG_12-06-2017_1497264252.png', '1'),
(21, 'A Dance in Fire, v7', 'Waughin Jarth', 'History', 'Part seven of Decumus Scotti\'s exploits during the war between Valenwood and Elsweyr.', 'upload/images/IMG_12-06-2017_1497264300.png', '1'),
(22, 'A Dream Of Sovngarde', ' Skardan Free-Winter', 'Fiction-Fantasy', '	A Nord soldier\'s account of visiting the afterlife in a dream.', 'upload/images/IMG_12-06-2017_1497264388.png', '1'),
(23, 'A Game at Dinner', 'Anonymous', 'Letter', 'An anonymous letter written by a spy.', 'upload/images/IMG_12-06-2017_1497264620.png', '1'),
(24, 'A Gentleman\\\'s Guide to Whiterun', 'Mikael The Bard', 'Guide', 'A guide to the Nordic city of Whiterun in the Fourth Era.', 'upload/images/IMG_12-06-2017_1497264659.png', '1'),
(25, ' A Hypothetical Treachery', 'Anthil Morvir', 'Fantasy', 'A short play about betrayal.', 'upload/images/IMG_12-06-2017_1497264721.png', '1'),
(26, 'A Kiss, Sweet Mother', 'Anonymous', 'Guide-Ritual', 'Guide to performing the Black Sacrament in order to summon the Dark Brotherhood.', 'upload/images/IMG_12-06-2017_1497264772.png', '1'),
(27, 'The Aetherium Wars', 'Taron Dreth', 'History', 'Historical record of the Dwemer internal conflict over Aetherium during the First Era.', 'upload/images/IMG_12-06-2017_1497264834.png', '1'),
(28, 'Ahzirr Traajijazeri', 'Anonymous', 'Manifesto', 'The public manifesto of the Khajiit organization Renrijra Krin.', 'upload/images/IMG_12-06-2017_1497264884.png', '1'),
(29, 'An Explorer\'s Guide to Skyrim', ' Marcius Carvain, Viscount Bruma', 'Guide', 'A brief overview of some cities in Skyrim for tourists to visit.', 'upload/images/IMG_12-06-2017_1497264929.png', '1'),
(30, 'Ancestors and the Dunmer', 'Anonymous', 'History', 'An overview of Dunmer ancestor worship and afterlife.', 'upload/images/IMG_12-06-2017_1497265010.png', '1'),
(31, 'Annals of the Dragonguard', 'Brother Annulus', 'Journal', 'A journal written by a member of the ancient Dragonguard.', 'upload/images/IMG_12-06-2017_1497265062.png', '1'),
(32, 'Antecedants of Dwemer Law', 'Anonymous', 'Law Book', 'The customs and laws of the Dwemer.', 'upload/images/IMG_12-06-2017_1497265113.png', '1'),
(33, 'Arcana Restored', 'Wapna Neustra', 'Guide', 'A guide to restoring enchanted items.', 'upload/images/IMG_12-06-2017_1497265156.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` date DEFAULT NULL,
  `date_returned` date DEFAULT NULL,
  `date_due` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `book_id`, `date_borrowed`, `date_returned`, `date_due`) VALUES
(21, 2, 1, '2017-06-10', '2017-06-11', '2017-06-13'),
(22, 2, 5, '2017-06-01', '2017-06-11', '2017-06-04'),
(23, 7, 1, '2017-06-11', NULL, '2017-06-14'),
(24, 2, 6, '2017-06-11', '2017-06-11', '2017-06-14'),
(28, 2, 6, '2017-06-06', NULL, '2017-06-10'),
(29, 2, 7, '2017-06-11', '2017-06-11', '2017-06-14'),
(30, 2, 7, '2017-06-01', '2017-06-11', '2017-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `year_level` int(2) DEFAULT NULL,
  `student_no` varchar(255) DEFAULT NULL,
  `type` enum('admin','normal') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `year_level`, `student_no`, `type`, `status`) VALUES
(1, 'user', '$2y$10$NsTf.3o2LhRjBrI21b0AS.B563rDcrAuOObcVXR6Bko8QPm2X1xY.', NULL, NULL, 'admin', '1'),
(2, 'rylee', '$2y$10$kloQ4FZpJ68GJycGR5GwIehpxqmNkEhYoQbVG/OqSc9aiWbUn2Ed6', 2, '201511169', 'normal', '1'),
(7, 'cayle', '$2y$10$Aoix6fjYrn3m6rBk4bGJlO75IboUFST1KuWOBBl3Vd7uh6IwIzJcK', 2, '201511168', 'normal', '1'),
(8, 'admin', '$2y$10$2Wgg2n9Yo8xCsQeos.Bj.eI3EAzWBkkL683fFKE8F1ewJJPf0b7Wa', NULL, NULL, 'admin', '1'),
(9, 'librarian', '$2y$10$op5x0bbF19HSaV3rdkkuq.cyRaW4qSwcLnV2xCYqwaTG0Kxclx6PW', NULL, NULL, 'admin', '1'),
(12, 'ralph', '$2y$10$8md8Bul4D95S3oZH3/YxG.XPAkpsRNTmv9wxXqSFiKX5Ytfih1mfq', NULL, NULL, 'admin', '1'),
(13, 'katrina', '$2y$10$39AO9dYALSPQhz6eikZB0ug8C.v7hVBBYvuWNoOaTvWeZRtdmODy6', NULL, NULL, 'admin', '1'),
(14, 'pdRovira', '$2y$10$tBOoBDPR.tnZMd9K5OQBD.ktElJBJgRBFgtZy//XxnMArquAOhDeG', NULL, NULL, 'admin', '1'),
(15, 'hhBarcelona', '$2y$10$Njx.jCa8d7xzj1y/DCXUF.X0sG3zCWPUktworM6G3EeBBJf46j/ne', NULL, NULL, 'admin', '1'),
(16, 'hhGeoffrey', '$2y$10$/95yi7TvRl6Dbo5RdNKCs.eIboFIYzAOijD7QrMrjMfwVtpZe0AJe', NULL, NULL, 'admin', '1'),
(17, 'adTorroja', '$2y$10$AORpteY.Lwwc7DPiR.MZq.44lgq353.mz0YfNTDBDjfX2LPgG0CnW', NULL, NULL, 'admin', '1'),
(18, 'loPlaza', '$2y$10$4r4JuQ8twGFXTMj449CPm.bW14dTRfEG83CPUDp2a4bfh.w.qwVj6', NULL, NULL, 'admin', '1'),
(19, 'raymondCanet', '$2y$10$gCmsac/3n/bfX8gFtcSXEOSA2LRa4P5AoACDrJe0RMVIJ6sbXjBh2', NULL, NULL, 'admin', '1'),
(20, 'geraldCaercino', '$2y$10$8sjzXnW5nrSaAA5mhmkrlu2WRIGHrfIPpBXD6t823lrZb4Avug6im', NULL, NULL, 'admin', '1'),
(21, 'raymondGurb', '$2y$10$2h00QlhiPJ82C/YOZ9gWJuBoAYHGuDZ4YiBVuH1VRirshEmKkup7i', NULL, NULL, 'admin', '1'),
(22, 'raymondPatot', '$2y$10$r7UOs.8u0U6k38XHYfmv6uCqoUcfxriBVH5/488xBPdoS3aLAMVrW', NULL, NULL, 'admin', '1'),
(23, 'hughMontlaur', '$2y$10$TZb6Qc1b7Rpca93GTWM63ufi9dmH8viIQcsHfq7W/hvFGwcVWeIIq', NULL, NULL, 'admin', '1'),
(24, 'stephenBelmonte', '$2y$10$YHIk9Wyp4tVE6HRvEw0VKehHdd52HUNw9G1kCqeUjNKQAYOHaD922', NULL, NULL, 'admin', '1'),
(25, 'raymondSerra', '$2y$10$9qskOUAyLCFyYMjb8fXdS.DjeSOUERftLCEdUvV0mS0YMoqIjZLxa', NULL, NULL, 'admin', '1'),
(26, 'williamCardona', '$2y$10$/3GWR8087QnY4SySIrrZqeJOYuEV.XY.bYA34tBaJfVPooyxbLmae', NULL, NULL, 'admin', '1'),
(27, 'BrSanJusto', '$2y$10$nPtNluydKZiXcEDjM9amWuCBgf1qd4bdLVz3bn5CMX5yqUQt/BOfe', NULL, NULL, 'admin', '1'),
(28, 'BrCardona', '$2y$10$AgYuLP8Ol9tmdKUm3FhVkeT45SiEkGnDpIVGyul8iw0S3qOXVezg2', NULL, NULL, 'admin', '1'),
(29, 'aEinstein', '$2y$10$7uPyXGHstY5eYeFd2ZujXOu3UMA0TP4WUPa83iYrUNTTqSK5.pZiK', 4, '201679741', 'normal', '1'),
(30, 'rFeynman', '$2y$10$CK.LlwCjysHTt/a9uAVxCuq7lFFZ.cQn54bOo5mbHXXEvkLQj2Jqi', 4, '201691710', 'normal', '1'),
(31, 'pDirac', '$2y$10$SB0LUwHcRnQF8dttIpIwKeeb6sNgh71.dQl7cgdn527p0KnCUmIOq', 1, '201639443', 'normal', '1'),
(32, 'nBohr', '$2y$10$21whlcl3m3tU0TRvHk0v8.QacVs5EXWu.cxTpLRu1guZVtkaIHJmS', 2, '201618050', 'normal', '1'),
(33, 'iNewton', '$2y$10$NW5rOeluUcFFGn4VLEOxH.azJ7YzxzLjCRMHSS328c1MsxZ00ehqK', 3, '201633750', 'normal', '1'),
(34, 'eFermi', '$2y$10$nWGh6flC2BVdgZvWjNEifOVPiuoElFfmKipxiS5CBMCgm3Pk7HjqC', 1, '201686623', 'normal', '1'),
(35, 'mPlanck', '$2y$10$GASFKpKk7h8IHt7MwGIqFOs6OiFrxO4GQpBJ7SLrn6RfcLF4EDyRG', 2, '201659584', 'normal', '1'),
(36, 'mCurie', '$2y$10$VYQP6eTlmVYH83be.A5jOuPOC9jk6W3fHX20xMbCPby9SppTvgJtW', 1, '201613666', 'normal', '1'),
(37, 'wHeisenberg', '$2y$10$yFUqKrmD7Y3C4wrzuljIp.r5tmZKOOuS6xxGdW3twB5Vjz4vnEcYe', 1, '201612422', 'normal', '1'),
(38, 'eSchrodinger', '$2y$10$qaFfVbvxtkCc58oTBhSbpOatKgK3GyYmC70uqz.zgTXJB5j4q9RmW', 1, '201691184', 'normal', '1'),
(39, 'gGalilei', '$2y$10$t2RhltgdrHcEJNnz1zIk7uPJN3N.T7wuOsN5iUVi/NKT5FC83fgeC', 3, '201684465', 'normal', '1'),
(40, 'wgPauli', '$2y$10$x0ewfVOksq9HGdj9mkv4quCpRRM2dId86K0Q3sbsm66Kxdu4OWxqW', 2, '201692195', 'normal', '1'),
(41, 'hBethe', '$2y$10$NzP6eI6KtzWad9FEyaHCh.TONxvVH2yctocXoeHislYNA.Znb7Mce', 1, '201644474', 'normal', '1'),
(42, 'sWeinberg', '$2y$10$P69rXko2lt2BNJNLMPAIm.k1INqJccyeqsLqcKvjf3mMv37fRY7w2', 4, '201687866', 'normal', '1'),
(43, 'jChadwick', '$2y$10$4BJg5ccBHmzeP4Osku2dU.KKGOs033I05fvtA3VRHfqTW4uXN3Z5G', 3, '201646032', 'normal', '1'),
(44, 'lLandau', '$2y$10$YHqQaPRAHGngVPyd59.YROaOpI78FPDFBfsz1ljxMZ7izM5pGgxS2', 2, '201636680', 'normal', '1'),
(45, 'aSalam', '$2y$10$Olgc/SsvyaOP1bib8M/yK.OqCjeXEiWLmBI6XUctxGuJcHguh72ma', 1, '201665335', 'normal', '1'),
(46, 'mFaraday', '$2y$10$Z220hfwlIA6nU569rlJwZu2mGeJZ69Fl6RvlKgkoBZQXzPmvxasKK', 3, '201632579', 'normal', '1'),
(47, 'eWigner', '$2y$10$vamQZWSGyX3GF9KbhuOeCexfpPskw1SBNyWlgKZDYPvkvevJydgJi', 4, '201673232', 'normal', '1'),
(48, 'mBorn', '$2y$10$b2f/Qz0KF.YqNb8AUs6vgeOAQfGA89FT5l9egrwFUn.9EcRXRs4uy', 1, '201632445', 'normal', '1'),
(49, 'sChandrasekhar', '$2y$10$rEw0bKUCKomXng0bRufD/OeAnrBlNYxlr3..2.hXYyifAhYGVtK8e', 3, '201698772', 'normal', '1'),
(50, 'mGell-Man', '$2y$10$RrVuCo.5HvhHtvEDIvzMQupEfubZOdERawxRbWRsx/uE3DDFeVfES', 2, '201642442', 'normal', '1'),
(51, 'hLorentz', '$2y$10$PqUsxX6atRt/sCzKQiLOW.VHSebkozMwgMHLroMRyLBf.tArm0hLe', 1, '201623214', 'normal', '1'),
(52, 'lDeBroglie', '$2y$10$otfJ4LYp7jZ23D4ONfHEh.E/5kQG3ZSfCnDtLlygNiRH0/oG3wPT6', 1, '201691377', 'normal', '1'),
(53, 'tsungLee', '$2y$10$Y3tBswzWF2jmj4RmmI/8gumNmikC5Q.ZdwhozGJmn//.eE2e1Ci..', 3, '201666989', 'normal', '1'),
(54, 'jrSchrieffer', '$2y$10$85pCDiX.dLvQNh4wZDuvEOYhLZ1vxoxA2iV68VgYjx7rxNRO/Fy/2', 3, '201668252', 'normal', '1'),
(55, 'jBardeen', '$2y$10$ShPF1k1pycYBrsUzVlEho.sBTkpbXQ7n3l06MDIm/R5iAnqzqnlSG', 2, '201612373', 'normal', '1'),
(56, 'jjThompson', '$2y$10$nDDOlMPkCXl0gFYfdVe2fOAr6pt24pxGJBJefjepUl9dYv4IQXVK6', 3, '201650861', 'normal', '1'),
(57, 'gHooft', '$2y$10$mJsY56BzqB4pv9I6MDvWWOkxATHeE7A7W6M0qxJ.WohUZ3oqLYYi6', 1, '201617765', 'normal', '1'),
(58, 'lLederman', '$2y$10$kDedOPOA2VqFndPeTD60w.mJQBSo9u0q9ksb3lwvXSgIAuKJ1zT5G', 1, '201630402', 'normal', '1'),
(59, 'cnYang', '$2y$10$EtFAoV.XqDwCPTsWdNyGJ.Uc6preGmkxt3p0kmw5cClAcRfdB/EC2', 1, '201689818', 'normal', '1'),
(60, 'lCooper', '$2y$10$sFN8Sv0V0RWdr4ye.zkoj.NI3ObDD46k5Ujc1yqkrNAsUI7.hsKOK', 1, '201638052', 'normal', '1'),
(61, 'jcMaxwell', '$2y$10$XR.tVas9peBsQurkYoAbJ.1FecyIGwWR7vd84HOh7CQIMzdd4HmP6', 3, '201615618', 'normal', '1'),
(62, 'aMichelson', '$2y$10$07rNsCGmjPAd8Ebsxm4gquAx2TrE95KpR82bbACytVyjXcx9TgQnW', 3, '201629014', 'normal', '1'),
(63, 'raBuen', '$2y$10$skAZI7iGMjSZdSRi3OD1Luju1datr3f7d54Vn.W09Bz3g3V4UfO8m', 2, '201510592', 'normal', '1'),
(64, 'kyEsdicul', '$2y$10$pReQA3TtznuI3.OUirLsE.aQ72hTNjmBNFFD0m2Ng.SccC9q4DXpG', 2, '201511337', 'normal', '1'),
(65, 'kMia', '$2y$10$Vdl2C1SWW/VGNZp/IzY6x.GtkZjnGmxBhfUNBnUjvM2cAwRnal2zu', 2, '201671647', 'normal', '1'),
(66, 'oMaria', '$2y$10$U7j9pP.GSLXyqL2c8LQtFerB47EyBkX4eE/i8WOENayqr55GWU36.', 2, '201640889', 'normal', '1'),
(67, 'raMillikan', '$2y$10$b4FW7dwdXbmIhEJ1MkM/geuIX/SG4lTR.8wbuLNzqg5JwBwkNRBfi', 3, '201671924', 'normal', '1'),
(68, 'fBloch', '$2y$10$vIbB3c.SHD7VHLdEZHacceR.Ty7VymSFttNBDi9.jFJYGpODBCYgm', 1, '201617829', 'normal', '1'),
(69, 'lBoltzmann', '$2y$10$6aLBF/9ob3a0.G3PlCfcCebY/Agp8CdCiGno.7VQvcBnLvyfvjEVS', 1, '201673194', 'normal', '1'),
(70, 'ahBecquerel', '$2y$10$wxmXtSaRgMhjtWHJCF/SV.oRLyYc9eqWhglJc4xc4q7Z58x2yjkcW', 1, '201614552', 'normal', '1'),
(71, 'slGlashow', '$2y$10$x5.g3PlLY2BgQhR52yg6KeVB.8mInv.JHdsj7Vz0vIJmtYSevPKbi', 1, '201694779', 'normal', '1'),
(72, 'eRutherford', '$2y$10$iFX.K71DV1ApiT566aVMQOM39Me4LyzOA9K5C2DQ18GFVk7Ejkg0y', 2, '201641538', 'normal', '1'),
(73, 'pCurie', '$2y$10$106y4bYhNhdFoQmik0/2Q.wz.MG1VTH/OOEYA6qk31AkWeW1/EqPa', 3, '201690169', 'normal', '1'),
(74, 'lwAlvarez', '$2y$10$4YeLvUv4NYpWSzddDcDHJ.3phrtBvw5AXgxpTxziOuK1v2ZtlI2Iy', 4, '201695104', 'normal', '1'),
(75, 'vGinzburg', '$2y$10$F/cFCBVIWHPPw9bwAIbkdOjh5nuUC5RaPtpRL7lvfR.JH0i5JebnS', 3, '201669573', 'normal', '1'),
(76, 'mlPerl', '$2y$10$5ptZ0ZJGgkZmUUlI26/wuudOVjhZs4OKJPSJMTeDEADn4GVMz9epi', 1, '201618571', 'normal', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
