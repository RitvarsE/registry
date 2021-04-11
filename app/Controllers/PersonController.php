<?php


namespace App\Controllers;


use App\Services\Main\MainService;

class PersonController
{
    private MainService $mainService;

    public function __construct(MainService $mainService)
    {
        $this->mainService = $mainService;
    }

    public function login(): string
    {
         return $this->mainService->loginView();
    }

    public function loginauth(): string
    {
        return $this->mainService->loginAuthorisationView();
    }
    public function loginVerify(): void
    {
        $this->mainService->loginVerify();
    }
    public function dashboard(): string
    {
        return $this->mainService->dashBoard();
    }

    public function index(): string
    {
        return $this->mainService->index();
    }

    public function add(): string
    {
        return $this->mainService->add();
    }

    public function addUser(): string
    {
        return $this->mainService->addUser();
    }

    public function delete(): string
    {
        return $this->mainService->delete();
    }

    public function deleteUser(): string
    {
        return $this->mainService->deleteUser();
    }


    public function search(): string
    {
        return $this->mainService->search();
    }

    public function searchUser(): string
    {
        return $this->mainService->searchUser();
    }

    public function findPersons(): string
    {
        return $this->mainService->findPersons();
    }

    public function update(): string
    {
        return $this->mainService->update();
    }

    public function updateUser(): string
    {
        return $this->mainService->updateUser();
    }

    public function error(): string
    {
        return $this->mainService->error();
    }

    public function printAllPersons(): string
    {
        return $this->mainService->printAllPersons();
    }
}