<?php

namespace CustomFramework\Controller;

use CustomFramework\Repository\TestRepository;

class HomeController extends BaseController
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
        
        return $this->render('home', ['rows' => $data]);
    }
}
