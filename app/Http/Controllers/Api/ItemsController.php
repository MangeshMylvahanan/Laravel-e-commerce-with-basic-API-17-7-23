<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;

class ItemsController extends Controller
{
    public function createProduct(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'product_name' => 'required',
                'product_price' => 'required',
                'product_discount' => 'required',
                'product_discountprice' => 'required',
                'product_description' => 'required',
                'catagory' => 'required',
                'subcatagory' => 'required',
                'delivery_days' => 'required',
                'product_image' => 'required|image',
                'product_images' => 'required|image',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation fails', 'errors' => $validator->errors()], 422);
            }

            $product = new Product();
            $product->product_name = $request->input('product_name');
            $product->product_price = $request->input('product_price');
            $product->product_discount = $request->input('product_discount');
            $product->product_discountprice = $request->input('product_discountprice');
            $product->product_description = $request->input('product_description');
            $product->seller_name = "Adhi E-com";
            $product->catagory = $request->input('catagory');
            $product->subcatagory = $request->input('subcatagory');
            $product->delivery_days = $request->input('delivery_days');

            if ($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $extension = $image->getClientOriginalExtension();
                $imagename = time() . '.' . $extension;
                $image->storeAs('uploads', $imagename);

                $product->product_image = $imagename;
            }

            if ($request->hasFile('product_images')) {
                $image = $request->file('product_images');
                $extension = $image->getClientOriginalExtension();
                $imagename = time() . '.' . $extension;
                $image->storeAs('thumb img', $imagename);

                $product->product_images = $imagename;
            }

            $product->save();

            return response()->json(['message' => 'Product details added successfully'], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to add a product'], 500);
        }
    }
    public function home(): JsonResponse
    {
        try {
            $product = Product::all();
            return response()->json(['product' => $product]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'products getting in db error'], 500);
        }
    }

    public static function Productdetails($id): JsonResponse
    {
        try {
            $product = Product::find($id);
            return response()->json(['product' => $product]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'products getting in db error'], 500);
        }
    }
    public function SearchProduct(Request $request): JsonResponse
    {
        try {
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
                } elseif ($mens == 'mens_inners') {
                    $query->where('catagory', 'mens')->where('subcatagory', 'inners');
                }
            }
            if (!empty($womens)) {
                if ($womens == 'womens_tops') {
                    $query->where('catagory', 'womens')->where('subcatagory', 'tops');
                } elseif ($womens == 'womens_pants') {
                    $query->where('catagory', 'womens')->where('subcatagory', 'pants');
                } elseif ($womens == 'womens_inners') {
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

            return response()->json(['products' => $products]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'failed to search product'], 500);
        }
    }
}
