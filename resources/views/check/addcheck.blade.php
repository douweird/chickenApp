@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">اضافة شيك أو كمبيالات</h1>
    </div>

    <form method="post" action="{{ url('/AddCheck') }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">إسم المزود</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{ old('name') }}"
                    required>
            </div>
            <label for="category" class="col-sm-2 col-form-label">النوع</label>
            <div class="col-sm-4">
                <!-- <input type="text" class="form-control" id="category" name="type" value="Dinde" disabled>-->
                <select class="form-select" name="type">
                    <option value="check">شيك</option>
                    <option value="kimb">كمبيالا</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="buying_price" class="col-sm-2 col-form-label">المبلغ</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="buying_price" placeholder="" name="amount"
                    value="{{ old('buying_price') }}" required>
            </div>
            <label for="selling_price" class="col-sm-2 col-form-label">تاريخ الأداء</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="selling_price" placeholder="" name="date"
                    value="{{ old('selling_price') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-user float-right">
            إضافة
        </button>
    </form>
@endsection
