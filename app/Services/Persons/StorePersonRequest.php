<?php


namespace App\Services\Persons;


class StorePersonRequest
{
    private string $code;
    private string $name;
    private string $description;
    private string $age;
    private string $address;

    public function __construct(
        string $code,
        string $name,
        string $description,
        string $age,
        string $address)
    {
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
        $this->age = $age;
        $this->address = $address;

    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

}