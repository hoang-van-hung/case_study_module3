<?php

namespace App\Http\Controllers;

use App\Http\Services\RoleService;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;
    protected $permission;

    public function __construct(RoleService $roleService,Permission $permission)
    {
        $this->roleService = $roleService;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->roleService->getAll();
        return view('admin.role.list', compact('roles'));

    }
    public function getById($id)
    {
        return $this->roleService->getById($id);
    }

    function create()
    {
        $permissionParent = $this->permission->where('parent_id',0)->get();
        return view('admin.role.create', compact('permissionParent'));
    }

    function store(Request $request)
    {
        $this->roleService->store($request);
        return redirect()->route('admin.role.list');
    }
    function edit($id)
    {
        $role = $this->roleService->getById($id);
        return view('admin.role.edit',compact('role'));
    }

    function update($id,Request $request)
    {
        $this->roleService->update($id,$request);
        return redirect()->route('admin.role.list');

    }

    function  delete($id)
    {
        $this->roleService->delete($id);
    }
}
