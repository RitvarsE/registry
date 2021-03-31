<?php


namespace App\Repositories\Persons;


use App\Models\Person;
use PDOStatement;

interface PersonsRepository
{
    public function delete(string $person): PDOStatement;

    public function searchByAge(string $age): array;

    public function searchByName(string $name): array;

    public function searchByAddress(string $address): array;

    public function add(array $person): void;

    public function update(array $person): PDOStatement;

    public function hasUser(string $person): bool;
}