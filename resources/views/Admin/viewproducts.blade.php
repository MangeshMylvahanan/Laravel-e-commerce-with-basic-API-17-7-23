@extends('Admin.master')
@section('admin-content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="color: aliceblue;font-size:15px;"> Image Product name</th>
                                    <th style="color: aliceblue;font-size:15px;"> Price </th>
                                    <th style="color: aliceblue;font-size:15px;"> Discount </th>
                                    <th style="color: aliceblue;font-size:15px;"> Discount Price </th>
                                    <th style="color: aliceblue;font-size:15px;"> Seller Name </th>
                                    <th style="color: aliceblue;font-size:15px;"> Is New </th>
                                    <th style="color: aliceblue;font-size:15px;"> Is Trend </th>
                                    <th style="color: aliceblue;font-size:15px;"> Is Offer </th>
                                    <th style="color: aliceblue;font-size:15px;"> Edit </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('uploads/' . $item['product_image']) }}" alt="image" />
                                            <span class="pl-2"> {{ $item->product_name }}</span>
                                        </td>
                                        <td> {{ $item->product_price }} </td>
                                        <td> {{ $item->product_discount }} </td>
                                        <td> {{ $item->product_discountprice }} </td>
                                        <td> {{ $item->seller_name }} </td>
                                        <td> <div class="add-items d-flex">
                                            <input type="text" class="form-control todo-list-input" placeholder={{ $item->is_newest }}>
                                            <button class="add btn btn-primary todo-list-add-btn">Yes</button>
                                          </div></td>
                                        <td> {{ $item->is_trending }} </td>
                                        <td> {{ $item->is_offer }} </td>
                                        <td>
                                        <a href="/admin"><div class="badge badge-outline-success">Edit</div></a>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
