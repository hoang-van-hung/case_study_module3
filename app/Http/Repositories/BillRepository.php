<?php


namespace App\Http\Repositories;


use App\Models\Bill;
use Illuminate\Bus\DatabaseBatchRepository;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;

class BillRepository
{

    function getAll()
    {
        return DB::table('overall_bills')->orderBy('id','DESC')->paginate(3);
    }

    function getById($id)
    {
        return DB::table('overall_bills')->where('id','=',$id)
            ->get();
    }

}
