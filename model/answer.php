<?php

namespace Quizzard;

class Answer
{
    private $id;
    private $text;
    private $pointsIfChecked;
    private $pointsIfUnchecked;

    public function __construct($text, $pointsIfChecked = 1, $pointsIfUnchecked = 0)
    {
        $this->text = $text;
        $this->pointsIfChecked = $pointsIfChecked;
        $this->pointsIfUnchecked = $pointsIfUnchecked;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getPointsIfChecked()
    {
        return $this->pointsIfChecked;
    }

    public function getPointsIfUnchecked()
    {
        return $this->pointsIfUnchecked;
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
