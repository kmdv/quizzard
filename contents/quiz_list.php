<?php

namespace Quizzard;

require_once dirname(__FILE__)."/../context.php";
require_once dirname(__FILE__)."/../dbconnector/default_db_connector.php";
require_once dirname(__FILE__)."/../dbconnector/db_all_quiz_list_provider.php";

?>

<h1>Utworzone quizy</h1>

<?php

$quizListProvider = Context::getQuizListProvider();

echo 'Znaleziono quizów: '.$quizListProvider->getItemCount().'<br/><br/>';
echo '<table>';

foreach($quizListProvider->findItemRange(0, $quizListProvider->getItemCount()) as $item)
{
    echo '<tr>';
    echo '<td><a href="index.php?quiz='.$item->getQuizId().'">'.$item->getQuizName().'</a></td>';
    echo '<td><a href="index.php?show=quiz_wizard&quiz='.$item->getQuizId().'">Edytuj</a></td>';
    echo '</tr>';
}

echo '</table>';
echo '<br/><br/>';

?>

<a href="index.php">Powrót do strony głównej</a>
