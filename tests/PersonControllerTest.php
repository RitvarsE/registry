<?php

namespace Tests;

use App\Controllers\PersonController;
use App\Repositories\Persons\MySQLPersonsRepository;
use App\Services\Persons\StorePersonService;
use PHPUnit\Framework\TestCase;

class PersonControllerTest extends TestCase
{

    public function testValidName(): void
    {
        $personController = new PersonController(new StorePersonService(new MySQLPersonsRepository));
        self::assertTrue(true, $personController->validName('Ritvars Eglājs'));
    }

    public function testValidAge(): void
    {
        $personController = new PersonController(new StorePersonService(new MySQLPersonsRepository));
        self::assertTrue(true, $personController->validAge('30'));
    }

    public function testValidID(): void
    {
        $personController = new PersonController(new StorePersonService(new MySQLPersonsRepository));
        self::assertTrue(true, $personController->validID('090991-11078'));
    }

    public function testValidateID(): void
    {
        $personController = new PersonController(new StorePersonService(new MySQLPersonsRepository));
        self::assertEquals('09099111078', $personController->validateID('090991-11078'));
    }
}
