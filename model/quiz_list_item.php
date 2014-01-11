<?php

namespace Quizzard;

class QuizListItem
{
    private $quizId;
    private $quizName;

    public function __construct($quizId, $quizName)
    {
        $this->quizId = $quizId;
        $this->quizName = $quizName;
    }

    public function getQuizId()
    {
        return $this->quizId;
    }

    public function getQuizName()
    {
        return $this->quizName;
    }
}

?>
