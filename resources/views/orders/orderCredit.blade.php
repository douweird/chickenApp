@extends('layouts.SimpleLayout')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <a id="" class="btn btn-warning float-left" id="" href="javascript:history.go(-1)">رجوع<i
                    class="fa fa-arrow-left"></i> </a><br /><br />
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th> الفئة </th>
                            <th>النوع</th>
                            <th>كمية</th>
                            <th>المجموع</th>
                            <th>الربح</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->category }}</td>
                                <td>{{ $order->product }}</td>
                                <td>{{ $order->amount }}kg</td>
                                <td>{{ $order->productinfo->selling_price * $order->amount }} درهم</td>
                                <td>{{ $order->total }} درهم</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
