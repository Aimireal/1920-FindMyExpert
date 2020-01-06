@extends('layouts.app')

@section('content')
   <div class="container">

       @if($errors->any())
           @foreach($errors->all() as $error)
               <div class="alert alert-dismissible alert-danger">
                   <button type="button" class="close" data-dismiss="alert">×</button>
                   <strong>Error! </strong>{{$error}}
               </div>
           @endforeach
       @endif

       <div class="panel panel-default">
           <div class="panel-heading">
               <h3 class="panel-title">Add new Expert</h3>
           </div>
           <div class="panel-body">
               <form class="form-horizontal" action="{{route('store')}}" method="POST">
                   {{csrf_field()}}
                   <fieldset>

                       <div class="form-group">
                           <label for="companyName" class="col-md-2 control-label">Business Name</label>

                           <div class="col-md-10">
                               <input type="text" class="form-control" name="companyName" placeholder="Company Name">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="companyType" class="col-md-2 control-label">Business Type</label>

                           <div class="col-md-10">
                               <input type="text" class="form-control" name="companyType" placeholder="Company Type">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="firstName" class="col-md-2 control-label">First Name</label>

                           <div class="col-md-10">
                               <input type="text" class="form-control" name="firstName" placeholder="First Name">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="lastName" class="col-md-2 control-label">Last Name</label>

                           <div class="col-md-10">
                               <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="inputEmail" class="col-md-2 control-label">Contact Email</label>

                           <div class="col-md-10">
                               <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="phone" class="col-md-2 control-label">Phone Number</label>

                           <div class="col-md-10">
                               <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                           </div>
                       </div>

                       <div class="form-group">
                           <div class="col-md-10 col-md-offset-2">
                               <a href="{{route('home')}}" type="button" class="btn btn-default">Cancel</a>
                               <button type="submit" class="btn btn-primary">Submit</button>
                           </div>
                       </div>
                   </fieldset>
               </form>
           </div>
       </div>
   </div>
@endsection