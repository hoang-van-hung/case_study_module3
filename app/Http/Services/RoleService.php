<?php


namespace App\Http\Services;


use App\Http\Repositories\RoleRepository;
use App\Models\Role;
use http\Env\Request;

class RoleService
{
    protected $roleRepo;

    public function __construct(RoleRepository $repository)
    {
        $this->roleRepo = $repository;
    }

    public function getAll()
    {
        return $this->roleRepo->getAll();
    }

    public function getById($id)
    {
        return $this->roleRepo->getById($id);
    }

    public function store($request)
    {
        $role = new Role();
        $role->fill($request->all());
        $this->roleRepo->store($role);
    }

    function update($id, Request $request)
    {
        $role = $this->roleRepo->getById($id);
        $role->fill($request->all());
        $this->roleRepo->store($role);

    }

    function delete($id)
    {
        $this->roleRepo->delete($id);
    }


}
