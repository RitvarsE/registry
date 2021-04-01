<?php

namespace Tests;

use App\Services\Persons\StorePersonRequest;
use PHPUnit\Framework\TestCase;

class StorePersonRequestTest extends TestCase
{

    public function testGetAddress(): void
    {
        $person = new StorePersonRequest('123123-11111',
            'Ritvars Eglājs',
            'note',
            30,
            'Sigulda');
        self::assertEquals('Sigulda', $person->getAddress());
    }

    public function testGetCode(): void
    {
        $person = new StorePersonRequest('123123-11111',
            'Ritvars Eglājs',
            'note',
            30,
            'Sigulda');
        self::assertEquals('123123-11111', $person->getCode());
    }

    public function testGetName(): void
    {
        $person = new StorePersonRequest('123123-11111',
            'Ritvars Eglājs',
            'note',
            30,
            'Sigulda');

        self::assertEquals('Ritvars Eglājs', $person->getName());
    }

    public function testGetAge(): void
    {
        $person = new StorePersonRequest('123123-11111',
            'Ritvars Eglājs',
            'note',
            30,
            'Sigulda');
        self::assertEquals(30, $person->getAge());
    }

    public function testGetDescription(): void
    {
        $person = new StorePersonRequest('123123-11111',
            'Ritvars Eglājs',
            'note',
            30,
            'Sigulda');
        self::assertEquals('note', $person->getDescription());
    }
}
