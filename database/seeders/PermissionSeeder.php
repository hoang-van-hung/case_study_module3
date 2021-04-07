<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission =  new Permission();
        $permission->name ='Product';
        $permission->description ='Product';
        $permission->parent_id= 0;
        $permission->save();

        $permission =  new Permission();
        $permission->name ='Product List';
        $permission->description ='Product List';
        $permission->parent_id= 1;
        $permission->save();

        $permission =  new Permission();
        $permission->name ='Product Add';
        $permission->description ='Product Add';
        $permission->parent_id= 1;
        $permission->save();

        $permission =  new Permission();
        $permission->name ='Product Update';
        $permission->description ='Product Update';
        $permission->parent_id= 1;
        $permission->save();

        $permission =  new Permission();
        $permission->name ='Product Delete';
        $permission->description ='Product Delete';
        $permission->parent_id= 1;
        $permission->save();

        $permission =  new Permission();
        $permission->name ='bills';
        $permission->description ='bills';
        $permission->parent_id= 0;
        $permission->save();

        $permission =  new Permission();
        $permission->name ='bills List';
        $permission->description ='bills List';
        $permission->parent_id= 6;
        $permission->save();

        $permission =  new Permission();
        $permission->name ='bills Add';
        $permission->description ='bills Add';
        $permission->parent_id= 6;
        $permission->save();

        $permission =  new Permission();
        $permission->name ='bills Update';
        $permission->description ='bills Update';
        $permission->parent_id= 6;
        $permission->save();

        $permission =  new Permission();
        $permission->name ='bills Delete';
        $permission->description ='bills Delete';
        $permission->parent_id= 6;
        $permission->save();
    }
}
