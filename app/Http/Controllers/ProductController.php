<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    protected $productSer;
    protected $categorySer;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productSer = $productService;
        $this->categorySer = $categoryService;
    }

    public function index()
    {
        $products = $this->productSer->getAll();
        return view('admin.products.list',compact('products'));
    }
    public function show() {
        $products = $this->productSer->getAll();
        return view('frontend.home',compact('products'));
    }

    public function getById($id)
    {
        $items = $this->productSer->getAll();
        $product= $this->productSer->getById($id);

        return view('frontend.product_detail.detail',compact('items','product'));

    }

    public function create()
    {

        $categories = $this->categorySer->getAll();
        return view('admin.products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->productSer->store($request);
        return redirect()->route('products.index');

    }

    public function edit($id)
    {
        $product = $this->productSer->getById($id);
        $categories = $this->categorySer->getAll();
        return view('admin.products.edit',compact('product', 'categories'));

    }

    public function update(Request $request, $id)
    {
        $this->productSer->update($id, $request);
        return redirect()->route('products.index');
    }

    public function delete($id)
    {
        $this->productSer->delete($id);
        return redirect()->route('products.index');
    }

}
