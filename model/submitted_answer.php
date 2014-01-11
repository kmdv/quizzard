<?php

namespace Quizzard;

class SubmittedAnswer
{
    private $choices = array();

    public function clear()
    {
        $this->choices = array();
    }

    public function addChoice($choice)
    {
        if (!in_array($choice, $this->choices))
        {
            $this->choices[] = $choice;
        }
    }

    public function getChoices()
    {
        return $this->choices;
    }
}

?>
