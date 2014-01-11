<?php

namespace Quizzard;

require_once(dirname(__FILE__)."/../model/quiz_printer.php");

class QuizHtmlPrinter implements QuizPrinter
{
    private $questionId;

    private $answerId;

    public function printQuiz($quiz)
    {
        $this->printQuizHeader($quiz);
        $this->printAllQuestions($quiz);
        $this->printQuizFooter($quiz);
    }

    private function printQuizHeader($quiz)
    {
        echo '<form action="index.php?show=submit_answers" method="post">';
        echo "Quiz: ", $quiz->getName(), "<br/>";
        echo "Utworzony: ", $quiz->getCreationDateTime()->format("Y-m-d H:i"), "<br/>";
    }

    private function printAllQuestions($quiz)
    {
        foreach ($quiz->getQuestions() as $question)
        {
            $this->questionId = $question->getId();
            $this->printQuestion($question);
            ++$this->questionId;
        }
    }

    private function printQuizFooter($quiz)
    {
        echo '<input type="submit" value="Wyślij" />';
        echo '</form>';
    }

    private function printQuestion($question)
    {
        $this->printQuestionText($question);
        $this->printAllAnswers($question);
    }

    private function printQuestionText($question)
    {
        echo $question->getText(), "<br/>";
    }

    private function printAllAnswers($question)
    {
        foreach ($question->getAnswers() as $answer)
        {
            $this->answerId = $answer->getId();
            $this->printAnswer($answer, $question->isMultipleChoice());
        }
    }

    private function printAnswer($answer, $multipleChoice)
    {
        $type = $multipleChoice ? "checkbox" : "radio";
        $name = 'q'.$this->questionId;
        if ($multipleChoice)
        {
            $name = $name.'a'.$this->answerId;
        }

        echo '<input type="', $type, '" name="';
        echo $name;
        echo '" value="', $this->answerId, '">';
        echo $answer->getText();
        echo '</input><br/>';
    }
}

?>
