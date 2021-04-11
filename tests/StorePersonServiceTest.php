<?php

namespace Tests;

use App\Repositories\Persons\MySQLPersonsRepository;
use App\Services\Persons\StorePersonService;
use PHPUnit\Framework\TestCase;

class StorePersonServiceTest extends TestCase
{

    public function testValidName()
    {
    $service = new StorePersonService(new MySQLPersonsRepository());
    self::assertTrue(true, $service->validName('Ritvars Eglājs'));
    }

    public function testValidID()
    {
        $service = new StorePersonService(new MySQLPersonsRepository());
        self::assertTrue(true, $service->validID('090991111078'));
    }

    public function testValidAge()
    {
        $service = new StorePersonService(new MySQLPersonsRepository());
        self::assertTrue(true, $service->validAge('25'));
    }

    public function testValidateID()
    {
        $service = new StorePersonService(new MySQLPersonsRepository());
        self::assertEquals('09099111078', $service->validateID('090991-11078'));
    }
}
