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

<div class="page-wrapper">
    <div class="banner-wrapper with-horizontal-separator">
        <img src="banner.png" />
    </div>
    <div class="menu-wrapper with-horizontal-separator">
        <!--<div class="menu-item-wrapper with-vertical-separator">
            <a href="index.php?show=quiz_list">Quiz list</a>
        </div><div class="menu-item-wrapper with-vertical-separator">
            <a href="index.php?show=quiz_list">Quiz list 2</a>
        </div>-->
        <div class="menu-item-wrapper">
            <a href="index.php?show=quiz_list">Lista quizów</a>
        </div><div class="menu-item-wrapper">
            <a href="index.php?show=quiz_wizard">Dodaj nowy quiz</a>
        </div><div class="menu-item-wrapper">
            <a href="index.php?show=about">O projekcie</a>
        </div>
    </div>
    <div class="content-wrapper with-horizontal-separator">
        <?php include('content.php'); ?>
    </div>
    <div class="footer-wrapper with-horizontal-separator">
        Copyright (c) 2013-2014 by Quizzard Team
    </div>
</div>

</body>
</html>
