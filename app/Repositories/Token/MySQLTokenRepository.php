<?php


namespace App\Repositories\Token;


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
        return $this->database->has("tokens", ["code" => $request]);
    }

    public function deleteOldToken(): void
    {
        $this->database->delete("tokens", ["time[<]" => time()]);
    }

    public function addToken(array $request): void
    {
        [$code, $token] = $request;
        $this->database->insert("tokens", ["code" => $code, "token" => $token, "time" => time() + 300]);
    }

    public function getToken(string $request): string
    {
        return $this->database->get("tokens", "token", ["code" => $request]);
    }

    public function verifyToken(string $request): bool
    {
        return $this->database->has("tokens", ["token" => $request]);
    }

    public function getId(string $request): ?string
    {
        return $this->database->get("tokens", "code", ["token" => $request]);
    }
}