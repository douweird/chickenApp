@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> العمال الكوري</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <a id="" class="btn btn-success" id="" href={{ url('/AddEmploye') }}><i class="fa fa-plus"></i> إضافة عامل
            </a><br /><br />
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>الاسم</th>
                            <th>رقم الهاتف </th>
                            <th> مكان العمل</th>
                            <th> الراتب </th>
                            <th>تاريخ الأداء </th>
                            <th>مجموع التسبيق </th>
                            <th> الباقي </th>
                            <th>التسبيق</th>
                            <th>أجراءات</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $emp)
                            <tr>
                                <td>{{ $emp->id }}</td>
                                <td>{{ $emp->name }}</td>
                                <td>{{ $emp->phone_number }}</td>
                                <td>{{ $emp->work_placement }}</td>
                                <td>{{ $emp->salary }}</td>
                                <td>{{ $emp->date_to_pay }}</td>
                                <td>
                                @if ($emp->avance_totale == null) 0 @else
                                        {{ $emp->avance_totale }} @endif
                                </td>
                                <td>{{ $emp->salary - $emp->avance_totale }}</td>
                                <td>
                                    <center>
                                        <a class="btn btn-success" class="graph"
                                            href="{{ url('/AddAvance/' . $emp->id) }}"><i class="fa fa-coins"></i></a>

                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a class="btn btn-warning" class="graph"
                                            href="{{ url('/EmployeSync/' . $emp->id) }}"><i class="fa fa-sync"></i></a>

                                        <a class="btn btn-primary" class="graph"
                                            href="{{ url('/ViewAvances/' . $emp->id . '/' . $emp->name) }}">
                                            <i class="fa fa-list"></i></a>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a class="btn btn-info" class="graph"
                                            href="{{ url('/ModifyEmploye/' . $emp->id) }}"><i
                                                class="fa fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger" class="graph"
                                            href="{{ url('/DeleteEmploye/' . $emp->id) }}"><i
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
