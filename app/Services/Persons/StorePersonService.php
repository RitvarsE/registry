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
    public function validID(string $id): bool
    {
        $splitId = explode('-', $id);
        if (ctype_digit($id) && strlen($id) === 11) {
            return true;
        }

        if
        (isset($splitId[1])
            && ctype_digit($splitId[0])
            && ctype_digit($splitId[1])
            && strlen($splitId[0]) === 6
            && strlen($splitId[1]) === 5) {
            return true;
        }
        return false;
    }

    public function validAge(string $age): bool
    {
        return ctype_digit($age) && $age > 0 && $age < 123;
    }

    public function validName(string $name): bool
    {
        $splitName = explode(' ', $name);
        return isset($splitName[1])
            && !isset($splitName[2])
            && preg_match('/^\p{Latin}+$/u', $splitName[0])
            && preg_match('/^\p{Latin}+$/u', $splitName[1]);

    }

    public function validateID(string $id): string
    {
        if (strpos($id, '-')) {
            return str_replace('-', '', $id);
        }
        return $id;
    }

}