<?php

namespace Quizzard;

class SubmittedQuizAnswers
{
    private $id = null;
    private $quizId = null;
    private $completionDateTime;
    private $submittedAnswers;

    public function __construct($completionDateTime, $submitteedAnswers)
    {
        $this->completionDateTime = $completionDateTime;
        $this->submittedAnswers = $submitteedAnswers;
    }

    public function getQuizId()
    {
        return $this->quizId;
    }

    public function getCompletionDateTime()
    {
        return $this->completionDateTime;
    }

    public function getSubmittedAnswers()
    {
        return $this->submittedAnswers;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setQuizId($quizId)
    {
        $this->quizId = $quizId;
    }
}

?>
