@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">الزبائن</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <a id="" class="btn btn-success" id="" href={{ url('/AddClient') }}><i class="fa fa-plus"></i> إضافة زبون
            </a><br /><br />
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>الاسم</th>
                            <th>رقم الهاتف </th>
                            <th> كريدي </th>
                            <th>إضافة كريدي </th>
                            <th>الكريديات السابقة</th>
                            <th>أجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $crt)
                            <tr>
                                <td>{{ $crt->id }}</td>
                                <td>{{ $crt->name }}</td>
                                <td>{{ $crt->phone }}</td>
                                <td>{{ $crt->credits[0]->credit_amount ?? '0' }}</td>
                                <td>
                                    <center>
                                        <a class="btn btn-info" class="graph"
                                            href="{{ url('/AddCredit/' . $crt->id) }}"><i
                                                class="fa fa-plus-circle"></i></a>

                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a class="btn btn-success" class="graph"
                                            href="{{ url('/ClientCredits/' . $crt->id) }}"><i class="fa fa-list"></i></a>

                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a class="btn btn-info" class="graph"
                                            href="{{ url('/ModifyClient/' . $crt->id) }}"><i
                                                class="fa fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger" class="graph"
                                            href="{{ url('/DeleteClient/' . $crt->id) }}"><i
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
