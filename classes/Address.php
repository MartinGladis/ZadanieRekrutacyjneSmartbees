<?php
require "Geo.php";

class Address
{
    private string $street;
    private string $suite;
    private string $city;
    private string $zipcode;
    private Geo $geo;

    public function __construct (string $street, string $suite, string $city, string $zipcode, Geo $geo)
    {
        $this->street = $street;
        $this->suite = $suite;
        $this->city = $city;
        $this->$zipcode = $zipcode;
        $this->geo = $geo;
    }
}