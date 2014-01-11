<?php

namespace Quizzard;

require_once '/dbconnector/default_db_connector.php';
require_once '/dbconnector/db_quiz_saver.php';
require_once '/dbconnector/db_quiz_loader.php';
require_once '/html/quiz_html_printer.php';

class Context
{
    private static $dbDriver;
    private static $quizSaver;
    private static $quizLoader;
    private static $quizListProvider;
    private static $quizPrinter;

    public static function getQuizSaver()
    {
        if (self::$quizSaver == null)
        {
            self::$quizSaver = new DbQuizSaver(self::getDbDriver());
        }

        return self::$quizSaver;
    }

    public static function getQuizLoader()
    {
        if (self::$quizLoader == null)
        {
            self::$quizLoader = new DbQuizLoader(self::getDbDriver());
        }

        return self::$quizLoader;
    }

    public static function getQuizListProvider()
    {
        if (self::$quizListProvider == null)
        {
            self::$quizListProvider = new DbAllQuizListProvider(self::getDbDriver());
        }

        return self::$quizListProvider;
    }

    public static function getQuizPrinter()
    {
        if (self::$quizPrinter == null)
        {
            self::$quizPrinter = new HtmlQuizPrinter();
        }

        return self::$quizPrinter;
    }

    private static function getDbDriver()
    {
        if (self::$dbDriver == null)
        {
            self::$dbDriver = (new DefaultDbConnector())->getDbDriver();
        }

        return self::$dbDriver;
    }
}

?>
