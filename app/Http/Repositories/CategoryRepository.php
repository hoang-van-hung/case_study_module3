<?php


namespace App\Http\Repositories;


use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryRepository extends Repository
{
    function getAll()
    {
        return Category::all();
    }

    function getById($id)
    {
        return Category::findOrFail($id);
    }

    function store($category)
    {
        $category->save();
    }

    function delete($category)
    {
        $category->delete();
    }

}
