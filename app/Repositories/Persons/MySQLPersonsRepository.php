<?php


namespace App\Repositories\Persons;


use App\Models\Person;
use Medoo\Medoo;
use PDO;

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

    public function delete(string $person): void
    {
        $this->database->delete("registry", ['code' => $person]);
    }

    public function search(array $person): void
    {
        // TODO: Implement search() method.
    }

    public function searchByName(string $name): array
    {
        return $this->database->select("registry",["name", "code", "age", "address","description"], [
            "name[~]" => $name
        ]);
    }

    public function searchByAge(string $age): array
    {
        return $this->database->select("registry",["name", "code", "age", "address","description"], [
            "age" => $age
        ]);
    }

    public function searchByAddress(string $address): array
    {
        return $this->database->select("registry",["name", "code", "age", "address","description"], [
            "address[~]" => $address
        ]);
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

    public function update(array $person): void
    {
        // TODO: Implement update() method.
    }
}