@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">إضافة كريدي</h1>
    </div>

    <form method="post" action="{{ url('/AddCredit') }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="Nom" class="col-sm-2 col-form-label">إسم</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{ old('name') }}"
                    required>
            </div>
        </div>
        <div class="form-group row">
            <label for="Amount" class="col-sm-2 col-form-label">المبلغ</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="amount" placeholder="" name="amount"
                    value="{{ old('amount') }}" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-user float-right">
            إضافة
        </button>
    </form>
@endsection
