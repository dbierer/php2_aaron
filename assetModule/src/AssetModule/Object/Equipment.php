<?php

/**Need to instantiate, superclasses fix capitals directories sub super sibling
 *
 * constant with table names?
 * Geberic id or declare
 * string|int <-only allowed php 8?
 *
 * __unserialize
 *
 *
 */

namespace AssetModule\Object;

class Equipment extends Asset implements TestInterface
{
    use DisplayAssembliesTrait, DisplayPartsTrait{
        DisplayAssembliesTrait::display insteadof DisplayPartsTrait;
        DisplayPartsTrait::display as partsDisplay;
    }

    CONST DATABASE = "icinga2";
    CONST TABLE = "equipment";

    public string $name;
    public int $number;
    public string $description;
    public string $location;
    public array $files;

    /**
     * @param string $name
     * @param int $number
     * @param string $description
     * @param string $location
     */
    public function __construct(string $name, int $number, string $description, string $location)
    {
        $this->name = $name;
        $this->number = $number;
        $this->description = $description;
        $this->location = $location;
        $this->files = [];
    }

    public function displayBom(): void{
        $this->display();
        $this->partsDisplay();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name . ' ' . $this->number . ' ' . $this->description . "\n";
    }

    /**
     * @return array
     */
    public function __debugInfo(): array
    {
        return $this->__serialize();
    }

    public function __serialize(): array
    {
        return [
            'name' => $this->name,
            'number' => $this->number,
            'description' => $this->description,
            'location' => $this->location,
            'files' => $this->files,
        ];
    }

    public function testFunction(): void
    {
        echo 'test';
    }
}

