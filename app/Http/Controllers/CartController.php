<?php

namespace App\Http\Controllers;

use App\Http\Services\CustomerService;
use App\Http\Services\ProductService;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    protected $customerSer;
    protected $productSer;
    protected $bill_detailSer;
    const BILL_PENDING=1;
    public function __construct(CustomerService $customerService,ProductService $productService)
    {
        $this->customerSer = $customerService;
        $this->productSer = $productService;
//        $this->bill_detailSer = $billDetail;
    }

    function addToCart($id)
    {
        $product = $this->productSer->getById($id);
        $oldCart = session()->get('cart');
        $newCart = new Cart($oldCart);
        $newCart->addProduct($product);
        session()->put('cart', $newCart);
        return back();
    }

    function index()
    {
        $cart = session()->get('cart');
        if($cart)
        {
            return view('frontend.cart.index', compact('cart'));
        }
        return back();
    }

    function removeProduct($id)
    {
        $oldCart = session()->get('cart');
        $newCart = new Cart($oldCart);
        $newCart->deleteProduct($id);
        session()->put('cart', $newCart);
        return back();
    }

    function updateCart(Request $request)
    {

        foreach ($request->quantity_product as $key => $value) {
            $oldCart = session()->get('cart');
            $newCart = new Cart($oldCart);
            $newCart->updateCart($key, $value);
            session()->put('cart', $newCart);
        }

        return back();
    }

    function deleteCart()
    {
        session()->forget('cart');
        return redirect('/');
    }

    function showFormCheckOut()
    {
        $cart = session()->get('cart');
        return view('frontend.cart.checkout',compact('cart'));
    }

    function checkOut(Request $request) {
        $cart = session()->get('cart');

        DB::beginTransaction();

        try {
            $customer = new Customer();
            $customer->fill($request->all());
            $customer->save();

            $bill = new Bill();
            $bill->customer_id = $customer->id;
            $bill->date_pay = date('Y-m-d');
            $bill->status_id = self::BILL_PENDING;
            $bill->total_price = $cart->totalPrice;
            $bill->save();

            foreach ($cart->items as $key => $item) {
                $billDetail = new BillDetail();
                $billDetail->product_id = $key;
                $billDetail->bill_id = $bill->id;
                $billDetail->quantity = $item['totalQty'];
                $billDetail->total_money = $item['totalPrice'];
                $billDetail->save();
            }

            DB::commit();
            session()->forget('cart');
            return redirect('/');
        }catch (\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage());
        }

    }

    function updateProduct(Request $request) {
        $idProduct = $request->idProduct;
        return response()->json();
    }
}
