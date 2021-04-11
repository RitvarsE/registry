<?php


namespace App\Services\Main;


use App\Services\Persons\StorePersonRequest;
use App\Services\Persons\StorePersonService;
use App\Services\Token\TokenPersonService;
use App\Services\Twig\TwigService;

class MainService
{
    private StorePersonService $service;
    private TwigService $twigService;
    private TokenPersonService $tokenService;

    public function __construct(StorePersonService $service, TokenPersonService $tokenService, TwigService $twigService)
    {
        session_start();
        $this->tokenService = $tokenService;
        $this->service = $service;
        $this->twigService = $twigService;

        $this->twigService->environment()->addGlobal('session', $_SESSION);
    }

    public function loginView(): string
    {
        $this->tokenService->deleteOldToken();
        if (isset($_SESSION['userid']) && $this->tokenService->checkToken($_SESSION['userid'])) {
            return $this->twigService->environment()->render('DashboardView.twig');
        }
        unset($_SESSION['userid']);
        return $this->twigService->environment()->render('LoginFormView.twig');
    }

    public function loginAuthorisationView(): string
    {
        if (!$this->service->hasPerson($_POST['id'], 'code')) {
            header("refresh:5;url=/login");

            return $this->twigService->environment()->render('ErrorView.twig');

        } elseif ($this->tokenService->checkToken($_POST['id'])) {
            $message = 'You have active token, check your email';

            return $this->twigService->environment()->render('LoginFormView.twig', [
                'auth' => true,
                'id' => $_POST['id'],
                'token' => $this->tokenService->getToken($_POST['id']),
                'message' => $message]);
        } else {
            $message = 'We have sent you a token, please check your email';

            $this->tokenService->addToken([$_POST['id'], $this->tokenService->createToken()]);

            return $this->twigService->environment()->render('LoginFormView.twig', [
                'auth' => true,
                'id' => $_POST['id'],
                'token' => $this->tokenService->getToken($_POST['id']),
                'message' => $message]);
        }
    }

    public function loginVerify(): void
    {
        $_SESSION['userid'] = $_POST['id'];
        if ($this->tokenService->getId($_POST['tokens']) === $_SESSION['userid'] && $this->tokenService->verifyToken($_POST['tokens'])) {
            echo "Success";
            header("refresh:2;url=/dashboard");
        } else {
            echo "Incorrect token";
            unset($_SESSION['userid']);
            header("refresh:5;url=/login");
        }
    }

    public function dashboard(): string
    {
        if (isset($_SESSION['userid'])) {
            $person = $this->service->findPerson($_SESSION['userid'], 'code');
            return $this->twigService->environment()->render('DashboardView.twig',['person' => $person]);
        }
        header("refresh:2;url=/login");
        return "You must login";
    }

    public function index(): string
    {
        if (isset($_POST['logout'])) {
            unset($_SESSION['userid']);
        }
        return $this->twigService->environment()->render('HomeView.twig');
    }

    public function add(): string
    {
        return $this->twigService->environment()->render('AddView.twig');
    }

    public function addUser(): string
    {
        $name = mb_strtolower($_POST['name'], 'UTF-8');
        $code = $_POST['code'];
        $description = $_POST['description'];
        $age = $_POST['age'];
        $address = mb_strtolower($_POST['address'], 'UTF-8');

        if ($this->service->validID($_POST['code'])) {
            $code = $this->service->validateID($_POST['code']);
        }
        if (isset($name, $code, $age, $address)
            && $this->service->validID($code)
            && $this->service->validAge($age)
            && $this->service->validName($name)
            && !$this->service->hasPerson($code, 'code')
        ) {
            $person = $this->service->addPerson(new StorePersonRequest($code, $name, $description, $age, $address));
            return $this->twigService->environment()->render('SuccessView.twig', ['operation' => 'added', 'person' => [$person->toArray()]]);
        }

        return $this->twigService->environment()->render('ErrorView.twig');

    }

    public function delete(): string
    {
        return $this->twigService->environment()->render('DeleteView.twig');
    }

    public function deleteUser(): string
    {
        $request = $_POST['id'];

        if ($this->service->hasPerson($request, 'code')) {
            $person = $this->service->findPerson($request, 'code');
            $this->service->deletePerson($request);
            return $this->twigService->environment()->render('SuccessView.twig', ['operation' => 'deleted', 'person' => $person]);
        }

        return $this->twigService->environment()->render('NothingView.twig');
    }

    public function search(): string
    {
        return $this->twigService->environment()->render('SearchByView.twig');
    }

    public function searchUser(): string
    {
        $type = $_POST['type'];
        return $this->twigService->environment()->render('SearchView.twig', ['type' => $type]);
    }

    public function findPersons(): string
    {
        $type = $_POST['type'];
        $request = mb_strtolower($_POST['search'], 'UTF-8');

        if ($type === 'code' && $this->service->validID($request)) {
            $request = $this->service->validateID($request);
        }

        $persons = $this->service->findPerson($request, $type);

        if ($this->service->hasPerson($request, $type)) {
            return $this->twigService->environment()->render('FoundPersons.twig', ['persons' => $persons]);
        }

        return $this->twigService->environment()->render('NothingView.twig');
    }

    public function update(): string
    {
        return $this->twigService->environment()->render('UpdateView.twig');
    }

    public function updateUser(): string
    {
        [$request, $note] = $_POST['data'];

        if ($this->service->validID($request)) {
            $request = $this->service->validateID($request);
        }

        if ($this->service->hasPerson($request, 'code')) {
            $this->service->updatePerson([$request, $note]);
            $person = $this->service->findPerson($request, 'code');
            return $this->twigService->environment()->render('SuccessView.twig', ['operation' => 'updated', 'person' => $person]);
        }

        return $this->twigService->environment()->render('NothingView.twig');
    }

    public function error(): string
    {
        return $this->twigService->environment()->render('ErrorView.twig');
    }

    public function printAllPersons(): string
    {
        $persons = $this->service->printAllPersons();
        return $this->twigService->environment()->render('AllPersonsView.twig', ['persons' => $persons]);
    }
}