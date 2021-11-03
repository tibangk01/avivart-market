 @extends('layouts.dashboard', ['title' => "Enregistrement d'une commande client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h6>Liste des produits</h6>

                <x-products instance="order" />
            </div>
            <div class="col-lg-6">
                <h6>Panier de produits</h6>

                <div>
                    {!! Form::open(['route' => 'cart.load_proforma']) !!}
                    <div class="form-group">
                        <label for="proforma_id">Proforma</label>
                        <select required class="form-control" id="proforma_id" name="proforma_id">
                            <option value="">Chargez un proforma</option>
                            @if($proformas->count())

                            @foreach($proformas as $proforma)
                            <option value="{{ $proforma->id }}">{{ $proforma->getNumber() }}</option>
                            @endforeach

                            @endif
                        </select>
                    </div>

                    @if(session()->has('loadedProforma'))
                    <div class="text-danger">
                        Vous avez charger le proforma n° {{ session('loadedProforma')->getNumber() }}
                    </div>
                    @endif

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success">Charger</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                
                <x-cart instance="order" />
            </div>
        </div>
    </div>  
</section>
@endsection