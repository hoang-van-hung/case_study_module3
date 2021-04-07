<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerSer;

    public function __construct(CustomerService $customerService)
    {
        $this->customerSer = $customerService;
    }

    function index()
    {

        $customers = $this->customerSer->getAll();
        return view('admin.customers.list',compact('customers'));
    }

    function create()
    {
        return view('admin.customers.create');
    }

    function store(CreateCustomerRequest $request)
    {
        $this->customerSer->store($request);
        return redirect()->route('customer.index');
    }

    function edit($id)
    {
        $customer = $this->customerSer->getById($id);
        return view('admin.customers.edit',compact('customer'));

    }
    function update($id, Request $request)
    {
        $this->customerSer->update($id, $request);
        return redirect()->route('customer.index');
    }


    function delete($id)
    {
        $this->customerSer->delete($id);
        return redirect()->route('customer.index');
    }
}

