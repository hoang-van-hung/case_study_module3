<?php


namespace App\Http\Repositories;


use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductRepository
{
    function getAll()
    {
        return Product::orderBy('id','DESC')->paginate(8);
    }

    function getById($id)
    {
        return Product::findOrFail($id);
    }

    function store($product)
    {
        $product->save();
    }

    function delete($product)
    {
        DB::beginTransaction();
        try {
            Storage::disk('public')->delete($product->img);
            $product->delete();
            DB::commit();
        }catch (\Exception $exception){
            $exception->getMessage();
            DB::rollBack();

        }
    }

}

