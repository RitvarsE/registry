<?php


namespace App\Repositories\Token;


use ErrorException;
use Medoo\Medoo;
use PDO;

class MySQLTokenRepository implements TokenRepository
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

    public function findToken(string $request): array
    {
        return $this->database->select("tokens", ["code", "token", "time"], [
            "code[~]" => $request]);
    }

    public function checkToken(string $request): bool
    {
        return $this->database->has("tokens", ["code" => $request, "time[>]" => time()]);
    }

    public function addToken(array $request): void
    {
        [$code, $token] = $request;
        $this->database->insert("tokens", ["code" => $code, "token" => $token, "time" => time() + 900]);
    }
}