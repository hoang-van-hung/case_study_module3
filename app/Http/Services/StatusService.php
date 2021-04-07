<?php


namespace App\Http\Services;


use App\Http\Repositories\StatusRepository;

class StatusService
{
    protected $statusRepo;
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepo= $statusRepository;
    }

    function getAll()
    {
        return $this->statusRepo->getAll();
    }

}
