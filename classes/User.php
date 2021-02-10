<?php
require "Adress.php";
require "Company.php";

class User
{
    private $id;
    private $name;
    private $username;
    private $email;
    private Adress $address;
    private $phone;
    private $website;
    private Company $company;

    public function getDomain()
    {
        $domain = substr(strrchr($this->email, "@"), 1);
        return $domain;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}