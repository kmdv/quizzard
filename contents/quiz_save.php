<?php

namespace Quizzard;

require_once(dirname(__FILE__).'/../context.php');
require_once(dirname(__FILE__).'/../html/quiz_html_printer.php');
require_once(dirname(__FILE__).'/../model/answer.php');
require_once(dirname(__FILE__).'/../model/quiz.php');
require_once(dirname(__FILE__).'/../model/question.php');

function CreateAnswer($line)
{
    return new Answer($line);
}

function CreateQuestion($lines)
{
    $answers = array();
    for ($i = 1; $i < count($lines); ++$i)
    {
        $answers[] = CreateAnswer($lines[$i]);
    }

    return new Question($lines[0], false, $answers);
}

function CreateQuiz($name, $lines)
{
    if (count($lines) > 0)
    {
        $lines = explode("\n", $lines);

        if (trim(end($lines)) != "")
        {
            $lines[] = "";
        }

        $questions = array();

        $start = 0;
        for ($i = 0; $i < count($lines); ++$i)
        {
            if (trim($lines[$i]) == "")
            {
                $questions[] = CreateQuestion(array_slice($lines, $start, $i - $start));
                $start = $i + 1;
            }
        }

        date_default_timezone_set("Poland");
        $dateTime = \DateTime::createFromFormat("Y-m-d H:i", date("Y-m-d H:i"));
        return new Quiz($name, $dateTime, $questions);
    }
}

if (!empty($_POST['quiz-name']) && !empty($_POST['quiz-questions']))
{
    $quiz = CreateQuiz($_POST['quiz-name'], $_POST['quiz-questions']);

    if (!empty($_POST['quiz-id']))
    {
        $quiz->setId($_POST['quiz-id']);
    }

    // Debug printing which check if the quiz is parsed properly.
    // $quizPrinter = new QuizHtmlPrinter();
    // $quizPrinter->PrintQuiz($quiz);

    Context::getQuizSaver()->saveQuiz($quiz);
}

?>

<h1>Quiz dodano</h1>
<a href="index.php">Powrót do strony głównej</a>
