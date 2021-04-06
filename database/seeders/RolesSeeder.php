<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role =new Role();
        $role->name ="admin";
        $role->description ='Quan tri he thong';
        $role->save();

        $role =new Role();
        $role->name ="developer";
        $role->description ='phat trien he thong';
        $role->save();

        $role =new Role();
        $role->name ="content";
        $role->description ='Xay dung noi dung';
        $role->save();

        $role =new Role();
        $role->name ="guest";
        $role->description ='khach hang';
        $role->save();

    }
}
