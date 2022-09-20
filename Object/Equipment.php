<?php

/**Need to instantiate, superclasses fix capitals directories sub super sibling
 *
 * constant with table names?
 * Geberic id or declare
 * string|int <-only allowed php 8?
 *
 * __unserialize
 *
 * Autoloader
 *
 * Interface lab, check notes
 *
 */

namespace assetModule\object;

CONST DATABASE = "icinga2";
CONST TABLE = "equipment";

class Equipment extends Asset implements TestInterface

{

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
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $number
     * @return void
     */
    public function setNumber(int $number): void
    {
        $this->number = $number;
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
        return [
            'name' => $this->name,
            'number' => $this->number,
            'description' => $this->description,
            'location' => $this->location,
            'files' => $this->files,
        ];
    }

    public function __serialize(): string
    {
        /*return 'INSERT INTO ' . DATABASE . '.' . TABLE
            . ' (name, number, description, location) VALUES ('
            . $this->name . ', ' . $this->number . ', '
            . $this->description . ', ' . $this->location . ')';*/
        return 'Test';
    }

    public function testFunction(): void
    {
        echo 'test';
    }
}

$test = new Equipment("test equipment", 1, "Here's a description", "Outside");
echo $test;