 @extends('layouts.dashboard', ['title' => "Livraison client"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if($orders->count())

                {!! Form::open(['method' => 'GET', 'route' => 'order_delivery_note.create']) !!}
                <fieldset>
                    <legend class="text-sm text-danger font-weight-bold">Recherche Avancée</legend>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <select class="form-control" id="order_id" name="order_id">
                                    <option value="">Toutes</option>
                                    @foreach($orders as $order)
                                    <option value="{{ $order->id }}" {{ request()->query('order_id') == $order->id ? 'selected' : null }}>{{ $order->getNumber() }}</option>
                                    @endforeach
                                </select>
                                <label for="order_id">Commande client</label>
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

                <livewire:create-order-delivery-note :orders="$orders" />

                @else

                <p>Vide</p>

                @endif
            </div>
        </div>
    </div>  
</section>
@endsection