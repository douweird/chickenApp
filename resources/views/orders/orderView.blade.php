@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">إضافة فاتورة</h1>
    </div>

    <form method="post" action="{{ url('/orderView/d') }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">الفئة</label>
            <div class="col-sm-4">
                <select name="category" onchange="window.location.replace('/orderView/'+this.value)" required
                    name="work_placement" id="work_placement" class="form-control">
                    <option value="Dinde" {{ $category == 'Dinde' ? 'selected' : '' }}>لاداند</option>
                    <option value="Mortadelle" {{ $category == 'Mortadelle' ? 'selected' : '' }}> كاشير</option>
                    <option value="Alimentation" {{ $category == 'Alimentation' ? 'selected' : '' }}>علف</option>
                </select>
            </div>
            <label for="category" class="col-sm-2 col-form-label">النوع</label>
            <div class="col-sm-4">
                <select name="product" required name="work_placement" id="work_placement" class="form-control">
                    @foreach ($products as $prd)
                        <option value="{{ $prd->id }}"> {{ $prd->name }} ({{ $prd->selling_price }} DH)</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">كمية (kg)</label>
            <div class="col-sm-4">
                <input type="number" required step="0.1" class="form-control" id="quantity" placeholder="" name="quantity"
                    value="{{ old('quantity') }}" />
            </div>

        </div>

        <button type="submit" class="btn btn-primary btn-user float-right">
            إضافة
        </button>
    </form>
@endsection
