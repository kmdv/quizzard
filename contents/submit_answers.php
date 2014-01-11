<?php

require_once(dirname(__FILE__).'/../model/quiz.php');
require_once(dirname(__FILE__).'/../model/submitted_answer.php');
require_once(dirname(__FILE__).'/../model/submitted_quiz_answers.php');
require_once(dirname(__FILE__).'/../dbconnector/default_db_connector.php');
require_once(dirname(__FILE__).'/../dbconnector/db_answer_submitter.php');

use Quizzard\SubmittedQuizAnswers;
use Quizzard\SubmittedAnswer;
use Quizzard\DefaultDbConnector;
use Quizzard\DbAnswerSubmitter;

$answerArray = array();
foreach($_POST as $i => $v) 
{
    //echo $i." => ".$v."<br/>";
    if($i[0] == 'q')
    {
        $questionId;
        $aPos = strpos($i, 'a');
        if($aPos === FALSE) // Odpowiedź jest jednokrotnego wyboru 
        {
            $questionId = substr($i, 1);
            $submittedAnswer = new SubmittedAnswer();
            $submittedAnswer->addChoice($v);
            $answerArray[$questionId] = $submittedAnswer;
        }
        else // Odpowiedź jest wielokrotnego wyboru
        {
            $questionId = substr($i, 1, $aPos - 1);
            if(isset($answerArray[$questionId])) // przynajmniej jedna odpowiedź wielokrotnego wyboru została już dodana 
            {
                $answerArray[$questionId]->addChoice($v);
            }
            else // nie zostala dodana jeszcze odpowiedz wiel. wyboru, utworz ja
            {
                $submittedAnswer = new SubmittedAnswer();
                $submittedAnswer->addChoice($v);
                $answerArray[$questionId] = $submittedAnswer;
            }                
        }
    }
}
$submittedQuizAnswers = new SubmittedQuizAnswers(DateTime::createFromFormat("Y-m-d H:i", "2009-02-15 15:16"), $answerArray);
$submitter = new DbAnswerSubmitter((new DefaultDbConnector())->getDbDriver());
$submitter->submitAnswers($submittedQuizAnswers);

?>

<h1>Dziękujemy za wypełnienie quizu.</h1>
<a href="index.php">Kliknij tutaj, aby powrócić do strony głównej.</a>