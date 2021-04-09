<?php


namespace App\Repositories\Token;


interface TokenRepository
{
    public function findToken(string $request): array;
    public function addToken(array $request): void;

}