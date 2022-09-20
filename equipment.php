<?php

//asdasd

/**Need to instantiate, superclasses fix capitals directories sub super sibling
 *
 * constant with table names?
 * Geberic id or declare
 * string|int <-only allowed php 8?
 *
 * __toString()
 * __serialize __unserialize __debugInfo
 *
 * Autoloader
 *
 * Need abstract class
 *
 * Interface lab, check notes
 *
 * Fix camelcase namespace,
 *
 * Doug doesn't like getters and setters, most do
*/

namespace asset_module;

class Equipment
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

    public function __toString(): string
    {
        return json_encode(get_object_vars($this));//NOTE: Can only access public properties
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

$test = new Equipment("test equipment", 1, "Here's a description", "Outside");
echo $test;