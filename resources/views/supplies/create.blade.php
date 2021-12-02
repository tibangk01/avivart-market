@extends('layouts.dashboard', ['title' => "Approvisionnement"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                
                @if($purchases->count())

                {!! Form::open(['method' => 'GET', 'route' => 'supply.create']) !!}
                <fieldset>
                    <legend class="text-sm text-danger font-weight-bold">Recherche Avancée</legend>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <select class="form-control" id="purchase_id" name="purchase_id">
                                    <option value="">Toutes</option>
                                    @foreach($purchases as $purchase)
                                    <option value="{{ $purchase->id }}" {{ request()->query('purchase_id') == $purchase->id ? 'selected' : null }}>{{ $purchase->getNumber() }}</option>
                                    @endforeach
                                </select>
                                <label for="purchase_id">Commande fournisseur</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                {!! Form::submit('Filtrer', ['class' => 'btn btn-info btn-block']) !!}
                            </div>
                        </div>
                    </div>
                </fieldset>
                {!! Form::close() !!}

                <livewire:create-supply :purchases="$purchases" />

                @else

                <p>Vide</p>

                @endif
            </div>
        </div>
    </div>  
</section>
@endsection