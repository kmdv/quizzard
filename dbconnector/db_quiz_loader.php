<?php

namespace Quizzard;

require_once dirname(__FILE__).'/../model/answer.php';
require_once dirname(__FILE__).'/../model/quiz_loader.php';
require_once dirname(__FILE__).'/../model/question.php';
require_once dirname(__FILE__).'/../model/quiz.php';

class DbQuizLoader implements QuizLoader
{
    private $dbDriver;

    public function __construct($dbDriver)
    {
        $this->dbDriver = $dbDriver;
    }

    public function loadQuiz($quizId)
    {
        $quizResource = $this->dbDriver->query("SELECT name, creationDateTime FROM Quizzes WHERE id = '".$quizId."' LIMIT 1")->fetch_object();
        $quizName = $quizResource->name;
        $quizCreationDateTime = \DateTime::createFromFormat("Y-m-d H:i:s", $quizResource->creationDateTime);
        $questionResource = $this->dbDriver->query("SELECT id, text, multipleChoice FROM Questions WHERE quizId = ".$quizId);
        $quizQuestions = array();
        for($i = 0; $i < $questionResource->num_rows; ++$i)
        {
            $question = $questionResource->fetch_object();
            $questionId = $question->id;
            $questionText = $question->text;
            $questionMultipleChoice = $question->multipleChoice;
            $answerResource = $this->dbDriver->query("SELECT id, text, pointsIfChecked, pointsIfUnchecked FROM Answers WHERE questionId = ".$questionId);
            $questionAnswers = array();
            for($j = 0; $j < $answerResource->num_rows; ++$j)
            {
                $answer = $answerResource->fetch_object();
                $answerId = $answer->id;
                $answerText = $answer->text;
                $answerPointsIfChecked = $answer->pointsIfChecked;
                $answerPointsIfUnchecked = $answer->pointsIfUnchecked;
                $questionAnswers[$answerId] = new Answer($answerText, $answerPointsIfChecked, $answerPointsIfUnchecked);
                $questionAnswers[$answerId]->setId($answerId);
            }
            $quizQuestions[$questionId] = new Question($questionText, $questionMultipleChoice, $questionAnswers);
            $quizQuestions[$questionId]->setId($questionId);
        }
        $quiz = new Quiz($quizName, $quizCreationDateTime, $quizQuestions);
        $quiz->setId($quizId);
        return $quiz;
    }
}

?>
