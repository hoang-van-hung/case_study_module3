<?php

namespace App\Http\Services;


use App\Http\Repositories\CustomerRepository;
use App\Models\Customer;
use http\Env\Request;

class CustomerService
{
    protected $customerRepo;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepo = $customerRepository;
    }

    function getAll()
    {
        return $this->customerRepo->getAll();
    }

    function getById($id)
    {
        return $this->customerRepo->getByID($id);
    }

    function store($request)
    {
        $customer = new Customer();
        $customer->fill($request->all());
        $this->customerRepo->store($customer);
    }

    function update($id, $request)
    {
        $customer = $this->customerRepo->getByID($id);
        $customer->fill($request->all());
        $this->customerRepo->store($customer);

    }



    function delete($id)
    {
        $customer =  $this->customerRepo->getByID($id);
        $this->customerRepo->delete($customer);

    }

}

