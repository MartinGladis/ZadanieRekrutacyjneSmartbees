<?php
require "Address.php";
require "Company.php";
include "phpqrcode/qrlib.php"

class User
{
    private int $id;
    private string $name;
    private string $username;
    private string $email;
    public Address $adress;
    private string $phone;
    private string $website;
    private Company $company;

    public function setPropertiesFromJson($jsonData)
    {
        $this->id = $jsonData["id"];
        $this->name = $jsonData["name"];
        $this->username = $jsonData["username"];
        $this->email = $jsonData["email"];
        $address = $jsonData["address"];
        $geo = $address["geo"];
        $this->address = new Address(
            $address["street"], 
            $address["suite"], 
            $address["city"], 
            $address["zipcode"], 
            new Geo(
                $geo["lat"],
                $geo["lng"]
            )
        );
        $this->phone = $jsonData["phone"];
        $this->website = $jsonData["website"];
        $company = $jsonData["company"];
        $this->company = new Company(
            $company["name"],
            $company["catchPhrase"],
            $company["bs"]
        );
    }

    public function __construct(string $jsonUrl)
    {
        $json = file_get_contents($jsonUrl);
        $jsonData = json_decode($json, true);

        $this->setPropertiesFromJson($jsonData);
    }

    public function getDomain()
    {
        $domain = substr(strrchr($this->email, "@"), 1);
        return $domain;
    }

    public function getPersonData()
    {

    }
}