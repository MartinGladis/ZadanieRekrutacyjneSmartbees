<?php

use chillerlan\QRCode\QRCode;

require_once "./vendor/autoload.php";
require_once "DbConnect.php";

class User
{
    private array $data;


    public function __construct(string $jsonUrl)
    {
        $json = file_get_contents($jsonUrl);
        $this->data = json_decode($json);
    }

    public function getDomains()
    {
        $domains = [];
        foreach($this->data as $mail)
        {
            array_push($domains ,substr(strrchr($mail->email, "@"), 1));
        }
        return $domains;
    }

    public function getPersonData()
    {
        //cut the data, because the data doesn't fit to the qr code
        foreach($this->data as $data)
        {
            $json = json_encode((array)$data);
            echo '<img src="'.(new QRCode)->render($json).'" alt="QR Code" />';
        }
    }

    public function createDatabase($dbName)
    {
        $db = new DbConnect();
        $db->createDatabase($dbName);
    }

    public function createTable($dbName, $tableName)
    {
        $db = new DbConnect($dbName);
        $db->createTable($tableName);
    }

    public function insertDomainsToDb($dbName, $tableName)
    {
        $domains = $this->getDomains();
        $db = new DbConnect($dbName);
        $db->insertDomainsToDb($domains, $dbName, $tableName);
    }
}