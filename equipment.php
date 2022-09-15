<?php

namespace asset_module;

class equipment
{

    public string $name;
    public int $number;
    public string $description;
    public string $location;
    public array $files;

    public function __construct(string $name, int $number, string $description, string $location)
    {
        $this->name = $name;
        $this->number = $number;
        $this->description = $description;
        $this->location = $location;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

}