<?php


namespace App\Controllers;


use App\Services\Persons\StorePersonRequest;
use App\Services\Persons\StorePersonService;

class PersonController
{
    private StorePersonService $service;

    public function __construct(StorePersonService $service)
    {
        $this->service = $service;
    }

    public function index(): void
    {

    }

    public function add(): void
    {
        require_once '../app/Views/AddView.twig';
    }

    public function delete(): void
    {
        require_once '../app/Views/DeleteView.php';
    }

    public function search(): void
    {
        require_once '../app/Views/SearchView.twig';
    }

    public function update(): void
    {
        require_once '../app/Views/UpdateView.twig';
    }

    public function error(): void
    {
        require_once '../app/Views/errorView.twig';
    }

    public function addUser(): void
    {
        $name = $_POST['name'];
        $code = $_POST['code'];
        $description = $_POST['description'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $splittedCode = explode('-', $code);
        $splittedName = explode(' ', $name);
        if (((ctype_digit($code)
                    && strlen($code) === 11)
                || (isset($splittedCode[1])
                    && ctype_digit($splittedCode[0])
                    && ctype_digit($splittedCode[1])
                    && strlen($code) === 12))
            &&
            (ctype_digit($age)
                && (int)$age > 0
                && (int)$age < 123)
            && (isset($splittedName[1])
                && preg_match('/^\p{Latin}+$/u', $splittedName[0])
                && preg_match('/^\p{Latin}+$/u', $splittedName[1]))
        ) {
            $this->service->addPerson(new StorePersonRequest($code, $name, $description, $age, $address));

        } else {
            header('Location: /error');
        }

    }

    public function deleteUser(): void
    {
    $this->service->deletePerson($_POST['id']);
    }

    public function updateUser(): void
    {

    }

    public function searchByName(): void
    {
        require_once '../app/Views/SearchNameView.twig';
    }

    public function searchByAge(): void
    {
        require_once '../app/Views/SearchAgeView.twig';
    }

    public function searchByAddress(): void
    {
        require_once '../app/Views/SearchAddressView.twig';
    }
    public function foundByName(): void
    {
        $persons = $this->service->findPersonByName($_POST['name']);
        require_once '../app/Views/foundPersons.php';

    }
    public function foundByAge():void
    {
        $persons = $this->service->findPersonByAge($_POST['age']);
        require_once '../app/Views/foundPersons.php';
    }
    public function foundByAddress():void
    {
        $persons = $this->service->findPersonByAddress($_POST['address']);
        require_once '../app/Views/foundPersons.php';
    }
    public function store(): string
    {
        //validation for $_POST;
        $person = $this->service->addPerson(
            new StorePersonRequest(
                $_POST['code'],
                $_POST['name'],
                $_POST['description'],
                $_POST['age'],
                $_POST['address']
            ));
        return json_encode($person->toArray(), JSON_THROW_ON_ERROR);
    }
}