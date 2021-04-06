<?php


namespace App\Http\Controllers;

use App\Http\Requests\CreatUserRequest;
use App\Http\Services\UserService;
use App\Http\Services\RoleService;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

class UserController extends Controller
{
    protected  $userService;

    protected $roleService;

    public function __construct(UserService $userService,RoleService $roleService )
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    function index()
    {
        $users = $this->userService->getAll();
        return view('admin.users.list', compact('users'));
    }

    function create() {
        $roles = $this->roleService->getAll();
        return view('admin.users.add', compact( 'roles'));
    }

    function store(Request $request) {
        $this->userService->store($request);
        return redirect()->route('users.index');
    }

    function edit($id) {
        $roles =  $this->roleService->getAll();
        $user = $this->userService->getById($id);
        return view('admin.users.edit', compact('user','roles'));
    }

    function update($id, Request $request)
    {
        $this->userService->update($id, $request);
        return redirect()->route('users.index');
    }

    function delete($id)
    {
        $this->userService->delete($id);
        return redirect()->route('users.index');

    }

    public  function restore($id)
    {
        $this->userService->restore($id);
        return redirect()->route('users.index');
    }
}
