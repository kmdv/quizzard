<?php

namespace Quizzard;

require_once('invalid_argument_exception.php');

class Quiz
{
    private $id = null;
    private $name;
    private $creationDateTime;
    private $questions;

    public function __construct($name, $creationDateTime, $questions)
    {
        if (!is_string($name))
        {
            throw new InvalidArgumentException('$name must be a string.');
        }

        if (!($creationDateTime instanceof \DateTime))
        {
            throw new InvalidArgumentException('$creationDateTime must be an instance '
                .'of DateTime.');
        }

        if (!is_array($questions))
        {
            throw new InvalidArgumentException('$questions must be an array.');
        }

        $this->name = $name;
        $this->creationDateTime = $creationDateTime;
        $this->questions = $questions;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCreationDateTime()
    {
        return $this->creationDateTime;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}

?>
