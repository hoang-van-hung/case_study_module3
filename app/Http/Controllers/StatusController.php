<?php

namespace App\Http\Controllers;

use App\Http\Services\StatusService;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    protected $statusSer;
    public function __construct(StatusService $statusService)
    {
        $this->statusSer = $statusService;
    }
    function index()
    {
        $statuses = $this->statusSer->getAll();
        return view('admin.statuses.list',compact('statuses'));
    }

}
