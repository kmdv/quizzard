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
