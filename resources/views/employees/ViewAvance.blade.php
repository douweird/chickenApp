@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> تسبيقات العامل  {{$name}}</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <a  id="" class="btn btn-warning float-left" id="" href="javascript:history.go(-1)">رجوع<i class="fa fa-arrow-left"></i> </a><br/><br/>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th> المبلغ </th>
                            <th>التاريخ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($avances as $avc)
                            <tr>
                                <td>{{ $avc->id }}</td>
                                <td>{{ $avc->amount }}</td>
                                <td>{{ $avc->avance_date }}</td>                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
