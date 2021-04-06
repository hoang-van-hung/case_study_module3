<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $user = auth()->user();
        return view('layouts.core.home',compact('products','user'));
    }

    function admin() {
        if (Gate::allows('isAdmin')) {
            return view('layouts.core.home');
        }else {
            abort(403);
        }

    }
    function logout() {
        Auth::logout();
        return redirect('/');
    }
}
