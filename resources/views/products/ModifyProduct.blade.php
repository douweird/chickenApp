@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modifier un Produit</h1>
    </div>

    <form method="post" action="{{url('/ModifyProduct/'.$product->id)}}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Designation</label>
            <div class="col-sm-4">
                <input type="text"  class="form-control" id="name" placeholder="Designation ..." name="name" value="{{ $product->name }}" required>
            </div>
            <label for="category" class="col-sm-2 col-form-label">Categorie</label>
            <div class="col-sm-4">
                <input type="text"  class="form-control" id="category"  name="category" value="{{ $product->category }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="buying_price" class="col-sm-2 col-form-label">Prix d'achat</label>
            <div class="col-sm-4">
                <input type="number"  class="form-control" id="buying_price" placeholder="Prix D'achat ..." name="buying_price" value="{{ $product->buying_price }}" required>
            </div>
            <label for="selling_price" class="col-sm-2 col-form-label">Prix de vente</label>
            <div class="col-sm-4">
                <input type="number"  class="form-control" id="selling_price" placeholder="Prix de vente ..." name="selling_price" value="{{ $product->selling_price }}" >
            </div>
        </div>
        <div class="form-group row">
            <label for="unite" class="col-sm-2 col-form-label">Unité</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="unite" placeholder="Unité ..." name="unite" value="{{ $product->unite }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Quantité</label>
            <div class="col-sm-10">
                <input  type="number" class="form-control" id="quantity" placeholder="Quantité ... " name="quantity" value="{{ $product->quantity }}" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-user float-right">
            Modifier
        </button>
    </form>
@endsection
