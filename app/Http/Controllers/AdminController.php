<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function viewProducts()
    {
        try {
            $products = Product::all();
            return view('Admin.viewproducts', ['products' => $products]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to view products in admin'], 500);
        }
    }
    public function Users()
    {
        try {
            $users = DB::table('users')->where('role', 2)->get();
            return view('Admin.userdetails', ['users' => $users]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to view users in admin'], 500);
        }
    }
    public function Sellers()
    {
        try {
            $users = DB::table('users')->where('role', 3)->get();
            return view('Admin.sellerdetails', ['users' => $users]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to view sellers in admin'], 500);
        }
    }
    public function Payments()
    {
        try {
            $payments = Payment::all();
            return view('Admin.payments', ['payments' => $payments]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to payments in admin'], 500);
        }
    }
    public function NewSellerRegister()
    {
        try {
            $users = DB::table('users')->where('role', 0)->get();
            return view('Admin.newsellerregisters', ['users' => $users]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to view seller register in admin'], 500);
        }
    }
    public function AddSeller(Request $request)
    {
        try {
            $userId = $request->user_id;
            $user = User::find($userId);

            if ($user) {
                $user->role = '3';
                $user->save();
            }

            return response('success');
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to add a seller'], 500);
        }
    }
    public function RemoveSeller(Request $request)
    {
        try {
            $userId = $request->user_id;
            $user = User::destroy($userId);
            return back();
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to remove a seller'], 500);
        }
    }
}
