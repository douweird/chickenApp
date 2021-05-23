@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">إضافة فاتورة</h1>
    </div>

    <form method="post" action="{{ url('/orderView/' . $category) }}">
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
                <select class="form-control" name="product" required>
                    @foreach ($products as $prd)
                        <option value="{{ $prd->name }}"> {{ $prd->name }} ({{ $prd->selling_price }} DH)</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">كمية (kg)</label>
            <div class="col-sm-4">
                <input type="number" required step="0.01" class="form-control" id="quantity" placeholder="" name="quantity"
                    value="{{ old('quantity') }}" />
            </div>

        </div>
        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">زبون</label>
            <div class="col-sm-4">
                <select onchange="window.location.replace('/orderView/{{ $category }}'.)" name="client_id"
                    name="work_placement" id="work_placement" class="form-control">
                    <option value=""> ----
                    </option>
                    @foreach ($clients as $prd)
                        <option value="{{ $prd->id }}"> {{ $prd->name }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <button type="submit" class="btn btn-primary btn-user float-right">
            إضافة
        </button>
    </form>
@endsection
