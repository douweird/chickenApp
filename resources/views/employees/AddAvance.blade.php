@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">إضافة تسبيق</h1>
    </div>

    <form method="post" action="{{ url('/AddAvance/'.$id) }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label"> مبلغ التسبيق</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="amount"  name="amount"
                    value="{{ old('amount') }}" required/>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-user float-right">
            إضافة
        </button>
    </form>
@endsection
