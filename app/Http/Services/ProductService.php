<?php


namespace App\Http\Services;


use App\Http\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductService extends BaseService
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepo->getAll();
    }

    public function getById($id)
    {
        return $this->productRepo->getById($id);
    }

    public function store($request)
    {
        $product = new Product();
        $product->fill($request->all());
        $path = $this->updateLoadFile($request, 'image', 'product');
        $product->img = $path;
        $this->productRepo->store($product);

    }

    public function update($id, $request)
    {
        $product = $this->productRepo->getById($id);
        $product->fill($request->all());
        if ($request->hasfile('image')) {
            Storage::disk('public')->delete($product->img);
            $path = $this->updateLoadFile($request, 'image', 'product');
            $product->img = $path;
        }
        $this->productRepo->store($product);
    }

    public function delete($id)
    {
        $product = $this->productRepo->getById($id);
        $this->productRepo->delete($product);
    }

}
