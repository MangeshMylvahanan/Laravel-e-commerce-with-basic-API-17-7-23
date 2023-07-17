<?php
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
$userId = Session::get('user')['id'];
$products = DB::table('carts')
    ->join('products', 'carts.product_id', '=', 'products.id')
    ->where('carts.user_id', $userId)
    ->select('products.*', 'carts.id as cart_id')
    ->get();
$totalAmount = 0;
foreach ($products as $item) {
    $totalAmount += $item->product_discountprice;
}
?>
@extends('Home.master')
@section('main-content')
    <!-- ...:::: Start Cart Section:::... -->
    <div class="cart-section">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        <!-- Start Cart Single Item-->
                                        @foreach ($products as $item)
                                            <tr>
                                                <td class="product_remove"><a href="/removecart/{{ $item->id }}"><i
                                                            class="fa fa-trash-o"></i></a>
                                                </td>
                                                <td class="product_thumb"><a href="productdetail/{{ $item->id }}"><img
                                                            src="{{ asset('uploads/' .$item->product_image) }}"
                                                            alt=""></a></td>
                                                <td class="product_name"><a
                                                        href="productdetail/{{ $item->id }}">{{ $item->product_name }}
                                                        </a></td>
                                                <td class="product-price">{{ $item->product_discountprice }}/-</td>
                                                <td class="product_quantity"><label>Quantity</label> <input min="1"
                                                        max="100" value="1" type="number"></td>
                                                <td class="product_total">{{ $item->product_discountprice }}/-</td>
                                            </tr> <!-- End Cart Single Item-->
                                            <!-- Start Cart Single Item-->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart_submit">
                                <button class="btn btn-md btn-golden" type="submit">update cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->

        <!-- Start Coupon Start -->
        <div class="coupon_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left" data-aos="fade-up" data-aos-delay="200">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">
                                <p>Enter your coupon code if you have one.</p>
                                <input class="mb-2" placeholder="Coupon code" type="text">
                                <button type="submit" class="btn btn-md btn-golden">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">{{ $totalAmount }}.00Rs</p>
                                </div>
                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">{{ $totalAmount }}.00Rs</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="/checkout" class="btn btn-md btn-golden">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->
@endsection
