@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('successMsg'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Well done!</strong> {{session('successMsg')}}
            </div>
        @endif
    </div>
    <h1>Work</h1>
@endsection