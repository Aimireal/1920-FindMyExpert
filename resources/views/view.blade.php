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
                <h3 class="panel-title">View Expert</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('update', $expert->id)}}" method="POST">
                    {{csrf_field()}}
                    <fieldset>

                        <div class="form-group">
                            <label for="category_filter" class="col-md-2 control-label">Business Type</label>

                            <div class="col-md-10">
                                <select name="companyType" id="companyType" class="form-control" readonly="true">
                                    <option value="">Select Business Type</option>
                                    @foreach($category as $row)
                                        <option value="{{$row->category_id}}"{{($expert->company_type == $row->category_id) ? ' selected': ''}}>{{$row->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="companyName" class="col-md-2 control-label">Business Name</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$expert->company_name}}"name="companyName" placeholder="Company Name" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="location" class="col-md-2 control-label">Location</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="location"
                                       id="search_input" placeholder="Location" readonly/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="firstName" class="col-md-2 control-label">First Name</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$expert->first_name}}" name="firstName" placeholder="First Name" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastName" class="col-md-2 control-label">Last Name</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$expert->last_name}}"name="lastName" placeholder="Last Name" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-md-2 control-label">Contact Email</label>

                            <div class="col-md-10">
                                <input type="email" class="form-control" value="{{$expert->email}}"name="email" id="inputEmail" placeholder="Email" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-2 control-label">Phone Number</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$expert->phone}}"name="phone" placeholder="Phone Number" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rating" class="col-md-2 control-label">Expert Rating</label>

                            <div class="col-md-10">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="review" class="col-md-2 control-label">Expert Reviews</label>

                            <div class="col-md-10">

                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection