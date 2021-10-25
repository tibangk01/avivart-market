@extends('layouts.dashboard', ['title' => auth()->user()->full_name])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active rounded-0" id="tab1-tab" data-toggle="tab"
                                        href="#tab1" role="tab" aria-controls="tab1"
                                        aria-selected="true">Identité</a>

                                    <a class="nav-item nav-link rounded-0" id="tab2-tab" data-toggle="tab"
                                        href="#tab2" role="tab" aria-controls="tab2"
                                        aria-selected="true">Nom d'utilisateur</a>

                                    <a class="nav-item nav-link rounded-0" id="tab3-tab" data-toggle="tab"
                                        href="#tab3" role="tab" aria-controls="tab3"
                                        aria-selected="true">Mot de passe</a>
                                </div>
                            </nav>
                        </div>
                    <div class="card-body py-1">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                aria-labelledby="tab1-tab">
                                <p>coming soon 1</p>
                            </div>

                            <div class="tab-pane fade" id="tab2" role="tabpanel"
                                aria-labelledby="tab2-tab">
                                    <p>coming soon 2</p>
                            </div>

                            <div class="tab-pane fade" id="tab3" role="tabpanel"
                                aria-labelledby="tab3-tab">
                                    <p>coming soon 3</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
@endsection