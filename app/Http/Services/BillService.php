<?php


namespace App\Http\Services;


use App\Http\Repositories\BillRepository;

class BillService
{
    protected $billRepo;
    public function __construct(BillRepository $billRepository)
    {
        $this->billRepo = $billRepository;
    }

    function getAll()
    {
        return $this->billRepo->getAll();
    }
    function getById($id)
    {
        return $this->billRepo->getById($id);
    }

}
