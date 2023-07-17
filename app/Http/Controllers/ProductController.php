<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function Cart()
    {
        return view('Home.cart');
    }
    public function AddProduct()
    {
        return view('Admin.productsadd');
    }
    public function home()
    {
        try{
            $product = Product::all();
        return view('Home.homepage', ['product' => $product]);
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to view homepage'], 500);
        }
    }
    public function AddProductStore(Request $request)
    {
        try{
            Session::has('user');
        $userId = Session::get('user')['id'];
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_discount = $request->input('product_discount');
        $product->product_discountprice = $request->input('product_discountprice');
        $product->product_description = $request->input('product_description');
        $product->seller_name = $userId;
        $product->catagory = $request->input('catagory');
        $product->subcatagory = $request->input('subcatagory');
        $product->delivery_days = $request->input('delivery_days');
        if($request->hasFile('product_image'))
        {
            $image = $request->file('product_image');
            $request->validate(['product_image'=>'required|image']);
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->move('uploads',$imagename);
            $product->product_image = $imagename;
        }
        if($request->hasFile('product_images'))
        {
            $image = $request->file('product_images');
            $request->validate(['product_images'=>'required|image']);
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->move('thumb img',$imagename);
            $product->product_images = $imagename;
            $product->save();
        }
        return back() 
        ->withSuccess('you have successfully added the product details! ');
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to add products'], 500);
        }
    }
    public function viewshop()
    {
        try{
            $products = Product::all();
        return view('Home.shop',['products' => $products]);
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to view shop page'], 500);
        }
    }
    static function details($id)
    {
        try{
            $product = Product::find($id);
        return view('Home.product-detail',['products' =>$product]);
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to view details page'], 500);
        }
    }
     public function searchProducts(Request $request)
    {
        try{
            $search = $request->input('search');
        $mens = $request->input('mens');
        $womens = $request->input('womens');
        $babies = $request->input('babies');
        $amount = $request->input('amount');
    
        $query = Product::query();
        if (!empty($search)) {
            $query->where('product_name', 'LIKE', '%' . $search . '%');
        }
    
        if (!empty($mens)) {
            if ($mens == 'mens_shirts') {
                $query->where('catagory', 'mens')->where('subcatagory', 'shirts');
        
            } elseif ($mens == 'mens_pants') {
                $query->where('catagory', 'mens')->where('subcatagory', 'pants');
            }elseif ($mens == 'mens_inners') {
                $query->where('catagory', 'mens')->where('subcatagory', 'inners');
            }
        }
        if (!empty($womens)) {
            if ($womens == 'womens_tops') {
                $query->where('catagory', 'womens')->where('subcatagory', 'tops');
        
            } elseif ($womens == 'womens_pants') {
                $query->where('catagory', 'womens')->where('subcatagory', 'pants');
            }elseif ($womens == 'womens_inners') {
                $query->where('catagory', 'womens')->where('subcatagory', 'inners');
            }
        }
        if (!empty($babies)) {
            if ($babies == 'babies_topwear') {
                $query->where('catagory', 'babies')->where('subcatagory', 'topwear');
        
            } elseif ($babies == 'babies_bottomwear') {
                $query->where('catagory', 'babies')->where('subcatagory', 'bottomwear');
            }
        }
        
    
        if (!empty($amount)) {
            if ($amount == 'low') {
                $query->where('product_price', '<=', 200);
            } elseif ($amount == 'medium') {
                $query->where('product_price', '>', 200)->where('product_price', '<=', 500);
            } elseif ($amount == 'high') {
                $query->where('product_price', '>', 500);
            }
        }
    
        $products = $query->get();
    
        return view('Home.shop', compact('products'));
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to filter products'], 500);
        }
    }
    
}
