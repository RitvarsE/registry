<?php

namespace Tests;

use App\Models\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testPerson(): void
    {
        $person = new Person('123123-11111', 'Ritvars Eglājs', 'note', 30, 'Sigulda');

        self::assertEquals('12312311111', $person->getCode());

        self::assertEquals('Ritvars Eglājs', $person->getName());

        self::assertEquals('note', $person->getDescription());

        self::assertEquals(30, $person->getAge());

        self::assertEquals('Sigulda', $person->getAddress());

        self::assertEquals(['code' => '12312311111',
            'name' => 'Ritvars Eglājs',
            'description' => 'note',
            'age' => '30',
            'address' => 'Sigulda'], $person->toArray());
    }
}
