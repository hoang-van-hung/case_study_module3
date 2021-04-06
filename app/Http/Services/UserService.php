<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use MongoDB\Driver\Session;

class UserService extends BaseService
{
    protected  $userRepo;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    function getAll()
    {
        return $this->userRepo->getAll();
    }

    function getById($id) {
        return $this->userRepo->findById($id);
    }

    function store($request) {
        $user = new User();
        $user->fill($request->all());
        $path = $this->updateLoadFile($request, 'image', 'Image');
        $user->image = $path;
        $roles = $request->role_id;
        $user->password = Hash::make($request->password);

        $this->userRepo->store($user, $roles);
    }

    function update($id, $request)
    {
        $user = $this->userRepo->findById($id);
        $user->fill($request->all());
        $roles = $request->role_id;
        /*$path = $this->updateLoadFile($request, 'image', 'Image');
        $user->image = $path;*/
        $this->userRepo->store($user, $roles);
    }

    function delete($id)
    {
        $user = $this->userRepo->findById($id);
        $this->userRepo->delete($user);

    }
    function restore($id)
    {
        $user = $this->userRepo->findById($id)->withTrashed()->first();
        $this->userRepo->restore($user);
    }
}
