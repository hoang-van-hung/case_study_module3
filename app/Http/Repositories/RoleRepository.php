<?php


namespace App\Http\Repositories;


use App\Models\Role;
use Illuminate\Testing\Fluent\Concerns\Has;

class RoleRepository
{
    public function getAll()
    {
        return Role::all();
    }

    public function getById($id)
    {
        return Role::findOrFail($id);
    }

    public function store($request)
    {
        $role = new Role();
        $role->fill($request->all());
        $role->store($role);
    }

    public function delete($role)
    {
        $role->delete();
    }

}
