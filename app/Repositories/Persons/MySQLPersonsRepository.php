<?php


namespace App\Repositories\Persons;

use Medoo\Medoo;
use PDO;
use PDOStatement;

class MySQLPersonsRepository implements PersonsRepository
{
    private Medoo $database;

    public function __construct()
    {
        $pdo = new PDO('mysql:dbname=registry;host=localhost', 'root', 'kartupelis');
        $this->database = new Medoo([
            'pdo' => $pdo,
            'database_type' => 'mysql'
        ]);
    }

    public function delete(string $person): PDOStatement
    {
        return $this->database->delete("registry", ['code' => $person]);
    }

    public function search(string $request, string $type): ?array
    {
        if ($type === 'name') {
            return $this->database->select("registry", ["name", "code", "age", "address", "description"], [
                "name[~]" => $request
            ]);
        }

        if ($type === 'age') {
            return $this->database->select("registry", ["name", "code", "age", "address", "description"], [
                "age" => $request
            ]);
        }

        if ($type === 'address') {
            return $this->database->select("registry", ["name", "code", "age", "address", "description"], [
                "address[~]" => $request
            ]);
        }
        if ($type === 'code') {
            return $this->database->select("registry", ["name", "code", "age", "address", "description"], [
                "code" => $request
            ]);
        }
        return null;
    }

    public function add(array $person): void
    {
        $this->database->insert("registry", [
            "name" => $person['name'],
            "code" => $person['code'],
            "age" => $person['age'],
            "description" => $person['description'],
            "address" => $person['address']
        ]);
    }

    public function update(array $person): PDOStatement
    {
        [$id, $note] = $person;
        return $this->database->update("registry", ['description' => $note], ['code' => $id]);
    }

    public function hasUser(string $request, string $type): bool
    {
        if ($type === 'name') {
            return $this->database->has('registry', ["name[~]" => $request]);
        }
        if ($type === 'age') {
            return $this->database->has('registry', ["age" => $request]);
        }
        if ($type === 'address') {
            return $this->database->has('registry', ["address[~]" => $request]);
        }
        if ($type === 'code') {
            return $this->database->has('registry', ["code" => $request]);
        }
        return false;
    }

    public function printAllPersons(): array
    {
        return $this->database->select('registry', ["name", "code", "age", "address", "description"]);
    }
}