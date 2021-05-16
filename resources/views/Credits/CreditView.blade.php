@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">الكريديات الحالية</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <a id="" class="btn btn-success" id="" href={{ url('/ClientsView') }}><i class="fa fa-plus"></i> إضافة
                كريدي</a><br /><br />
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>الاسم</th>
                            <th>المبلغ </th>
                            <th>تاريخ </th>
                            <th>أجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($credit as $crt)
                            <tr>
                                <td>{{ $crt->id }}</td>
                                <td>{{ $crt->client->name }}</td>
                                <td>{{ $crt->credit_amount }}</td>
                                <td>{{ $crt->credit_date }}</td>
                                <td>
                                    <center>
                                        <a class="btn btn-info" class="graph"
                                            href="{{ url('/ModifyCredit/' . $crt->id) }}"><i
                                                class="fa fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger" class="graph"
                                            href="{{ url('/DeleteCredit/' . $crt->id) }}"><i
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
