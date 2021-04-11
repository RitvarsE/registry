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

    public function deleteOldToken(): void
    {
        $this->tokenRepository->deleteOldToken();
    }

    public function getToken(string $request): string
    {
        return $this->tokenRepository->getToken($request);
    }

    public function verifyToken(string $request): bool
    {
        return $this->tokenRepository->verifyToken($request);
    }

    public function getId(string $request): ?string
    {
        return $this->tokenRepository->getId($request);
    }
}