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

    public function index(): void
    {

    }

    public function add(): void
    {
        echo $this->twig->render('AddView.twig');
    }

    public function delete(): void
    {
        echo $this->twig->render('DeleteView.twig');
    }

    public function search(): void
    {
        echo $this->twig->render('SearchView.twig');
    }

    public function update(): void
    {
        echo $this->twig->render('UpdateView.twig');
    }

    public function error(): void
    {
        echo $this->twig->render('errorView.twig');
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
            && $this->service->hasPerson($_POST['code'])
        ) {
            $this->service->addPerson(new StorePersonRequest($code, $name, $description, $age, $address));
            echo $this->twig->render('successView.twig');
        } else {
            echo $this->twig->render('errorView.twig');
        }

    }

    public function deleteUser(): void
    {
        $data = $this->service->deletePerson($_POST['id']);
        if ($data->rowCount() > 0) {
            $this->service->deletePerson($_POST['id']);
            echo $this->twig->render('successView.twig');
        } else {
            echo $this->twig->render('NothingView.twig');
        }
    }

    public function updateUser(): void
    {
        $data = $this->service->updatePerson($_POST['data']);
        if ($data->rowCount() > 0) {
            $this->service->updatePerson($_POST['data']);
            echo $this->twig->render('successView.twig');
        } else {
            echo $this->twig->render('NothingView.twig');
        }
    }

    public function searchByName(): void
    {
        echo $this->twig->render('SearchNameView.twig');
    }

    public function searchByAge(): void
    {
        echo $this->twig->render('SearchAgeView.twig');
    }

    public function searchByAddress(): void
    {
        echo $this->twig->render('SearchAddressView.twig');
    }

    public function foundByName(): void
    {
        $persons = $this->service->findPersonByName($_POST['name']);
        if (empty($persons)) {
            echo $this->twig->render('NothingView.twig');
        } else {
            echo $this->twig->render('foundPersons.twig', ['persons' => $persons]);
        }

    }

    public function foundByAge(): void
    {
        $persons = $this->service->findPersonByAge($_POST['age']);
        if (empty($persons)) {
            echo $this->twig->render('NothingView.twig');
        } else {
            echo $this->twig->render('foundPersons.twig', ['persons' => $persons]);
        }
    }

    public function foundByAddress(): void
    {
        $persons = $this->service->findPersonByAddress($_POST['address']);
        if (empty($persons)) {
            echo $this->twig->render('NothingView.twig');
        } else {
            echo $this->twig->render('foundPersons.twig', ['persons' => $persons]);
        }
    }
}