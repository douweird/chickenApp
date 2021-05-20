@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">إضافة عامل</h1>
    </div>

    <form method="post" action="{{ url('/AddEmploye') }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">الإسم الكامل</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="name"  name="name" value="{{ old('name') }}"
                    required>
            </div>
            <label for="phone_number" class="col-sm-2 col-form-label">رقم الهاتف</label>
            <div class="col-sm-4">
                <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="salary" class="col-sm-2 col-form-label">الراتب </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="salary"  name="salary" value="{{ old('salary') }}" required>
            </div>
            <label for="work_placement" class="col-sm-2 col-form-label"> مكان العمل</label>
            <div class="col-sm-4">
                <select required name="work_placement" id="work_placement" class="form-control">
                    <option value="Magasin 1">المحل 1</option>
                    <option value="Magasin 2">المحل 2</option>
                    <option value="kori">الكوري</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="date_to_pay" class="col-sm-2 col-form-label">تاريخ الأداء</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="date_to_pay"  name="date_to_pay"
                    value="{{ old('date_to_pay') }}" required/>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-user float-right">
            إضافة
        </button>
    </form>
@endsection
