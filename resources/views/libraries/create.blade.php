@extends('layouts.dashboard', ['title' => "Bibliothèque"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12">
                
            </div>

            <div class="col-md-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                            aria-controls="pills-home" aria-selected="true">En local</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">En ligne</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        {!! Form::open(['route' => 'library.store', 'method' => 'POST', 'files' => true]) !!}
                        {!! Form::hidden('form', 'local') !!}
                        
                            <div class="form-group">
                                <label for="exampleInputFile">Image / Audio / Vidéo / Document</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        {!! Form::file('image', ['required' => 'required', 'class' => 'custom-file-input']) !!}
                                        {!! Form::label('image', 'Choisissez', ['class' => 'custom-file-label']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
                                {!! Form::text('description', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                            </div>
                            
                        {!! Form::close() !!}
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        {!! Form::open(['route' => 'library.store', 'method' => 'POST', 'files' => true]) !!}
                        {!! Form::hidden('form', 'remote') !!}

                        <div class="form-group">
                            {!! Form::label('remote', 'Image / Audio / Vidéo / Document') !!}
                            {!! Form::text('remote', null, ['required' => true, 'class' => 'form-control', 'placeholder' => 'Entrez un lien']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
                            {!! Form::text('description', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
</section>
@endsection
