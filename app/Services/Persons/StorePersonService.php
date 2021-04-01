<?php


namespace App\Services\Persons;


use App\Models\Person;
use App\Repositories\Persons\PersonsRepository;
use PDOStatement;

class StorePersonService
{
    private PersonsRepository $personsRepository;

    public function __construct(PersonsRepository $personsRepository)
    {
        $this->personsRepository = $personsRepository;
    }

    public function addPerson(StorePersonRequest $request): Person
    {
        $person = new Person(
            $request->getCode(),
            $request->getName(),
            $request->getDescription(),
            $request->getAge(),
            $request->getAddress()
        );
        $this->personsRepository->add($person->toArray());
        return $person;
    }

    public function findPerson(string $request, string $type): array
    {
        return $this->personsRepository->search($request, $type);
    }

    public function deletePerson(string $request): PDOStatement
    {
        return $this->personsRepository->delete($request);
    }

    public function updatePerson(array $request): PDOStatement
    {
        return $this->personsRepository->update($request);
    }

    public function hasPerson(string $request, string $type): bool
    {
        return $this->personsRepository->hasUser($request, $type);
    }
    public function printAllPersons(): array
    {
        return $this->personsRepository->printAllPersons();
    }
}