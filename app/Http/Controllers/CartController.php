<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    public function addtocart(Request $request)
    {
        try {
            if ($request->session()->has('user')) {
                $cart = new Cart();
                $cart->product_id = $request->input('product_id');
                $cart->user_id = $request->session()->get('user')['id'];
                $cart->save();
                $total = 0;
                // if (Session::has('user')) {
                //     $userId = Session::get('user')['id'];
                //     $total = Cart::where('user_id', $userId)->count();
                // }

                // Prepare the response data
                // $response = [
                //     'status' => $total,
                //     'message' => 'Product added to cart successfully'
                // ];
                //     return new JsonResponse($response);
                return back();
            }

            // $response = [
            //     'status' => 'error',
            //     'message' => 'User not logged in'
            // ];

            // return new JsonResponse($response, 401);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to add to cart'], 500);
        }
    }
    public function CartList()
    {
        try {
            $userId = Session::get('user')['id'];
            $products = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', $userId)
                ->select('products.*', 'carts.id as cart_id')
                ->get();

            return view('Home.cart', ['products' => $products]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to view cartlist'], 500);
        }
    }
    public function removeCart($id)
    {
        try {
            $userId = Session::get('user')['id'];
            $cart = DB::table('carts')->where('user_id', $userId)->get();
            if ($cart) {
                $cartItem = $cart->where('product_id', $id)->first();
                if ($cartItem) {
                    DB::table('carts')->where('id', $cartItem->id)->delete();
                }
                return back();
            }
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to remove a product in cart'], 500);
        }
    }

    public function CheckOut()
    {
        try {
            $userId = Session::get('user')['id'];
            $products = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', $userId)
                ->select('products.*', 'carts.id as cart_id')
                ->get();
            return view('Home.checkout', ['products' => $products]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to checkout'], 500);
        }
    }
}
