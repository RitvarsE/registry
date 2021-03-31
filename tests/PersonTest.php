<?php

namespace App\Models;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testPerson(): void
    {
        $person = new Person('123123-11111', 'Ritvars Eglājs', 'note');

        self::assertEquals('12312311111', $person->getCode());
        self::assertEquals('Ritvars Eglājs', $person->getName());
        self::assertEquals('note', $person->getDescription());
    }
}
