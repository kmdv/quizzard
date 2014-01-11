<?php

namespace Quizzard;

class Question
{
    private $id;
    private $text;
    private $multipleChoice;
    private $answers;

    public function __construct($text, $multipleChoice, $answers)
    {
        $this->text = $text;
        $this->multipleChoice = $multipleChoice;
        $this->answers = $answers;
    }

    public function isMultipleChoice()
    {
        return $this->multipleChoice;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getAnswers()
    {
        return $this->answers;
    }
    
    public function getId() 
    {
        return $this->id;
    }
    
    public function setId($id) 
    {
        $this->id = $id;
    }
}

?>
