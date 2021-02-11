<?php

use chillerlan\QRCode\QRCode;

require "Address.php";
require "Company.php";

require_once "./vendor/autoload.php";

class User
{
    private array $data;


    public function __construct(string $jsonUrl)
    {
        $json = file_get_contents($jsonUrl);
        $this->data = json_decode($json);
    }

    public function getDomain()
    {
        $domain = "";
        foreach($this->data as $mail)
        {
            $domain .= substr(strrchr($mail->email, "@"), 1);
            $domain .= "<br>";
        }
        echo $domain;
    }

    public function getPersonData()
    {
        foreach($this->data as $data)
        {
            $json = json_encode((array)$data);
            echo '<img src="'.(new QRCode)->render($json).'" alt="QR Code" />';
            echo '<br>';
        }
    }
}