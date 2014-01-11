-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 21 Lis 2013, 11:23
-- Wersja serwera: 5.5.32
-- Wersja PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `quizzard`
--
CREATE DATABASE IF NOT EXISTS `quizzard` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `quizzard`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionId` int(11) NOT NULL,
  `text` varchar(200) NOT NULL,
  `pointsIfChecked` int(11) NOT NULL,
  `pointsIfUnchecked` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Answers_Questions1_idx` (`questionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Zrzut danych tabeli `answers`
--

INSERT INTO `answers` (`id`, `questionId`, `text`, `pointsIfChecked`, `pointsIfUnchecked`) VALUES
(1, 1, 'Tak', 2, 0),
(2, 1, 'Nie', 0, 0),
(3, 1, 'Tak sobie', 1, 0),
(4, 2, 'Zielonego', 0, 0),
(5, 2, 'Czerwonego', 2, 0),
(6, 3, 'Nie palę', 0, 0),
(7, 3, 'Poniżej 5 lat', 2, 0),
(8, 3, '5 - 15 lat', 4, 0),
(9, 3, 'Ponad 15 lat', 8, 0),
(10, 4, 'Słodzone napoje', 4, 0),
(11, 4, 'Słodycze', 4, 0),
(12, 4, 'Fast food', 5, 0),
(13, 4, 'Alkohol', 3, 0),
(14, 5, 'Dwyane Wade', 1, 0),
(15, 5, 'LeBron James', 0, 0),
(16, 5, 'Kobe Bryant', 0, 0),
(17, 6, 'Los Angeles Lakers', 0, 0),
(18, 6, 'Miami Heat', 0, 0),
(19, 6, 'Dallas Mavericks', 1, 0),
(20, 7, 'David Stern', 1, 0),
(21, 7, 'Joe Crawford', 0, 0),
(22, 7, 'Adam Silver', 0, 0),
(23, 8, '28', 0, 0),
(24, 8, '29', 0, 0),
(25, 8, '30', 1, 0),
(26, 9, 'Kadre Olimpijska z 1992', 1, 0),
(27, 9, 'Chicago Bulls 1995/1996', 0, 0),
(28, 9, 'Kadre Olimpijska z 2008', 0, 0),
(29, 10, 'David Robinson', 0, 0),
(30, 10, 'Kobe Bryant', 0, 0),
(31, 10, 'Wilt Chamberlain', 1, 0),
(32, 11, 'LeBron James', 1, 0),
(33, 11, 'Kevin Durant', 0, 0),
(34, 11, 'Dirk Nowitzki', 0, 0),
(35, 12, 'San Antonio Spurs', 0, 0),
(36, 12, 'Boston Celtics', 1, 0),
(37, 12, 'los Angeles Lakers', 0, 0),
(38, 13, '10 minut', 0, 0),
(39, 13, '12 minut', 1, 0),
(40, 13, '20 minut', 0, 0);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `fullquizzes`
--
CREATE TABLE IF NOT EXISTS `fullquizzes` (
`quizID` int(11)
,`quizName` varchar(45)
,`quizCreationDateTime` datetime
,`questionId` int(11)
,`questionText` varchar(200)
,`questionIsMultipleChoice` tinyint(4)
,`answerId` int(11)
,`answerText` varchar(200)
,`answerPointsIfChecked` int(11)
,`answerPointsIfUnchecked` int(11)
);
-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `fullsubmissions`
--
CREATE TABLE IF NOT EXISTS `fullsubmissions` (
`submissionId` int(11)
,`submittedAnswerId` int(11)
,`answerId` int(11)
);
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `moderators`
--

CREATE TABLE IF NOT EXISTS `moderators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quizId` int(11) NOT NULL,
  `text` varchar(200) NOT NULL,
  `multipleChoice` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Questions_Quizes_idx` (`quizId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Zrzut danych tabeli `questions`
--

INSERT INTO `questions` (`id`, `quizId`, `text`, `multipleChoice`) VALUES
(1, 1, 'Czy bratek ładnie pachnie?', 0),
(2, 1, 'Jakiego koloru są czerwone róże?', 0),
(3, 2, 'Jak długo palisz papierosy?', 0),
(4, 2, 'Które z tych rzeczy spożywasz często?', 1),
(5, 3, 'Kto był królem strzelców w sezonie 2008/2009', 0),
(6, 3, 'Kto zdobył tytuł w roku 2011', 0),
(7, 3, 'Jak nazywa się komisarz NBA?', 0),
(8, 3, 'Ile mamy zespołów w lidze?', 0),
(9, 3, 'DreamTeam to określenie na jaką drużyne?', 0),
(10, 3, 'Kto zdobył najwięcej punktów w jednym meczu w historii ligi?', 0),
(11, 3, 'Jak nazywa się MVP ostatnich 2 ostatnich sezonów i finałów?', 0),
(12, 3, 'Która z drużyn zdobyła najwięcej tytułów w historii?', 0),
(13, 3, 'Ile minut trwa jedna kwarta?', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quizzes`
--

CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `creationDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `creationDateTime`) VALUES
(1, 'Kwiatoznawstwo', '2013-11-07 15:16:51'),
(2, 'Jak bardzo niezdrowy jest twój tryb życia?', '2013-11-07 15:16:51'),
(3, 'NBA', '2013-11-20 12:24:51');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `submissions`
--

CREATE TABLE IF NOT EXISTS `submissions` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `submittedanswers`
--

CREATE TABLE IF NOT EXISTS `submittedanswers` (
  `id` int(11) NOT NULL,
  `answerId` int(11) NOT NULL,
  `submissionId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_SubmittedAnswers_Answers1_idx` (`answerId`),
  KEY `fk_SubmittedAnswers_Submissions1_idx` (`submissionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura widoku `fullquizzes`
--
DROP TABLE IF EXISTS `fullquizzes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fullquizzes` AS select `qz`.`id` AS `quizID`,`qz`.`name` AS `quizName`,`qz`.`creationDateTime` AS `quizCreationDateTime`,`qs`.`id` AS `questionId`,`qs`.`text` AS `questionText`,`qs`.`multipleChoice` AS `questionIsMultipleChoice`,`a`.`id` AS `answerId`,`a`.`text` AS `answerText`,`a`.`pointsIfChecked` AS `answerPointsIfChecked`,`a`.`pointsIfUnchecked` AS `answerPointsIfUnchecked` from ((`quizzes` `qz` join `questions` `qs` on((`qz`.`id` = `qs`.`quizId`))) join `answers` `a` on((`qs`.`id` = `a`.`questionId`)));

-- --------------------------------------------------------

--
-- Struktura widoku `fullsubmissions`
--
DROP TABLE IF EXISTS `fullsubmissions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fullsubmissions` AS select `s`.`id` AS `submissionId`,`sa`.`id` AS `submittedAnswerId`,`sa`.`answerId` AS `answerId` from (`submissions` `s` join `submittedanswers` `sa` on((`s`.`id` = `sa`.`submissionId`)));

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_Answers_Questions1` FOREIGN KEY (`questionId`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_Questions_Quizes` FOREIGN KEY (`quizId`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `submittedanswers`
--
ALTER TABLE `submittedanswers`
  ADD CONSTRAINT `fk_SubmittedAnswers_Answers1` FOREIGN KEY (`answerId`) REFERENCES `answers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SubmittedAnswers_Submissions1` FOREIGN KEY (`submissionId`) REFERENCES `submissions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
