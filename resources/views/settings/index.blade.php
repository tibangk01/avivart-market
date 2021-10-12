@extends('layouts.dashboard', ['title' => "Parametres"])

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
                                    href="#nav-first" role="tab" aria-controls="nav-first"
                                    aria-selected="true">Couleur Navbar</a>

                                <a class="nav-item nav-link rounded-0" id="nav-second-tab" data-toggle="tab"
                                    href="#nav-second" role="tab" aria-controls="nav-second"
                                    aria-selected="true">Couleur Sidebar Left</a>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body py-1">
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-first" role="tabpanel"
                                aria-labelledby="nav-first-tab">

                                <h4>Sommbre</h4>
                                <ul>
                                    <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark bg-danger']) }}">Danger</a></li>
                                    <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark bg-warning']) }}">Warning</a></li>
                                    <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark bg-success']) }}">Success</a></li>
                                    <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark bg-primary']) }}">Primary</a></li>
                                    <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark bg-info']) }}">Info</a></li>
                                </ul>

                                <hr>

                                <h4>Clair</h4>
                                <ul>
                                    <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-light bg-danger']) }}">Danger</a></li>
                                    <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-light bg-warning']) }}">Warning</a></li>
                                    <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-light bg-success']) }}">Success</a></li>
                                    <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-light bg-primary']) }}">Primary</a></li>
                                    <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-light bg-info']) }}">Info</a></li>
                                    <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-light bg-light']) }}">Light</a></li>
                                    <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-light bg-white']) }}">White</a></li>
                                </ul>

                            </div>

                            <div class="tab-pane fade" id="nav-second" role="tabpanel"
                                aria-labelledby="nav-second-tab">

                                <h4>Sommbre</h4>
                                <ul>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-danger elevation-4']) }}">Danger avec élevation de 4</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-danger elevation-3']) }}">Danger avec élevation de 3</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-danger elevation-2']) }}">Danger avec élevation de 2</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-danger elevation-1']) }}">Danger avec élevation de 1</a></li>

                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-warning elevation-4']) }}">Warning avec élevation de 4</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-warning elevation-3']) }}">Warning avec élevation de 3</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-warning elevation-2']) }}">Warning avec élevation de 2</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-warning elevation-1']) }}">Warning avec élevation de 1</a></li>

                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-success elevation-4']) }}">Success avec élevation de 4</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-success elevation-3']) }}">Success avec élevation de 3</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-success elevation-2']) }}">Success avec élevation de 2</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-success elevation-1']) }}">Success avec élevation de 1</a></li>

                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-primary elevation-4']) }}">Primary avec élevation de 4</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-primary elevation-3']) }}">Primary avec élevation de 3</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-primary elevation-2']) }}">Primary avec élevation de 2</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-primary elevation-1']) }}">Primary avec élevation de 1</a></li>

                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-info elevation-4']) }}">Info avec élevation de 4</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-info elevation-3']) }}">Info avec élevation de 3</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-info elevation-2']) }}">Info avec élevation de 2</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-info elevation-1']) }}">Info avec élevation de 1</a></li>
                                </ul>

                                <hr>

                                <h4>Clair</h4>
                                <ul>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-danger elevation-4']) }}">Danger avec élevation de 4</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-danger elevation-3']) }}">Danger avec élevation de 3</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-danger elevation-2']) }}">Danger avec élevation de 2</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-danger elevation-1']) }}">Danger avec élevation de 1</a></li>

                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-warning elevation-4']) }}">Warning avec élevation de 4</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-warning elevation-3']) }}">Warning avec élevation de 3</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-warning elevation-2']) }}">Warning avec élevation de 2</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-warning elevation-1']) }}">Warning avec élevation de 1</a></li>

                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-success elevation-4']) }}">Success avec élevation de 4</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-success elevation-3']) }}">Success avec élevation de 3</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-success elevation-2']) }}">Success avec élevation de 2</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-success elevation-1']) }}">Success avec élevation de 1</a></li>

                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-primary elevation-4']) }}">Primary avec élevation de 4</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-primary elevation-3']) }}">Primary avec élevation de 3</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-primary elevation-2']) }}">Primary avec élevation de 2</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-primary elevation-1']) }}">Primary avec élevation de 1</a></li>

                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-info elevation-4']) }}">Info avec élevation de 4</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-info elevation-3']) }}">Info avec élevation de 3</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-info elevation-2']) }}">Info avec élevation de 2</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-info elevation-1']) }}">Info avec élevation de 1</a></li>

                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-light elevation-4']) }}">Light avec élevation de 4</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-light elevation-3']) }}">Light avec élevation de 3</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-light elevation-2']) }}">Light avec élevation de 2</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-light elevation-1']) }}">Light avec élevation de 1</a></li>

                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-white elevation-4']) }}">White avec élevation de 4</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-white elevation-3']) }}">White avec élevation de 3</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-white elevation-2']) }}">White avec élevation de 2</a></li>
                                    <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-white elevation-1']) }}">White avec élevation de 1</a></li>
                                </ul>
                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
