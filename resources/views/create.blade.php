<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env("GOOGLE_MAPS_API_KEY")}}&libraries=places&callback=initMap" async defer></script>

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
                           <label for="category_filter" class="col-md-2 control-label">Business Type</label>

                           <div class="col-md-10">
                               <select name="companyType" id="companyType" class="form-control">
                                   <option value="">Select Business Type</option>
                                   @foreach($category as $row)
                                       <option value="{{$row->category_id}}">{{$row->category_name}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="companyName" class="col-md-2 control-label">Business Name</label>

                           <div class="col-md-10">
                               <input type="text" class="form-control" name="companyName" placeholder="Company Name">
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="address" class="col-md-2 control-label">Address</label>

                           <div class="col-md-10">
                               <input type="text" class="form-control" name="address"
                                      id="search_input" placeholder="Address" />

                               <input type="hidden" class="form-control" name="latitude"
                                      id="latitude" placeholder="Latitude"/>
                               <input type="hidden" class="form-control" name="longitude"
                                      id="longitude" placeholder="Longitude"/>
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
                               <button type="button" class="btn btn-default" onclick="window.location='{{ URL::previous() }}'">Cancel</button>
                               <button type="submit" class="btn btn-primary">Submit</button>
                           </div>
                       </div>
                   </fieldset>
               </form>
           </div>
       </div>

       <script>
           var autocomplete;
           var searchInput = 'search_input';
           $(document).ready(function () {

               autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                   types: ['address'],
                   componentRestrictions: {country: 'uk'}
               });

               google.maps.event.addListener(autocomplete, 'place_changed', function () {
                   var place = autocomplete.getPlace();
                   var lat = place.geometry.location.lat();
                   var lng = place.geometry.location.lng();

                   document.getElementById('latitude').value = lat;
                   document.getElementById('longitude').value = lng;
               });
           });
       </script>
   </div>
@endsection