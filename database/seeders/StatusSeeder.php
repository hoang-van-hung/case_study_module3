<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status();
        $status->name = "Ordering";
        $status->save();

        $status = new Status();
        $status->name = "Proceesing";
        $status->save();

        $status = new Status();
        $status->name = "Shipped";
        $status->save();

        $status = new Status();
        $status->name = "Cancle";
        $status->save();

    }
}
