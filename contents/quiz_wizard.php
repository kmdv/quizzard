<?php

namespace Quizzard;

require_once(dirname(__FILE__).'/../context.php');

$quizId = null;
if (!empty($_GET['quiz']))
{
    $quizId = $_GET['quiz'];

    $quiz = Context::getQuizLoader()->loadQuiz($quizId);

    $quizName = $quiz->getName();

    $first = true;

    $quizQuestions = "";
    foreach ($quiz->getQuestions() as $question)
    {
        if (!$first)
        {
            $quizQuestions .= "\n";
        }

        $quizQuestions .= $question->getText()."\n";

        foreach ($question->getAnswers() as $answer)
        {
            $quizQuestions .= $answer->getText()."\n";
        }

        $first = false;
    }
}
else
{
    $quizName = "";
    $quizQuestions = "";
}

?>

<h1>Tworzenie quizu</h1>
<form action="index.php?show=quiz_save" method="post">
    <table style="width: 320pt;">
        <tr>
            <td>Nazwa</td>
            <td>
                <input
                    name="quiz-name"
                    id="quiz-name"
                    type="text"
                    cols="40"
                    style="width:100%;"
                    value="<?php echo $quizName; ?>" />
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">
                Pytania wg. wzoru:<br />
                <i>Pytanie nr 1<br />
                Odpowiedz nr 1<br />
                Odpowiedz nr 2<br />
                <br />
                Pytanie nr 2<br />
                Odpowiedz nr 1<br />
                Odpowiedz nr 2<br /></i>
            </td>
            <td>
                <textarea
                    name="quiz-questions"
                    id="quiz-questions"
                    rows="12"
                    style="width:100%; height:100%; resize: none;"><?php echo $quizQuestions; ?></textarea>
            </td>
        </tr>
    </table>
    <?php
        if ($quizId != null)
        {
            echo '<input type="hidden" name="quiz-id" value="'.$quizId.'" />';
        }
    ?>
    <input type="submit" value="Zapisz" />
</form>
<a href="index.php">Powrót do strony głównej</a>
