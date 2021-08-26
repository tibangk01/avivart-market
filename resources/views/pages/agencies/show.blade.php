@extends('layouts.main', ['title' => $society->enterprise->name])

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- info boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                   <table class="table table-striped table-inverse table-responsive">
                       <thead class="thead-inverse">
                           <tbody>
                               <tr>
                                   <td>{{ $society->enterprise->code }}</td>
                                   <td>{{ $society->enterprise->name }}</td>
                                   <td>{{ $society->enterprise->phone_number}}</td>
                                   <td>{{ $society->enterprise->address}}</td>
                                   <td>{{ $society->enterprise->website}}</td>
                               </tr>
                           </tbody>
                   </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
