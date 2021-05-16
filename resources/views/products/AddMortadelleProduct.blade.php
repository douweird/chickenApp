@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">إضافة منتج</h1>
    </div>

    <form method="post" action="{{ url('/AddMortadelleProduct') }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">النوع</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{ old('name') }}"
                    required>
            </div>
            <label for="category" class="col-sm-2 col-form-label">الفئة</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="category" name="category" value="Mortadelle" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="buying_price" class="col-sm-2 col-form-label">ثمن الشراء</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="buying_price" placeholder="" name="buying_price"
                    value="{{ old('buying_price') }}" required>
            </div>
            <label for="selling_price" class="col-sm-2 col-form-label">ثمن البيع</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="selling_price" placeholder="" name="selling_price"
                    value="{{ old('selling_price') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">كمية</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="quantity" placeholder="" name="quantity"
                    value="{{ old('quantity') }}" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-user float-right">
            إضافة
        </button>
    </form>
@endsection
