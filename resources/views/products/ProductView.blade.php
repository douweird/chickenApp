@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">منتجات الفئة {{ $category }}</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <a id="" class="btn btn-success" id="" href={{ url('/Add' . $category . 'Product') }}><i
                    class="fa fa-plus"></i>أضف منتج</a><br /><br />
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>الاسم</th>
                            <th>ثمن الشراء </th>
                            <th>ثمن البيع</th>
                            <th>وحدة </th>
                            <th>كمية </th>
                            <th>أجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $prd)
                            <tr>
                                <td>{{ $prd->id }}</td>
                                <td>{{ $prd->name }}</td>
                                <td>{{ $prd->buying_price }}</td>
                                <td>{{ $prd->selling_price }}</td>
                                <td>{{ $prd->unite }}</td>
                                <td>{{ $prd->quantity }}</td>
                                <td>
                                    <center>
                                        <a class="btn btn-info" class="graph"
                                            href="{{ url('/ModifyProduct/' . $prd->id) }}"><i
                                                class="fa fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger" class="graph"
                                            href="{{ url('/DeleteProduct/' . $prd->id) }}"><i
                                                class="fa fa-trash-alt"></i></a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
