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
                                    <th style="color: aliceblue;font-size:13px;"> Order Id </th>
                                    <th style="color: aliceblue;font-size:13px;"> User Id </th>
                                    <th style="color: aliceblue;font-size:13px;">  Name </th>
                                    <th style="color: aliceblue;font-size:13px;"> Phone </th>
                                    <th style="color: aliceblue;font-size:13px;"> Product </th>
                                    <th style="color: aliceblue;font-size:13px;"> Price </th>
                                    <th style="color: aliceblue;font-size:13px;"> Payment Status </th>
                                    <th style="color: aliceblue;font-size:13px;"> Seller Id</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $item)
                                    <tr>
                                        <td style="font-size:10px;"> {{ $item->payment_id }} </td>
                                        <td> {{ $item->user_id }} </td>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->phone }} </td>
                                        <td style="font-size:10px;"> {{ $item->productname }} </td>
                                        <td> {{ $item->amount }} </td>
                                        @if ($item->payment_status == 1)
                                        <td><div class="badge badge-outline-success">Success</div></td>
                                        @else
                                        <td><div class="badge badge-outline-danger">Failure</div></td>
                                        @endif 
                                        <td>Adhi Ecom</td>
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
