<?php


namespace App\Repositories\Persons;


use PDOStatement;

interface PersonsRepository
{
    public function delete(string $person): PDOStatement;

    public function search(string $request, string $type): ?array;

    public function add(array $person): void;

    public function update(array $person): PDOStatement;

    public function hasUser(string $request, string $type): bool;

    public function printAllPersons(): array;
}