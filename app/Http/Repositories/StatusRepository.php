<?php


namespace App\Http\Repositories;


use App\Models\Status;

class StatusRepository
{
    function getAll()
    {
        return Status::all();
    }

}
