@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">إضافة كريدي</h1>
    </div>

    <form method="post" action="{{ url('/AddCredit/' . $id . '?order_id=' . Request::get('order_id')) }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="Amount" class="col-sm-2 col-form-label">المبلغ</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="amount" placeholder="" name="amount"
                    value="{{ old('amount') }}" />
            </div>
        </div>
        <div class="form-group row">

            <label for="selling_price" class="col-sm-2 col-form-label">تاريخ </label>
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
