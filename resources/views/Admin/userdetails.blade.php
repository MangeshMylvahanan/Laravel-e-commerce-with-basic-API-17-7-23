@extends('Admin.master')
@section('admin-content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th>
                                        <div class="form-check form-check-muted m-0">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </th> --}}
                                    <th style="color: aliceblue;font-size:15px;"> Name</th>
                                    {{-- <th> Product Name </th> --}}
                                    <th style="color: aliceblue;font-size:15px;"> Email </th>
                                    <th style="color: aliceblue;font-size:15px;"> Mobile </th>
                                    <th style="color: aliceblue;font-size:15px;"> Address </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        {{-- <td>
                                        <div class="form-check form-check-muted m-0">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </td> --}}
                                        <td> {{ $user->name }}</td>
                                        <td> {{ $user->email }} </td>
                                        <td> {{ $user->mobile }} </td>
                                        <td> {{ $user->name }} </td>
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
