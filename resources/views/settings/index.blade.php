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
                                    aria-selected="true">Navbar Skins</a>

                                <a class="nav-item nav-link rounded-0" id="nav-second-tab" data-toggle="tab"
                                    href="#nav-second" role="tab" aria-controls="nav-second"
                                    aria-selected="true">Sidebar Skins</a>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body py-1">
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-first" role="tabpanel"
                                aria-labelledby="nav-first-tab">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Dark</h4>
                                        <ul>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-primary']) }}">Primary</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-secondary']) }}">Secondary</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-info']) }}">Info</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-success']) }}">Success</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-danger']) }}">Danger</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-indigo']) }}">Indigo</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-purple']) }}">Purple</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-pink']) }}">Pink</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-navy']) }}">Navy</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-lightblue']) }}">LighBlue</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-teal']) }}">Teal</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-cyan']) }}">Cyan</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-dark']) }}">Dark</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-gray-dark']) }}">Gray Dark</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-dark text-light navbar-gray']) }}">Gray</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-6">
                                        <h4>Light</h4>
                                        <ul>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-light']) }}">Light</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-light navbar-warning']) }}">Warning</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-light navbar-white']) }}">White</a></li>
                                            <li><a href="{{ route('settings.index', ['navbar_theme' => 'navbar-light navbar-orange']) }}">Orange</a></li>
                                        </ul>
                                    </div>
                                </div>    

                            </div>

                            <div class="tab-pane fade" id="nav-second" role="tabpanel"
                                aria-labelledby="nav-second-tab">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Dark</h4>
                                        <ul>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-primary elevation-4']) }}">Primary avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-primary elevation-3']) }}">Primary avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-primary elevation-2']) }}">Primary avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-primary elevation-1']) }}">Primary avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-warning elevation-4']) }}">Warning avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-warning elevation-3']) }}">Warning avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-warning elevation-2']) }}">Warning avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-warning elevation-1']) }}">Warning avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-info elevation-4']) }}">Info avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-info elevation-3']) }}">Info avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-info elevation-2']) }}">Info avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-info elevation-1']) }}">Info avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-danger elevation-4']) }}">Danger avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-danger elevation-3']) }}">Danger avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-danger elevation-2']) }}">Danger avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-danger elevation-1']) }}">Danger avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-success elevation-4']) }}">Success avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-success elevation-3']) }}">Success avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-success elevation-2']) }}">Success avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-success elevation-1']) }}">Success avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-indigo elevation-4']) }}">Indigo avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-indigo elevation-3']) }}">Indigo avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-indigo elevation-2']) }}">Indigo avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-indigo elevation-1']) }}">Indigo avec élevation de 1</a></li>
                                            
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-lightblue elevation-4']) }}">LightBlue avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-lightblue elevation-3']) }}">LightBlue avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-lightblue elevation-2']) }}">LightBlue avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-lightblue elevation-1']) }}">LightBlue avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-navy elevation-4']) }}">Navy avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-navy elevation-3']) }}">Navy avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-navy elevation-2']) }}">Navy avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-navy elevation-1']) }}">Navy avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-purple elevation-4']) }}">Purple avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-purple elevation-3']) }}">Purple avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-purple elevation-2']) }}">Purple avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-purple elevation-1']) }}">Purple avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-fuchsia elevation-4']) }}">Fuchsia avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-fuchsia elevation-3']) }}">Fuchsia avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-fuchsia elevation-2']) }}">Fuchsia avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-fuchsia elevation-1']) }}">Fuchsia avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-pink elevation-4']) }}">Pink avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-pink elevation-3']) }}">Pink avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-pink elevation-2']) }}">Pink avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-pink elevation-1']) }}">Pink avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-maroon elevation-4']) }}">Maroon avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-maroon elevation-3']) }}">Maroon avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-maroon elevation-2']) }}">Maroon avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-maroon elevation-1']) }}">Maroon avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-orange elevation-4']) }}">Orange avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-orange elevation-3']) }}">Orange avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-orange elevation-2']) }}">Orange avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-orange elevation-1']) }}">Orange avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-lime elevation-4']) }}">Lime avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-lime elevation-3']) }}">Lime avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-lime elevation-2']) }}">Lime avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-lime elevation-1']) }}">Lime avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-teal elevation-4']) }}">Teal avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-teal elevation-3']) }}">Teal avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-teal elevation-2']) }}">Teal avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-teal elevation-1']) }}">Teal avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-olive elevation-4']) }}">Olive avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-olive elevation-3']) }}">Olive avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-olive elevation-2']) }}">Olive avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-dark-olive elevation-1']) }}">Olive avec élevation de 1</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-6">
                                        <h4>Clair</h4>
                                        <ul>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-primary elevation-4']) }}">Primary avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-primary elevation-3']) }}">Primary avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-primary elevation-2']) }}">Primary avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-primary elevation-1']) }}">Primary avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-warning elevation-4']) }}">Warning avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-warning elevation-3']) }}">Warning avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-warning elevation-2']) }}">Warning avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-warning elevation-1']) }}">Warning avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-info elevation-4']) }}">Info avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-info elevation-3']) }}">Info avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-info elevation-2']) }}">Info avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-info elevation-1']) }}">Info avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-danger elevation-4']) }}">Danger avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-danger elevation-3']) }}">Danger avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-danger elevation-2']) }}">Danger avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-danger elevation-1']) }}">Danger avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-success elevation-4']) }}">Success avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-success elevation-3']) }}">Success avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-success elevation-2']) }}">Success avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-success elevation-1']) }}">Success avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-indigo elevation-4']) }}">Indigo avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-indigo elevation-3']) }}">Indigo avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-indigo elevation-2']) }}">Indigo avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-indigo elevation-1']) }}">Indigo avec élevation de 1</a></li>
                                            
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-lightblue elevation-4']) }}">LightBlue avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-lightblue elevation-3']) }}">LightBlue avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-lightblue elevation-2']) }}">LightBlue avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-lightblue elevation-1']) }}">LightBlue avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-navy elevation-4']) }}">Navy avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-navy elevation-3']) }}">Navy avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-navy elevation-2']) }}">Navy avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-navy elevation-1']) }}">Navy avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-purple elevation-4']) }}">Purple avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-purple elevation-3']) }}">Purple avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-purple elevation-2']) }}">Purple avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-purple elevation-1']) }}">Purple avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-fuchsia elevation-4']) }}">Fuchsia avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-fuchsia elevation-3']) }}">Fuchsia avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-fuchsia elevation-2']) }}">Fuchsia avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-fuchsia elevation-1']) }}">Fuchsia avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-pink elevation-4']) }}">Pink avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-pink elevation-3']) }}">Pink avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-pink elevation-2']) }}">Pink avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-pink elevation-1']) }}">Pink avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-maroon elevation-4']) }}">Maroon avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-maroon elevation-3']) }}">Maroon avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-maroon elevation-2']) }}">Maroon avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-maroon elevation-1']) }}">Maroon avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-orange elevation-4']) }}">Orange avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-orange elevation-3']) }}">Orange avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-orange elevation-2']) }}">Orange avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-orange elevation-1']) }}">Orange avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-lime elevation-4']) }}">Lime avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-lime elevation-3']) }}">Lime avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-lime elevation-2']) }}">Lime avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-lime elevation-1']) }}">Lime avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-teal elevation-4']) }}">Teal avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-teal elevation-3']) }}">Teal avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-teal elevation-2']) }}">Teal avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-teal elevation-1']) }}">Teal avec élevation de 1</a></li>

                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-olive elevation-4']) }}">Olive avec élevation de 4</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-olive elevation-3']) }}">Olive avec élevation de 3</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-olive elevation-2']) }}">Olive avec élevation de 2</a></li>
                                            <li><a href="{{ route('settings.index', ['sidebar_left_theme' => 'sidebar-light-olive elevation-1']) }}">Olive avec élevation de 1</a></li>
                                        </ul>
                                    </div>
                                </div>
                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
