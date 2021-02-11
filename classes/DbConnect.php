<?php

require_once "ConnectionData.php";

class DbConnect
{
    private $pdo;

    public function __construct(string $dbName = NULL)
    {
        if ($dbName == NULL)
        {
            $dsn = 'mysql:host='.ConnectionData::$HOSTNAME;
            $this->pdo = new PDO($dsn, ConnectionData::$USERNAME, ConnectionData::$PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        else
        {
            $dsn = 'mysql:host='.ConnectionData::$HOSTNAME.';dbname='.$dbName;
            $this->pdo = new PDO($dsn, ConnectionData::$USERNAME, ConnectionData::$PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
    }

    public function createDatabase(string $dbName)
    {
        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
        $stmt = $this->pdo->query($sql);
    }

    public function createTable(string $tableName)
    {
        $sql = "CREATE TABLE IF NOT EXISTS $tableName (domena varchar(255), ilosc_wyst int)";
        $stmt = $this->pdo->query($sql);
    }

    public function insertDomainToDb(string $dbName)
    {
        
    }

}