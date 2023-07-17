<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ItemsCartController extends Controller
{
    public function addToCart(Request $request)
    {
        try {
            if ($request->has('user')) {
                $userId = $request->user()->id;
                $cart = new Cart();
                $cart->product_id = $request->input('product_id');
                $cart->user_id = Auth::user();
                $cart->save();

                return response()->json(['message' => 'Product added to cart successfully'], 200);
            }

            return response()->json(['message' => 'User not authenticated'], 401);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to add a product to cart'], 500);
        }
    }

    public function cartList(Request $request)
    {
        try {
            $user = $request->has('user');
             

            if (!$user) {
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }

            $userId = $request->input('user')['id'];
            $products = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', $userId)
                ->select('products.*', 'carts.id as cart_id')
                ->get();

            return response()->json(['products' => $products], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Failed to retrieve cart list'], 500);
        }
    }
    public function removeCart(Request $request, $id)
    {
        try {
            // $userId = $request->user()->id;
            $userId = $request->input('user')['id'];
            
            $cart = DB::table('carts')->where('user_id', $userId)->get();
            if ($cart) {
                $cartItem = $cart->where('product_id', $id)->first();
                if ($cartItem) {
                    DB::table('carts')->where('id', $cartItem->id)->delete();
                }
                return response()->json(['message' => 'Cart item removed successfully'], 200);
            } else {
                return response()->json(['error' => 'Cart not found'], 404);
            }
        } catch (QueryException $e) {
            return response()->json(['error' => 'Failed to remove cart item'], 500);
        }
    }
}
