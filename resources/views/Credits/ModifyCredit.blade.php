@extends('layouts.SimpleLayout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modifier un Credit</h1>
    </div>

    <form method="post" action="{{ url('/ModifyCredit/' . $credit->id) }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Nom ..." name="name"
                    value="{{ $credit->name }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="Amount" class="col-sm-2 col-form-label">Montant</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="amount" placeholder="Montant ... " name="amount"
                    value="{{ $credit->amount }}" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-user float-right">
            Modifier
        </button>
    </form>
@endsection
