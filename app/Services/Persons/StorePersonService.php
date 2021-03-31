<?php


namespace App\Services\Persons;


use App\Models\Person;
use App\Repositories\Persons\PersonsRepository;

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

    public function findPersonByName(string $request): array
    {
        return $this->personsRepository->searchByName($request);
    }

    public function findPersonByAge(string $request): array
    {
        return $this->personsRepository->searchByAge($request);
    }

    public function findPersonByAddress(string $request): array
    {
        return $this->personsRepository->searchByAddress($request);
    }
    public function deletePerson(string $request): void
    {
        $this->personsRepository->delete($request);
    }
}