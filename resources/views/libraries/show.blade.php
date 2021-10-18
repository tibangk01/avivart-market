@extends('layouts.dashboard', ['title' => "Bibliothèque"])

@section('body')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12">
                <x-library :library='$library' class="img200_200" />
            </div>

        </div>
    </div>
</section>
@endsection
