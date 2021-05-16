@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">منتجات</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <a id="" class="btn btn-success" id="" href={{ url('/AddCheck') }}><i class="fa fa-plus"></i>أضف شيك أو
                كمبيالات</a><br /><br />
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>النوع </th>
                            <th>إسم المزود</th>
                            <th>المبلغ </th>
                            <th>تاريخ الأداء</th>
                            <th>أجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $prd)
                            <tr>
                                <td>{{ $prd->id }}</td>
                                <td>{{ $prd->type == 'check' ? 'شيك' : 'كمبيالا' }}</td>
                                <td>{{ $prd->name }}</td>
                                <td>{{ $prd->amount }}</td>
                                <td>{{ $prd->date }}</td>
                                <td>
                                    <center>
                                        <a class="btn btn-info" class="graph"
                                            href="{{ url('/ModifyCheck/' . $prd->id) }}"><i
                                                class="fa fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger" class="graph"
                                            href="{{ url('/DeleteCheck/' . $prd->id) }}"><i
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
