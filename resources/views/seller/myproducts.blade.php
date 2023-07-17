@extends('seller.master')
@section('seller-content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">MY Products</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="color: aliceblue;font-size:15px;"> Image Product name</th>
                                    <th style="color: aliceblue;font-size:15px;"> Price </th>
                                    <th style="color: aliceblue;font-size:15px;"> Discount </th>
                                    <th style="color: aliceblue;font-size:15px;"> Discount Price </th>
                                    {{-- <th style="color: aliceblue;font-size:15px;"> Description </th> --}}
                                    <th style="color: aliceblue;font-size:15px;"> Delivery Days </th>
                                    <th style="color: aliceblue;font-size:15px;"> Edit </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('uploads/' . $item->product_image) }}" alt="image" />
                                            <span class="pl-2"> {{ $item->product_name }}</span>
                                        </td>
                                        <td> {{ $item->product_price }} </td>
                                        <td> {{ $item->product_discount }} </td>
                                        <td> {{ $item->product_discountprice }} </td>
                                        {{-- <td> {{ $item->product_description }} </td> --}}
                                        <td> {{ $item->delivery_days }} </td>
                                        <td>
                                        <a href="/seller/dashboard"><div class="badge badge-outline-success">Edit</div></a>
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
