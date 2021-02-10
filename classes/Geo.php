<?php


class Geo
{
    private string $lat;
    private string $lng;

    public function __construct(string $lat, string $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }
}