<?php

namespace Quizzard;

require_once(dirname(__FILE__)."/../config.php");

class DefaultDbConnector
{
    private $dbDriver;
    
    public function __construct()
    {
        $this->dbDriver = new \mysqli(\Config::DB_SERVER, \Config::DB_USER, \Config::DB_PASSWORD, \Config::DB_NAME);
        $this->dbDriver->query("SET NAMES UTF8");
    }
    
    public function getDbDriver() {
        return $this->dbDriver;
    }
    
}

?>
