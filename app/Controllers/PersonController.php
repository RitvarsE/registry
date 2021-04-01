<?php


namespace App\Controllers;


use App\Services\Persons\StorePersonRequest;
use App\Services\Persons\StorePersonService;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class PersonController
{
    private StorePersonService $service;
    private FilesystemLoader $loader;
    private Environment $twig;

    public function __construct(StorePersonService $service)
    {
        $this->service = $service;
        $this->loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($this->loader, [
            'auto_reload' => true,
            'debug' => true,
        ]);
        $this->twig->addExtension(new DebugExtension());
    }

    public function index(): string
    {
        return $this->twig->render('HomeView.twig');
    }

    public function add(): string
    {
        return $this->twig->render('AddView.twig');
    }

    public function addUser(): string
    {
        $name = mb_strtolower($_POST['name'], 'UTF-8');
        $code = $_POST['code'];
        $description = $_POST['description'];
        $age = $_POST['age'];
        $address = mb_strtolower($_POST['address'], 'UTF-8');

        if ($this->validID($_POST['code'])) {
            $code = $this->validateID($_POST['code']);
        }
        if ($this->validID($code)
            && $this->validAge($age)
            && $this->validName($name)
            && !$this->service->hasPerson($code, 'code')
        ) {
            $person = $this->service->addPerson(new StorePersonRequest($code, $name, $description, $age, $address));
            return $this->twig->render('SuccessView.twig', ['operation' => 'added', 'person' => [$person->toArray()]]);
        }

        return $this->twig->render('ErrorView.twig');

    }

    public function delete(): string
    {
        return $this->twig->render('DeleteView.twig');
    }

    public function deleteUser(): string
    {
        $request = $_POST['id'];

        if ($this->service->hasPerson($request, 'code')) {
            $person = $this->service->findPerson($request, 'code');
            $this->service->deletePerson($request);
            return $this->twig->render('SuccessView.twig', ['operation' => 'deleted', 'person' => $person]);
        }

        return $this->twig->render('NothingView.twig');
    }

    public function search(): string
    {
        return $this->twig->render('SearchByView.twig');
    }

    public function searchUser(): string
    {
        $type = $_POST['type'];
        return $this->twig->render('SearchView.twig', ['type' => $type]);
    }

    public function findPersons(): string
    {
        $type = $_POST['type'];
        $request = mb_strtolower($_POST['search'], 'UTF-8');

        if ($type === 'code' && $this->validID($request)) {
            $request = $this->validateID($request);
        }

        $persons = $this->service->findPerson($request, $type);

        if ($this->service->hasPerson($request, $type)) {
            return $this->twig->render('FoundPersons.twig', ['persons' => $persons]);
        }

        return $this->twig->render('NothingView.twig');
    }

    public function update(): string
    {
        return $this->twig->render('UpdateView.twig');
    }

    public function updateUser(): string
    {
        [$request, $note] = $_POST['data'];

        if ($this->validID($request)) {
            $request = $this->validateID($request);
        }

        if ($this->service->hasPerson($request, 'code')) {
            $this->service->updatePerson($_POST['data']);
            $person = $this->service->findPerson($request, 'code');
            return $this->twig->render('SuccessView.twig', ['operation' => 'updated', 'person' => $person]);
        }

        return $this->twig->render('NothingView.twig');
    }

    public function error(): string
    {
        return $this->twig->render('ErrorView.twig');
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

    public function printAllPersons(): void
    {
        $persons = $this->service->printAllPersons();
        echo $this->twig->render('AllPersonsView.twig', ['persons' => $persons]);
    }
}