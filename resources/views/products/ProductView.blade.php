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
                            <th>النوع</th>
                            <th>ثمن الشراء </th>
                            <th>ثمن البيع</th>
                            <th>كمية </th>
                            <th>المجموع</th>
                            <th>أجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($total = 0)
                            @foreach ($products as $prd)
                                <div style="display: none">{{ $total += $prd->quantity * $prd->buying_price }}</div>
                                <tr>
                                    <td>{{ $prd->id }}</td>
                                    <td>{{ $prd->name }}</td>
                                    <td>{{ $prd->buying_price }}</td>
                                    <td>{{ $prd->selling_price }}</td>
                                    <td>{{ $prd->quantity }}</td>
                                    <td>{{ $prd->quantity * $prd->buying_price }}</td>
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
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th> </th>
                                <th>المجموع</th>
                                <th>{{ $total }} </th>
                                <th> التسبيق: {{ $avance[0]->avance ?? 0 }} الباقي:
                                    {{ $total - ($avance[0]->avance ?? 0) }}
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <form method="post" action="{{ url('/addAvenceProduct') }}">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">التسبيق</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="name" placeholder="" name="avance"
                        value="{{ old('avance') }}" required>
                </div>
                <input type="hidden" class="form-control" id="category" placeholder="" name="category"
                    value="{{ $category }}" required>
                <button type="submit" class="btn btn-primary btn-user float-left">
                    إضافة
                </button>
            </div>

        </form>

    @endsection
