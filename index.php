<!DOCTYPE html PUBLIC
    "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl">
<head>
    <title>Quizzard</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="pl" />
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta name="Description" content="Quizzard" />
    <meta name="Keywords" content="quiz, quizzard, quizy, tworzenie, serwisy, internetowe" />
    <meta name="Author" content="Karol Medwecki, Artur Koziarz, Artur Kaflowski" />
    <meta name="Title" content="Quizzard" />
    <link rel="Stylesheet" type="text/css" href="style.css" />
</head>
<body>

<div class="main">
<?php

require_once("config.php");

date_default_timezone_set("Poland");

if (IsContentFileSpecified() && IsContentFileValid())
{
    include(GetContentFileName());
}
else
{
    include(GetDefaultContentFileName());
}

function IsContentFileSpecified()
{
    return !empty($_GET["show"]);
}

function IsContentFileValid()
{
    return array_key_exists($_GET["show"], Config::$contentFiles);
}

function GetContentFileName()
{
    return Config::$contentFiles[$_GET["show"]];
}

function GetDefaultContentFileName()
{
    return Config::HOME_CONTENTS;
}

?>

</body>
</html>
