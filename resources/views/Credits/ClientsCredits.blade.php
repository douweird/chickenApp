@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">الكريديات الحالية</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>المبلغ </th>
                            <th>تاريخ </th>
                            <th> فاتورة</th>
                            <th>أجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($total = 0)
                            @foreach ($credits as $crt)
                                <div style="display: none">{{ $total += $crt->credit_amount }}</div>
                                <tr>
                                    <td>{{ $crt->id }}</td>
                                    <td>{{ $crt->credit_amount }}</td>
                                    <td>{{ $crt->credit_date }}</td>
                                    <td>
                                        @if ($crt->order_id != null)
                                            <a class="btn btn-success" class="graph"
                                                href="{{ url('/orderCredit/' . $crt->order_id ?? '-') }}"><i
                                                    class="fa fa-list"></i></a>
                                        @endif
                                    </td>
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
                        <thead>
                            <tr>
                                <th>المجموع</th>
                                <th>{{ $total }} </th>

                                <th></th>
                                <th> </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    @endsection
