<?php


class Company
{
    private string $name;
    private string $catchPhrase;
    private string $bs;

    public function __construct(string $name, string $catchPhrase, string $bs)
    {
        $this->name = $name;
        $this->catchPhrase = $catchPhrase;
        $this->bs = $bs;
    }
}