<?php

namespace App\Http\Controllers;

use App\Http\Services\BillService;
use App\Http\Services\StatusService;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $billSer;
    protected $statusSer;

    public function __construct(BillService $billService,StatusService $statusService)
    {
        $this->billSer =$billService;
        $this->statusSer= $statusService;
    }

    public function index()
    {
        $statuses = $this->statusSer->getAll();
        $bills = $this->billSer->getAll();
        return view('admin.bills.list',compact('bills','statuses'));
    }
    public function showDetail($id)
    {
        $statuses = $this->statusSer->getAll();
        $bills =$this->billSer->getById($id);
        return view('admin.bills.detail',compact('bills','statuses'));
    }
}
