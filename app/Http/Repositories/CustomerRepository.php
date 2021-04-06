<?php


namespace App\Http\Repositories;

use App\Http\Services\CustomerService;
use App\Models\Customer;

class CustomerRepository extends Repository
{
    function getAll()
    {
        return Customer::orderBy('id','DESC')->paginate(3);
    }

    function getByID($id)
    {
        return Customer::findOrFail($id);
    }



    function store($customer)
    {
        $customer->save();
    }

    function delete($customer)
    {
        $customer->delete();
    }
}
