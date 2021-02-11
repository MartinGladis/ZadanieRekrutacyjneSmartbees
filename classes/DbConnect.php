<?php

require_once "ConnectionData.php";

class DbConnect
{
    private $pdo;

    public function __construct(string $dbName = NULL)
    {
        if ($dbName == NULL) 
            $dsn = 'mysql:host='.ConnectionData::$HOSTNAME;
        else 
            $dsn = 'mysql:host='.ConnectionData::$HOSTNAME.';dbname='.$dbName;
        $this->pdo = new PDO($dsn, ConnectionData::$USERNAME, ConnectionData::$PASSWORD);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
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

    public function insertDomainsToDb($domains, string $dbName, string $tableName)
    {
        foreach ($domains as $domain)
        {
            $sql = "SELECT * FROM $tableName WHERE domena = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$domain]);
            $row = $stmt->fetchAll();
            $itExists = count($row) > 0;
            if ($itExists)
            {
                $sql = "UPDATE $tableName SET ilosc_wyst = ilosc_wyst + 1 WHERE domena = ?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$domain]);
            }
            else
            {
                $sql = "INSERT INTO $tableName (domena, ilosc_wyst) VALUES (?, ?)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$domain, 1]);
            }
        }
    }

}