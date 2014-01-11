<?php

namespace Quizzard;

require_once dirname(__FILE__).'/../model/quiz_saver.php';

class DbQuizSaver implements QuizSaver
{
    private $dbDriver;

    public function __construct($dbDriver)
    {
        $this->dbDriver = $dbDriver;
    }

    public function saveQuiz($quiz)
    {
        $this->dbDriver->query("START TRANSACTION");

        // Jeśli quiz ma ID (czyli jest zapisany w bazie), najpierw usuń istniejący quiz.
        if($quiz->getId() != null)
        {
            $this->dbDriver->query("DELETE FROM Quizzes WHERE id = ".$quiz->getId());
        }

        // Dodaj nowy quiz do bazy
        $this->dbDriver->query("INSERT INTO Quizzes (id, name, creationDateTime) VALUES ('', '".$quiz->getName()."', '".$quiz->getCreationDateTime()->format("Y-m-d H:i:s")."')");
        // Poznaj jego id
        $quizId = $this->dbDriver->query("SELECT id FROM Quizzes ORDER BY id DESC LIMIT 1")->fetch_object()->id;
        $quiz->setId($quizId);
        foreach($quiz->getQuestions() as $question)
        {
            $this->dbDriver->query("INSERT INTO Questions (id, quizId, text, multipleChoice) VALUES ('', ".$quizId.", '".$question->getText()."', '".($question->isMultipleChoice() ? 1 : 0)."')");
            $questionId = $this->dbDriver->query("SELECT id FROM Questions ORDER BY id DESC LIMIT 1")->fetch_object()->id;
            foreach($question->getAnswers() as $answer)
            {
                $this->dbDriver->query("INSERT INTO Answers (id, questionId, text, pointsIfChecked, pointsIfUnchecked) VALUES ('', ".$questionId.", '".$answer->getText()."', ".$answer->getPointsIfChecked().", ".$answer->getPointsIfUnchecked().")");
            }
        }

        return $this->dbDriver->query("COMMIT");
    }
}

?>
