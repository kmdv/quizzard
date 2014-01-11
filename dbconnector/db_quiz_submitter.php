<?php

namespace Quizzard;

class DbQuizSubmitter {
    
    private $dbDriver;
    
    public function __construct($dbDriver)
    {
        $this->dbDriver = $dbDriver;
    }
    
    public function submitQuiz($quiz) 
    {
        //$this->dbDriver->query("START TRANSACTION");
        //$this->dbDriver->query("COMMIT");
    }
    
}

?>
