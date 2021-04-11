<?php


namespace App\Repositories\Token;


interface TokenRepository
{
    public function findToken(string $request): array;

    public function addToken(array $request): void;

    public function deleteOldToken(): void;

    public function checkToken(string $request): bool;

    public function getToken(string $request): string;

    public function verifyToken(string $request): bool;

    public function getId(string $request): ?string;
}