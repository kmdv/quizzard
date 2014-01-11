<?php

class Config
{
	const DB_SERVER = "localhost";
	const DB_USER = "xxx";
	const DB_PASSWORD = "walkiria";
	const DB_NAME = "quizzard";

	const HOME_CONTENTS = "contents/quiz.php";

    // Explicit table of allowed contents prevents from executing malicious scripts.
	public static $contentFiles = array(
		"quiz" => "contents/quiz.php",
        "quiz_wizard" => "contents/quiz_wizard.php",
        "quiz_list" => "contents/quiz_list.php",
        "quiz_save" => "contents/quiz_save.php",
        "submit_answers" => "contents/submit_answers.php");
}

?>
