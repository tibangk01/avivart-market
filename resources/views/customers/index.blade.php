@extends('layouts.dashboard', ['title' => "Clients"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active rounded-0" id="nav-first-tab" data-toggle="tab"
                                    href="#nav-first" role="tab" aria-controls="nav-first" aria-selected="true">Entreprises</a>

                            <a class="nav-item nav-link rounded-0" id="nav-second-tab" data-toggle="tab"
                                href="#nav-second" role="tab" aria-controls="nav-second"
                                aria-selected="true">Particuliers</a>
                        </nav>
                    </div>
                    <div class="card-body py-1">
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-first" role="tabpanel"
                                aria-labelledby="nav-first-tab">

                                <div class="d-flex">
                                    <div class="ml-auto mb-1">
                                        <a class="btn btn-flat btn-primary" href="{{ route('customer.create', ['create' => 'corporation']) }}" title="Ajouter">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a class="btn btn-flat btn-dark" target="_blank" href="{{ route('customer.printing.all', ['printing' => 'corporation']) }}" title="Imprimer">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </div>

                                <x-customers.index.corporation />
                            </div>

                            <div class="tab-pane fade" id="nav-second" role="tabpanel"
                                    aria-labelledby="nav-second-tab">

                                <div class="d-flex">
                                    <div class="ml-auto mb-1">
                                        <a class="btn btn-flat btn-primary" href="{{ route('customer.create', ['create' => 'person']) }}" title="Ajouter">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a class="btn btn-flat btn-dark" target="_blank" href="{{ route('customer.printing.all', ['printing' => 'person']) }}" title="Imprimer">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </div>

                                <x-customers.index.person />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
