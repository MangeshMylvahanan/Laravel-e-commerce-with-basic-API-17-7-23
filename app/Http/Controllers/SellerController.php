<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{
    public function Dashboard()
    {
        return view('seller.dashboard');
    }
    public function AddProducts()
    {
        return view('seller.productsadd');
    }
    public function MyProducts()
    {
        try {
            $userId = Session::get('user')['id'];
            $products = DB::table('products')->where('seller_name', $userId)->get();
            return view('seller.myproducts', ['products' => $products]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to view myproducts page in seller'], 500);
        }
    }
}
