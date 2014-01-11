<a href="index.php?show=quiz_list">Pokaz listę quizów</a><br />
<a href="index.php?show=quiz_wizard">Dodaj nowy quiz</a><br />

<?php

require_once("dbconnector/db_quiz_loader.php");
require_once("dbconnector/db_quiz_saver.php");
require_once("dbconnector/default_db_connector.php");
require_once("html/quiz_html_printer.php");
require_once("model/answer.php");
require_once("model/quiz.php");
require_once("model/question.php");

use Quizzard\Answer;
use Quizzard\Question;
use Quizzard\Quiz;
use Quizzard\QuizHtmlPrinter;
use Quizzard\DbQuizLoader;
use Quizzard\DefaultDbConnector;

$dateTime = \DateTime::createFromFormat("Y-m-d H:i", "2009-02-15 15:16");
if (!($dateTime instanceof \DateTime))
{
    echo 'CO TO KURWA MA BYĆ?!<br />';
}

$question1 = new Question(
    "Jaki kolor?",
    false,
    array(new Answer("Biały"), new Answer("Czerwony"), new Answer("Niebieski")));

$question2 = new Question(
    "Jaki kształt?",
    true,
    array(new Answer("Kwadrat"), new Answer("Okrąg"), new Answer("Trójkąt")));

$question3 = new Question(
    "Jaki inny kolor?",
    false,
    array(new Answer("Fioletowy"), new Answer("Czerwony"), new Answer("Niebieski")));

$question4 = new Question(
    "Jaki inny kształt?",
    true,
    array(new Answer("Prostokąt"), new Answer("Okrąg"), new Answer("Trójkąt")));

$quiz = new Quiz("Jakiś quiz", $dateTime, array($question1, $question2, $question3, $question4));



$dbDriver= (new DefaultDbConnector())->getDbDriver();

// Zapisanie quizu do bazy danych
// (Odkomentować do testów, póki co wyłączone, żeby nie zaśmiecać bazy danych)
//(new DbQuizSaver($dbDriver))->saveQuiz($quiz);

// Ładowanie quizu z bazy danych
if (isset($_GET['quiz']) && is_numeric($_GET['quiz']))
{
    $loadedQuizId = $_GET['quiz'];
    $loadedQuiz = (new DbQuizLoader($dbDriver))->loadQuiz($loadedQuizId);

    $quizPrinter = new QuizHtmlPrinter();
    $quizPrinter->printQuiz($loadedQuiz);
}

?>
