<?php

namespace CustomFramework\Controller;

 use CustomFramework\Repository\TestRepository;

class HomeController
{
    private $repository;

    public function __construct(
        TestRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function index()
    {
        $data = $this->repository->get();
        echo json_encode($data);
    }
}
