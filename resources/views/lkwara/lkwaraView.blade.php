@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> مجموع المعاليف</h1>
    </div>

    <form method="post" action="{{ url('/addalf') }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name"
                class="col-sm-2 col-form-label">{{ $kwara->count() == 0 ? '(kg) العلف المشترى' : 'العلف المقدم  (kg)' }}</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="name" placeholder="" name="alf" value="{{ old('name') }}">
            </div>

        </div>
        <div class="form-group row">
            <label for="buying_price" class="col-sm-2 col-form-label">الفلوس المشترى</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="buying_price" placeholder="" name="falos"
                    value="{{ old('buying_price') }}" @if ($kwara->count() != 0) disabled @endif>
            </div>

        </div>
        <div class="form-group row">
            <label for="buying_price" class="col-sm-2 col-form-label">الموتى</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="buying_price" placeholder="" name="dead"
                    value="{{ old('buying_price') }}" @if ($kwara->count() == 0) disabled @endif>
            </div>
            <label for="selling_price" class="col-sm-2 col-form-label"> البيع</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="selling_price" placeholder="" name="sold"
                    value="{{ old('selling_price') }}" @if ($kwara->count() == 0) disabled @endif>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary btn-user float-right">
                    إضافة
                </button>
            </div>
        </div>
    </form>

    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>اليوم</th>
                            <th>العلف (kg) </th>
                            <th>عدد الفلوس </th>
                            <th>الموتى</th>
                            <th> البيع</th>
                            <th> أجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kwara as $crt)
                            <tr @if ($crt->day == 0) class="table-active" @endif>
                                <td>{{ $crt->id }}</td>
                                <td>{{ $crt->day }}</td>
                                <td>{{ $crt->alf }}</td>
                                <td>{{ $crt->falos }}</td>
                                <td>{{ $crt->dead }}</td>
                                <td>{{ $crt->sold }}</td>
                                <td>
                                    <center>
                                        <a class="btn btn-info" class="graph"
                                            href="{{ url('/ModifyCredit/' . $crt->id) }}"><i
                                                class="fa fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger" class="graph"
                                            href="{{ url('/deletealf/' . $crt->id) }}"><i
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
    <a id="" class="btn btn-warning" id="" href={{ url('/clearAlf') }}><i class="fa fa-restore"></i>إعادة
        الحساب</a><br /><br />
@endsection
