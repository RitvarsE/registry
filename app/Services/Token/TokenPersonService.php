<?php


namespace App\Services\Token;


use App\Models\Token;
use App\Repositories\Token\TokenRepository;

class TokenPersonService
{
    private TokenRepository $tokenRepository;

    public function __construct(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    public function createToken(): string
    {
        return (new Token)->getToken();
    }

    public function addToken(array $request): void
    {
        $this->tokenRepository->addToken($request);
    }

    public function checkToken(string $request): bool
    {
        return $this->tokenRepository->checkToken($request);
    }
}