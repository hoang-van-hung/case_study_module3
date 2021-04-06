<?php


namespace App\Http\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserRepository extends Repository
{
    function getAll()
    {
        return User::orderBy('id','DESC')->paginate(3);
    }

    function findById($id)
    {
        return User::findOrFail($id);
    }

    function store($user, $roles)
    {
        DB::beginTransaction();
        try {
            $user->save();
            $user->roles()->sync($roles);
            DB::commit();
        } catch (\Exception $exception) {
            $exception->getMessage();
            DB::rollBack();
        }

    }

    function delete($user)
    {
        $user->delete();
    }

    function restore($user)
    {
        $user->restore();
    }

}
