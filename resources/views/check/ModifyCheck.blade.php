@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modifier check</h1>
    </div>

    <form method="post" action="{{ url('/ModifyCheck/' . $product->id) }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">الاسم</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="name" placeholder="Designation ..." name="name"
                    value="{{ $product->name }}" required>
            </div>
            <label for="category" class="col-sm-2 col-form-label">فئة</label>
            <div class="col-sm-4">
                <!-- <input type="text" class="form-control" id="category" name="category" value="{{ $product->type }}"
                        readonly> -->
                <select class="form-select" name="type">
                    <option value="check" {{ $product->type == 'check' ? 'selected' : '' }}>شيك</option>
                    <option value="kimb" {{ $product->type == 'kimb' ? 'selected' : '' }}>كمبيالا</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="buying_price" class="col-sm-2 col-form-label">ثمن الشراء </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="buying_price" placeholder="Prix D'achat ..." name="amount"
                    value="{{ $product->amount }}" required>
            </div>
            <label for="selling_price" class="col-sm-2 col-form-label">ثمن البيع</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="selling_price" placeholder="Prix de vente ..." name="date"
                    value="{{ $product->date }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user float-right">
            Modifier
        </button>
    </form>
@endsection
