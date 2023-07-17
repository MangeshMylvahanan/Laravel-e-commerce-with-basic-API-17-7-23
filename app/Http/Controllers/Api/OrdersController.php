<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        try {
            $userId = $request->input('user')['id'];
            $products = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', $userId)
                ->select('products.*', 'carts.id as cart_id')
                ->get();

            $orderPrefix = 'ORD';
            $timestamp = now()->format('YmdHis');
            $uniqueId = uniqid();
            $orderId = $orderPrefix . $timestamp . $uniqueId;

            foreach ($products as $item) {
                $payment = new Payment();
                $payment->user_id = $userId;
                $payment->payment_id = $orderId;
                $payment->name = $request->input('name');
                $payment->address = $request->input('address');
                $payment->phone = $request->input('phone');
                $payment->productId = $item->id;
                $payment->productname = $item->product_name;
                $payment->amount = $item->product_discountprice;
                $payment->save();
            }

            return response()->json(['orderId' => $orderId], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'failed to store billing details'], 500);
        }
    }
}
