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

<div class="container">
    <div class="row text-center">
        <h2 class="key_features">What is FindMyExpert?</h2>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h3>For business...</h3>
            <p> <b>Expanding reach</b> A place for customers to write honest reviews and help boost popularity </p>
        </div>
        <div class="col-md-4">
            <h3>For consumers...</h3>
            <p> <b>Ensuring quality</b> Easily filter the best local and international services for you requirements </p>
        </div>
        <div class="col-md-4">
            <h3>For everyone...</h3>
            <p><b>Saving money</b> Filter by price with similar services for instant savings(Upcoming feature) </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h3>Accounts System</h3>
            <p>Using the default Laravel authentication system for creating accounts and operations related </p>
        </div>
        <div class="col-md-4">
            <h3>Datatable implementation</h3>
            <p>Using DataTables.net bootstrap 4 datatable for displaying information</p>
        </div>
        <div class="col-md-4">
            <h3>MySQL database</h3>
            <p>Supports emojis in the preview mode for when you need to express yourself via one</p>
        </div>
    </div>

</div>

<hr>

<div class="container">
    <div class="row text-center">
        <div>
            <h4>Some of our features...</h4>
            <ul class="center" type="square">
                <li>Create accounts to add new experts</li>
                <li>Browse and filter through over 40 categories</li>
                <li>Implements CRUD for adding experts in a friendly way</li>
                <li>Laravel</li>
                <ul>
                    <li>Using CSRF Tokens where applicable for added security.</li>
                </ul>
                <li>Created by:</li>
                <ul>
                    <li>Name - Dylan Hudson</li>
                    <li>Student Number - U1652664</li>
                    <li>University of Huddersfield</li>
                    <li>BSc Computing</li>
                    <li>January 2020</li>
                </ul>
            </ul>
        </div>

    </div>
</div>
@endsection

<style>
    h1{
        text-shadow: #525252 0px 0px 20px;
        font-weight: bold;
    }

    h4{
        font-weight: bold;
    }

    pre {
        border: 0;
        background-color: transparent;
        white-space:nowrap;
    }

    .col-md-4 p{
        color: #555;
    }

    .credits p{
        color: #555;
    }

    .row li{
        color: #555;
    }

    .key_features{
        text-shadow: none;
        font-weight: bold;
    }

    .center{
        width:300px;
        margin:0 auto;
        text-align:left;
    }

</style>