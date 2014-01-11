<?php

namespace Quizzard;

require_once dirname(__FILE__).'/../model/quiz_list_provider.php';
require_once dirname(__FILE__).'/../model/quiz_list_item.php';

class DbAllQuizListProvider implements QuizListProvider {

    private $dbDriver;

    public function __construct($dbDriver)
    {
        $this->dbDriver = $dbDriver;
    }

    public function findItemRange($indexOfFirst, $count) {
        $items = array();
        $result = $this->dbDriver->query("SELECT id, name FROM Quizzes LIMIT ".$indexOfFirst.", ".$count);
        for($i = 0; $i < $result->num_rows; ++$i)
        {
            $row = $result->fetch_object();
            $items[count($items)] = new QuizListItem($row->id, $row->name);
        }
        return $items;
    }

    public function getItemCount() {
        return $this->dbDriver->query("SELECT COUNT(id) AS cnt FROM Quizzes")->fetch_object()->cnt;
    }

}

?>
