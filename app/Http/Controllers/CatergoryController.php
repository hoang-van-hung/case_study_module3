<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CatergoryController extends Controller
{
    protected $categorySer;

    public function __construct(CategoryService $categoryService)
    {
        $this->categorySer = $categoryService;
    }

    public function index()
    {
        $categories = $this->categorySer->getAll();
//        return view('admin.category.list',compact('categories'));
    }
}
