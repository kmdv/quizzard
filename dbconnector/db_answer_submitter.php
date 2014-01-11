<?php

namespace Quizzard;

require_once dirname(__FILE__).'/default_db_connector.php';

class DbAnswerSubmitter 
{
    private $dbDriver;
    
    public function __construct($dbDriver)
    {
        $this->dbDriver = $dbDriver;
    }
    
    public function submitAnswers($submittedQuizAnswers)
    {
        $this->dbDriver->query("START TRANSACTION");
        $quer = "INSERT INTO Submissions (id, completionDateTime) VALUES ('', '".$submittedQuizAnswers->getCompletionDateTime()->format("Y-m-d H:i:s")."')";
        $this->dbDriver->query($quer);
        $submissionId = $this->dbDriver->query("SELECT id FROM Submissions ORDER BY id DESC LIMIT 1")->fetch_object()->id;
        
        $submittedAnswers = $submittedQuizAnswers->getSubmittedAnswers();
        foreach($submittedAnswers as $subAnswer)
        {
            $answerIds = $subAnswer->getChoices();
            foreach($answerIds as $answerId) 
            {
                $q= "INSERT INTO SubmittedAnswers (id, answerId, submissionId) VALUES ('', '".$answerId."', '".$submissionId."')";
                $this->dbDriver->query($q);
            }
        }
        
        return $this->dbDriver->query("COMMIT");
    }
    

}

?>
